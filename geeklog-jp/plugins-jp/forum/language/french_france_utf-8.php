<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog forums Plugin 2.8 for Geeklog - The Ultimate Weblog               |
// +---------------------------------------------------------------------------+
// | French_france_utf-8.php                                                   |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2011 by the following authors:                              |
// |    Geeklog Community Members   geeklog-forum AT googlegroups DOT com      |
// |                                                                           |
// | Copyright (C) 2000,2001 by the following authors:                         |
// |    Tony Bibbs       tony AT tonybibbs DOT com                             |
// |                                                                           |
// | forum Plugin Authors                                                      |
// |    Mr.GxBlock                                        www.gxblock.com      |
// |    Matthew DeWyer   matt AT mycws DOT com            www.cweb.ws          |
// |    Blaine Lang      geeklog AT langfamily DOT ca     www.langfamily.ca    |
// |                                                                           |
// | Translation Author :                                                      |
// |    David Gaussinel  geeklog AT wipsa DOT net                              | 
// |    Ben              ben AT geeklog DOT fr                                 |
// +---------------------------------------------------------------------------+
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
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// +---------------------------------------------------------------------------+

global $LANG32;

$PLG_forum_MESSAGE1 = 'Mise à niveau du plugin forum : Mise à jour réussie.';
$PLG_forum_MESSAGE2 = 'Mise à niveau du plugin forum : Impossible de mettre à jour automatiquement cette version. Merci de vous référer à la documentation.';
$PLG_forum_MESSAGE5 = 'La mise à niveau du plugin forum a échouée - Consultez le fichier error.log';
$PLG_forum_MESSAGE3002 = $LANG32[9];

$LANG_GF00 = array (
    'pluginlabel'       => 'Forum',         // What shows up in the siteHeader
    'searchlabel'       => 'Forum',
    'statslabel'        => 'Total de contributions dans le forum',
    'statsheading1'     => 'Les 10 sujets les plus lus du forum',
    'statsheading2'     => 'Les 10 sujets du forum comportant le plus de réponses',
    'statsheading3'     => 'Aucun sujet',
    'useradminmenu'     => 'Préférences du forum',
    'access_denied'     => 'Accès réservé aux membres',
    'autotag_desc_forum' => '[forum: id titre alternatif] - Affiche un lien vers un sujet du forum en utilisant le texte "ici" comme titre. Un titre alternatif peut être spécifié.'
);


