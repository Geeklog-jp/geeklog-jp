<?php
// +---------------------------------------------------------------------------+
// | カスタム ユーザ設定                                                       |
// | ユーザー情報の作成・更新・削除にカスタマイズされた処理を追加する          |
// |   (1)ユーザの新規登録処理              入力項目、入力チェックの追加       |
// |   (2)ユーザののアカウント情報変更処理  入力項目追加                       |
// |   (3)管理者のユーザ新規登録処理        入力項目、入力チェックの追加       |
// |   (4)管理者のユーザ管理、編集処理      入力項目追加                       |
// |   (5)その他、ユーザの登録修整削除の際になんらかの処理の追加               |
// | 準備手順                                                                  |
// |   (1)テーマ/customディレクトリに memberdetail.thtml を準備する。          |
// |     (memberdetail.thtmlのサンプルは /system ディレクトリに有ります。)     |
// |              :layout/テーマ/custom/memberdetail.thtml                     |
// |   (2)必要があれば {customfields} を 以下のテンプレートに追加する          |
// |              :layout/テーマ/admin/user/edituser.thtml                     |
// |              :layout/テーマ/profile.thtml                                 |
// |   (3)追加テーブルが必要な場合は、create して                              |
// |      すでに、USERSに登録されているレコードと同じuidのデータは登録しておく |
// |   (4)custom_users.phpをカスタマイズする  (文字コードに注意！)             |
// |   (5)lib_custom.php require_once( 'custom/custom_users.php' ); 追加       |
// |   (6)config.php にて $_CONF['custom_registration'] を true に設定する。   |
// +---------------------------------------------------------------------------+
// CREATE TABLE `gl_users_opt` (
//   `uid` mediumint(8) NOT NULL,
//   `fld01` varchar(255) default NULL,
//   `fld02` varchar(255) default NULL,
//   PRIMARY KEY  (`uid`)
// ) TYPE=MyISAM ;
// +---------------------------------------------------------------------------+
// INSERT INTO `gl_users_opt` (`uid`)
//  SELECT `uid` FROM `gl_users`;
// +---------------------------------------------------------------------------+
// $Id: custom_users.php
// modified 20061016 tsuchi AT geeklog DOT jp


// +---------------------------------------------------------------------------+
// | ユーザ新規登録                                                            |
// +---------------------------------------------------------------------------+
// | 呼び出し元      :system/lib_user.php (共通)                               |
// +---------------------------------------------------------------------------+
// | 呼び出し元の元  :admin/user.php (管理者ユーザ新規登録、変更)              |
// |                 :users.php (ユーザ新規登録)                               |
// +---------------------------------------------------------------------------+
// | modified 20061016                                                         |
// +---------------------------------------------------------------------------+
function custom_usercreate($uid)
{
    global $_CONF, $_TABLES;
    global $_DB_table_prefix;
    // 更新項目は、事前に addslashes() を通すなどして準備しておくこと

    // 追加テーブルを使用している場合
    // 追加テーブルへのユーザデータ登録
    $sql = "INSERT INTO ";
    $sql .= $_DB_table_prefix ."users_opt" ;
    $sql .= " (uid) ";
    $sql .= " VALUES (";
    $sql .= $uid;
    $sql .= ")";
    DB_query ($sql);

    // 既存項目の更新を追加している場合
    // パッケージテーブルへの更新の追加
    $sql = "UPDATE ";
    $sql .= "{$_TABLES['users']} SET ";
    $sql .= " email='{$_POST['email']}'";
    $sql .= ",homepage='{$_POST['homepage']}'";
    $sql .= ", fullname='{$_POST['fullname']}' ";
    $sql .= "WHERE uid=$uid";
    DB_query($sql);

    return true;
}

