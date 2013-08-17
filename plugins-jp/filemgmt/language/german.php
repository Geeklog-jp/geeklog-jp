<?php

###############################################################################
# german.php
# This is the German language file for the Geeklog File Management plugin
#
# Copyright (C) 2002 Blaine Lang
# blaine@portalparts.com
#
# German translation by krahni, updated by Dirk Haun
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


// Language variables used by the Plug-in API

$LANG_FM00 = array (
    'access_denied'     => 'Zugriff verweigert',
    'access_denied_msg' => 'Nur Root-Benutzer haben Zugriff auf diese Seite.  Dein Username und Deine IP wurden festgehalten.',
    'admin'             => 'Plugin Administration',
    'install_header'    => 'Installiere/Deinstalliere Plugin',
    'installed'         => 'Das Plugin und der Block sind nun installiert,<p><i>Viel Vergn&uuml;gen,<br><a href="MAILTO:blaine@portalparts.com">Blaine</a></i>',
    'uninstalled'       => 'Das Plugin ist nicht installiert',
    'install_success'   => 'Installation erfolgreich<p><b>N&auml;chste Schritte</b>: 
        <ol><li>Vervollst&auml;ndige die Konfiguration auf der File Management Admin Seite</ol>
        <p>Bitte die <a href="%s">Installations-Anleitung</a> f&uuml;r weitere Informationen lesen.',
    'install_failed'    => 'Installation fehlgeschlagen -- Schaue in das error.log f&uuml;r Details.',
    'uninstall_msg'     => 'Plugin erfolgreich deinstalliert',
    'install'           => 'Installieren',
    'uninstall'         => 'Deinstallieren',
    'editor'            => 'Plugin Editor',
    'warning'           => 'Deinstallations Warnung',
    'enabled'           => '<p style="padding: 15px 0px 5px 25px;">Das Plugin ist installiert und aktiviert.<br>Bitte deaktiviere es erst vor dem Deinstallieren.</p><div style="padding:5px 0px 5px 25px;"><a href="'.$_CONF['site_admin_url'].'/plugins.php">Plugin Editor</a></div',
    'WhatsNewLabel'    => 'DOWNLOADS',
    'WhatsNewPeriod'   => ' letzte %s Tage'
);

// Admin Navbar
$LANG_FM02 = array(
    'nav1'  => 'Einstellungen',
    'nav2'  => 'Kategorien',
    'nav3'  => 'Datei hinzuf&uuml;gen',
    'nav4'  => 'Downloads (%s)',
    'nav5'  => 'Defekte Dateien (%s)'
);