$LANG_GF01['FORUM']          = 'Forum';
$LANG_GF01['ALL']            = 'Tous'; 
$LANG_GF01['YES']            = 'Oui';
$LANG_GF01['NO']             = 'Non';
$LANG_GF01['NEW']            = 'Nouveau';
$LANG_GF01['NEXT']           = 'Suivant';
$LANG_GF01['ERROR']          = 'Erreur!';
$LANG_GF01['CONFIRM']        = 'Confirmer';
$LANG_GF01['UPDATE']         = 'Mise à jour';
$LANG_GF01['SAVE']           = 'Sauver';
$LANG_GF01['CANCEL']         = 'Annuler';
$LANG_GF01['ON']             = 'Le ';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>On: </b>';
$LANG_GF01['BY']             = 'Par : ';
$LANG_GF01['RE']             = 'Re : ';
$LANG_GF01['DATE']           = 'Date';
$LANG_GF01['VIEWS']          = 'Vu';
$LANG_GF01['REPLIES']        = 'Réponses';
$LANG_GF01['NAME']           = 'Nom :';
$LANG_GF01['DESCRIPTION']    = 'Description : ';
$LANG_GF01['TOPIC']          = 'Sujet';
$LANG_GF01['TOPICS']         = 'Sujets';
$LANG_GF01['TOPICSUBJECT']   = 'Contributions';
$LANG_GF01['HOMEPAGE']       = 'Accueil';
$LANG_GF01['SUBJECT']        = 'Sujet';
$LANG_GF01['HELLO']          = 'Bonjour ';
$LANG_GF01['MOVED']          = 'Déplacé';
$LANG_GF01['POSTS']          = 'Contributions';
$LANG_GF01['LASTPOST']       = 'Dernière';
$LANG_GF01['POSTEDON']       = 'Posté le';
$LANG_GF01['POSTEDBY']       = 'Posté par';
$LANG_GF01['PAGES']          = 'Pages';
$LANG_GF01['TODAY']          = 'Aujourd\'hui à ';
$LANG_GF01['REGISTERED']     = 'Enregistré';
$LANG_GF01['ORDERBY']        = 'Ordre:&nbsp;';
$LANG_GF01['ORDER']          = 'Ordre:';
$LANG_GF01['USER']           = 'Utilisateur';
$LANG_GF01['GROUP']          = 'Groupe';
$LANG_GF01['ANON']           = 'Anonyme: ';
$LANG_GF01['ADMIN']          = 'Admin';
$LANG_GF01['AUTHOR']         = 'Auteur';
$LANG_GF01['NOMOOD']         = 'Aucune humeur';
$LANG_GF01['REQUIRED']       = '[Requis]';
$LANG_GF01['OPTIONAL']       = '[Optionel]';
$LANG_GF01['SUBMIT']         = 'Poster';
$LANG_GF01['PREVIEW']        = 'Prévisualiser';
$LANG_GF01['REMOVE']         = 'Enlever';
$LANG_GF01['EDIT']           = 'Editer';
$LANG_GF01['DELETE']         = 'Effacer';
$LANG_GF01['OPTIONS']        = 'Options';
$LANG_GF01['MISSINGSUBJECT'] = 'Sujet vide';
$LANG_GF01['MIGRATE_NOW']    = 'Migrer maintenant'; 
$LANG_GF01['FILTERLIST']     = 'Filtrer la liste';
$LANG_GF01['SELECTFORUM']    = 'Choisir le forum';
$LANG_GF01['DELETEAFTER']    = 'Supprimer après';
$LANG_GF01['TITLE']          = 'Titre';
$LANG_GF01['COMMENTS']       = 'Commentaires'; 
$LANG_GF01['SUBMISSIONS']    = 'Soumissions';
$LANG_GF01['HTML_FILTER_MSG']  = 'HTML filtré permis';
$LANG_GF01['HTML_FULL_MSG']  = 'Tout HTML autorisé';
$LANG_GF01['HTML_MSG']       = 'HTML autorisé';
$LANG_GF01['CENSOR_PERM_MSG']  = 'Contrôle vocabulaire';
$LANG_GF01['ANON_PERM_MSG']    = 'Vous pouvez lire ce forum';
$LANG_GF01['POST_PERM_MSG1']    = 'Vous pouvez poster dans ce forum';
$LANG_GF01['POST_PERM_MSG2']    = 'Les anonymes peuvent dans ce forum';
$LANG_GF01['GO']             = 'Ok';
$LANG_GF01['STATUS']         = 'Status :';
$LANG_GF01['ONLINE']         = 'en ligne';
$LANG_GF01['OFFLINE']        = 'hors ligne';
$LANG_GF01['back2parent']    = 'Sujet Parent';
$LANG_GF01['forumname']      = '';   // Enter name here if you want it to show in the footer of the admin screens
$LANG_GF01['category']       = 'Catégorie: ';
$LANG_GF01['loginreqview']   = '<B>Merci de vous %s inscrire</A> ou vous %s identifier</A> pour utiliser ce forum.</B>';
$LANG_GF01['loginreqpost']   = '<B>Merci de vous inscrire ou vous identifier pour utiliser ce forum. Vous allez être redirigé.</B>';
$LANG_GF01['nolastpostmsg']  = 'N/A';
$LANG_GF01['no_one']         = 'Aucun.';
$LANG_GF01['back2top']       = 'Retour en haut';
$LANG_GF01['TEXTMODE']       = 'Mode Texte';
$LANG_GF01['HTMLMODE']       = 'Mode HTML';
$LANG_GF01['TopicPreview']   = 'Prévisualisation de la Réponse';
$LANG_GF01['moderator']      = 'Moderateur';
$LANG_GF01['admin']          = 'Admin';
$LANG_GF01['DATEADDED']      = 'Ajouté le';
$LANG_GF01['PREVTOPIC']      = 'Sujet Précédent';
$LANG_GF01['NEXTTOPIC']      = 'Sujet Suivant';
$LANG_GF01['RESYNC']         = "ReSynchroniser";
$LANG_GF01['RESYNCCAT']      = "ReSynchroniser les catégories";  
$LANG_GF01['EDITICON']       = '&nbsp;Editer&nbsp;';
$LANG_GF01['QUOTEICON']      = '&nbsp;Citer&nbsp;';
$LANG_GF01['ProfileLink']    = '&nbsp;Profile&nbsp;';
$LANG_GF01['WebsiteLink']    = '&nbsp;Site web&nbsp;';
$LANG_GF01['PMLink']         = '&nbsp;Envoyer un Message Privé&nbsp;';
$LANG_GF01['EmailLink']      = '&nbsp;Email&nbsp;';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Surveiller ce forum';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'Ne plus surveiller ce forum';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'Souscription : Activée';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'Souscription : Désactivée';
$LANG_GF01['NEWTOPIC']       = 'Nouveau Sujet';
$LANG_GF01['POSTREPLY']      = 'Répondre';
$LANG_GF01['SubscribeLink']  = 'Surveiller';
$LANG_GF01['unSubscribeLink'] = 'Ne plus souscrire à ce forum';
$LANG_GF01['SubscribeLink_TRUE']  = 'Souscription : Activée';
$LANG_GF01['SubscribeLink_FALSE'] = 'Souscription : Désactivée';
$LANG_GF01['SUBSCRIPTIONS']  = 'Souscriptions';
$LANG_GF01['TOP']            = 'En haut';
$LANG_GF01['PRINTABLE']      = 'Version imprimante';
$LANG_GF01['USERPREFS']      = 'Préférences utilisateur';
$LANG_GF01['SPEEDLIMIT']     = '"Votre dernier message a été posté il y a %s secondes.<br' . XHTML . '>Pour des raisons de sécurité, %s secondes sont nécessaires entre chacune de vos publication."';
$LANG_GF01['ACCESSERROR']    = 'ACCESS ERROR';
$LANG_GF01['ACTIONS']        = 'Actions';
$LANG_GF01['DELETEALL']      = 'Supprimer tous les enregistrements sélectionnés';
$LANG_GF01['DELCONFIRM']     = 'Etes-vous sûre de vouloir supprimer les enregistrements sélectionnés ?';
$LANG_GF01['DELALLCONFIRM']  = 'Etes-vous sûre de vouloir supprimer TOUS les enregistrements sélectionnés ?';
$LANG_GF01['STARTEDBY']      = 'Commencé par';
$LANG_GF01['WARNING']        = 'Attention';
$LANG_GF01['MODERATED']      = 'Modérateurs: %s';
$LANG_GF01['LASTREPLYBY']    = 'Dernière réponse par :&nbsp;%s';
$LANG_GF01['UID']            = 'UID';
$LANG_GF01['INDEXPAGE']      = 'Index du forum';
$LANG_GF01['FEATURE']        = 'Fonction';
$LANG_GF01['SETTING']        = 'Réglage';
$LANG_GF01['MARKALLREAD']    = 'Marquer tout comme lu';
$LANG_GF01['MSG_NO_CAT']     = 'Aucune catégorie ou forum définis';

