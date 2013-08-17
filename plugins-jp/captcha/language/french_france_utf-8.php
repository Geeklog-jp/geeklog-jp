<?php
// +---------------------------------------------------------------------------+
// | CAPTCHA v3.3 Plugin                                                       |
// +---------------------------------------------------------------------------+
// | This is the French language page for the CAPTCHA Plugin                   |
// +---------------------------------------------------------------------------|
// | Copyright (C) 2009-2010 by the following authors:                         |
// |                                                                           |
// | ben           cordiste AT free DOT fr                                     |
// |                                                                           |
// | Based on the original CAPTCHA Plugin                                      |
// | Copyright (C) 2007 by the following authors:                              |
// |                                                                           |
// | Mark R. Evans - mark AT glfusion DOT org                                  | 
// +---------------------------------------------------------------------------|
// |                                                                           |
// | If you translate this file, please consider uploading a copy at           |
// |    http://geeklog.net so others can benefit from your            |
// |    translation.  Thank you!                                               |
// |                                                                           |
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software               |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA|
// |                                                                           |
// +---------------------------------------------------------------------------|

$LANG_CP00 = array (
    'menulabel'         => 'CAPTCHA',
    'plugin'            => 'CAPTCHA',
    'access_denied'     => 'Accès non authorisé',
    'access_denied_msg' => 'Vous n\'avez pas les priviléges de sécurité pour accéder à cette page.  Votre nom de membre et votre adresse IP ont été enregistrés.',
    'admin'             => 'CAPTCHA Administration',
    'install_header'    => 'CAPTCHA Plugin Installation/Désinstallation',
    'installed'         => 'CAPTCHA est installé',
    'uninstalled'       => 'CAPTCHA n\'est pas installé',
    'install_success'   => 'CAPTCHA Installation réussie.  <br /><br />Reportez vous à la documentation et visitez <a href="%s">la rubrique administration/a> pour vérifier que les paramêtres correspondent à l\'environnement de votre hébergement.',
    'install_failed'    => 'L\'installation à échouée -- Vérifier votre fichier error.log pour en trouver la cause.',
    'uninstall_msg'     => 'Le plugin est maintenant désinstallé',
    'install'           => 'Installer',
    'uninstall'         => 'Désinstaller',
    'warning'           => 'Attention! Le plugin est toujours activé',
    'enabled'           => 'Désactiver le plugin avant de le désinstaller.',
    'readme'            => 'CAPTCHA Installation du plugin',
    'installdoc'        => "<a href=\"{$_CONF['site_admin_url']}/plugins/captcha/install_doc.html\">Documentation d\'installation</a>",
    'overview'          => 'CAPTCHA est un plugin natif de Geeklog qui apporte une protection supplémentaire contre le spam réalisé par des robots. <br /><br />Un test CAPTCHA (acronyme de "Completely Automated Public Turing test to tell Computers and Humans Apart", trademarked by Carnegie Mellon University) est un test pratiqué pour déterminé si l\'utilisateur est un humain par la présentation d\'une image composée de lettre et chiffre difficiles à identifier pour un robot. Ce simple test CAPTCHA permet de réduire considérablement le nombre de spams par des robots sur votre site.',
    'details'           => 'Le plugin CAPTCHA utilise des images statiques (déjà générée) à moins que vous ne configuriez CAPTCHA pour construire des images dynamiques en utilisant la GD Graphic Library ou ImageMagick. Pour cela GD libraries ou ImageMagick doivent supporter les fonts True Type. Vérifier avec votre hébergeur si tel est le cas.',
    'preinstall_check'  => 'Les pré-requis de CAPTCHA :',
    'geeklog_check'     => 'Geeklog v1.4.1 ou plus récente, la version détectée est <b>%s</b>.',
    'php_check'         => 'PHP v4.3.0 ou supérieure, la version détectée est <b>%s</b>.',
    'preinstall_confirm' => "Pour tous les détails sur l'installation du plugin CAPTCHA, merci de vous référer au <a href=\"{$_CONF['site_admin_url']}/plugins/captcha/install_doc.html\">Manuel d'installation</a> (en anglais).",
    'captcha_help'		=> 'Saisissez le texte en gras (majuscules).',
    'bypass_error'		=> "Vous ne pouvez pas court-circuiter la procédure CAPTCHA de ce site. Pour devenir membre merci d'utiliser le lien Devenir membre.",
    'bypass_error_blank' => 'Vous n\'avez pas saisi de réponse à notre antispam, merci d\'essayer à nouveau. En cas de doute, vous pouvez changer l\'image en cliquant sur le lien "Nouvelle image".',
    'entry_error'		=> 'Votre saisie est erronée, merci d\'essayer à nouveau. <b>Respectez la case (minuscule/majuscule).</b>',
    'captcha_info'      => 'Le plugin CAPTCHA apporte une protection supplémentaire contre le spam réalisé par des robots pour votre site Geeklog.  Voir la <a href="%s">Documentation</a> pour plus d\'informations.',
    'enabled_header'    => 'CAPTCHA paramêtres',
    'view_logfile'      => 'Voir le Log de CAPTCHA',
    'log_viewer'        => 'Accéder au Log de Geeklog',
    'on'                => 'On',
    'off'               => 'Off',
    'anonymous_only'    => 'Uniquement les anonymes',
    'enable_comment'    => 'Activer Commentaire',
    'enable_story'      => 'Activer Article',
    'enable_registration' => 'Activer Enregistrement',
    'enable_contact'    => 'Activer Contact',
    'enable_emailstory' => 'Activer Email Article',
    'enable_forum'      => 'Activer Forum',
    'enable_mediagallery' => 'Activer Media Gallery (Postcards)',
    'enable_rating'     => 'Activer Rating Plugin Support',
    'enable_links'      => 'Activer Links Plugin Support',
    'enable_calendar'   => 'Activer Calendar Plugin Support',
    'captcha_alt'       => 'Vous devez saisir le text graphique - Contactez l\'administrateur du site si vous n\'arrivez pas à lire le graphique.',
    'save'              => 'Save',
    'cancel'            => 'Cancel',
    'success'           => 'Configuration Options successfully saved.',
    'gfx_driver'        => 'Graphics Driver',
    'gfx_format'        => 'Graphics Format',
    'convert_path'      => 'Full Path to ImageMagick\'s convert utility',
    'gd_libs'           => 'GD Libs',
    'imagemagick'       => 'ImageMagick',
    'static_images'     => 'Use Static Images',
    'image_set'			=> 'Static Image Set',
    'debug'             => 'Debug',
    'configuration'     => 'CAPTCHA Configuration',
    'integration'       => 'CAPTCHA Intégration',
    'reload'            => 'Nouvelle image',
    'reload_failed'     => 'Impossible d\'afficher une nouvelle image \nVeuillez relancer le formulaire et une nouvelle image sera affichée',
    'reload_too_many'   => 'Vous ne pouvez demander que 5 images',
    'session_expired'   => 'La session pour ce CAPTCHA a expirée, essayez à nouveau',
    'remoteusers'       => 'Force CAPTCHA for all Remote Users',
    'logging'           => 'Log invalid CAPTCHA attempts',
	'picture'           => 'Image',
    'characters'        => 'Caractères',
    'captcha'           => 'Code de sécurité',
	'question'          => 'Cette question permet de tester si vous êtes un visiteur humain et réduit le nombre de soumissions non désirées.',
	'what_code'         => 'Quel est le code ?',
    'view_log'          => 'Voir ou effacer les fichiers Log de Geeklog.',
    'file'              => 'Fichier :',
    'view_file'         => 'Voir le fichier Log',
    'clear_file'        => 'Effacer le fichier Log',
    'file_cleared'      => 'Fichier Log effacé',
	'upgrade_34'        => 'Mise à jour v3.4',
	'conf_link'         => 'Visitez la config pour modifier les paramètres du Captcha',
	'hide_message'      => 'Hide message',
);