// +---------------------------------------------------------------------------+
// | ユーザー削除                                                              |
// +---------------------------------------------------------------------------+
// | 呼び出し元      :system/lib_user.php (共通)                               |
// +---------------------------------------------------------------------------+
// | 呼び出し元の元  :admin/user.php (管理者ユーザ新規登録、変更)              |
// +---------------------------------------------------------------------------+
// | modified 20061016                                                         |
// +---------------------------------------------------------------------------+
function custom_userdelete($uid)
{
    global $_DB_table_prefix;

    // 追加テーブルを使用している場合
    // 追加テーブルのユーザデータ削除
    DB_delete ($_DB_table_prefix ."users_opt", 'uid', $uid);
    return true;
}
// +---------------------------------------------------------------------------+
// | ユーザー表示                                                              |
// +---------------------------------------------------------------------------+
// | 呼び出し元   :admin/user.php (管理者ユーザ新規登録、変更)                 |
// |              :user.php (?)                                                |
// |              :usersettings.php (アカウント情報クリック時) ？              |
// +---------------------------------------------------------------------------+
// | 使用テンプレート({customfields} )                                         |
// |              :layout/テーマ/admin/user/edituser.thtml                     |
// |              :layout/テーマ/profile.thtml                                 |
// +---------------------------------------------------------------------------+
// | modified 20061016                                                         |
// +---------------------------------------------------------------------------+

function custom_userdisplay($uid)
{
    global $_CONF, $_TABLES;
    global $_DB_table_prefix;

    $var = "Value from custom table";
    //*
    $retval .= '<tr>';
    $retval .= '<td align="right"><b>Custom Fields:</b></td>';
    $retval .= '<td>' . $var .'</td>';
    $retval .= '</tr>';

    return $retval;
}


// +---------------------------------------------------------------------------+
// | ユーザー編集画面表示                                                      |
// +---------------------------------------------------------------------------+
// | 呼び出し元   :admin/user.php (管理者ユーザの編集クリック時) ○            |
// |              :usersettings.php (アカウント情報クリック時) ○              |
// +---------------------------------------------------------------------------+
// | 使用テンプレート({customfields} )                                         |
// |              :layout/テーマ/admin/user/edituser.thtml                     |
// |              :layout/テーマ/profile.thtml                                 |
// +---------------------------------------------------------------------------+
// | modified 20061016                                                         |
// +---------------------------------------------------------------------------+
function custom_useredit($uid)
{
    global $_CONF, $_TABLES;
    global $_DB_table_prefix;

    //*追加テーブルデータを読む
    $sql="SELECT * FROM ";
    $sql .= $_DB_table_prefix ."users_opt" ;
    $sql .= " WHERE uid = '$uid'";
    $result = DB_query($sql);
    $A = DB_fetchArray($result);
    $cookietimeout = DB_getitem($_TABLES['users'], 'cookietimeout' ,$uid);
    $selection = '<select name="cooktime">' . LB;
    $selection .= COM_optionList ($_TABLES['cookiecodes'], 'cc_value,cc_descr', $cookietimeout, 0);
    $selection .= '</select>';
    //*
    // $retval .= '<tr><td colspan="2"><hr></td></tr>';//水平ライン
    //*
    $retval .= '<tr>';
    $retval .= '<td align="right">Remember user for:</td>';
    $retval .= '<td>' . $selection .'</td>';
    $retval .= '</tr>';
    //*追加項目01
    $retval .= '<tr>';
    $retval .= '<td align="right"><b>追加項目１:</b></td>';
    $retval .= '<td><input type="text" name="fld01" size="50" value="';
    $retval .= $A['fld01']  .'"></td>';
    $retval .= ' </tr>';
    //*追加項目02
    $retval .= '<tr>';
    $retval .= '<td align="right"><b>追加項目２:</b></td>';
    $retval .= '<td><input type="text" name="fld02" size="50" value="';
    $retval .= $A['fld02']  .'"></td>';
    $retval .= ' </tr>';
    //*
    return $retval;
}

// +---------------------------------------------------------------------------+
// | ユーザ保存                                                                |
// +---------------------------------------------------------------------------+
// | 呼び出し元   :admin/user.php (管理者ユーザ新規登録、変更)                 |
// |              :usersettings.php (設定クリック時)                           |
// +---------------------------------------------------------------------------+
// | modified 20061016                                                         |
// +---------------------------------------------------------------------------+
function custom_usersave($uid)
{
    global $_CONF, $_TABLES;
    global $_DB_table_prefix;

    // 追加テーブルを使用している場合
    // 追加テーブルへのユーザデータ登録
    $fld01=addslashes($_POST['fld01']);
    $fld02=addslashes($_POST['fld02']);
    //
    $sql = "UPDATE ";
    $sql .= $_DB_table_prefix ."users_opt ";
    $sql .= " SET ";
    //*
    $sql .= " fld01='".$fld01."'";
    $sql .= " ,fld02='".$fld02."'";
    //*
    $sql .= " WHERE uid=$uid";
    DB_query ($sql);

    // 既存項目の更新を追加している場合
    // パッケージテーブルへの更新の追加
    $sql = "UPDATE ";
    $sql .= "{$_TABLES['users']} SET ";
    //*
    // $sql .= " email='{$_POST['email']}'";
    // $sql .= ",homepage='{$_POST['homepage']}'";
    // $sql .= ",fullname='{$_POST['fullname']}' ";
    $sql .= " cookietimeout='{$_POST["cooktime"]}'";
    //*
    $sql .= " WHERE uid=$uid";
    DB_query($sql);
    //DB_query("UPDATE {$_TABLES['users']} SET cookietimeout='{$_POST["cooktime"]}'");
}


