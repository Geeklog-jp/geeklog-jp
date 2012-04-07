#!/usr/bin/perl
#
# Copyright (C) 2008-2012
# Takahiro Kambe.  All rights reserved.
#
# Redistribution and use in source and binary forms, with or without
# modification, are permitted provided that the following conditions
# are met:
#
# 1. Redistributions of source code must retain the above copyright
#    notice, this list of conditions and the following disclaimer.
# 2. Redistributions in binary form must reproduce the above copyright
#    notice, this list of conditions and the following disclaimer in the
#    documentation and/or other materials provided with the distribution.
#
# THIS SOFTWARE IS PROVIDED BY THE AUTHOR AND CONTRIBUTORS ``AS IS'' AND
# ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
# IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
# ARE DISCLAIMED.  IN NO EVENT SHALL THE AUTHOR OR CONTRIBUTORS BE LIABLE
# FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
# DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS
# OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
# HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
# LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
# OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF
# SUCH DAMAGE.
#

#
# Subversionのリポジトリ上で追加や変更などのあったファイルの一覧を表示します。
#
# -a		追加されたファイルだけの一覧を表示します。
# -r		削除されたファイルだけの一覧を表示します。
# -m		追加および変更されたファイルの一覧を表示します。
# -f		-mオプションに追加して、Subversionのファイル属性が変更された
#		ファイルも変更されたものとして表示に含めます。
#
# -l		指定した第1引数以下のリポジトリ上のディレクトリを表示します。
#
# -h		簡単な使い方を表示します。
#
# Subversionのリポジトリにアクセスして結果を得ます。従って、Internetに接続
# されていないと使用できません。
#
# 比較する場合は、http://geeklog-jp.googlecode.com/svn といったリポジトリを
# 基準に、比較対象のリポジトリのパスを2つ指定します。ここで指定するパスは、
#
# 1. 指定するパスが URL の場合は、その URL を比較対象として使用します。
#
# 2. 指定するパスが URL でない、スラッシュを含んだパスの場合は、
#
#	(リポジトリのURL) + "/" + (指定したパス)
#
#    として、解釈します。
#
# 3. スラッシュ(/)を含まない場合は、リポジトリ直下の tags 以下のパス名と
#    して解釈します。
#
#	(リポジトリのURL) + "/tags/" + (指定したパス)
#
# 例
#
# % perl changes-branches.pl geeklog-1.5.0-jp-0.1 geeklog-1.5.0-jp-0.3
#
#	リポジトリ以下の、tags/geeklog-1.5.0-jp-0.1 と
#	tags/geeklog-1.5.0-jp-0.3 の比較結果を出力します。
#
# -lオプションを指定すると http://geeklog-jp.googlecode.com/svn といった
# リポジトリを基準にしてパスの下のディレクトリの一覧を表示します。
#
# % perl changes-branches.pl tags
# geeklog-1.4.1-20080709/
# geeklog-1.5.0-jp-0.1/
# geeklog-1.5.0-jp-0.1-save/
# geeklog-1.5.0-jp-0.3/
#
use strict;
use IO::Handle;
use FileHandle;
use Getopt::Std;
use Exporter;
use vars qw(@ISA @EXPORT @EXPORT_OK $VERSION);

$VERSION = "1.0";

delete $ENV{'LANG'};

#
# ChangeBranch class
#
package ChangeBranch;

sub usage {
    my($status) = @_;

    print STDERR "Usage: $0 [-afhlmr] <branch1> <branch2>\n";
    exit($status);
}

sub ls_tags {
    my($self) = shift;
    my($dir) = ($self->{'from'});

    system("svn ls ${dir}");
    exit $? >> 8;
}

sub new {
    my($class, $base) = @_;
    my($self);

    $self = {
	'base' => $base,
	'length' => length($base),
	'options' => {},
    };
    bless($self, $class);
    return $self;
}

sub options {
    my($self) = shift;
    my($key) = shift;

    (@_)? $self->{'options'}->{$key} = shift: $self->{'options'}->{$key};
}

sub parse_args {
    my($self) = shift;
    my(%opts, $k, $from, $to);

    Getopt::Std::getopts('afhlmr', \%opts);
    $self->{'options'} = \%opts;

    if ($self->options('h') or $self->options('?')) {
	usage(0);
    }

    if (not $self->options('a') and not $self->options('r')) {
	$self->options('m', 1);
    }

    if ($self->options('l') and scalar(@ARGV) > 0) {
	$self->{'from'} = $self->normalize_arg($ARGV[0]);
    } elsif (scalar(@ARGV) > 1) {
	$self->{'from'} = $self->normalize_arg($ARGV[0]);
	$self->{'to'} = $self->normalize_arg($ARGV[1]);
    } else {
	usage(1);
    }
}

sub normalize_arg {
    my($self, $arg) = @_;
    my($path);

    if ($arg =~ /^(\S+):\/\//) {
	return $arg;
    } elsif ($arg =~ /\//) {
	return join('/', ($self->{'base'}, $arg));
    } else {
	return join('/', ($self->{'base'}, 'tags', $arg));
    }
}

sub start_svn {
    my($self) = shift;
    my($fh, $cmd, $l);

    $fh = new IO::Handle;
    $cmd = join(' ', ('svn diff --summarize', '"' . $self->{'from'} . '"',
		      '"' . $self->{'to'} . '"', '|'));
    open($fh, $cmd) or undef $fh;
    $self->{'handle'} = $fh;
}

sub parse_line {
    my($line, $len, $dir) = @_;
    my($what, $path, $url, $d, @l);

    chomp($line);
    ($what, $url) = split(/\s+/, $line, 2);
    $path = substr($url, $len);
    if ($path =~ /\//) {
	@l = split(/\//, $path);
	pop(@l);
	$d = join('/', @l);
	if (ref($dir) eq 'HASH') {
	    $dir->{$d} = 1;
	}
    }
    return ($what, $path);
}

sub is_added {
    my($what) = shift;

    return $what =~ /^A/;
}

sub is_removed {
    my($what) = shift;

    return $what =~ /^D/;
}

sub is_modified {
    my($what, $full) = @_;

    return $what =~ /^[AM]/ or ($full and $what =~ /^.M/);
}

sub svn_diff_list {
    my($self) = shift;
    my(%dir, $line, $what, $path, $len, @result, $status);

    if (defined $self->start_svn) {
	$len = length($self->{'from'}) + 1;
	while ($line = $self->{'handle'}->getline) {
	    ($what, $path) = parse_line($line, $len, \%dir);
	    if ($self->options('a') and is_added($what)) {
		push(@result, $path);
	    } elsif ($self->options('r') and is_removed($what)) {
		push(@result, $path);
	    } elsif ($self->options('m') and is_modified($what)) {
		push(@result, $path);
	    }
	}
	$self->{'handle'}->close;
	$status = $? >> 8;
	if ($status == 0) {
	    foreach $path (@result) {
		unless (exists($dir{$path})) {
		    print($path, "\n");
		}
	    }
	}
    } else {
	$status = $? >> 8;
    }
    exit($status);
}

sub main {
    my($self) = shift;

    $self->parse_args;

    if ($self->options('l')) {
	$self->ls_tags;
    }
    $self->svn_diff_list;
}

package main;
#
# 基準とするリポジトリ
#
my($Base) = "http://geeklog-jp.googlecode.com/svn";

my($chb);
$chb = new ChangeBranch $Base;
$chb->main;
