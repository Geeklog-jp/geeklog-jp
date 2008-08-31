#!/bin/sh
# $Id$
#
# Copyright (C) 2008
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
# 基準に、比較対象のリポジトリのパスを2つ指定します。
#
#  % sh changes-branches.sh tags/geeklog-1.5.0-jp-0.1 tags/geeklog-1.5.0-jp-0.3
#
# -lオプションを指定すると http://geeklog-jp.googlecode.com/svn といった
# リポジトリを基準にしてパスの下のディレクトリの一覧を表示します。
#
#  % sh changes-branches.sh tags
#  geeklog-1.4.1-20080709/
#  geeklog-1.5.0-jp-0.1/
#  geeklog-1.5.0-jp-0.1-save/
#  geeklog-1.5.0-jp-0.3/
#

#
# 基準とするリポジトリ
#
base="http://geeklog-jp.googlecode.com/svn"

unset LANG

usage() {
    echo "$0: [-afhlmr] branch1 branch2"
    exit $1
}

ls_tags() {
    exec svn ls $1
}

report_added() {
    branch=$1

    awk 'BEGIN { from="'$branch'"; len = length(from) + 2; }
	/^A/  { print substr($2, len) }'
}

report_removed() {
    branch=$1

    awk 'BEGIN { from="'$branch'"; len = length(from) + 2; }
	/^D/  { print substr($2, len) }'
}

report_modified() {
    branch=$1
    full=$2

    awk 'BEGIN { from="'$branch'"; len = length(from) + 2; }
	/^A/  { print substr($2, len); next }
	/^M/ '"${full}"' { print substr($2, len); next }'
}

full=false
report=modified

while getopts afhlmr opts; do
    case ${opts} in
	a)
	    report=added
	    ;;
	f)
	    full=true
	    ;;
	h | \?)
	    usage 0
	    ;;
	l)
	    report=list
	    ;;
	m)
	    ;;
	r)
	    report=removed
	    ;;
	*)
	    usage 1
	    ;;
    esac
done
shift `expr $OPTIND - 1`

from_branch="${base}/$1"

if [ "${report}" = "list" ]; then
    ls_tags ${from_branch}
fi

if [ $# -ne 2 ]; then
    usage 1;
fi

to_branch="${base}/$2"

pat=
if ${full}; then
    pat='|| /^.M/'
fi

svn diff --summarize "${from_branch}" "${to_branch}" |
case ${report} in
added)		report_added "${from_branch}";;
removed)	report_removed "${from_branch}";;
*)		report_modified "${from_branch}" "${pat}";;
esac