$LANG_FILEMGMT = array(
    'newpage' => "Neue Seite",
    'adminhome' => "Admin Home",
    'plugin_name' => "Dateiverwaltung",
    'searchlabel' => "Downloads",
    'searchlabel_results' => "Downloads",
    'downloads' => "Downloads",
    'report' => "Top Downloads",
    'usermenu1' => "Downloads",
    'usermenu2' => "&nbsp;&nbsp;Top Bewertungen",
    'usermenu3' => "Datei hochladen",
    'admin_menu' => "Dateiverwaltung",
    'writtenby' => "Geschrieben von",
    'date' => "Letztes Update",
    'title' => "Titel",
    'content' => "Inhalt",
    'hits' => "Treffer",
    'Filelisting' => "Dateiliste",
    'DownloadReport' => "Download History for single file",
    'StatsMsg1' => "Top Ten der meisten angeklickten Downloads in unserem Aufbewahrungsort",
    'StatsMsg2' => "Es scheint, dass es keine Dateien f&uuml;r das File Management-Plugin auf dieser Website gibt oder niemand hat bis jetzt auf sie zugegriffen.",
    'usealtheader' => "Benutze Alt. Header",
    'url' => "URL",
    'edit' => "&Auml;ndern",
    'lastupdated' => "Letztes Update",
    'pageformat' => "Seitenformat",
    'leftrightblocks' => "Linke &amp; rechte Bl&ouml;cke",
    'blankpage' => "Leere Seite",
    'noblocks' => "Keine Bl&ouml;cke",
    'leftblocks' => "Linke Bl&ouml;cke",
    'addtomenu' => 'Zum Men&uuml; hinzuf&uuml;gen',
    'label' => 'Etikett',
    'nofiles' => 'Anzahl der Dateien in unserer Site (Downloads)',
    'save' => 'Speichern',
    'preview' => 'Vorschau',
    'delete' => 'L&ouml;schen',
    'cancel' => 'Abbruch',
    'access_denied' => 'Zugriff verweigert',
    'invalid_install' => 'Jemand hat unerlaubt versucht auf die File Management Installations/Deinstallations-Seite zuzugreifen.  Benutzer ID: ',
    'start_install' => 'Versuche das File Management-Plugin zu installieren',
    'start_dbcreate' => 'Versuche die Tabellen f&uuml;r das File Management-Plugin zu installieren',
    'install_skip' => '... skipped as per filemgmt.cfg',
    'access_denied_msg' => 'Du versuchst illegal auf die File Management Administration Seite zuzugreifen. Beachte, dass alle illegalen zugriffe auf diese Seite gespeichert werden',
    'installation_complete' => 'Installation abgeschlossen',
    'installation_complete_msg' => 'Die Datenstrukturen f&uuml;r das File Management Plugin wurden erfolgreich in Deine Datenbank &uuml;bertragen!  Wenn Du das Plugin deinstallieren willst lese bitte das README Dokument welches dem Plugin beiliegt.',
    'installation_failed' => 'Installation fehlgeschlagen',
    'installation_failed_msg' => 'Die Installation des File Management Plugins ist fehlgeschlagen.  Schau bitte in der Geeklog error.lo Datei um detailierter Informationen zu erlangen',
    'system_locked' => 'System gesperrt',
    'system_locked_msg' => 'Das File Management Plugin ist schon erfolgreich installiert und gesichert.  Wenn Du das Plugin deinstallieren willst lese bitte in der README-Datei welches dem Plugin beiliegt',
    'uninstall_complete' => 'Deinstallation abgeschlossen',
    'uninstall_complete_msg' => 'Die Datenstrukturen f&uuml;r das File Management Plugin sind erfolgreich von Deiner Geeklog Datenbank gel&ouml;scht worden<br><br>Bitte l&ouml;sche alle Dateien von dem Plugin von Deiner Internetseite.',
    'uninstall_failed' => 'Deinstallation fehlgeschlagen.',
    'uninstall_failed_msg' => 'Das Deinstallieren des File Management Plugins ist fehlgeschlagen.  Schau bitte in Deiner Geeklog error.log Datei f&uuml;r n&auml;here Informationen',
    'install_noop' => 'Plugin Install',
    'install_noop_msg' => 'Die File Management Plugin Install-Routine l&auml;uft, aber es gibt nichts zu tun.<br><br>&Uuml;berpr&uuml;fe bitte die install.cfg Datei.',
    'all_html_allowed' => 'HTML erlaubt',
    'no_new_files'  => 'Keine neuen Dateien',
    'no_comments'   => 'Keine neuen Kommentare',
    'more'          => '(mehr)'
);

$PLG_filemgmt_MESSAGE1 = 'Filemgmt Plugin Installation abgebrochen<br>File: plugins/filemgmt/filemgmt.php kann nicht geschrieben werden';
$PLG_filemgmt_MESSAGE3 = 'This plugin benötigt Geeklog Version 1.4 or höher, Upgrade empfohlen.';
$PLG_filemgmt_MESSAGE4 = 'Plugin version 1.5 code ist nicht gefunden worden - das Upgrade wurde abgebrochen.';
$PLG_filemgmt_MESSAGE5 = 'Filemgmt Plugin Upgrade abgebrochen<br>Die momentane plugin Version ist nicht 1.3';
$PLG_filemgmt_MESSAGE15 = 'Dein Kommentar wurde gespeichert, muss aber noch von einem Moderator freigegeben werden.';


// Language variables used by the plugin - general users access code.

define("_MD_THANKSFORINFO","Danke f&uuml;r die Information. Wir werden Deine Nachricht sobald als m&ouml;glich bearbeiten.");
define("_MD_BACKTOTOP","Zur&uuml;ck zu Downloads Top");
define("_MD_THANKSFORHELP","Danke f&uuml;r die Mithilfe beim Erkennen und Beheben von Download-Problemen.");
define("_MD_FORSECURITY","Aus Sicherheitsgr&uuml;nden wird Dein Username und Deine IP vor&uuml;bergehend gespeichert.");

define("_MD_SEARCHFOR","Suchen nach");
define("_MD_MATCH","genau");
define("_MD_ALL","jedem");
define("_MD_ANY","irgend einem");
define("_MD_NAME","Name");
define("_MD_DESCRIPTION","Beschreibung");
define("_MD_SEARCH","Suche");