$PLG_captcha_MESSAGE1 = 'CAPTCHA plugin upgrade : Mise à jour réussie.';
$PLG_captcha_MESSAGE2 = 'CAPTCHA plugin upgrade  : La mise à jour à échouée. Consultez le fichier error.log';
$PLG_captcha_MESSAGE3 = 'Le plugin CAPTCHA à été installé.';

// Localization of the Admin Configuration UI
$LANG_configsections['captcha'] = array(
    'label' => 'Captcha',
    'title' => 'Captcha Configuration'
);

$LANG_confignames['captcha'] = array(
    'anonymous_only' => 'Anonymous Only',
	'remoteusers' => 'Force CAPTCHA for all Remote Users',
	'debug' => 'Debug',
	'enable_comment' => 'Enable Comment',
	'enable_contact' => 'Enable Contact',
	'enable_emailstory' => 'Enable Email Story',
	'enable_forum' => 'Enable Forum',
	'enable_registration' => 'Enable Registration',
	'enable_mediagallery' => 'Enable Media Gallery (Postcards)',
	'enable_rating' => 'Enable Rating Plugin Support',
	'enable_story' => 'Enable Story',
	'enable_calendar' => 'Enable Calendar Plugin Support',
	'enable_links' => 'Enable Links Plugin Support',
	'gfxDriver' => 'Graphics Driver',
	'gfxFormat' => 'Graphics Format',
	'imageset' => 'Static Image Set',
	'logging' => 'Log invalid CAPTCHA attempts',
	'gfxPath' => 'Full Path to ImageMagick\'s convert utility'
);

$LANG_configsubgroups['captcha'] = array(
    'sg_main' => 'Main Settings'
);

$LANG_tab['captcha'] = array(
    'tab_main' => 'General Captcha Settings'
);
 
$LANG_fs['captcha'] = array(
    'fs_config' => 'CAPTCHA Configuration',
    'fs_integration' => 'CAPTCHA Integration'    
);

// Note: entries 0 is the same as in $LANG_configselects['Core']
$LANG_configselects['captcha'] = array(
    0 => array('True' => 1, 'False' => 0),
    2 => array('GD Libs' => '0', 'ImageMagick' => '1', 'Use Static Images' => '2'),
	3 => array('Default' => 'default', 'Simple' => 'simple'),
	4 => array('JPG' => 'jpg', 'PNG' => 'png')
);

?>