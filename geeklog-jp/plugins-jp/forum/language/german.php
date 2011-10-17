<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.8.0                                               |
// +---------------------------------------------------------------------------+
// | german.php                                                                |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 200? by the following authors:                              |
// |    Dirk Haun        dirk AT haun-online DOT de                            |
// |                                                                           |
// | Copyright (C) 2000,2001 by the following authors:                         |
// |    Tony Bibbs       tony AT tonybibbs DOT com                             |
// |                                                                           |
// | Forum Plugin Authors                                                      |
// |    Mr.GxBlock                                        www.gxblock.com      |
// |    Matthew DeWyer   matt AT mycws DOT com            www.cweb.ws          |
// |    Blaine Lang      geeklog AT langfamily DOT ca     www.langfamily.ca    |
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

$PLG_forum_MESSAGE1 = 'Forum Plugin Upgrade: Update completed successfully.';
$PLG_forum_MESSAGE2 = 'Forum Plugin upgrade: We are unable to update this version automatically. Refer to the plugin documentation.';
$PLG_forum_MESSAGE5 = 'Forum Plugin Upgrade failed - check error.log';
$PLG_forum_MESSAGE3002 = $LANG32[9];

$LANG_GF00 = array (
    'pluginlabel'       => 'Forum',
    'searchlabel'       => 'Forum',
    'statslabel'        => 'Gesamte Forenbeiträge',
    'statsheading1'         => 'Forum Top10 der aufgerufenen Themen',
    'statsheading2'         => 'Forum Top10 der beantworteten Themen',
    'statsheading3'         => 'Keine Themen zum Report',
    'useradminmenu'     => 'Forum-Einstellungen',
    'access_denied'     => 'Zugriff verweigert',
    'autotag_desc_forum' => '[forum: id alternate title] - Displays a link to a forum topic using the text \'here\' as the title. An alternate title may be specified but is not required.'
);