define("_MD_MAIN","Alle");
define("_MD_SUBMITFILE","&Uuml;bertrage Datei");
define("_MD_POPULAR","Populart&auml;t");
define("_MD_NEW","Neu");
define("_MD_TOPRATED","Top Bewertungen");

define("_MD_NEWTHISWEEK","Diese Woche neu");
define("_MD_UPTHISWEEK","Updates dieser Woche");

define("_MD_POPULARITYLTOM","Popularit&auml;t (wenigsten zu meisten Treffern)");
define("_MD_POPULARITYMTOL","Popularity (meisten zu wenigsten Treffern)");
define("_MD_TITLEATOZ","Titel (A bis Z)");
define("_MD_TITLEZTOA","Titel (Z bis A)");
define("_MD_DATEOLD","Datum (Alte Downloads zuerst)");
define("_MD_DATENEW","Datum (Neue Downloads zuerst)");
define("_MD_RATINGLTOH","Bewertung (niedrigste Bewertung zur h&ouml;chsten Bewertung)");
define("_MD_RATINGHTOL","Bewertung (h&ouml;chste Bewertung zur niedrigsten Bewertung)");

define("_MD_NOSHOTS","Keine Thumbnails verf&uuml;gbar");
define("_MD_EDITTHISDL","Diesen Download &auml;ndern");

define("_MD_LISTINGHEADING","<b>Dateiliste: %s Dateien verf&uuml;gbar</b>");
define("_MD_LATESTLISTING","<b>Neue Dateien:</b>");
define("_MD_DESCRIPTIONC","Beschreibung:");
define("_MD_EMAILC","E-Mail: ");
define("_MD_CATEGORYC","Kategorie: ");
define("_MD_LASTUPDATEC","Letztes Update: ");
define("_MD_DLNOW","Jetzt herunterladen!");
define("_MD_VERSION","Version");
define("_MD_SUBMITDATE","Datum");
define("_MD_DLTIMES","%s mal heruntergeladen");
define("_MD_FILESIZE","Dateigr&ouml;&szlig;e");
define("_MD_SUPPORTEDPLAT","Unterst&uuml;tzte Plattformen");
define("_MD_HOMEPAGE","Homepage");
define("_MD_HITSC","Treffer: ");
define("_MD_RATINGC","Bewertung: ");
define("_MD_ONEVOTE","1 Stimme");
define("_MD_NUMVOTES","(%s)");
define("_MD_NOPOST","N/A");
define("_MD_NUMPOSTS","%s Stimmen");
define("_MD_COMMENTSC","Kommentare: ");
define ("_MD_ENTERCOMMENT", "Kommentar schreiben");
define("_MD_RATETHISFILE","Datei bewerten");
define("_MD_MODIFY","&Auml;ndern");
define("_MD_REPORTBROKEN","Problem melden");
define("_MD_TELLAFRIEND","Einem Freund weiterleiten");
define("_MD_VSCOMMENTS","Anzeigen/Senden von Kommentaren");
define("_MD_EDIT","&Auml;ndern");

define("_MD_THEREARE","Es stehen %s Dateien zum Download bereit");
define("_MD_LATESTLIST","Neue Dateien");

define("_MD_REQUESTMOD","Bitte diesen Download &auml;ndern");
define("_MD_FILE","Datei");
define("_MD_FILEID","Datei-ID: ");
define("_MD_FILETITLE","Titel: ");
define("_MD_DLURL","Download-URL: ");
define("_MD_HOMEPAGEC","Homepage: ");
define("_MD_VERSIONC","Version: ");
define("_MD_FILESIZEC","Dateigr&ouml;&szlig;e: ");
define("_MD_NUMBYTES","%s Bytes");
define("_MD_PLATFORMC","Platform: ");
define("_MD_CONTACTEMAIL","Kontakt (E-Mail): ");
define("_MD_SHOTIMAGE","Vorschaubild: ");
define("_MD_SENDREQUEST","Anfrage senden");

define("_MD_VOTEAPPRE","Danke f&uuml;r Deine Bewertung.");
define("_MD_THANKYOU","Danke, dass Du Dir die Zeit genommen hast f&uuml;r eine Bewertung auf %s"); // %s is your site name
define("_MD_VOTEFROMYOU","Bewertungen von Benutzer wie Du selber helfen anderen Besuchern bei der Wahl ihres Downloads.");
define("_MD_VOTEONCE","Dateien bitte nur einmal bewerten.");
define("_MD_RATINGSCALE","Die Bewertungsskala reicht von 1 bis 10, wobei 1 die schlechteste und 10 die beste Wertung darstellt.");
define("_MD_BEOBJECTIVE","Bitte objektiv bleiben. Wenn alle Dateien nur mit 1 oder 10 bewertet werden, macht die Bewertung nicht viel Sinn.");
define("_MD_DONOTVOTE","Eigene Dateien bitte nicht selbst bewerten.");
define("_MD_RATEIT","Bewerten");