// Language for bbcode toolbar
$LANG_GF01['CODE']           = 'Code';
$LANG_GF01['FONTCOLOR']      = 'Couleur de police';
$LANG_GF01['FONTSIZE']       = 'Taille de police';
$LANG_GF01['CLOSETAGS']      = 'Fermer les balises';
$LANG_GF01['CODETIP']        = 'Astuce: Les styles peuvent être rapidement appliqués en sélectionnant le texte';
$LANG_GF01['TINY']           = 'Très petit';
$LANG_GF01['SMALL']          = 'Petit';
$LANG_GF01['NORMAL']         = 'Normal';
$LANG_GF01['LARGE']          = 'Grand';
$LANG_GF01['HUGE']           = 'Très grand';
$LANG_GF01['DEFAULT']        = 'Défaut';
$LANG_GF01['DKRED']          = 'Rouge foncé';
$LANG_GF01['RED']            = 'Rouge';
$LANG_GF01['ORANGE']         = 'Orange';
$LANG_GF01['BROWN']          = 'Marron';
$LANG_GF01['YELLOW']         = 'Jaune';
$LANG_GF01['GREEN']          = 'Vert';
$LANG_GF01['OLIVE']          = 'Olive';
$LANG_GF01['CYAN']           = 'Cyan';
$LANG_GF01['BLUE']           = 'Bleu';
$LANG_GF01['DKBLUE']         = 'Bleu foncé';
$LANG_GF01['INDIGO']         = 'Indigo';
$LANG_GF01['VIOLET']         = 'Violet';
$LANG_GF01['WHITE']          = 'Blanc';
$LANG_GF01['BLACK']          = 'Noir';

$LANG_GF01['b_help']         = "Gras : [b]texte[/b]";
$LANG_GF01['i_help']         = "Italique : [i]texte[/i]";
$LANG_GF01['u_help']         = "Souligné : [u]texte[/u]";
$LANG_GF01['q_help']         = "Citation : [quote]texte[/quote]";
$LANG_GF01['c_help']         = "Code : [code]code[/code]";
$LANG_GF01['l_help']         = "Liste : [list]texte[/list]";
$LANG_GF01['o_help']         = "Liste ordonnée : [olist]texte[/olist]";
$LANG_GF01['p_help']         = "[img]http://image_url[/img]  ou [img w=100 h=200][/img]";
$LANG_GF01['w_help']         = "URL : [url]http://url[/url] ou [url=http://url]URL texte[/url]";
$LANG_GF01['a_help']         = "Fermer tous les tags ouverts";
$LANG_GF01['s_help']         = "Couleur : [color=red]text[/color]  Astuce: Vous pouvez aussi utiliser color=#FF0000";
$LANG_GF01['f_help']         = "Taille : [size=x-small]Petit texte[/size]";
$LANG_GF01['h_help']         = "Cliquez pour plus d'aide";


