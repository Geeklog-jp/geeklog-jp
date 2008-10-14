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
# タグ間の変更を作業領域にマージする処理を行います。
#
# 第1引数と第2引数で、マージを行う元と先のタグを指定します。
# 指定するタグは、以下のいずれかで指定します。
#	1. httpsのメソッドのURLで指定
#	2. / を途中に含まないと、リポジトリのルート直下のexternals
#	  ディレクトリの下のディレクトリ
#	3. / を途中に含んでいて-aオプションを指定した場合はリポジトリの
#	  ルートからの相対パス、-aオプションを指定しない場合は2.と同じ
#
# 第3引数を指定すると、指定したリポジトリの以下のパスに対してマージの処理を
# 行います。
# 
#
# Subversionでcheckout済みの作業領域で作業を行うことを前提としています。
#
# Subversionのリポジトリにアクセスしての処理を行うため、Internetに接続
# されていないと使用できません。
#
unset LANG

#
# 基準とするリポジトリ
#
repositry="https://geeklog-jp.googlecode.com/svn"

#
# svn mergeの引数
#
svnoptions="--accept postpone --ignore-ancestry"
diffopts="-u --ignore-eol-style"
anybranch=false

usage() {
    echo "Usage: $0 <tag-from> <tag-to>"
    exit $1
}

normalize() {
    path=$1
    target=$2

    if [ "$#" -ne 1 -a "$#" -ne 2 ]; then
	    echo "${path}"
            return
    fi
    
    case "${path}" in
    https://*)	;;
    */*)	if ${anybranch}; then
    		    path="${repositry}/${path}"
		else
		    path="${repositry}/externals/${path}"
		fi
		;;
    *)		path="${repositry}/externals/${path}";;
    esac
    if [ -n "${target}" ]; then
	path="${path}/${target}"
    fi
    echo "${path}"	
}

while getopts a opts; do
    case "${opts}" in
    a)	anybranch=true;;
    esac
done
shift `expr $OPTIND - 1`

if [ $# -lt 2 ]; then
    usage 1
fi

from=$1
to=$2
target=$3

from=`normalize ${from} ${target}`
to=`normalize ${to} ${target}`

if [ ! -d .svn ]; then
    echo "You are not in working directory." 1>&2
    exit 2
fi

if [ -n "${diffopts}" ]; then
    svn merge ${svnoptions} --extensions "${diffopts}" "${from}" "${to}" "${target}"
else
    svn merge ${svnoptions} "${from}" "${to}" "${target}"
fi
