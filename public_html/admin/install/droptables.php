<?php
// $Id$
// +---------------------------------------------------------------------------+
// | テーブルをDROPする                                                        |
// |  処理                                                                     |
// +---------------------------------------------------------------------------+
// modified 20070806 tsuchi AT geeklog DOT jp

define ('THIS_SCRIPT', 'droptables.php');

require_once ('../../lib-common.php');
require_once ('sql_droptables.php');


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

function fncSubmit($_SQL)
{
    //Drop実行
    for ($i = 1; $i <= count($_SQL); $i++) {
        DB_query(current($_SQL));
        next($_SQL);
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
    $display=fncSubmit($_SQL);
}else{
    $display ="cancel!";
}
echo $display;
?>