$LANG_GF01['FORUM']          = 'Forum';
$LANG_GF01['ALL']            = 'All'; 
$LANG_GF01['YES']            = 'Ja';
$LANG_GF01['NO']             = 'Nein';
$LANG_GF01['NEW']            = 'Neu';
$LANG_GF01['NEXT']           = 'weiter';
$LANG_GF01['ERROR']          = 'Fehler!';
$LANG_GF01['CONFIRM']        = 'Bestätigen';
$LANG_GF01['UPDATE']         = 'Update';
$LANG_GF01['SAVE']           = 'Sichern';
$LANG_GF01['CANCEL']         = 'Abbruch';
$LANG_GF01['ON']             = 'Am: ';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>Am: </b>';
$LANG_GF01['BY']             = 'Von: ';
$LANG_GF01['RE']             = 'Re: ';
$LANG_GF01['DATE']           = 'Datum';
$LANG_GF01['VIEWS']          = 'Gelesen';
$LANG_GF01['REPLIES']        = 'Antworten';
$LANG_GF01['NAME']           = 'Name:';
$LANG_GF01['DESCRIPTION']    = 'Beschreibung: ';
$LANG_GF01['TOPIC']          = 'Thema';
$LANG_GF01['TOPICS']         = 'Themen';
$LANG_GF01['TOPICSUBJECT']   = 'Betreff';
$LANG_GF01['HOMEPAGE']       = 'Home';
$LANG_GF01['SUBJECT']        = 'Betreff';
$LANG_GF01['HELLO']          = 'Hallo ';
$LANG_GF01['MOVED']          = 'Verschoben';
$LANG_GF01['POSTS']          = 'Beiträge';
$LANG_GF01['LASTPOST']       = 'Letzter Beitrag';
$LANG_GF01['POSTEDON']       = 'Geschrieben am';
$LANG_GF01['POSTEDBY']       = 'Geschrieben von';
$LANG_GF01['PAGES']          = 'Seiten';
$LANG_GF01['TODAY']          = 'Heute um ';
$LANG_GF01['REGISTERED']     = 'Mitglied seit';
$LANG_GF01['ORDERBY']        = 'Sortieren nach:&nbsp;';
$LANG_GF01['ORDER']          = 'Order:';
$LANG_GF01['USER']           = 'User';
$LANG_GF01['GROUP']          = 'Group';
$LANG_GF01['ANON']           = 'Gast: ';
$LANG_GF01['ADMIN']          = 'Admin';
$LANG_GF01['AUTHOR']         = 'Autor';
$LANG_GF01['NOMOOD']         = 'Keine Stimmung';
$LANG_GF01['REQUIRED']       = '[benötigt]';
$LANG_GF01['OPTIONAL']       = '[optional]';
$LANG_GF01['SUBMIT']         = 'Abschicken';
$LANG_GF01['PREVIEW']        = 'Vorschau';
$LANG_GF01['REMOVE']         = 'Löschen';
$LANG_GF01['EDIT']           = 'Ändern';
$LANG_GF01['DELETE']         = 'Löschen';
$LANG_GF01['OPTIONS']        = 'Optionen:';
$LANG_GF01['MISSINGSUBJECT'] = 'Leerer Betreff';
$LANG_GF01['MIGRATE_NOW']    = 'Migrate Now'; 
$LANG_GF01['FILTERLIST']     = 'Gefiltertes';
$LANG_GF01['SELECTFORUM']    = 'Select Forum';
$LANG_GF01['DELETEAFTER']    = 'Delete after';
$LANG_GF01['TITLE']          = 'Title';
$LANG_GF01['COMMENTS']       = 'Kommentare'; 
$LANG_GF01['SUBMISSIONS']    = 'Submissions';
$LANG_GF01['HTML_FILTER_MSG']  = 'Gefiltertes HTML erlaubt';
$LANG_GF01['HTML_FULL_MSG']  = 'Alle HTML-Tags erlaubt';
$LANG_GF01['HTML_MSG']       = 'HTML erlaubt';
$LANG_GF01['CENSOR_PERM_MSG']  = 'Beiträge "entschärfen"';
$LANG_GF01['ANON_PERM_MSG']    = 'Beiträge von Gästen';
$LANG_GF01['POST_PERM_MSG1']   = 'Schreiben erlaubt';
$LANG_GF01['POST_PERM_MSG2']   = 'Gäste können schreiben';
$LANG_GF01['GO']             = 'los';
$LANG_GF01['STATUS']         = 'Status:';
$LANG_GF01['ONLINE']         = 'online';
$LANG_GF01['OFFLINE']        = 'offline';
$LANG_GF01['back2parent']    = 'Parent Topic';
$LANG_GF01['forumname']      = '';   // Enter name here if you want it to show in the footer of the admin screens
$LANG_GF01['category']       = 'Kategory: ';
$LANG_GF01['loginreqview']   = '<b>Sorry you must %s register</a> or %s login </a> to use these forums</b>';
$LANG_GF01['loginreqpost']   = '<b>Sorry you must register or login to post on these forums</b>';
$LANG_GF01['nolastpostmsg']  = 'n/v';
$LANG_GF01['no_one']         = 'No one.';
$LANG_GF01['back2top']       = 'Back to top';
$LANG_GF01['TEXTMODE']       = 'Text-Modus';
$LANG_GF01['HTMLMODE']       = 'HTML-Modus';
$LANG_GF01['TopicPreview']   = 'Vorschau';
$LANG_GF01['moderator']      = 'Moderator';
$LANG_GF01['admin']          = 'Admin';
$LANG_GF01['DATEADDED']      = 'Hinzugefügt';
$LANG_GF01['PREVTOPIC']      = 'Vorheriges Thema';
$LANG_GF01['NEXTTOPIC']      = 'Nächstes Thema';
$LANG_GF01['RESYNC']         = "ReSync";
$LANG_GF01['RESYNCCAT']      = "ReSync Category Forums";  
$LANG_GF01['EDITICON']       = 'Ändern';
$LANG_GF01['QUOTEICON']      = 'Zitat';
$LANG_GF01['ProfileLink']    = 'Profil';
$LANG_GF01['WebsiteLink']    = 'Website';
$LANG_GF01['PMLink']         = 'PM';
$LANG_GF01['EmailLink']      = 'E-Mail';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Forum abonnieren';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'Forum-Abo beenden';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'Abonnieren:Aktiviert';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'Abonnieren:Behinderte';
$LANG_GF01['NEWTOPIC']       = 'Neues Thema';
$LANG_GF01['POSTREPLY']      = 'Antwort schreiben';
$LANG_GF01['SubscribeLink']  = 'Abonnieren';
$LANG_GF01['unSubscribeLink'] = 'Abo beenden';
$LANG_GF01['SubscribeLink_TRUE']  = 'Abonnieren:Aktiviert';
$LANG_GF01['SubscribeLink_FALSE'] = 'Abonnieren:Behinderte';
$LANG_GF01['SUBSCRIPTIONS']  = 'Abonnements';
$LANG_GF01['TOP']            = 'Top of Post';
$LANG_GF01['PRINTABLE']      = 'Druckfähige Version';
$LANG_GF01['USERPREFS']      = 'Forum-Einstellungen';
$LANG_GF01['SPEEDLIMIT']     = '"Your last comment was %s seconds ago.<br' . XHTML . '>This site requires at least %s seconds between forum posts."';
$LANG_GF01['ACCESSERROR']    = 'ACCESS ERROR';
$LANG_GF01['ACTIONS']        = 'Aktionen';
$LANG_GF01['DELETEALL']      = 'Alle ausgewählten Einträge löschen';
$LANG_GF01['DELCONFIRM']     = 'Bist Du sicher, dass Du die ausgewählten Einträge löschen willst?';
$LANG_GF01['DELALLCONFIRM']  = 'Bist Du sicher, dass Du ALLE ausgewählten Einträge löschen willst?';
$LANG_GF01['STARTEDBY']      = 'Begonnen von ';
$LANG_GF01['WARNING']        = 'Warnung';
$LANG_GF01['MODERATED']      = 'Moderatoren: %s';
$LANG_GF01['LASTREPLYBY']    = 'Letzter Beitrag von:&nbsp;%s';
$LANG_GF01['UID']            = 'UID';
$LANG_GF01['INDEXPAGE']      = 'Alle Foren';
$LANG_GF01['FEATURE']        = 'Feature';
$LANG_GF01['SETTING']        = 'Einstellung';
$LANG_GF01['MARKALLREAD']    = 'Als gelesen markieren';
$LANG_GF01['MSG_NO_CAT']     = 'No Categories or Forums Defined';

