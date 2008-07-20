<?php 

require_once ('../../lib-common.php');

// enable detailed error reporting
$_CONF['rootdebug'] = true;

$INST_lang = '';
if (isset($_GET['lang'])) {
	$INST_lang = $_GET['lang'];
} else {
	$INST_lang = 'english_utf-8';
}

require_once './language/' . $INST_lang . '.php';

$T = new Template ('./templates');
$T->set_file(array('success' => 'success.thtml'));
$T->set_var('header', COM_siteHeader ('menu', $LANG_INST['sc_title']));
$T->set_var('block_start', COM_startBlock ($LANG_INST['sc_title']));
$T->set_var('sc_msg1', sprintf($LANG_INST['sc_msg1'], VERSION));
$T->set_var('sc_msg2', $LANG_INST['sc_msg2']);
$T->set_var('sc_msg3', sprintf($LANG_INST['sc_msg3'], $_CONF['site_url']));
$T->set_var('sc_msg4', $LANG_INST['sc_msg4']);
$T->set_var('sc_msg5', $LANG_INST['sc_msg5']);
$T->set_var('sc_msg6', $LANG_INST['sc_msg6']);
$T->set_var('sc_msg7', sprintf($LANG_INST['sc_msg7'], $_CONF['path_html']));

// note for those upgrading from Geeklog 1.2.5-1 or older
if (DB_count ($_TABLES['users'], 'username', 'NewAdmin') > 0) {
	$T->set_var('sc_msg8', $LANG_INST['sc_msg8']);
}

$T->set_var('block_end', COM_endBlock ());
$T->set_var('footer', COM_siteFooter ());
$T->parse('output', 'success');
echo $T->finish($T->get_var('output'));

?>
