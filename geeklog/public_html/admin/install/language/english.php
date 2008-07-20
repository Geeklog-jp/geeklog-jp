<?php

###############################################################################
# english.php
# This is the on-installation english language page for GeekLog!
#
# Copyright (C) 2000-2006 by the following authors:
#
# Authors: Jason Whittenburg - jwhitten AT securitygeeks DOT com
#          Tony Bibbs        - tony AT tonybibbs DOT com
#          Mark Limburg      - mlimburg AT users DOT sourceforge DOT net
#          Jason Whittenburg - jwhitten AT securitygeeks DOT com
#          Dirk Haun         - dirk AT haun-online DOT de|
#          Randy Kolenko     - randy AT nextide DOT ca
#          mystral-kk        - geeklog AT mystral-kk DOT net
#
###############################################################################
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
###############################################################################

// IMPORTANT: DO NOT REMOVE '%s' from the messages below!

$LANG_CHARSET = 'iso-8859-1';

$LANG_INST = array(
	'and'      => ' and ',
    'welcome_title' => 'Geeklog %s Installation', // %s=VERSION
	'php_required' => '<h1>PHP 4.1.0 required</h1>' . LB
	            . '<p>Sorry, but Geeklog requires at least PHP 4.1.0 to run. Please upgrade your PHP install or ask your hosting service to do it for you.</p>' . LB
				. '</body>' . LB . '</html>' . LB,
	'mysql_required' => '<h1>MySQL 3.23.2 required</h1>' . LB
	            . '<p>Sorry, but Geeklog requires at least MySQL 3.23.2 to run. Please upgrade your MySQL install or ask your hosting service to do it for you.</p>' . LB
				. '</body>' . LB . '</html>' . LB,
	'wc_msg1' => 'Geeklog Installation (Step 1 of 2)',
	'wc_msg2' => 'Welcome and thank you for choosing Geeklog.',
	'wc_msg3' => 'You are only 2 steps away from having Geeklog %s running on your system.', // %s=VERSION
	'wc_msg4' => 'If you haven\'t already done so, you should <strong>edit config.php prior to running this script</strong>.  This script will then apply the database structures for both fresh installations and upgrades.',
	'wc_msg5' => 'Upgrading',
	'wc_msg6' => 'Before we get started it is important that if you are upgrading an existing Geeklog installation you back up your database AND your file system.  <strong>This installation script will alter your Geeklog database.</strong> So if something goes wrong and you have to do the upgrade again, you will need a backup of your original database. <strong>YOU HAVE BEEN WARNED</strong>!',
	'wc_msg7' => 'Please make sure to select the correct Geeklog version you are coming from on the next screen. This script will do incremental upgrades after this version (i.e. you can upgrade directly from any old version to %s).', // %s=VERSION
	'wc_msg8' => 'Please note this script will <strong>not upgrade</strong> any beta or release candidate versions of Geeklog.',
	'wc_msg9' => 'Important Note',
	'wc_msg10' => '<p><strong>Note:</strong> "public_html" should never be part of your site\'s URL.  Please read the part about public_html in the <a href="../../docs/install.html#public_html">installation instructions</a> again and change your setup accordingly before you proceed.</p>',
	'wc_msg11' => '<p><strong>Note:</strong> You have %s in your <tt>php.ini</tt>.  While Geeklog itself will work just fine with that setting, some of the available plugins and add-ons may not.  You may want to set %s (and restart your webserver) if you plan to install any of those add-ons.</p>' . LB
	            . '<p>If you don\'t know where your <tt>php.ini</tt> file is located, please <a href="info.php">click here</a>.</p>', // %s = warn_message, %s = help_message
	'wc_msg12' => 'Installation Options',
	'wc_msg13' => 'Installation Type:',
	'wc_msg14' => 'Path to Geeklog\'s config.php:',
	'wc_msg15' => 'Hint:',
	'wc_msg16' => 'The complete path to this file is',
	'wc_msg17' => 'and it appears your Path to Geeklog is',
	'inst_option1' => 'New MySQL Database',
	'inst_option2' => 'New Microsoft SQL Server Database',
	'inst_option3' => 'Upgrade MySQL Database',
	'next' => 'Next >>',
	'back' => '<< Back',
	'error_title1' => 'Geeklog Installation - Error',
	'error_title2' => 'Geeklog Installation - Error',
	'error_not_path' => '<p><b>%s</b> is not a path.<br>Please enter the path to where config.php can be found on your webserver\'s file system.</p>', // %s = $_POST['geeklog_path']
	'error_wrong_path' => '<p>Geeklog could not find config.php in the path you just entered: <b>%s</b><br>' . LB
	              . 'Please check this path and try again. Remember that you should be using absolute paths, starting at the root of your file system.</p>' . LB, // %s = $_POST['geeklog_path']
	'error_table_exists' => '<p>The Geeklog tables already exist in your database. This can be because of one of the following reasons:</p>' . LB
	           . '<ol>' . LB
			   . '<li>You already ran the install script before.<br>Please note that you don\'t have to run the install script again if you ran into a problem with your paths or URLs on a previous attempt. If, however, you want to run the install script again now, then please delete the tables from your database first (or drop the database and create it again).</li>' . LB
			   . '<li>You really want to upgrade your database (for a new Geeklog version) but forgot to select "Upgrade Database" from the drop-down menu on the initial screen.</li>' . LB
			   . '</ol>' . LB,
	'dbsettings_title1' => 'Geeklog Installation: Database Setup',
	'dbsettings_title2' => 'Geeklog Database Settings (Step 2 of 2)',
	'dbsettings_text' => 'Now we are ready to add the necessary data structures to your Geeklog database.  If you are upgrading, please be sure to select the current version of your Geeklog database below.  If this is a new installation, just hit the \'Next\' button.  We hope that at this point you have already backed-up your existing database (if you have one).  If you haven\'t then <b>do so <i>before</i> clicking the \'Next\' button below</b>.  You\'ve been warned.',
	'version_dd1' => '<tr><td align="left"><b>Database already up to date!</b>' . LB
	           . '<p>It looks like your database is already up to date. You probably ran the upgrade before. If you need to run the upgrade again, please re-install your database backup first!</td></tr>',
	'version_dd2' => '<tr><td align="right"><b>Current Geeklog Version:</b></td><td><select name="version">',
	'inno_db_supported' => '<tr><td align="left">'
	            . '<p>Using InnoDB tables may improve performance on (very) large sites, but makes database backups more complicated. Leave the option unchecked unless you know what you\'re doing.</p>'
	            . '<input type="checkbox" name="innodb"> Use InnoDB tables'
				. '</td></tr>',
	'sc_title' => 'Installation complete',
	'sc_msg1' => 'Installation of Geeklog %s complete!', // %s=VERSION
	'sc_msg2' => 'Congratulations, you have successfully installed Geeklog.  Please take a minute to read the information displayed below.',
	'sc_msg3' => 'Then <a href="%s">click here</a> to go to your site\'s front page and <b>learn about the default login</b>.',
	'sc_msg4' => 'Check Permissions',
	'sc_msg5' => 'Geeklog requires certain files and directories to be writable.  To check if those are set up properly, please use <a href="check.php">this script</a>.',
	'sc_msg6' => 'Security Warning',
	'sc_msg7' => 'Once your site is up and running, don\'t forget to <strong>remove the install directory</strong>, <tt>{path_html}admin/install</tt>, and <strong>change the password</strong> of the default \'Admin\' account.',
	'sc_msg8' => '<p><strong>Note:</strong> Because the security model has been changed, we have created a new account with the rights you need to administer your new site.  The username for this new account is <b>NewAdmin</b> and the password is <b>password</b></p>',
);

?>