// Language for bbcode toolbar
$LANG_GF01['CODE']           = 'Code';
$LANG_GF01['FONTCOLOR']      = 'Schriftfarbe';
$LANG_GF01['FONTSIZE']       = 'Schriftgröße';
$LANG_GF01['CLOSETAGS']      = 'Tags schließen';
$LANG_GF01['CODETIP']        = 'Tip: Styles can be applied quickly to selected text';
$LANG_GF01['TINY']           = 'Winzig';
$LANG_GF01['SMALL']          = 'Klein';
$LANG_GF01['NORMAL']         = 'Normal';
$LANG_GF01['LARGE']          = 'Groß';
$LANG_GF01['HUGE']           = 'Riesig';
$LANG_GF01['DEFAULT']        = 'Standard';
$LANG_GF01['DKRED']          = 'Dunkelrot';
$LANG_GF01['RED']            = 'Rot';
$LANG_GF01['ORANGE']         = 'Orange';
$LANG_GF01['BROWN']          = 'Braun';
$LANG_GF01['YELLOW']         = 'Gelb';
$LANG_GF01['GREEN']          = 'Grün';
$LANG_GF01['OLIVE']          = 'Olive';
$LANG_GF01['CYAN']           = 'Cyan';
$LANG_GF01['BLUE']           = 'Blau';
$LANG_GF01['DKBLUE']         = 'Dunkelblau';
$LANG_GF01['INDIGO']         = 'Indigo';
$LANG_GF01['VIOLET']         = 'Lila';
$LANG_GF01['WHITE']          = 'Weiß';
$LANG_GF01['BLACK']          = 'Schwarz';

$LANG_GF01['b_help']         = "Fettschrift: [b]text[/b]";
$LANG_GF01['i_help']         = "Schräg gestellt: [i]text[/i]";
$LANG_GF01['u_help']         = "Unterstrichen: [u]text[/u]";
$LANG_GF01['q_help']         = "Zitat: [quote]text[/quote]";
$LANG_GF01['c_help']         = "Quelltext: [code]code[/code]";
$LANG_GF01['l_help']         = "Liste: [list]text[/list]";
$LANG_GF01['o_help']         = "Nummerierte Liste: [olist]text[/olist]";
$LANG_GF01['p_help']         = "[img]http://image_url[/img] oder [img w=100 h=200][/img]";
$LANG_GF01['w_help']         = "URL: [url]http://url[/url] or [url=http://url]URL text[/url]";
$LANG_GF01['a_help']         = "Alle offenen BBcode-Tags schließen";
$LANG_GF01['s_help']         = "Schriftfarbe: [color=red]text[/color]  Tipp: Du kannst auch color=#FF0000 benutzen";
$LANG_GF01['f_help']         = "Schriftgröße: [size=7]small text[/size]";
$LANG_GF01['h_help']         = 'Ausführliche Hilfe';