$LANG_GF02['msg01']    = 'Vous devez vous connecter à l\'espace membre pour consulter les forum.';
$LANG_GF02['msg02']    = 'Ce forum est en accès restreint.';
$LANG_GF02['msg03']    = 'Merci de patienter, vous allez être redirigé.';
$LANG_GF02['msg05']    = '<CENTER><em>Désolé, aucun sujet n\'a encore été posté.</em></CENTER>';
$LANG_GF02['msg07']    = 'Utilisateurs en ligne :';
$LANG_GF02['msg14']    = 'Désolé, Vous avez été banni du forum.<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'Si vous pensez que c\'est une erreur, contactez <A HREF="mailto:%s?subject=forum IP Ban">l\'administrateur</A>.';
$LANG_GF02['msg18']    = 'Erreur! Tous les champs requis n\'ont pas été remplis ou sont trop courts.';
$LANG_GF02['msg19']    = 'Votre message a été posté.';
$LANG_GF02['msg22']    = '- Notification de réponse au sujet';
$LANG_GF02['msg23a']   = "\nUne réponse a été faite au sujet '%s' par %s.\nCe sujet a été créé par : %s dans le forum de %s.\n";
$LANG_GF02['msg23b']   = "Un nouveau sujet '%s' a été posté par %s dans le forum %s sur %s.\nVous pouvez le voir sur la page : %s/forum/viewtopic.php?showtopic=%s\n";
$LANG_GF02['msg23c']   = "\nVous pouvez utiliser le lien suivant pour voir la réponse : %s/forum/viewtopic.php?showtopic=%s&lastpost=true\n";
$LANG_GF02['msg25']    = "\nMerci et bonne journée ! \n";
$LANG_GF02['msg26']    = "\nVous avez reçu ce mail parce que vous avez choisi d'être averti quand une réponse est faite à ce sujet. \n";
$LANG_GF02['msg27']    = 'Si vous ne souhaitez plus surveiller ce sujet, vous pouvez cliquer sur le lien suivant : <a href="%s">here</a>';
$LANG_GF02['msg33']    = 'Auteur : ';
$LANG_GF02['msg36']    = 'Humeur';
$LANG_GF02['msg38']    = ' M\'avertir des réponses ';
$LANG_GF02['msg40']    = '<br' . XHTML . '>Désolé, mais vous avez déjà abonné aux réponses de ce sujet.<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg44']    = '<p style="margin:0px; padding:5px;">Vous ne surveillez aucun sujet actuellement.</p>';
$LANG_GF02['msg49']    = '(Lu %s fois) ';
$LANG_GF02['msg55']    = 'Contribution effacée.';
$LANG_GF02['msg56']    = 'IP Bannie.';
$LANG_GF02['msg59']    = 'Sujet Normal';
$LANG_GF02['msg60']    = 'Nouvelle Contribution';
$LANG_GF02['msg61']    = ' Sujet important';
$LANG_GF02['msg62']    = 'M\'avertir en cas de réponse';
$LANG_GF02['msg64']    = 'Etes vous sûr de vouloir effacer le sujet %s : %s ?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>Ceci est un sujet parent, toutes les réponses postées seront aussi effacées.';
$LANG_GF02['msg68']    = 'Note: ATTENTION QUAND VOUS BANISSEZ, seuls les administrateurs ont le droit de dé-bannir quelqu\'un.';
$LANG_GF02['msg69']    = '<br' . XHTML . '>Voulez vous vraiment bannir l\'adresse IP : %s?';
$LANG_GF02['msg71']    = 'Aucune fonction sélectionnée, choisissez une contribution puis une fonction de modération.<br' . XHTML . '>Note: Vous devez être modérateur pour utiliser ces fonctions.';
$LANG_GF02['msg72']    = 'Attention,  vous n\'avez pas le droit d\'utiliser cette fonction de modération.';
$LANG_GF02['msg74']    = '%s Dernières Contributions Postées';
$LANG_GF02['msg75']    = 'Les %s sujets les plus affichés';
$LANG_GF02['msg76']    = 'Les %s sujets avec le plus de réponses';
$LANG_GF02['msg77']    = '<br' . XHTML . '><p style="padding-left:10px;">Vous ne devriez pas être ici !<br' . XHTML . '>Accès restreint à ce forum seulement.<p />';
$LANG_GF02['msg83']    = '<br' . XHTML . '><br' . XHTML . '>Vous avez besoin d\'être authentifié pour utiliser cette fonction du forum.<p />';
$LANG_GF02['msg84']    = 'Marquer tout comme lu';
$LANG_GF02['msg85']    = 'Page :';
$LANG_GF02['msg86']    = '10 dernières contributions par : ';
$LANG_GF02['msg87']    = '<br' . XHTML . '>Avertissement : Ce sujet a été verrouillé par un modérateur.<br' . XHTML . '>Aucune nouvelle contribution n\'est possible.';
$LANG_GF02['msg88']    = 'Liste des membres';
$LANG_GF02['msg88b']   = 'Voir seulement les membres actifs dans le forum';
$LANG_GF02['msg89']    = 'Les sujets que je surveille';
$LANG_GF02['msg101']   = 'Règles du forum :';
$LANG_GF02['msg103']   = 'Aller dans le forum :';
$LANG_GF02['msg106']   = 'Choisir un forum';
$LANG_GF02['msg108']   = 'Forum actif';
$LANG_GF02['msg109']   = ' Sujet Verrouillé';        
$LANG_GF02['msg110']   = 'Transfert à la page d\'édition...';
$LANG_GF02['msg111']   = 'Nouvelles contributions depuis votre dernière visite :';
$LANG_GF02['msg112']   = 'Lire nouveaux messages';
$LANG_GF02['msg113']   = 'Nouveaux messages';
$LANG_GF02['msg114']   = 'Sujet clos';
$LANG_GF02['msg115']   = 'Nouveau sujet important';
$LANG_GF02['msg116']   = 'Nouveau sujet clos';
$LANG_GF02['msg117']   = 'Chercher dans tous les forums';
$LANG_GF02['msg118']   = 'Chercher dans ce forum';
$LANG_GF02['msg119']   = 'Résultats de la recherche dans le forum pour la requête :';
$LANG_GF02['msg120']   = 'Sujets les plus populaires par ';
$LANG_GF02['msg121']   = 'Le fuseau horaire est %s. Il est maintenant %s.';
$LANG_GF02['msg122']   = 'Minimum Populaire :';
$LANG_GF02['msg123']   = 'Nombre de contributions d\'un sujet avant de l\'appeller populaire';
$LANG_GF02['msg126']   = 'Lignes de Recherche :';
$LANG_GF02['msg127']   = 'Nombre de lignes à afficher dans les résultats d\'une recherche';
$LANG_GF02['msg128']   = 'Membres par Page :';
$LANG_GF02['msg129']   = 'Nombre de membres à afficher dans la page listant les membres';
$LANG_GF02['msg130']   = 'Contributions Anonymes :';
$LANG_GF02['msg131']   = 'Configuré à Non va cacher les messages sans auteur';
$LANG_GF02['msg132']   = 'Surveillance :';
$LANG_GF02['msg133']   = 'Configuré à Oui va activer la surveillance automatique pour n\'importe quel sujet où vous écrivez';
$LANG_GF02['msg134']   = 'Surveillance ajoutée';
$LANG_GF02['msg135']   = 'Vous serez averti de toutes les contributions de ce forum.';
$LANG_GF02['msg136']   = 'Vous devez choisir un forum à surveiller.';
$LANG_GF02['msg137']   = 'Surveillance pour le sujet activé';
$LANG_GF02['msg138']   = '<b>forum complet surveillé</b>';
$LANG_GF02['msg142']   = 'Surveillance enregistrée.';
$LANG_GF02['msg144']   = 'Retourner au sujet';
$LANG_GF02['msg146']   = 'Surveillance effacé';
$LANG_GF02['msg147']   = 'Forum [version imprimable du sujet';
$LANG_GF02['msg148']   = '<br' . XHTML . '>Cliquez <a href="javascript:history.back()">ici</a> pour revenir à la page précédante.';
$LANG_GF02['msg155']   = 'Aucune contribution de l\'utilisateur.';
$LANG_GF02['msg156']   = 'Nombre total de contributions :';
$LANG_GF02['msg157']   = '10 dernières Contributions';
$LANG_GF02['msg158']   = 'les 10 dernières contributions de ';
$LANG_GF02['msg159']   = 'Etes vous sûr de vouloir EFFACER les modérateurs sélectionnés ?';
$LANG_GF02['msg160']   = 'Voir la dernière page du sujet';
$LANG_GF02['msg163']   = 'Contribution déplacée';
$LANG_GF02['msg164']   = 'Marquer toutes les catégories et sujets comme Lus';
$LANG_GF02['msg166']   = 'ERREUR: Sujet invalide ou sujet non trouvé';
$LANG_GF02['msg167']   = 'Surveillance';
$LANG_GF02['msg168']   = 'Configuré à Non pour ne plus recevoir d\'email de surveillance';
$LANG_GF02['msg169']   = 'Retour à la liste des membres';
$LANG_GF02['msg170']   = 'Dernières contributions';
$LANG_GF02['msg171']   = 'Message - Accès au forum';
$LANG_GF02['msg172']   = 'Sujet inexistant. Il peut avoir été effacé.';
$LANG_GF02['msg173']   = 'Transfert à la page de rédaction des contributions...';
$LANG_GF02['msg174']   = 'Impossible de bannir le membre - Adresse IP non valide ou vide.';
$LANG_GF02['msg175']   = 'Retourner à la liste des forums';
$LANG_GF02['msg176']   = 'Choisir un membre';
$LANG_GF02['msg177']   = 'Tous les membres';
$LANG_GF02['msg178']   = 'Uniquement les contributions parentes';
$LANG_GF02['msg179']   = 'Contenu généré en %s seconde(s)';
$LANG_GF02['msg180']   = 'Alerte de publication du forum';
$LANG_GF02['msg181']   = 'Vous n\'avez accès à aucun autre forum en tant que comme modérateur';
$LANG_GF02['msg182']   = 'Confirmation du modérateur';
$LANG_GF02['msg183']   = 'Un nouveau sujet a été créé à partir de cette contribution dans le forum : %s';
$LANG_GF02['msg184']   = 'Notifier une fois seulement';
$LANG_GF02['msg185']   = 'Les notifications seront expédiées une seule fois pour les forums et les sujets qui recoivent plusieurs contributions depuis votre dernière visite.';
$LANG_GF02['msg186']   = 'Nouveau titre';
$LANG_GF02['msg187']   = 'Retourner au sujet - Cliquez <a href="%s">ici</a>';
$LANG_GF02['msg188']   = 'Cliquer pour aller directement au dernier message';
$LANG_GF02['msg189']   = 'Désolé vous ne pouvez plus éditer ce message';
$LANG_GF02['msg190']   = 'Edition silencieuse';
$LANG_GF02['msg191']   = 'L\'édition n\'est plus possible. La durée pendant laquelle vous pouviez modifier votre message a expirée.';
$LANG_GF02['msg192']   = 'Terminé... %s sujet(s) et %s commentaire(s) ont été créés.';
$LANG_GF02['msg193']   = 'Utilitaire de migration d\'article vers le forum';
$LANG_GF02['msg194']   = 'Forum au repos';
$LANG_GF02['msg195']   = 'Cliquer pour aller au forum';
$LANG_GF02['msg196']   = 'Voir l\'index principal du forum';
$LANG_GF02['msg197']   = 'Marquer tous les sujets comme lus';
$LANG_GF02['msg198']   = 'Mettre à jour vos préférences pour le forum';
$LANG_GF02['msg199']   = 'Voir ou supprimer les notifications du forum';
$LANG_GF02['msg200']   = 'Voir la liste des membres';
$LANG_GF02['msg201']   = 'Voir les sujets les plus populaires';
$LANG_GF02['msg202']   =  'Pas de nouvelles contributions';
$LANG_GF02['msg300']   = 'Vos préférences ne permettent pas l\'affichage des contributions anonymes.';
$LANG_GF02['msg301']   = 'Marquer toutes les catégories comme lues ?';
$LANG_GF02['msg302']   = 'Marquer tous les sujets comme lus ?';
$LANG_GF02['PostReply']   = 'Poster une nouvelle réponse';
$LANG_GF02['PostTopic']   = 'Poster un nouveau sujet';
$LANG_GF02['EditTopic']   = 'Editer le sujet';
$LANG_GF02['quietforum']  = 'Le forum n{a pas de nouveau sujet.';