define("_MD_INTFILEAT","Interessanter Download auf %s"); // %s is your site name
define("_MD_INTFILEFOUND","Hier ist ein interessanter Download den ich auf %s gefunden habe"); // %s is your site name

define("_MD_RECEIVED","Wir haben Deine Datei erhalten. Danke!");
define("_MD_WHENAPPROVED","Wir senden Dir eine E-Mail wenn Dein Download bei uns aufgenommen wird.");
define("_MD_SUBMITONCE","Datei(en) bitte nur einmal einreichen.");
define("_MD_APPROVED", "Deine Datei wurde freigegeben");
define("_MD_ALLPENDING","Dateien sind erst nach &Uuml;berpr&uuml;fung durch unser Team abrufbar.");
define("_MD_DONTABUSE","Username und IP werden geloggt - bitte das System nicht missbrauchen.");
define("_MD_TAKEDAYS","Es kann durchaus einige Zeit dauern, bis Dateien zum Download zur Verf&uuml;gung gestellt werden.");

define("_MD_RANK","Rang");
define("_MD_CATEGORY","Kategorie");
define("_MD_HITS","Treffer");
define("_MD_RATING","Wertung");
define("_MD_VOTE","Bewerten");

define("_MD_SEARCHRESULT4","Suchergebniss f&uuml; <b>%s</b>:");
define("_MD_MATCHESFOUND","%s &uuml;bereinstimmung(en) gefunden.");
define("_MD_SORTBY","Sortiert nach:");
define("_MD_TITLE","Titel");
define("_MD_DATE","Datum");
define("_MD_POPULARITY","Popularit&auml;t");
define("_MD_CURSORTBY","Downloads aktuell sortiert nach: ");
define("_MD_FOUNDIN","Gefunden in:");
define("_MD_PREVIOUS","Vorheriger Download");
define("_MD_NEXT","N&auml;chster Download");
define("_MD_NOMATCH","Keine &Uuml;bereinstimmung mit Deiner Anfrage gefunden");

define("_MD_TOP10","%s Top 10"); // %s is a downloads category name
define("_MD_CATEGORIES","Kategorien");

define("_MD_SUBMIT","Abschicken");
define("_MD_CANCEL","Abbruch");

define("_MD_BYTES","Bytes");
define("_MD_ALREADYREPORTED","Du hast uns schon eine Mitteilung gesendet, dass der Download nicht funktioniert.");
define("_MD_MUSTREGFIRST","Sorry, Du hast nicht die erforderlichen Rechte f&uuml;r diese Aktion.<br>Bitte registriere dich oder loge dich ein!");
define("_MD_NORATING","Keine Bewertung ausgew&auml;hlt.");
define("_MD_CANTVOTEOWN","Eigene Dateien k&ouml;nnen nicht bewertet werden.<br>Alle Wertungen werden protokolliert und &uuml;berpr&uuml;ft.");

// Language variables used by the plugin - Admin code.