$LANG_GF02['msg01']    = 'Sorry you must register to use these forums';
$LANG_GF02['msg02']    = 'You should not be here!<br' . XHTML . '>Restricted access to this forum only';
$LANG_GF02['msg03']    = 'Please wait while you are redirected';
$LANG_GF02['msg05']    = '<center><em>Sorry, es wurden noch keine Themen erstellt.</center></em>';
$LANG_GF02['msg07']    = 'Wer ist online?';
$LANG_GF02['msg14']    = 'Sorry, Du wurdest vom Erstellen von Einträgen verbannt.<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'Wenn Du glaubst das sei falsch, kontaktiere den <a href="mailto:%s?subject=Gästebuch IP-Bann">Site Admin</a>.';
$LANG_GF02['msg18']    = 'Fehler! Es wurden nicht alle benötigten Felder ausgefüllt oder die Einträge waren zu kurz.';
$LANG_GF02['msg19']    = 'Dein Beitrag wurde veröffentlicht.';
$LANG_GF02['msg22']    = '- Neuer Beitrag im Forum';
$LANG_GF02['msg23a']   = "Zum Thema '%s' hat %s eine Antwort geschrieben.\n\nDas Thema wurde von %s im %s-Forum begonnen. ";
$LANG_GF02['msg23b']   = "Ein neues Thema, '%s', wurde von %s im %s-Forum auf der %s-Website begonnen. Du kannst den Beitrag hier lesen:\n%s/forum/viewtopic.php?showtopic=%s\n";
$LANG_GF02['msg23c']   = "Du kannst den Beitrag hier lesen:\n%s/forum/viewtopic.php?showtopic=%s&lastpost=true\n";
$LANG_GF02['msg25']    = "\nViel Spaß,\n";
$LANG_GF02['msg26']    = "\nDu bekommst diese E-Mail, da Du die Benachrichtigung für dieses Thema aktiviert hast. ";
$LANG_GF02['msg27']    = "Deine Benachrichtigungen kannst Du unter <%s> löschen.\n";
$LANG_GF02['msg33']    = 'Autor: ';
$LANG_GF02['msg36']    = 'Stimmung:';
$LANG_GF02['msg38']    = 'Bei Antworten benachrichtigen ';
$LANG_GF02['msg40']    = '<br' . XHTML . '>Sorry, aber Du hast schon eingestellt, dass Dir Antworten auf dieses Thema mitgeteilt werden.<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg44']    = '<p style="margin:0px; padding:5px;">Du hast keine Benachrichtigungen aktiviert.</p>';
$LANG_GF02['msg49']    = '(%s Mal gelesen) ';
$LANG_GF02['msg55']    = 'Beitrag gelöscht.';
$LANG_GF02['msg56']    = 'IP gebannet.';
$LANG_GF02['msg59']    = 'Normales Thema';
$LANG_GF02['msg60']    = 'Neuer Beitrag';
$LANG_GF02['msg61']    = 'Wichtiges Thema';
$LANG_GF02['msg62']    = 'Benachrichtigung bei neuen Beiträgen';
$LANG_GF02['msg64']    = 'Bist Du sicher, dass Du das Thema %s mit dem Title: %s löschen willst?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>Dies ist ein Grundsatzthema. Also werden alle Antworten, die hier gepostet werden, gelöscht.';
$LANG_GF02['msg68']    = 'Notiz: Beachte, WENN DU GEBANNT BIST können Dich nur Administratoren entbannen.';
$LANG_GF02['msg69']    = '<br' . XHTML . '>Bist Du wirklich sicher, dass Du die IP-Addresse %s bannen willst?';
$LANG_GF02['msg71']    = 'Keine Funktion gewählt. Wähle einen Eintrag und dann eine Moderatorfunktion.<br' . XHTML . '>Notiz: Du musst Moderator sein um diese Funktion zu ändern.';
$LANG_GF02['msg72']    = 'Sobald diese Nachricht online ist hast Du keine Rechte mehr die Funktion der Moderation durchzuführen.';
$LANG_GF02['msg74']    = 'Die %s letzten Forumsbeitr';
$LANG_GF02['msg75']    = 'Top %s Themen nach Aufrufe';
$LANG_GF02['msg76']    = 'Top %s Themen nach Beiträgen';
$LANG_GF02['msg77']    = '<br' . XHTML . '><p style="padding-left:10px;">You should not be here!<br' . XHTML . '>Restricted access to this forum only.</p>';
$LANG_GF02['msg83']    = '<br' . XHTML . '><br' . XHTML . '><p>You need to be signed in to use this forum feature.</p>';
$LANG_GF02['msg84']    = 'Alle Themen als gelesen markieren';
$LANG_GF02['msg85']    = 'Seite:';
$LANG_GF02['msg86']    = '&nbsp;Letzte %s Beiträge&nbsp;';
$LANG_GF02['msg87']    = '<br' . XHTML . '>Warning: This topic has been locked by the moderator.<br' . XHTML . '>No additional posts are permitted';
$LANG_GF02['msg88']    = 'Mitglieder';
$LANG_GF02['msg88b']   = 'Nur im Forum aktive Mitglieder';
$LANG_GF02['msg89']    = 'Meine Benachrichtigungen';
$LANG_GF02['msg101']   = 'Forumrichtlinien:';
$LANG_GF02['msg103']   = 'Zum Forum:';
$LANG_GF02['msg106']   = 'Forum wählen';
$LANG_GF02['msg108']   = 'Aktives Forum';
$LANG_GF02['msg109']   = 'Thema geschlossen';
$LANG_GF02['msg110']   = 'Transferring to message edit page..';
$LANG_GF02['msg111']   = 'Neue Beiträge seit Deinem letzten Besuch';
$LANG_GF02['msg112']   = 'Alle neuen Beiträge anzeigen';
$LANG_GF02['msg113']   = 'Neue Beiträge anzeigen';
$LANG_GF02['msg114']   = 'Thema geschlossen';
$LANG_GF02['msg115']   = 'Wichtiges Thema mit neuen Beiträgen';
$LANG_GF02['msg116']   = 'Geschlossenes Thema mit neuen Beiträgen';
$LANG_GF02['msg117']   = 'Suchen';
$LANG_GF02['msg118']   = 'Im Forum Suchen';
$LANG_GF02['msg119']   = 'Ergebnisse für die Suche nach:';
$LANG_GF02['msg120']   = 'Beliebteste Themen, sortiert nach';
$LANG_GF02['msg121']   = 'Zeitzone: %s. Es ist jetzt %s Uhr.';
$LANG_GF02['msg122']   = 'Beliebtheits-Limit';
$LANG_GF02['msg123']   = 'Anzahl Beiträge, ab denen ein Thema als beliebt gilt';
$LANG_GF02['msg126']   = 'Suchergebnisse';
$LANG_GF02['msg127']   = 'Anzahl Zeilen im Suchergebnis';
$LANG_GF02['msg128']   = 'Mitglieder pro Seite';
$LANG_GF02['msg129']   = 'Für die Mitglieder-Liste';
$LANG_GF02['msg130']   = 'Beiträge von Gästen';
$LANG_GF02['msg131']   = 'Beiträge von nicht-angemeldeten Usern zeigen?';
$LANG_GF02['msg132']   = 'Immer benachrichtigen';
$LANG_GF02['msg133']   = 'Automatische Benachrichtigung für alle Themen, die ich beginne oder kommentiere?';
$LANG_GF02['msg134']   = 'Abonnement zugefügt';
$LANG_GF02['msg135']   = 'Du wirst nun über alle Beiträge in diesem Forum benachrichtigt.';
$LANG_GF02['msg136']   = 'Du musst ein Forum wählen um es zu abonnieren.';
$LANG_GF02['msg137']   = 'Benachrichtigung für Thema aktiviert';
$LANG_GF02['msg138']   = '<b>Ganzes Forum abonniert</b>';
$LANG_GF02['msg142']   = 'Benachrichtigung gespeichert.';
$LANG_GF02['msg144']   = 'Zurück zum Thema';
$LANG_GF02['msg146']   = 'Löschung erfolgreich';
$LANG_GF02['msg147']   = 'Forum [druckbare Version des Themas';
$LANG_GF02['msg148']   = '<a href="javascript:history.back()">Zurück.</a>';
$LANG_GF02['msg155']   = 'Keine Forums-Beiträge.';
$LANG_GF02['msg156']   = 'Gesamtanzahl Forums-Beiträge';
$LANG_GF02['msg157']   = 'Die letzten 10 Forums-Beiträge';
$LANG_GF02['msg158']   = 'Die letzten 10 Forums-Beiträge von ';
$LANG_GF02['msg159']   = 'Are you sure you want to DELETE these selected Moderator records?';
$LANG_GF02['msg160']   = 'View last page of topic';
$LANG_GF02['msg163']   = 'Post moved';
$LANG_GF02['msg164']   = 'Mark all Categories and Topics Read';
$LANG_GF02['msg166']   = 'ERROR: Invalid topic or Topic not found';
$LANG_GF02['msg167']   = 'Notification Option';
$LANG_GF02['msg168']   = 'Setting of No will disable email notifictions';
$LANG_GF02['msg169']   = 'Return to Members listing';
$LANG_GF02['msg170']   = 'Aktuelle Themen im Forum';
$LANG_GF02['msg171']   = 'Forum Access Error';
$LANG_GF02['msg172']   = 'Topic does not exist. It possibly has been deleted';
$LANG_GF02['msg173']   = 'Transferring to Post Message page..';
$LANG_GF02['msg174']   = 'Unable to BAN Member - Invalid or Empty IP Address';
$LANG_GF02['msg175']   = 'Zurück zur Forum-Übersicht';
$LANG_GF02['msg176']   = 'Mitglied auswählen';
$LANG_GF02['msg177']   = 'Alle Mitglieder';
$LANG_GF02['msg178']   = 'Nur die Start-Postings';
$LANG_GF02['msg179']   = 'Erzeugt in %s Sekunden';
$LANG_GF02['msg180']   = 'Forum Posting Alert';
$LANG_GF02['msg181']   = 'You don\'t have access to any other forum as a moderator';
$LANG_GF02['msg182']   = 'Moderator Confirmation';
$LANG_GF02['msg183']   = 'New topic was created from this post in forum: %s';
$LANG_GF02['msg184']   = 'Nur einmal benachrichtigen';
$LANG_GF02['msg185']   = 'Soll für neue Beiträge seit meinem letzten Besuch nur eine Benachrichtigung geschickt werden?';
$LANG_GF02['msg186']   = 'New Topic Title';
$LANG_GF02['msg187']   = 'Return to topic - click <a href="%s">here</a>';
$LANG_GF02['msg188']   = 'Zum letzten Beitrag springen';
$LANG_GF02['msg189']   = 'Error: You can not edit this post anymore';
$LANG_GF02['msg190']   = 'Stille Änderung';
$LANG_GF02['msg191']   = 'Edit not permitted. Allowable edit timeframe expired or you need moderator rights';
$LANG_GF02['msg192']   = 'Completed ... Migrated %s topics and %s comments.';
$LANG_GF02['msg193']   = 'STORY&nbsp;&nbsp;TO&nbsp;&nbsp;FORUM&nbsp;&nbsp;MIGRATION&nbsp;&nbsp;UTILITY';
$LANG_GF02['msg194']   = 'Wenig aktives Forum';
$LANG_GF02['msg195']   = 'Zum Forum springen';
$LANG_GF02['msg196']   = 'Zur Forum-Übersicht';
$LANG_GF02['msg197']   = 'Alle Themen als gelesen markieren';
$LANG_GF02['msg198']   = 'Forum-Einstellungen anpassen';
$LANG_GF02['msg199']   = 'Benachrichtigungs-E-Mails an- und abstellen';
$LANG_GF02['msg200']   = 'Liste aller User dieser Website';
$LANG_GF02['msg201']   = 'Liste der beliebtesten Forum-Themen';
$LANG_GF02['msg202']   = 'Keine neuen Beiträge';
$LANG_GF02['msg300']   = 'Your preferences have block anonymous posts enabled';
$LANG_GF02['msg301']   = 'Realy mark all categories read?';
$LANG_GF02['msg302']   = 'Realy mark all topics read?';
$LANG_GF02['PostReply']   = 'Post New Reply';
$LANG_GF02['PostTopic']   = 'Post New Topic';
$LANG_GF02['EditTopic']   = 'Edit Topic';
$LANG_GF02['quietforum']  = 'Keine neuen Beiträge';

