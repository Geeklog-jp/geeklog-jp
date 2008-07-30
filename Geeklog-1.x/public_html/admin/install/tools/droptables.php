<?php
// $Id: droptables.php 160 2008-06-19 00:46:16Z tacahi $
// +---------------------------------------------------------------------------+
// | テーブルをDROPする                                                        |
// |  処理                                                                     |
// +---------------------------------------------------------------------------+
// public_html/admin/install/tools/droptables.php
// 20080619 tsuchi AT geeklog DOT jp  フォルダ移動　sql_droptables.php 廃止

define ('THIS_SCRIPT', 'droptables.php');

require_once ('../../../lib-common.php');


function fncDisply()
{
    $retval = "";
    $retval .= "<!DOCTYPE    HTML PUBLIC '-//W3C//DTD HTML   4.01 Transitional//EN'>".LB;
    $retval .= "<html>".LB;
    $retval .= "<head>".LB;
    $retval .= "    <title>Geeklog Installation</title>".LB;
    $retval .= "</head>".LB;
    $retval .= "<body   bgcolor='#ffffff'>".LB;
    $retval .= "<h1>All Geeklogtable is deleted. </h1>".LB;
    $retval .= "<form action="."'".THIS_SCRIPT."'"."method='post'>".LB;
    $retval .= "    <input type='submit' name='action' value='submit'>".LB;
    $retval .= "    <input type='submit' name='action' value='cancel'>".LB;
    $retval .= "</form>".LB;
    $retval .= "</body>".LB;
    $retval .= "</html>".LB;

    return $retval ;

}

function fncSubmit($_TBL)
{


    //Drop実行
    for ($i = 1; $i <= count($_TBL); $i++) {
        
        $sql= "DROP TABLE IF EXISTS  ".current($_TBL);
        DB_query($sql);
        next($_TBL);
    }
    return "Submit!";
}

$action ="";
if (isset ($_REQUEST['action'])) {
    $action = COM_applyFilter($_REQUEST['action'],false);
}

$display="";
if  ($action ==""){
    $display=fncDisply();
}elseif ($action =="submit"){
    $display=fncSubmit($_TABLES);
}else{
    $display ="cancel!";
}
echo $display;
?>