define("_MD_RATEFILETITLE","Datei bewerten");
define("_MD_ADMINTITLE","Dateiverwaltung");
define("_MD_UPLOADTITLE","Dateiverwaltung - Eine Datei hochladen");
define("_MD_CATEGORYTITLE","Dateiliste - nach Kategorien");
define("_MD_DLCONF","Downloads Konfiguration");
define("_MD_GENERALSET","Einstellungen");
define("_MD_ADDMODFILENAME","Eine Datei hinzuf&uuml;gen");
define ("_MD_ADDCATEGORYSNAP", "Optionales Bild: <small>(Nur f&uuml;r Top Level Kategorien)</small>");
define ("_MD_ADDIMAGENOTE", "(Bilder werden auf die in der Konfiguration eingestellte H&ouml;he skaliert)");
define("_MD_ADDMODCATEGORY","<b>Kategorien:</b> Hinzuf&uuml;gen, &Auml;ndern, L&ouml;schen");
define("_MD_DLSWAITING","Eingereichte Dateien");
define("_MD_BROKENREPORTS","Nicht funktionierende Downloads");
define("_MD_MODREQUESTS","Download Info &Auml;nderungs Anfrage");
define("_MD_EMAILOPTION","E-Mail empf&auml;nger wenn der Download aufgenommen wird: ");
define("_MD_COMMENTOPTION","Kommentare erlauben:");
define("_MD_SUBMITTER","Eingereicht von: ");
define("_MD_DOWNLOAD","Herunterladen");
define("_MD_FILELINK","Link auf diese Datei");
define("_MD_SUBMITTEDBY","Upload von ");
define("_MD_APPROVE","Akzeptieren");
define("_MD_DELETE","L&ouml;schen");
define("_MD_NOSUBMITTED","Keine neu vorgeschlagene Downloads.");
define("_MD_ADDMAIN","Hauptkategorie hinzuf&uuml;gen");
define("_MD_TITLEC","Titel: ");
define("_MD_CATSEC", "Kategorie Zugriff: ");
define("_MD_IMGURL","<br>Bild Dateiname <font size='-2'> (liegt im filemgmt_data/category_snaps Verzeichnis - Bildh&ouml;he wird skaliert, wie in der Konfiguration eingestellt)</font>");
define("_MD_ADD","Hinzuf&uuml;gen");
define("_MD_ADDSUB","Unter-Kategorie hinzuf&uuml;gen");
define("_MD_IN","in");
define("_MD_ADDNEWFILE","Neue Datei hinzuf&uuml;gen");
define("_MD_MODCAT","Kategorie &auml;ndern");
define("_MD_MODDL","Datei-Information bearbeiten");
define("_MD_USER","Benutzer");
define("_MD_IP","IP-Addresse");
define("_MD_USERAVG","Benutzer AVG Bewertung");
define("_MD_TOTALRATE","Gesamt Bewertungen");
define("_MD_NOREGVOTES","Registrierte Benutzer d&uuml;rfen nicht Abstimmen");
define("_MD_NOUNREGVOTES","Registrierte Benutzer d&uuml;rfen nicht Abstimmen");
define("_MD_VOTEDELETED","Bewertungs-Daten gel&ouml;scht.");
define("_MD_NOBROKEN","Keine gemeldeten Dead-Links.");
define("_MD_IGNOREDESC","Ignorieren (Ignoriert die Mitteilung des <b>Dead-Links</b> und l&ouml;scht diesen)");
define("_MD_DELETEDESC","L&Ouml;schen (L&ouml;scht <b>die Download Daten</b> und <b>den Dead-Link Report</b> f&uuml;r diese Datei.)");
define("_MD_REPORTER","Hinweis von");
define("_MD_FILESUBMITTER","Datei von");
define("_MD_IGNORE","Ignorieren");
define("_MD_FILEDELETED","Datei gel&ouml;scht.");
define("_MD_FILENOTDELETED","Der Datensatz wurde gel&ouml;scht aber die Datei existiert noch.<p>Mehr als 1 Datensatz zeigt auf diese Datei.");
define("_MD_BROKENDELETED","Dead-Link Report gel&ouml;scht.");
define("_MD_USERMODREQ","Benutzer Download Info &Auml;nderung Anfrage");
define("_MD_ORIGINAL","Original");
define("_MD_PROPOSED","Vorgeschlagen von");
define("_MD_OWNER","Besitzer: ");
define("_MD_NOMODREQ","Keine Download &Auml;nderung anfragen.");
define("_MD_DBUPDATED","Datenbank erfolgreich upgdatet!");
define("_MD_MODREQDELETED","&Auml;nderungsanfrage gel&ouml;scht.");
define("_MD_IMGURLMAIN","Bild (Bild h&ouml; wird auf 50 gesetzt): ");
define("_MD_PARENT","Eltern Kategorie:");
define("_MD_SAVE","&Auml;nderungen gespeichert");
define("_MD_CATDELETED","Kategorie gel&ouml;scht.");
define("_MD_WARNING","Warnung: Bist Du sicher, dass Du diese Kategorie mit allen Dateien und Kommentaren l&ouml;schen willst?");
define("_MD_YES","Ja");
define("_MD_NO","Nein");
define("_MD_NEWCATADDED","Neue Kategorie erfolgreich hinzugef&uuml;gt!");
define("_MD_CONFIGUPDATED","Neue Konfiguration gespeichert");
define("_MD_ERROREXIST","Fehler: Dieser Download ist schon in der Datenbank vorhanden!");
define("_MD_ERRORNOFILE","ERROR: File not found on record in the database!");
define("_MD_ERRORTITLE","Fehler: Du musst einen Titel angeben!");
define("_MD_ERRORDESC","Fehler: Du musst eine Beschreibung angeben!");
define("_MD_NEWDLADDED","Neuer Download der Datenbank hinzugef&uuml;gt.");
define("_MD_NEWDLADDED_DUPFILE","Warnung: Datei doppelt. Neuer Download der Datenbank hinzugef&uuml;gt.");
define("_MD_NEWDLADDED_DUPSNAP","Warnung: Doppelter Snap. Neuer Download der Datenbank hinzugef&uuml;gt.");
define("_MD_HELLO","Hallo %s");
define("_MD_WEAPPROVED","Wir genehmigen Deine Download anfrage an unsere Download-Sektion. Der Dateiname ist: ");
define("_MD_THANKSSUBMIT","Danke f&uuml; Deine &Uuml;bertragung!");
define("_MD_UPLOADAPPROVED","Deine upgeloadete Datei wird eingef&uuml;gt");
define("_MD_DLSPERPAGE","Angezeigt Downloads pro Seite: ");
define("_MD_HITSPOP","Die popul&auml;rsten Treffer: ");
define("_MD_DLSNEW","Anzahl von neuen Downloads auf der Hauptseite : ");
define("_MD_DLSSEARCH","Anzahl der Downloads im Suchergebniss: ");
define("_MD_TRIMDESC","Dateisortierung bei der Auflistung: ");
define("_MD_DLREPORT","Eingeschr&auml;kter Zugriff zum Download Report");
define("_MD_WHATSNEWDESC","Aktiviere Whats New Liste");
define("_MD_SELECTPRIV","Aktiviere Logged-In Users zugriff: ");
define("_MD_ACCESSPRIV","Aktiviere Anonymous zugriff: ");
define("_MD_UPLOADSELECT","Erlaube Logged-In Users uploads: ");
define("_MD_UPLOADPUBLIC","Erlaube Anonymous uploads: ");
define("_MD_USESHOTS","Zeige Kategorie-Bilder: ");
define("_MD_IMGWIDTH","Thumbnail Img Breite: ");
define("_MD_MUSTBEVALID","Thumbnail Bild muss eine g&uuml;ltige Bilddatei im Ordner %s sein (bsp. shot.gif). Leer lassen wenn kein Bild angezeigt werden soll.");
define("_MD_REGUSERVOTES","Registrierte Benutzer Stimmen (von: %s)");
define("_MD_ANONUSERVOTES","Anonyme Benutzer Stimmen (von: %s)");
define("_MD_YOURFILEAT","Deien Datei wurde an %s &uml;bertragen"); // this is an approved mail subject. %s is your site name
define("_MD_VISITAT","Besuche unsere Download-Section auf %s");
define("_MD_DLRATINGS","Download Bewertung (Gesamt-Stimmen: %s)");
define("_MD_CONFUPDATED","Konfiguration erfolgreich aktualisiert!");
define("_MD_NOFILES","No Files Found");   