$LANG_GF03 = array (
    'delete'            => 'Beitrag löschen',
    'edit'              => 'Beitrag ändern',
    'move'              => 'Thema verschieben',
    'split'             => 'Thema aufteilen',
    'ban'               => 'IP sperren',
    'movetopic'         => 'Thema verschieben',
    'movetopicmsg'      => '<br' . XHTML . '>Topic to be moved: "<b>%s</b>"',
    'splittopicmsg'     => '<br' . XHTML . '>Create a new Topic with this post: "<b>%s</b>"<br' . XHTML . '><em>By:</em>&nbsp;%s&nbsp <em>On:</em>&nbsp;%s',
    'selectforum'       => 'Select new forum:',
    'lockedpost'        => 'Add Reply Post',
    'splitheading'      => 'Split thread option:',
    'splitopt1'         => 'Move all posts from this point',
    'splitopt2'         => 'Move only this one post'
);

$LANG_GF04 = array (
    'label_forum'             => 'Forenprofil',
    'label_location'          => 'Standort',
    'label_aim'               => 'AIM Handhabe',
    'label_yim'               => 'YIM Handhabe',
    'label_icq'               => 'ICQ Identität',
    'label_msnm'              => 'MS Messengername',
    'label_interests'         => 'Interessen',
    'label_occupation'        => 'Beschäftigung',
);