$LANG_GF03 = array (
    'delete'            => 'Effacer le message',
    'edit'              => 'Editer le message',
    'move'              => 'Déplacer le message',
    'split'             => 'Ceinder le sujet',
    'ban'               => 'Bannir l\'IP',
    'movetopic'         => 'Déplacer et créer un nouveau fil',
    'movetopicmsg'      => '<br' . XHTML . '>Sujet à déplacer : "<b>%s</b>"',
    'splittopicmsg'     => '<br' . XHTML . '>Créer un nouveau sujet avec ce message: "<b>%s</b>"<br' . XHTML . '><em>De :</em>&nbsp;%s&nbsp <em>Le :</em>&nbsp;%s',
    'selectforum'       => 'Choisir un nouveau forum :',
    'lockedpost'        => 'Ajouter une réponse',
    'splitheading'      => 'Option de scission du fil :',
    'splitopt1'         => 'Déplacer tous les messages à partir d\'ici',
    'splitopt2'         => 'Déplacer seulement ce message'
);

$LANG_GF04 = array (
    'label_forum'             => 'Profile pour le forum',
    'label_location'          => 'Localisation',
    'label_aim'               => 'Pseudo AIM',
    'label_yim'               => 'Pseudo Yahoo',
    'label_icq'               => 'Numéro ICQ',
    'label_msnm'              => 'Adresse MS Messenger',
    'label_interests'         => 'Loisirs',
    'label_occupation'        => 'Emploi',
);

