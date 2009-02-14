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
# trunkの変更をブランチの作業領域に反映させるための簡易なスクリプトです。
#
# 第1引数に対象とするSubversionのリビジョン番号(rを付けない数値だけ)、
# 第2引数に変更を反映させる作業領域のファイルを相対パスで指定します。
#
# カレント・ディレクトリが作業領域のトップにあることを前提としています。
#
# Subversionのリポジトリにアクセスして結果を得ます。従って、Internetに接続
# されていないと使用できません。
#
unset LANG

#
# 基準とするリポジトリ
#
repositry="https://geeklog-jp.googlecode.com/svn"

#
# マージ元のtrunkのディレクトリ
#
base="trunk/geeklog-1-jp"

usage() {
    echo "Usage: $0 rev[:rev] file"
    exit $1
}

if [ $# -lt 2 ]; then
    usage 1
fi
revision=$1
path=$2

if [ -f "${path}" ]; then
    case "${revision}" in
    *:*)	opts=-r;;
    *)		opts=-c;;
    esac
    svn merge ${opts} ${revision} "${repositry}/${base}/${path}" "${path}"
else
    case "${revision}" in
	*:*)	echo "You can't specify revision range for for a new file." 1>&2
    		exit 1;;
	*)	svn copy -r ${revision} "${repositry}/${base}/${path}" "${path}"
    esac
fi