/* Settings for Additional User profile - Instant Messenging links */
$LANG_GF05 = array ( // No used
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
    1   => 'Statistik',
    2   => 'Einstellungen',
    3   => 'Foren',
    4   => 'Moderatoren',
    5   => 'Konvertieren',
    6   => 'Beiträge',
    7   => 'IP-Verw.'
);


/* User Functions Navbar */
$LANG_GF07 = array (
    1   => 'View Forums',
    2   => 'Einstellungen',
    3   => 'Beliebte Themen',
    4   => 'Abonnements',
    5   => 'Mitglieder'
);


/* Forum User Features */
$LANG_GF08 = array (
    1   => 'Benachrichtigungen für Themen',
    2   => 'Benachrichtigungen für ganze Foren',
    3   => 'Ausnahmen'
);

/* Text for the buttons */
$LANG_GF09 = array (
    'edit'     => 'Edit',
    'email'    => 'Email',
    'home'     => 'Home',
    'lastpost' => 'Last Post',
    'pm'       => 'PM', // private message
    'profile'  => 'Profile',
    'quote'    => 'Quote',
    'website'  => 'Website',
    'newtopic' => 'New Topic',
    'replytopic' => 'Post Reply'
);

$LANG_GF91 = array (
    'gfstats'        => 'Forumsstatistik',
    'statsmsg'        => 'Hier ist die aktuelle Statistik für Dein Forum:',
    'totalcats'        => 'Kategorien insgesamt:',
    'totalforums'    => 'Foren gesamt:',
    'totaltopics'    => 'Themen gesamt:',
    'totalposts'    => 'Beiträge gesamt:',
    'totalviews'    => 'Aufrufe gesamt:',
    'avgpmsg'        => 'Durchschnittliche Beiträge pro:',
    'category'        => 'Kategorie:',
    'forum'            => 'Forum:',
    'topic'            => 'Thema:',
    'avgvmsg'        => 'Durchschnittliche Aufrufe pro:'
);