/* Settings for Additional User profile - Instant Messenging links */
$LANG_GF05 = array (
    'aim_link'               => '&nbsp;<a href="aim:goim?screenname=',
    'aim_linkend'            => '>',
    'aim_hello'              => '&amp;message=Hi.+Are+you+there?',
    'aim_alttext'            => 'AIM:&nbsp;',
    'icq_link'               => '&nbsp;',
    'icq_alttext'            => 'ICQ #:&nbsp;',
    'msn_link'               => '&nbsp;<a href="javascript:MsgrApp.LaunchIMUI(',
    'msn_linkend'            => ')">',
    'msn_alttext'            => 'Messenger:&nbsp;',
    'yim_link'               => '&nbsp;<a href="ymsgr:sendIM?',
    'yim_linkend'            => '">',
    'yim_alttext'            => 'YIM:&nbsp;',
);


/* Admin Navbar */
$LANG_GF06 = array (
    1   => 'Statistiques',
    2   => 'Configuration',
    3   => 'Forums',
    4   => 'Modérateur',
    5   => 'Conversion',
    6   => 'Messages',
    7   => 'Gestion IP'
);


/* User Functions Navbar */
$LANG_GF07 = array (
    1   => 'Voir les forums',
    2   => 'Préférences',
    3   => 'Sujets les plus populaires',
    4   => 'Surveillance',
    5   => 'Membres'
);


/* forum User Features */
$LANG_GF08 = array (
    1   => 'Surveillance des sujets',
    2   => 'Surveillance des forums',
    3   => 'Exception des notifications de sujet'
);

/* Text for the buttons */
$LANG_GF09 = array (
    'edit'     => 'Edit',
    'email'    => 'Email',
    'home'     => 'Accueil',
    'lastpost' => 'Dernier message',
    'pm'       => 'PM', // private message
    'profile'  => 'Profil',
    'quote'    => 'Citer',
    'website'  => 'Website',
    'newtopic' => 'Nouveau',
    'replytopic' => 'Répondre'
);

$LANG_GF91 = array (
    'gfstats'            => 'Statistiques du forum',
    'statsmsg'           => 'Statistiques du forum :',
    'totalcats'          => 'Total Catégories :',
    'totalforums'        => 'Total forums :',
    'totaltopics'        => 'Total Sujets :',
    'totalposts'         => 'Total Contributions :',
    'totalviews'         => 'Total Affichages :',
    'avgpmsg'            => 'Moyenne des contributions par :',
    'category'           => 'Categorie :',
    'forum'              => 'Forum :',
    'topic'              => 'Sujet :',
    'avgvmsg'            => 'Moyenne des affichages par :'
);

