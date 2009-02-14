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
# リリースに関する一連の作業を行います。引数には、以下の2つを指定します。
#
#	1. リリースの元とするtrunkのディレクトリ名
#	2. リリースのタグの名称
#
# 1.はリポジトリのルート直下のtrunkディレクトリの、2.はリポジトリのルート
# 直下のtagsディレクトリの、それぞれ直下のディレクトリ名ですが、httpsの
# メソッドのURLで指定することもできます。
#
# Subversionでチェックアウトした作業領域ではない、ディレクトリで実行する
# ことを前提としています。
#
# Subversionのリポジトリにアクセスしての処理を行うため、Internetに接続
# されていないと使用できません。
#
# オプション:
#
#	-c	実行する処理を表示だけして、実際の処理は行いません。
#	-n	タグの作成を行いません。
#	-r	コミット・ログにtagの作成ではなく、releaseの作成と残します。
#
unset LANG

#
# 基準とするリポジトリ
#
repositry="https://geeklog-jp.googlecode.com/svn"

usage() {
    echo "Usage: $0 [-cnr] <base> <tag>"
    exit $1
}

normalize() {
    subdir=$1
    path=$2

    case $# in
    2)	;;
    *)	echo "${path}"
        return;;
    esac
    
    case "${path}" in
    https://*)	;;
    *)	path="${repositry}/${subdir}/${path}";;
    esac
    echo "${path}"	
}

check=false
type=tag
docopy=true
while getopts cnr opts; do
    case "${opts}" in
    c)	check=true;;
    n)	docopy=false;;
    r)	type=release;;
    esac
done
shift `expr $OPTIND - 1`

if [ $# -ne 2 ]; then
	usage 1
fi

base=$1
tag=$2

base=`normalize trunk ${base}`
target=`normalize tags ${tag}`

if [ -d .svn ]; then
    echo "Don't execute on your working directory." 1>&2
    exit 2
fi

if [ -d "${tag}" ]; then
    echo "Remove existing ${tag}" 1>&2
    echo "rm -rf ${tag}" | su
fi

if "${check}"; then
    echo "Make ${type} ${target}"
    echo "	from ${base}"
    exit 0
fi

if "${docopy}"; then
	svn copy -m "Make ${type} ${target} from ${base}." "${base}" "${target}" || exit
fi
svn export -q "${target}" || {
    error=$?
    rm -rf "${target}"
    exit "${error}"
}
echo "chown -R root ${tag}; chgrp -R wheel ${tag}" | su
case $? in
0)  tar cf - "${tag}" | gzip -9 > "${tag}.tar.gz"
    zip -qr "${tag}.zip" "${tag}"
    ;;
esac