$LANG_GF92 = array (
       'gfsettings'     => 'Forum-Einstellungen',
    'showiframe'     => 'Themenübersicht',
    'showiframedscp' => 'Beim Beantworten die bisherige Diskussion in einem IFRAME einblenden',
    'topicspp'         => 'Themen pro Seite:',
    'topicsppdscp'   => 'Anzahl der Themen die im Forumindex angezeigt werden',
    'postspp'         => 'Beiträge pro Seite:',
    'postsppdscp'     => 'Anzahl der Beiträge, die pro Seite angezeigt werden',
    'setsavemsg'     => 'Einstellungen gespeichert.',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => 'Discussion Forum Board Admin',
    'addcat'        => 'Füge eine Kategorie hinzu',
    'addforum'        => 'Füge ein Forum hinzu',
    'catorder'        => 'Kategorienreihenfolge',
    'catadded'        => 'Kategorie zugefügt.',
    'catdeleted'    => 'Kategorie gelöscht',
    'catedited'     => 'Kategorie bearbeitet.',
    'forumadded'    => 'Forum zugefügt.',
    'forumaddError' => 'Error Adding Forum.',
    'forumdeleted'    => 'Forum gelöscht',
    'forumedited'    => 'Forum bearbeitet',
    'forumordered'    => 'Forenreihenfolge bearbeitet',
    'back'            => 'Zurück',
    'addnote'        => 'Notiz: Du kannst dies später erneut ändern.',
    'editforumnote'         => '<br' . XHTML . '>Bearbeite Forumdetails für: <b>"%s"</b>',
    'deleteforumnote1'      => 'Möchtest Du das Forum <b>"%s"</b>&nbsp;löschen?',
    'editcatnote'         => '<br' . XHTML . '>Bearbeite Kategoriedetails für: <b>"%s"</b>',
    'deletecatnote1'      => 'Möchtest Du die Kategorie <b>"%s"</b>&nbsp;löschen?',
    'deletecatnote2'     => 'Alle Foren und gepostete Themen dieser Kategorie werden ebenfalls gelöscht.',
    'undercat'             => 'Unterkategorie',
    'deleteforumnote2'     => 'Alle geposteten Themen unter diesem werden mitgelöscht.',
    'groupaccess'        => 'Gruppenzugriff: ',
    'action'             => 'Aktionen',
    'forumdescription'   => 'Forum Description',
    'posts'              => 'Posts',
    'ordertitle'         => 'Order',
    'ModEdit'            => 'Edit',
    'ModMove'            => 'Move',
    'ModStick'           => 'Stick',
    'ModBan'             => 'Ban',
    'addmoderator'       => "Add Record",
    'delmoderator'       => " Delete\nSelected",
    'moderatorwarning'   => '<b>Warning: No Forums Defined</b><br' . XHTML . '><br' . XHTML . '>Setup Forum Categories and Add at least 1 forum<br' . XHTML . '>before attempting to add Modertators',
    'private'            => 'Private Forum',
    'filtertitle'        => 'Select Moderator records to view',
    'addmessage'         => 'Add new Moderator',
    'allowedfunctions'   => 'Allowed Functions',
    'userrecords'        => 'User Records',
    'grouprecords'       => 'Group Records',
    'filterview'         => 'Filter View',
    'readonly'           => 'Readonly Forum',
    'readonlydscp'       => 'Only the Moderator can post to this forum',
    'hidden'             => 'Hidden Forum',
    'hiddendscp'         => 'Forum does not show in the forum index',
    'hideposts'          => 'Hide New posts',
    'hidepostsdscp'      => 'Updates will not show in the New Posts Blocks or RSS Feeds',
    'mod_title'             => 'Forummoderatoren',
    'allforums'          => 'All Forums'
);

$LANG_GF95 = array (
    'header1'           => 'Discussion Board Messages',
    'header2'           => 'Discussion Board Messages for forum&nbsp;&raquo;&nbsp;%s',
    'notyet'        => 'Eigenschaft ist noch nicht implementiert worden',
    'delall'        => 'Alles löschen',
    'delallmsg'        => 'Bist Du sicher, dass Du alle Nachrichten von: %s löschen willst?',
    'underforum'        => '<b>Unterforum: %s (ID #%s)',
    'moderate'        => 'Moderiert',
    'nomess'        => 'Es wurden noch keine Nachrichten gepostet!'
);

$LANG_GF96 = array (
    'ip'                 => 'IP',
    'enterip'            => 'Enter below an IP address to ban',
    'gfipman'             => 'IP-Verwaltung',
    'ban'                  => 'Bann',
    'noips'              => '<p style="margin:0px; padding:5px;">Es wurden noch keine IPs gebannt!</p>',
    'unban'              => 'Entbannen',
    'ipbanned'             => 'IP-Addresse gebannt',
    'banip'                 => 'Bann-IP Bestätigung',
    'banipmsg'             => 'Bist Du sicher, dass Du die IP %s bannen willst?',
    'specip'             => 'Bitte spezifiziere eine IP-Addresse zum bannen!',
    'ipunbanned'         => 'IP-Address entbannt.',
    'noip'               => 'You did not provide an IP address!'
);