$LANG_GF92 = array (
    'gfsettings'         => 'Configuration du forum',
    'showiframe'         => 'Revue du Sujet :',
    'showiframedscp'     => 'Afficher la revue du Sujet (dans une Iframe) quand vous répondez à un sujet',
    'topicspp'           => 'Sujets par Page :',
    'topicsppdscp'       => 'Nombre de sujets à afficher quand le forum est affiché',
    'postspp'            => 'Contributions par Page :',
    'postsppdscp'        => 'Nombre de contributions affichées par page',
    'setsavemsg'         => 'Préférences sauvées.',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => 'Administration du forum de Discussion',
    'addcat'             => 'Ajout d\'une Catégorie de forum',
    'addforum'           => 'Ajout d\'un forum',
    'catorder'           => 'Ordre de catégorie',
    'catadded'           => 'Catégorie ajoutée.',
    'catdeleted'         => 'Catégorie effacée.',
    'catedited'          => 'Catégorie editée.',
    'forumadded'         => 'Forum ajouté.',
    'forumaddError'      => 'Erreur d\'ajout de forum.',
    'forumdeleted'       => 'Forum effacé',
    'Forumedited'        => 'Forum edité',
    'Forumordered'       => 'Ordre du forum edité',
    'back'               => 'Retour',
    'addnote'            => 'Note : Vous pouvez éditer ces valeurs.',
    'editforumnote'      => 'Edition des caractéristiques du forum : <b>"%s"</b>',
    'deleteforumnote1'   => 'Voulez-vous effacer le forum <b>"%s"</b>&nbsp;?',
    'editcatnote'        => 'Edition des caractéristiques de la catégorie : <b>"%s"</b>',
    'deletecatnote1'     => 'Voulez-vous effacer la catégorie <b>"%s"</b>&nbsp;?',
    'deletecatnote2'     => 'Tous les forums et sujets postés sous ce forum vont être aussi effacés.',
    'undercat'           => 'Sous Catégorie',
    'deleteforumnote2'   => 'Tous les sujets postés en dessous vont être aussi effacés.',
    'groupaccess'        => 'Accès pour le Groupe : ',
    'action'             => 'Actions',
    'forumdescription'   => 'Description du forum',
    'posts'              => 'Contributions',
    'ordertitle'         => 'Ordre',
    'ModEdit'            => 'Editer',
    'ModMove'            => 'Déplacer',
    'ModStick'           => 'Post-it',
    'ModBan'             => 'Bannir',
    'addmoderator'       => "Ajouter un modérateur",
    'delmoderator'       => "Effacer la sélection",
    'moderatorwarning'   => '<b>Attention: Aucun forum n\'est défini</b><br' . XHTML . '><br' . XHTML . '>Configurez les catégories du forum et ajoutez au moins 1 forum<br' . XHTML . '>avant d\'essayer d\'ajouter des modérateurs',
    'private'            => 'Forum privé',
    'filtertitle'        => 'Selectionner les modérateurs enregistrés à afficher',
    'addmessage'         => 'Ajouter un  nouveau modérateur',
    'allowedfunctions'   => 'Fonctions permises',
    'userrecords'        => 'Utilisateurs',
    'grouprecords'       => 'Groupes',
    'filterview'         => 'Filtrer l\'affichage',
    'readonly'           => 'Forum en lecture seule',
    'readonlydscp'       => 'Uniquement les modérateurs peuvent contribuer dans ce forum',
    'hidden'             => 'Forum caché',
    'hiddendscp'         => 'Le forum n\'apparait pas à l\'index des forums',
    'hideposts'          => 'Cacher les nouvelles cobntributions',
    'hidepostsdscp'      => 'Les mises à jour ne seront pas montrées dans le bloc des nouvelles contributions ou dans le flux RSS',
    'mod_title'          => 'Modérateurs du forum',
    'allforums'          => 'Tous les forums'
);

$LANG_GF95 = array (
    'header1'           => 'Messages du forum',
    'header2'           => 'Messages du forum pour le forum&nbsp;&raquo;&nbsp;%s',
    'notyet'            => 'Fonction non encore implémentée.',
    'delall'            => 'Effacer Tout',
    'delallmsg'         => 'Etes vous sûr de vouloir effacer tous les messages de : %s?',
    'underforum'        => '<b>Sous forum: %s (ID #%s)',
    'moderate'          => 'Modérer',
    'nomess'            => 'Il n\'y a encore aucun message posté ! '
);

$LANG_GF96 = array (
    'ip'                 => 'IP',
    'enterip'            => 'Saisir ci-dessous l\'IP a bannir',
    'gfipman'            => 'Gestion IP',
    'ban'                => 'Bannir',
    'noips'              => '<p style="margin:0px; padding:5px;">Aucune adresse IP n\'a encore été bannie !</p>',
    'unban'              => 'Dé-Bannir',
    'ipbanned'           => 'Adresse IP bannies',
    'banip'              => 'Confirmation de Bannissement de l\'IP',
    'banipmsg'           => 'Etes-vous sûre de vouloir bannir l\'adresse ip %s?',
    'specip'             => 'Veuillez spécifier une adresse IP à bannir !',
    'ipunbanned'         => 'Adresse IP n\'est plus bannie.',
    'noip'               => 'Vous n\'avez pas fourni une adresse IP !'
);

// Localization of the Admin Configuration UI
$LANG_configsections['forum'] = array(
    'label' => 'Forum',
    'title' => 'Configuration du forum'
);