// Additional Geeklog Defines
define("_MD_NOVOTE","Keine Bewertung");
define("_IFNOTRELOAD","Wenn diese Seite nicht automatisch neu l&auml;dt, hier klicken <a href=%s>here</a>");
define("_GL_ERRORNOACCESS","Fehler: Kein Zugriff auf diese Dokument Repres&auml;ntation");
define("_GL_ERRORNOUPLOAD","Fehler: Du hast keine Upload-Rechte");
define("_GL_ERRORNOADMIN","Fehler: Diese Funktion ist eingeschr&auml;ckt");
define("_GL_NOUSERACCESS","habe keinen Zugriff auf diese Dokument Repres&auml;ntation");
define("_MD_ERRUPLOAD","File Management: Fehler beim Upload - &uuml;berpr&uuml;fe die Rechte in den Server-Verzeichnissen");
define("_MD_DLFILENAME","Dateiname: ");
define("_MD_REPLFILENAME","Ersatzdatei: ");
define("_MD_SCREENSHOT","Bildschirmfoto");
define("_MD_SCREENSHOT_NA","");
define("_MD_COMMENTSWANTED","Warum nicht einen Kommentar hinterlassen?");
define("_MD_CLICK2SEE","Datei anschauen: ");
define("_MD_CLICK2DL","Datei herunterladen: ");
define("_MD_ORDERBY","Sortieren nach: ");

?>