// Localization of the Admin Configuration UI
$LANG_configsections['forum'] = array(
    'label' => 'Forum',
    'title' => 'Forum Configuration'
);

$LANG_confignames['forum'] = array(
    'registration_required' => 'Login Required to View Posts?',
    'registered_to_post'    => 'Login Required to Post?',
    'allow_notification'    => 'Allow Notification?',
    'show_topicreview'      => 'Show Topic Review when Replying?',
    'allow_user_dateformat' => 'Allow User defined Date Format?',
    'use_pm_plugin'         => 'Use Private Message Plugin?',
    'show_topics_perpage'   => 'Number of Topics to Show per Page',
    'show_posts_perpage'    => 'Number of Posts to Show per Page',
    'show_messages_perpage' => 'Number of Message Lines per Page',
    'show_searches_perpage' => 'Number of Search Results per Page',
    'showblocks'            => 'Block Columns to Show with Forum',
    'usermenu'              => 'Type of User Menu',
    'use_themes_template'   => 'Use templates in the theme directory',
    // ----------------------------------
    'show_subject_length'   => 'Max Length of Subject',
    'min_username_length'   => 'Min Length of Username',
    'min_subject_length'    => 'Min Length of Subject',
    'min_comment_length'    => 'Min Length of Post Content',
    'views_tobe_popular'    => 'Number of Views to have Popular',
    'post_speedlimit'       => 'Posting Speedlimit(sec)',
    'allowed_editwindow'    => 'Timeframe(sec) to Allow Edit Posts',
    'allow_html'            => 'Allow HTML Mode?',
    'post_htmlmode'         => 'Set HTML Mode as Default?',
    'convert_break'         => 'Convert Newlines to HTML &lt;BR&gt;?',
    'use_censor'            => 'Use Geeklog Censoring?',
    'use_glfilter'          => 'Use Geeklog Filtering?',
    'use_geshi'             => 'Use Geshi Code Formatting?',
    'use_spamx_filter'      => 'Use Spam-X Plugin?',
    'show_moods'            => 'Enable Moods?',
    'allow_smilies'         => 'Enable Smilies?',
    'use_smilies_plugin'    => 'Use Smilies Plugin?',
    'avatar_width'          => 'Width of Member Avatar',
    // ----------------------------------
    'show_centerblock'      => 'Enable Centerblock?',
    'centerblock_homepage'  => 'Enable Homepage Only?',
    'centerblock_numposts'  => 'Number of Posts to Show',
    'cb_subject_size'       => 'Max Length of Subject',
    'centerblock_where'     => 'Placement on Page',
    // ----------------------------------
    'sideblock_numposts'    => 'Number of Posts to Show',
    'sb_subject_size'       => 'Max Length of Subject',
    'sb_latestpostonly'     => 'Show Latest Post Only?',
    // ----------------------------------
    'level1'                => 'Number of Posts of Level1',
    'level2'                => 'Number of Posts of Level2',
    'level3'                => 'Number of Posts of Level3',
    'level4'                => 'Number of Posts of Level4',
    'level5'                => 'Number of Posts of Level5',
    'level1name'            => 'Name of Level1',
    'level2name'            => 'Name of Level2',
    'level3name'            => 'Name of Level3',
    'level4name'            => 'Name of Level4',
    'level5name'            => 'Name of Level5'
);

$LANG_configsubgroups['forum'] = array(
    'sg_main' => 'Main Settings'
);

$LANG_tab['forum'] = array(
    'tab_main'         => 'General Forum Settings',
    'tab_topicposting' => 'Topic Posting',
    'tab_centerblock'  => 'Centerblock',
    'tab_sideblock'    => 'Sideblock',
    'tab_rank'         => 'Rank'
);

$LANG_fs['forum'] = array(
    'fs_main'         => 'General Forum Settings',
    'fs_topicposting' => 'Topic Posting',
    'fs_centerblock'  => 'Centerblock',
    'fs_sideblock'    => 'Sideblock',
    'fs_rank'         => 'Rank'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['forum'] = array(
    0 => array('Ja' => 1, 'Nein' => 0),
    1 => array('Ja' => true, 'Nein' => false),
    5 => array('Top Of Page' => 1, 'After Featured Story' => 2, 'Bottom Of Page' => 3),
    6 => array('Left Blocks' => 'leftblocks', 'Right Blocks' => 'rightblocks', 'All Blocks' => 'allblocks', 'No Blocks' => 'noblocks'),
    7 => array('Block Menu' => 'blockmenu', 'Navigation Bar' => 'navbar', 'None' => 'none'),
    12 => array('Kein Zugang' => 0, 'Nur lesen' => 2, 'Lesen-schreiben' => 3),
);
?>
