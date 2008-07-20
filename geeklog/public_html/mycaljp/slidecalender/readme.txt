
スライドカレンダーの表示方法
----------------------------
Step 1)
ディレクトリ "slidecalender" 下の、ディレクトリ "mycaljp" およびその中の全ての
ファイルを、ご使用中のテーマディレクトリ内にコピーしてください。

Step 2)
ご使用中のテーマのスタイルシート（通常は "style.css" ）をテキストエディタで開き、
テキスト中の適切な位置に次の文字列、

/* Mycaljp用スタイル */
@import url("mycaljp/mycaljp.css");

を挿入し保存してください。(@importルールの前にスタイルを記述したり、@importルール
の間にスタイルを記述することはできませんので、ご注意ください。)

Step 3)
ご使用中のテーマの "functions.php" をテキストエディタで開き、適当な行に次の文字列、

// Mycaljp用 テンプレートのパスを設定する
if ( function_exists( mycaljp_setlayoutpath ) ) mycaljp_setlayoutpath();

を挿入し保存してください。

Step 4)
テンプレートファイル（通常は "header.thtml" ）をテキストエディタで開き、スライドカレ
ンダーを表示させたい位置に次の文字列、

<?php echo mycaljp_slidecalender(); ?>

を挿入し保存してください。
これで、スライドカレンダは表示されるようになったはずです。

Step 5)
スタイルシートの"[テーマディレクトリ]/mycaljp/mycaljp.css"や、テンプレートファイルの
"[テーマディレクトリ]/mycaljp/*.thtml"をお好みに合わせて変更してください。

Step 6)
"[非公開ディレクトリ]/system/custom/phpblock_mycaljp.php"の39行から128行までの間に、
設定変更可能な配列変数 $_MYCALJP_CONF を定義しています。お好みに合わせて値を変更して
ください。

(Tips)
配列変数 $_MYCALJP_CONF は、ご使用中のテーマの "functions.php"に記述できます。
したがってテーマごとにサイトカレンダの設定が可能です。