// +---------------------------------------------------------------------------+
// | ユーザが新規登録する時のフォームの表示                                    |
// +---------------------------------------------------------------------------+
// | 呼び出し元   :admin/user.php (管理者ユーザ新規登録、変更)                 |
// |              :usersettings.php (設定クリック時)                           |
// |              :user.php (新規登録時)  ○　                                 |
// +---------------------------------------------------------------------------+
// | 使用テンプレート(各テーマ毎)                                              |
// | layout/テーマ/custom/memberdetail.thtml                                   |
// +---------------------------------------------------------------------------+
// | @param    string  $msg    an error message to display or the word 'new'   |
// | @return   string          HTML for the registration form                  |
// +---------------------------------------------------------------------------+
// | modified 20061016                                                         |
// +---------------------------------------------------------------------------+
function custom_userform ($msg = '')
{
    global $_CONF, $_TABLES, $LANG04;
    global $_DB_table_prefix;

    if (!empty ($msg) && ($msg != 'new')) {
        $retval .= COM_startBlock($LANG04[21]) . $msg . COM_endBlock();
    }

    $post_url = $_CONF['site_url']."/users.php";
    $postmode = "create";
    $submitbutton = '<input type="submit" value='.$LANG04[27].'>';
    $message = $LANG04[23];

    $user_templates = new Template ($_CONF['path_layout'] . 'custom');
    $user_templates->set_file('memberdetail', 'memberdetail.thtml');
    //
    $user_templates->set_var('layout_url', $_CONF['layout_url']);
    $user_templates->set_var('post_url', $post_url);
    $user_templates->set_var('startblock', COM_startBlock($LANG04[22]));
    $user_templates->set_var('message', $message);
    $user_templates->set_var('USERNAME', $LANG04[2]);
    $user_templates->set_var('USERNAME_HELP', "");
    $user_templates->set_var('username', '');
    $user_templates->set_var('EMAIL', $LANG04[5]);//"Email"
    $user_templates->set_var('EMAIL_HELP', $LANG04[24]);
    $user_templates->set_var('email', '');
    $user_templates->set_var('FULLNAME', $LANG04[3]);
    $user_templates->set_var('FULLNAME_HELP', "");
    $user_templates->set_var('fullname', '');
    $user_templates->set_var('user_id', $user);
    $user_templates->set_var('postmode', $postmode);
    $user_templates->set_var('submitbutton', $submitbutton);
    $user_templates->set_var('endblock', COM_endBlock());
    //
    $user_templates->parse('output', 'memberdetail');
    $retval .= $user_templates->finish($user_templates->get_var('output'));

    return $retval;
}

// +---------------------------------------------------------------------------+
// | ユーザ新規登録する時の入力チェック                                        |
// +---------------------------------------------------------------------------+
// | 呼び出し元      :users.php (ユーザ新規登録) ○                            |
// +---------------------------------------------------------------------------+
// | 標準のチェック（ユーザ名、EMAILの２重登録、EMAILの書式等）に              |
// | 加えてチェックする内容を記述してください。                                |
// | @param    string  $username   ユーザ名                                    |
// | @param    string  $email      EMAIL                                       |
// | @return   string              戻値 OK:empty NG:エラーメッセージ           |
// +---------------------------------------------------------------------------+
// | modified 20061016                                                         |
// +---------------------------------------------------------------------------+
function custom_usercheck ($username, $email)
{
    $msg = '';

    // 氏名の入力を必須にしたい場合は、下記３行を有効にしてください。
    //if (empty ($_POST['fullname'])) {
    //    $msg = '氏名を入力してください!';
    //}

    return $msg;
}

?>