$LANG_confignames['forum'] = array(
    'registration_required' => 'Connexion nécessaire pour voir les contributions ?',
    'registered_to_post'    => 'Connexion nécessaire pour contribuer ?',
    'allow_notification'    => 'Permettre les notifications ?',
    'show_topicreview'      => 'Montrer les messages précédants lors de la rédaction d\'une réponse ?',
    'allow_user_dateformat' => 'Permettre à l\'utilisateur de définir le format de la date ?',
    'use_pm_plugin'         => 'Utiliser le plugin Private Message ?',
    'show_topics_perpage'   => 'Nombre de sujets par page',
    'show_posts_perpage'    => 'Nombre de contributions par page',
    'show_messages_perpage' => 'Nombre de lignes d\'un message par page',
    'show_searches_perpage' => 'Nombre de résultats de la recherche par page',
    'showblocks'            => 'Colonne des blocs à montrer dans le forum',
    'usermenu'              => 'Type du menu utilisateur',
    'use_themes_template'   => 'Use templates in the theme directory',
    // ----------------------------------
    'show_subject_length'   => 'Longueur maximale du sujet',
    'min_username_length'   => 'Longueur minimale du nom d\'utiliateur',
    'min_subject_length'    => 'Longueur minimale du sujet',
    'min_comment_length'    => 'Longueur minimale de la contribution',
    'views_tobe_popular'    => 'Nombre de vues pour être populaire',
    'post_speedlimit'       => 'Limitation entre chaque contribution en secondes',
    'allowed_editwindow'    => 'Permission de modification des contributions en secondes',
    'allow_html'            => 'Permettre le mode HTML ?',
    'post_htmlmode'         => 'Définir le mode HTML par défaut ?',
    'convert_break'         => 'Convertir les sauts à la ligne par une balise HTML &lt;BR&gt;?',
    'use_censor'            => 'Utiliser le mode censure du CMS Geeklog ?',
    'use_glfilter'          => 'Utiliser le mode filtre du CMS Geeklog ?',
    'use_geshi'             => 'Utiliser la colorisation synthaxique Geshi du Code ?',
    'use_spamx_filter'      => 'Utiliser le plugin Spam-X ?',
    'show_moods'            => 'Activer les humeurs (Moods) ?',
    'allow_smilies'         => 'Activer les Smilies?',
    'use_smilies_plugin'    => 'Utiliser le plugin Smilies ?',
    'avatar_width'          => 'Largeur de l\'avatar',
    // ----------------------------------
    'show_centerblock'      => 'Activer le bloc central (Centerblock) ?',
    'centerblock_homepage'  => 'Activer sur la page d\'accueil seulement ?',
    'centerblock_numposts'  => 'Nombre de contribution à afficher dans le bloc central',
    'cb_subject_size'       => 'Longueur maximale des sujets',
    'centerblock_where'     => 'Placement du bloc central sur la page',
    // ----------------------------------
    'sideblock_numposts'    => 'Nombre de contributions à afficher',
    'sb_subject_size'       => 'Longueur lmaximale des sujets',
    'sb_latestpostonly'     => 'Afficher uniquement les dernières contributions ?',
    // ----------------------------------
    'level1'                => 'Nombre de contribution niveau 1',
    'level2'                => 'Nombre de contribution niveau 2',
    'level3'                => 'Nombre de contribution niveau 3',
    'level4'                => 'Nombre de contribution niveau 4',
    'level5'                => 'Nombre de contribution niveau 5',
    'level1name'            => 'Nom du niveau 1',
    'level2name'            => 'Nom du niveau 2',
    'level3name'            => 'Nom du niveau 3',
    'level4name'            => 'Nom du niveau 4',
    'level5name'            => 'Nom du niveau 5'
);

$LANG_configsubgroups['forum'] = array(
    'sg_main' => 'Paramètres principaux'
);

$LANG_tab['forum'] = array(
    'tab_main'         => 'Paramètres généraux du forum',
    'tab_topicposting' => 'Publier une contribution',
    'tab_centerblock'  => 'Le bloc central',
    'tab_sideblock'    => 'Les barres latérales',
    'tab_rank'         => 'Les niveaux'
);

$LANG_fs['forum'] = array(
    'fs_main'         => 'Paramètres généraux du forum',
    'fs_topicposting' => 'Publier une contribution',
    'fs_centerblock'  => 'Le bloc central',
    'fs_sideblock'    => 'Les barres latérales',
    'fs_rank'         => 'Les niveaux'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['forum'] = array(
    0 => array('Oui' => 1, 'Non' => 0),
    1 => array('Oui' => TRUE, 'Non' => FALSE),
    5 => array('En haut de la page' => 1, 'Après l \'article en vedette' => 2, 'En bas de la page' => 3),
    6 => array('Blocs de gauche' => 'leftblocks', 'Blocs de droite' => 'rightblocks', 'Tous les blocs' => 'allblocks', 'Aucun bloc' => 'noblocks'),
    7 => array('Menu dans un bloc' => 'blockmenu', 'Barre de navigation' => 'navbar', 'Aucun' => 'none'),
    12 => array('Pas d\'accès' => 0, 'Lecture-Seule' => 2, 'Lecture-Ecriture' => 3),
);
?>
