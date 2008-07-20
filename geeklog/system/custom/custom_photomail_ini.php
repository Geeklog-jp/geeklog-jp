<?php
// +---------------------------------------------------------------------------+
// |  custum_photomai.php Ver2.20070130 用設定ファイル                         |
// |  create:2005/04/20                                                        |
// +---------------------------------------------------------------------------+
// | 変更履歴                                                                  |
// |  update:2005/10/05 サムネイルサイズの既定値を160に                        |
// |  update:2005/10/17 項目追加　this[W2]　$this[H2]                          |
// |  update:2006/03/15 項目追加　this['anonymous']                            |
// |  update:2006/03/15 画像保存アドレスの既定値を変更                         |
// |  update:2006/04/13 $_GROUPS -> $groups                                    |
// |  update:2006/04/20 $this[host] →$this['host']                            |
// |  update:2006/09/21 項目追加　this['acceptonly']                           |
// |  update:2006/09/21 許可したグループ設定したグループが承認待ちファイルに   |
// |                    記憶される不具合修整                                   |
// |  update:2006/09/21 許可するメールアドレスの設定のサンプルをコメント       |
// |  update:2007/01/30 short_open_tag OFF環境対応 <? → <?php                 |
// +---------------------------------------------------------------------------+
// | 注意１：話題用IDの既定値はNewTopic(新規話題:メール記事投稿用)にしています。
// | 　　　　あらかじめ登録しておいてください。
// | 　　　　GeekLog IvySOHO プロジェクト版でインストールした場合は登録済です。
// | 注意２：このファイルは、文字コードがUTF－8になっています
// | 注意３：ユーザ登録しているメールアドレスと当ファイルに記述しているアドレス
// | 　　　　以外からの投稿は、ゲストユーザー（Anonymous）投稿になります。
   $this['anonymous'] = 0;//←ゲストユーザーの投稿を認める時は1にしてください。
   $this['acceptonly'] = 0;//←当ファイルに記述しているアドレス以外は認めない時
                           //は1にしてください。ゲストユーザーの投稿は認めません
// | 注意４：画像ファイルの格納フォルダ
// |   あらかじめフォルダを作成してパーティションを777に設定しておいてください。
// |   デフォルトの設定は　　public/images/photomail/　です
// +---------------------------------------------------------------------------+
    //***************************
    //*☆受信メールサーバーの設定
    //***************************
    $this['host'] = "sxxx.xrea.com";        //メールのPOP3サーバー名
    $this['user'] = "xxxxxx@example.com";   // ユーザーID
    $this['pass'] = "yyyyyyyy";             // パスワード

    // 以下はお好みにより変更してください。

    //***********************
    //*許可するグループの設定
    //***********************
    //$aryGrp[0]='Story Admin';       //グループ
    //$aryTid[0]='NewTopic';          //話題用ID既定値
    //$aryDrf[0]='0';                 //1:下書き 0:即反映
    //***********************
    //*許可するメールアドレスの設定
    //***********************
    $this['accept'] = array ();
    $this['aryTid'] = array(); 
    $this['aryDrf'] = array(); 
    $this['aryUsername'] = array();
    //ユーザ登録しているメールアドレス以外で送信する場合は以下に記述する----->
    //***********************サンプル1
    //$wkEmail = 'admin@example.com';
    //$this['accept'][] = $wkEmail;
    //$this['aryTid'][$wkEmail]='NewTopic';//話題用ID
    //$this['aryDrf'][$wkEmail]=1;//1:下書き 0:即反映
    //$this['aryUsername'][$wkEmail]='Admin';//ユーザ名
    //***********************サンプル2
    //$wkEmail = 'moderator@example.com';
    //$this['accept'][] = $wkEmail;
    //$this['aryTid'][$wkEmail]='NewTopic';//話題用ID
    //$this['aryDrf'][$wkEmail]=1;//1:下書き 0:即反映
    //$this['aryUsername'][$wkEmail]='Moderator';//ユーザ名

    //*****************
    //*話題用IDの既定値
    //*****************
    $tida = "NewTopic";

    //*****************
    //*その他の設定値
    //*****************

    // メールでカテゴリをサブジェクトに指定する場合の区切り文字
    $optionsKeyword='@';

    // 件名がないときの題名
    $this['nosubject'] = "(タイトルなし)";
    
	// htmlメールの場合に除去しないタグ
    //そのままアイテム本文に記録されますが、blogの設定が改行文字置換onの場合は再編集で<br />
    $this['no_strip_tags'] = '<title><hr><h1><h2><h3><h4><h5><h6><div><p><pre><sup><ul><ol><br><dl><dt><table><caption><tr><li><dd><th><td><a><area><img><form><input><textarea><button><select><option>';

    // 最大添付量（バイト・1ファイルにつき）※超えるものは保存しない
    $this['maxbyte'] = 100000; //100KB
    // 対応MIMEタイプ（正規表現）Content-Type: image/jpegの後ろの部分。octet-streamは危険かも
    $this['subtype'] = "gif|jpe?g|png|bmp";
    // 保存しないファイル(正規表現)
    $this['viri'] = '.+\.exe$|.+\.zip$|.+\.pif$|.+\.scr$';

/*-- サムネイル--*/
    //サムネイルを使用する？ Yes=1 No=0(GDライブラリ利用不可の場合は自動判定)
    $this['thumb_ok'] = 1;
    //サムネイルの大きさ(これ以上の大きい画像はjpg,pngのサムネイル作成)
    $this['W'] = 160;//320;
    $this['H'] = 100;//320;

    //@@@@@20051017 add----->
    //リンク先の画像の大きさ(これ以上の大きい画像は縮小する)
    $this['W2'] = 640;
    $this['H2'] = 640;
    //@@@@@20051017 add<-----

    //サムネイルを作る対象画像(サムネイルを作成しない場合は、値を空にしてください)
    $this['thumb_ext'] = '.+\.jpe?g$|.+\.png$';
/*-- サムネイル作成できない(orしない)場合)--*/
    //アイテム内に表示する画像の最大横幅(imgタグ内のwidthの値)
    $this['smallW'] = 160;//320;

    // ★画像保存URL imagesの前に'/'が入ります。
    $this['tmp_url']  = $_CONF['site_url'] ."/images/photomail/";
    // ★画像保存ディレクトリ
    $this['tmp_dir']  = $_CONF['path_html'] ."images/photomail/";
    if(!is_writable($this[tmp_dir])){
        echo "設定エラー:".$this[tmp_dir]." ディレクトリが存在しないか、書き込み可能になっていません";
    }

    //★サムネイル保存URL
    $this['thumb_url']  = $this[tmp_url];
    //★サムネイル保存ディレクトリ
    $this['thumb_dir']  = $this[tmp_dir];

    // メルアド取得
    //@@@@@20060921update----->
    //$result = DB_query ("SELECT uid,email FROM {$_TABLES['users']}");
    $result = DB_query ("SELECT uid,email,username FROM {$_TABLES['users']}");
    //@@@@@20060921update<-----
    $nrows = DB_numRows ($result);
    for ($i = 0; $i < $nrows; $i++) {
        $T = DB_fetchArray ($result);
        //@@@@@20060413update $_GROUPS　を　$groupsへ訂正
        $groups = SEC_getUserGroups( $T['uid'] );
        if (isset ($groups[$aryGrp[0]])) {
            // 投稿許可アドレスをセット
            $this['accept'][] = $T['email'];
            $this['aryTid'][$T['email']]=$aryTid[0];
            $this['aryDrf'][$T['email']]=$aryDrf[0];
            //@@@@@20060921add
            $this['aryUsername'][$T['email']]=$T['username'];//ユーザ名
        }

    }

?>