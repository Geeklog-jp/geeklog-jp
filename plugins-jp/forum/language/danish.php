<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.8.0                                               |
// +---------------------------------------------------------------------------+
// | danish.php                                                                |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2004 by the following authors:                              |
// |    Sniper12                                                               |
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
    'pluginlabel'       => 'Forum',         // What shows up in the siteHeader
    'searchlabel'       => 'Forum',
    'statslabel'        => 'Samlet antal indlæg',
    'statsheading1'     => 'Forum Top 10 Sete Emner',
    'statsheading2'     => 'Forum Top 10 Besvarede Emner',
    'statsheading3'     => 'Der er ingen relevante emner',
    'useradminmenu'     => 'Forum Indstillinger',
    'access_denied'     => 'Adgang Nægtet',
    'autotag_desc_forum' => '[forum: id alternate title] - Displays a link to a forum topic using the text \'here\' as the title. An alternate title may be specified but is not required.'
);


$LANG_GF01['FORUM']          = 'Forum';
$LANG_GF01['ALL']            = 'All'; 
$LANG_GF01['YES']            = 'Ja';
$LANG_GF01['NO']             = 'Nej';
$LANG_GF01['NEW']            = 'Ny';
$LANG_GF01['NEXT']           = 'Næste';
$LANG_GF01['ERROR']          = 'Fejl!';
$LANG_GF01['CONFIRM']        = 'Bekræft';
$LANG_GF01['UPDATE']         = 'Opdatér';
$LANG_GF01['SAVE']           = 'Gem indstillinger';
$LANG_GF01['CANCEL']         = 'Fortryd';
$LANG_GF01['ON']             = '';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>På: </b>';
$LANG_GF01['BY']             = 'Af: ';
$LANG_GF01['RE']             = 'Vedr.: ';
$LANG_GF01['DATE']           = 'Dato';
$LANG_GF01['VIEWS']          = 'Set';
$LANG_GF01['REPLIES']        = 'Svar';
$LANG_GF01['NAME']           = 'Navn:';
$LANG_GF01['DESCRIPTION']    = 'Beskrivelse: ';
$LANG_GF01['TOPIC']          = 'Emne';
$LANG_GF01['TOPICS']         = 'Emner';
$LANG_GF01['TOPICSUBJECT']   = 'Emne Titel';
$LANG_GF01['HOMEPAGE']       = 'Hjem';
$LANG_GF01['SUBJECT']        = 'Titel';
$LANG_GF01['HELLO']          = 'Hej ';
$LANG_GF01['MOVED']          = 'Moved';
$LANG_GF01['POSTS']          = 'Indlæg';
$LANG_GF01['LASTPOST']       = 'Nyeste Indlæg';
$LANG_GF01['POSTEDON']       = 'Postet på';
$LANG_GF01['POSTEDBY']       = 'Posted By';
$LANG_GF01['PAGES']          = 'Sider';
$LANG_GF01['TODAY']          = 'I dag kl ';
$LANG_GF01['REGISTERED']     = 'Bruger fra';
$LANG_GF01['ORDERBY']        = 'Sortér efter:';
$LANG_GF01['ORDER']          = 'Sorteret efter:';
$LANG_GF01['USER']           = 'Bruger';
$LANG_GF01['GROUP']          = 'Group';
$LANG_GF01['ANON']           = 'Anonym:';
$LANG_GF01['ADMIN']          = 'Admin';
$LANG_GF01['AUTHOR']         = 'Forfatter';
$LANG_GF01['NOMOOD']         = 'Intet Humør';
$LANG_GF01['REQUIRED']       = '[Obligatorisk]';
$LANG_GF01['OPTIONAL']       = '[Frivillig]';
$LANG_GF01['SUBMIT']         = 'Godkend';
$LANG_GF01['PREVIEW']        = 'Gennemse';
$LANG_GF01['REMOVE']         = 'Fjern';
$LANG_GF01['EDIT']           = 'Redigér';
$LANG_GF01['DELETE']         = 'Slet';
$LANG_GF01['OPTIONS']        = 'Indstillinger:';
$LANG_GF01['MISSINGSUBJECT'] = 'Blankt Emne';
$LANG_GF01['MIGRATE_NOW']    = 'Migrate Now'; 
$LANG_GF01['FILTERLIST']     = 'Filter List';
$LANG_GF01['SELECTFORUM']    = 'Select Forum';
$LANG_GF01['DELETEAFTER']    = 'Delete after';
$LANG_GF01['TITLE']          = 'Title';
$LANG_GF01['COMMENTS']       = 'Comments'; 
$LANG_GF01['SUBMISSIONS']    = 'Submissions';
$LANG_GF01['HTML_FILTER_MSG']  = 'Filtered HTML Allowed';
$LANG_GF01['HTML_FULL_MSG']  = 'Full HTML Allowed';
$LANG_GF01['HTML_MSG']       = 'HTML Allowed';
$LANG_GF01['CENSOR_PERM_MSG']  = 'Censored Content';
$LANG_GF01['ANON_PERM_MSG']    = 'View Anonymous Posts';
$LANG_GF01['POST_PERM_MSG1']    = 'Able to post';
$LANG_GF01['POST_PERM_MSG2']    = 'Anonymous users can post';
$LANG_GF01['GO']             = 'GO';
$LANG_GF01['STATUS']         = 'Status:';
$LANG_GF01['ONLINE']         = 'online';
$LANG_GF01['OFFLINE']        = 'offline';
$LANG_GF01['back2parent']    = 'Overordnet Debat';
$LANG_GF01['forumname']      = '';   // Enter name here if you want it to show in the footer of the admin screens
$LANG_GF01['category']       = 'Kategori: ';
$LANG_GF01['loginreqview']   = '<b>Beklager, du skal %s registrere en brugerkonto</a> eller %s logge ind</a> for at bruge disse forummer</b>';
$LANG_GF01['loginreqpost']   = '<b>Beklager, kun registrerede brugere må skrive indlæg.</b>';
$LANG_GF01['nolastpostmsg']  = 'N/A';
$LANG_GF01['no_one']         = 'Ingen.';
$LANG_GF01['back2top']       = 'Tilbage til toppen';
$LANG_GF01['TEXTMODE']       = 'Text Mode:';
$LANG_GF01['HTMLMODE']       = 'HTML Mode:';
$LANG_GF01['TopicPreview']   = 'Gennemse debat indlæg';
$LANG_GF01['moderator']      = 'Moderator';
$LANG_GF01['admin']          = 'Admin';
$LANG_GF01['DATEADDED']      = 'Tilføjet på Dato';
$LANG_GF01['PREVTOPIC']      = 'Forrige Emne';
$LANG_GF01['NEXTTOPIC']      = 'Næste Emne';
$LANG_GF01['RESYNC']         = "Synkronisér";
$LANG_GF01['RESYNCCAT']      = "ReSync Category Forums";  
$LANG_GF01['EDITICON']       = 'Redigér';
$LANG_GF01['QUOTEICON']      = 'Citér';
$LANG_GF01['ProfileLink']    = 'Profil';
$LANG_GF01['WebsiteLink']    = 'Hjemmeside';
$LANG_GF01['PMLink']         = 'PM';
$LANG_GF01['EmailLink']      = 'Email';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Følg dette forum';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'Un-Subscribe to this forum';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'Subscribe:Enabled';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['NEWTOPIC']       = 'Nyt Emne';
$LANG_GF01['POSTREPLY']      = 'Svar';
$LANG_GF01['SubscribeLink']  = 'Subscribe';
$LANG_GF01['unSubscribeLink'] = 'Un-Subscribe';
$LANG_GF01['SubscribeLink_TRUE']  = 'Subscribe:Enabled';
$LANG_GF01['SubscribeLink_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['SUBSCRIPTIONS']  = 'Adviseringer';
$LANG_GF01['TOP']            = 'Gå til toppen';
$LANG_GF01['PRINTABLE']      = 'Udskriftsvenlig Udgave';
$LANG_GF01['USERPREFS']      = 'Bruger Indstillinger';
$LANG_GF01['SPEEDLIMIT']     = '"Dit sidste indlæg var for %s sekunder siden.<br' . XHTML . '>Denne hjemmeside kræver mindst %s sekunder mellem hvert indlæg."';
$LANG_GF01['ACCESSERROR']    = 'ADGANG NÆGTET';
$LANG_GF01['ACTIONS']        = 'Actions';
$LANG_GF01['DELETEALL']      = 'Delete all selected records';
$LANG_GF01['DELCONFIRM']     = 'Are you sure you want to Delete selected records?';
$LANG_GF01['DELALLCONFIRM']  = 'Are you sure you want to Delete ALL selected records?';
$LANG_GF01['STARTEDBY']      = 'Started by:';
$LANG_GF01['WARNING']        = 'Warning';
$LANG_GF01['MODERATED']      = 'Moderators: %s';
$LANG_GF01['LASTREPLYBY']    = 'Last reply by:&nbsp;%s';
$LANG_GF01['UID']            = 'UID';
$LANG_GF01['INDEXPAGE']      = 'Forum Index';
$LANG_GF01['FEATURE']        = 'Feature';
$LANG_GF01['SETTING']        = 'Setting';
$LANG_GF01['MARKALLREAD']    = 'Mark All Read';
$LANG_GF01['MSG_NO_CAT']     = 'No Categories or Forums Defined';

// Language for bbcode toolbar
$LANG_GF01['CODE']           = 'Code';
$LANG_GF01['FONTCOLOR']      = 'Font Color';
$LANG_GF01['FONTSIZE']       = 'Font Size';
$LANG_GF01['CLOSETAGS']      = 'Close Tags';
$LANG_GF01['CODETIP']        = 'Tip: Styles can be applied quickly to selected text';
$LANG_GF01['TINY']           = 'Tiny';
$LANG_GF01['SMALL']          = 'Small';
$LANG_GF01['NORMAL']         = 'Normal';
$LANG_GF01['LARGE']          = 'Large';
$LANG_GF01['HUGE']           = 'Huge';
$LANG_GF01['DEFAULT']        = 'Default';
$LANG_GF01['DKRED']          = 'Dark Red';
$LANG_GF01['RED']            = 'Red';
$LANG_GF01['ORANGE']         = 'Orange';
$LANG_GF01['BROWN']          = 'Brown';
$LANG_GF01['YELLOW']         = 'Yellow';
$LANG_GF01['GREEN']          = 'Green';
$LANG_GF01['OLIVE']          = 'Olive';
$LANG_GF01['CYAN']           = 'Cyan';
$LANG_GF01['BLUE']           = 'Blue';
$LANG_GF01['DKBLUE']         = 'Dark Blue';
$LANG_GF01['INDIGO']         = 'Indigo';
$LANG_GF01['VIOLET']         = 'Violet';
$LANG_GF01['WHITE']          = 'White';
$LANG_GF01['BLACK']          = 'Black';

$LANG_GF01['b_help']         = "Bold text: [b]text[/b]";
$LANG_GF01['i_help']         = "Italic text: [i]text[/i]";
$LANG_GF01['u_help']         = "Underline text: [u]text[/u]";
$LANG_GF01['q_help']         = "Quote text: [quote]text[/quote]";
$LANG_GF01['c_help']         = "Code display: [code]code[/code]";
$LANG_GF01['l_help']         = "List: [list]text[/list]";
$LANG_GF01['o_help']         = "Ordered list: [olist]text[/olist]";
$LANG_GF01['p_help']         = "[img]http://image_url[/img]  or [img w=100 h=200][/img]";
$LANG_GF01['w_help']         = "Insert URL: [url]http://url[/url] or [url=http://url]URL text[/url]";
$LANG_GF01['a_help']         = "Close all open bbCode tags";
$LANG_GF01['s_help']         = "Font color: [color=red]text[/color]  Tip: you can also use color=#FF0000";
$LANG_GF01['f_help']         = "Font size: [size=7]small text[/size]";
$LANG_GF01['h_help']         = "Click to view more detailed help";


$LANG_GF02['msg01']    = 'Sorry you must register to use these forums';
$LANG_GF02['msg02']    = 'You should not be here!<br' . XHTML . '>Restricted access to this forum only';
$LANG_GF02['msg03']    = 'Please wait while you are redirected';
$LANG_GF02['msg05']    = '<center><em>Beklager, der er endnu ikke lavet nogen emner.</em></center>';
$LANG_GF02['msg07']    = 'Brugere online:';
$LANG_GF02['msg14']    = 'Beklager, du har fået forbud mod at poste indlæg.<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'Hvis du mener at dette er en fejl, skal du kontakte <a href="mailto:%s?subject=Guestbook IP Ban">hjemmesidens Webmaster</a>.';
$LANG_GF02['msg18']    = 'Fejl! Ikke alle de krævede felter er udfyldt eller også er de for korte.';
$LANG_GF02['msg19']    = 'Dit indlæg er blevet gemt.';
$LANG_GF02['msg22']    = '- Forum Indlæg Advisering';
$LANG_GF02['msg23a']   = "Der er kommet et svar vedrørende emnet '%s' af %s\n\nDette emne blev startet af: %s i %s forummet.\n";
$LANG_GF02['msg23b']   = "Et nyt emne '%s' er oprettet af %s i %s's forummer på %s hjemmesiden.\nDu kan se det her: %s/forum/viewtopic.php?forum=%s&showtopic=%s\n";
$LANG_GF02['msg23c']   = "\nDu kan se det her: %s/forum/viewtopic.php?forum=%s&showtopic=%s&lastpost=true\n";
$LANG_GF02['msg25']    = "\nFortsat god dag! \n";
$LANG_GF02['msg26']    = "\nDu modtager denne email fordi du har valgt at blive adviseret når der kommer et svar på dette emne. \n";
$LANG_GF02['msg27']    = 'Du kan stoppe adviseringen: <a href="%s">her</a>.';
$LANG_GF02['msg33']    = 'Forfatter: ';
$LANG_GF02['msg36']    = 'Humør:';
$LANG_GF02['msg38']    = "Advisér mig\n ved svar ";
$LANG_GF02['msg40']    = '<br' . XHTML . '>Beklager, men du har allerede bedt om at blive adviseret, når der kommer svar på dette emne.<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg44']    = '<p style="margin:0px; padding:5px;">Du har for nuværende ingen adviseringer.</p>';
$LANG_GF02['msg49']    = '(Læst %s gange) ';
$LANG_GF02['msg55']    = 'Indlæg slettet.';
$LANG_GF02['msg56']    = 'IP-adresse Forbudt.';
$LANG_GF02['msg59']    = 'Normalt Emne';
$LANG_GF02['msg60']    = 'Nyt Indlæg';
$LANG_GF02['msg61']    = 'Fastgjort Emne';
$LANG_GF02['msg62']    = 'Advisér mig ved svar';
$LANG_GF02['msg64']    = 'Er du sikker på at du vil slette Emne %s med titlen: %s ?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>Dette er første indlæg i emnet, så alle andre efterfølgende indlæg vil også blive slettet.';
$LANG_GF02['msg68']    = 'Bemærk: VÆR FORSIGTIG MED AT FORBYDE NOGEN, kun Adminstratorer kan ophæve et forbud.';
$LANG_GF02['msg69']    = '<br' . XHTML . '>Vil du virkeligt forbyde IP-addressen: %s?';
$LANG_GF02['msg71']    = 'Ingen funktion valgt, vælg et indlæg og dernæst en Moderator funktion.<br' . XHTML . '>Bemærk: Du skal være Moderator for at anvende disse funktioner.';
$LANG_GF02['msg72']    = 'Hvis dette indlæg læses online, har du ikke ret til at udføre Moderator funktionen.';
$LANG_GF02['msg74']    = 'Nyeste %s Forum Indlæg';
$LANG_GF02['msg75']    = 'Top %s Emner Sorteret Efter Læst';
$LANG_GF02['msg76']    = 'Top %s Emner Sorteret Efter Besvaret';
$LANG_GF02['msg77']    = '<br' . XHTML . '><p style="padding-left:10px;">Du burde ikke være her!<br' . XHTML . '>Der er begrænset adgang til Forummet.</p>';
$LANG_GF02['msg83']    = '<br' . XHTML . '><br' . XHTML . '>Du skal være logget ind for at anvende denne Forum facilitet.</p>';
$LANG_GF02['msg84']    = 'Markér alle emner læst';
$LANG_GF02['msg85']    = 'Side:';
$LANG_GF02['msg86']    = 'Nyeste 10 indlæg af: ';
$LANG_GF02['msg87']    = '<br' . XHTML . '>Advarsel: Dette emne er låst af en moderator.<br' . XHTML . '>Det er ikke tilladt at skrive nye poster for emnet';
$LANG_GF02['msg88']    = 'Brugere med Forum Aktivitet';
$LANG_GF02['msg88b']   = 'Forum Activity Only';
$LANG_GF02['msg89']    = 'Mine Aktiverede Adviseringer';
$LANG_GF02['msg101']   = 'Forum Regler:';
$LANG_GF02['msg103']   = 'Forum Skift:';
$LANG_GF02['msg106']   = 'Vælg et Forum';
$LANG_GF02['msg108']   = 'Normalt Forum';
$LANG_GF02['msg109']   = 'Låst Emne';        
$LANG_GF02['msg110']   = 'Skifter til rettelse af indlæg..';
$LANG_GF02['msg111']   = 'Nye indlæg siden dit sidste besøg:';
$LANG_GF02['msg112']   = 'Se alle nye indlæg';
$LANG_GF02['msg113']   = 'Se nye indlæg';
$LANG_GF02['msg114']   = 'Låst Emne';
$LANG_GF02['msg115']   = 'Fastgjort Emne med Nye Indlæg';
$LANG_GF02['msg116']   = 'Låst Emne med Nye Indlæg';
$LANG_GF02['msg117']   = 'Søg i Alle';
$LANG_GF02['msg118']   = 'Søg i dette Forum';
$LANG_GF02['msg119']   = 'Forum Søgnings Resusltater for forspørgsel:';
$LANG_GF02['msg120']   = 'Mest populære indlæg efter';
$LANG_GF02['msg121']   = 'Alle tider er %s. Klokken er nu %s.';
$LANG_GF02['msg122']   = 'Populær Grænse:';
$LANG_GF02['msg123']   = 'Antal indlæg før et emne betegnes som populært';
$LANG_GF02['msg126']   = 'Søge Linier:';
$LANG_GF02['msg127']   = 'Antal Linier der vises i søge resultater';
$LANG_GF02['msg128']   = 'Brugere Pr. Side:';
$LANG_GF02['msg129']   = 'Gælder for oversigten over aktive brugere';
$LANG_GF02['msg130']   = 'Se Anonyme Indlæg:';
$LANG_GF02['msg131']   = 'Hvis du vælger Nej vil anonyme indlæg ikke vises';
$LANG_GF02['msg132']   = 'Advisér Altid:';
$LANG_GF02['msg133']   = 'Hvis du vælger Ja vil du altid blive adviseret om svar<br' . XHTML . '>på emner du opretter eller besvarer';
$LANG_GF02['msg134']   = 'Advisering tilføjet';
$LANG_GF02['msg135']   = 'Du vil nu blive adviseret, hver gang der kommer et nyt indlæg i dette Forum.';
$LANG_GF02['msg136']   = 'Du skal vælge et Forum du vil adviseres om.';
$LANG_GF02['msg137']   = 'Advisering for emne aktiveret';
$LANG_GF02['msg138']   = '<b>Får adviseringer for hele forummet</b>';
$LANG_GF02['msg142']   = 'Advisering gemt.';
$LANG_GF02['msg144']   = 'Retur til emne';
$LANG_GF02['msg146']   = 'Asvisering Slettet';
$LANG_GF02['msg147']   = 'Forum [udskriftsvenlig udgave af emne';
$LANG_GF02['msg148']   = 'Klik <a href="javascript:history.back()">HER</a> for at vende tilbage';
$LANG_GF02['msg155']   = 'Ingen indlæg af bruger.';
$LANG_GF02['msg156']   = 'Samlet antal Forum indlæg';
$LANG_GF02['msg157']   = 'Nyeste 10 Forum indlæg';
$LANG_GF02['msg158']   = 'Nyeste 10 Forum indlæg af ';
$LANG_GF02['msg159']   = 'Er du sikker på at du vil SLETTE de valgte Moderator poster?';
$LANG_GF02['msg160']   = 'Gå til Emnets sidste side';
$LANG_GF02['msg163']   = 'Indlæg flyttet';
$LANG_GF02['msg164']   = 'Markér alle Kategorier og Emner Læst';
$LANG_GF02['msg166']   = 'FEJL: Ugyldigt Emne, eller Emne ikke fundet';
$LANG_GF02['msg167']   = 'Adviseringsvalg';
$LANG_GF02['msg168']   = 'Hvis du vælger Nej, deaktiverer du alle email adviseringer';
$LANG_GF02['msg169']   = 'Retur til Brugerliste';
$LANG_GF02['msg170']   = 'Nyeste Forum Indlæg';
$LANG_GF02['msg171']   = 'Forum Adgangs Fejl';
$LANG_GF02['msg172']   = 'Emne findes ikke. Muligvis er det slettet.';
$LANG_GF02['msg173']   = 'Transferring to Post Message page..';
$LANG_GF02['msg174']   = 'Unable to BAN Member - Invalid or Empty IP Address';
$LANG_GF02['msg175']   = 'Return to Forum Listing';
$LANG_GF02['msg176']   = 'Select a member';
$LANG_GF02['msg177']   = 'All Members';
$LANG_GF02['msg178']   = 'Parent Posts Only';
$LANG_GF02['msg179']   = 'Content generated in: %s seconds';
$LANG_GF02['msg180']   = 'Forum Posting Alert';
$LANG_GF02['msg181']   = 'You don\'t have access to any other forum as a moderator';
$LANG_GF02['msg182']   = 'Moderator Confirmation';
$LANG_GF02['msg183']   = 'New topic was created from this post in forum: %s';
$LANG_GF02['msg184']   = 'Notify Once Only';
$LANG_GF02['msg185']   = 'Notifications will only be sent once for forums and topics which have multiple new posts since your last visit.';
$LANG_GF02['msg186']   = 'New Topic Title';
$LANG_GF02['msg187']   = 'Return to topic - click <a href="%s">here</a>';
$LANG_GF02['msg188']   = 'Click to go directly to last post';
$LANG_GF02['msg189']   = 'Error: You can not edit this post anymore';
$LANG_GF02['msg190']   = 'Silent Edit';
$LANG_GF02['msg191']   = 'Edit not permitted. Allowable edit timeframe expired or you need moderator rights';
$LANG_GF02['msg192']   = 'Completed ... Migrated %s topics and %s comments.';
$LANG_GF02['msg193']   = 'STORY&nbsp;&nbsp;TO&nbsp;&nbsp;FORUM&nbsp;&nbsp;MIGRATION&nbsp;&nbsp;UTILITY';
$LANG_GF02['msg194']   = 'Quiet Forum';
$LANG_GF02['msg195']   = 'Click to Jump to Forum';
$LANG_GF02['msg196']   = 'View the main forum index';
$LANG_GF02['msg197']   = 'Mark all Categories read';
$LANG_GF02['msg198']   = 'Update your forum settings';
$LANG_GF02['msg199']   = 'View or remove forum notifications';
$LANG_GF02['msg200']   = 'Site members report';
$LANG_GF02['msg201']   = 'Popular topics';
$LANG_GF02['msg202']   = 'No new posts';
$LANG_GF02['msg300']   = 'Your preferences have block anonymous posts enabled';
$LANG_GF02['msg301']   = 'Realy mark all categories read?';
$LANG_GF02['msg302']   = 'Realy mark all topics read?';
$LANG_GF02['PostReply']   = 'Opret nyt svar';
$LANG_GF02['PostTopic']   = 'Opret nyt emne';
$LANG_GF02['EditTopic']   = 'Ret Emne';
$LANG_GF02['quietforum']  = 'Forum has no new topics';

$LANG_GF03 = array (
    'delete'            => 'Slet Indlæg',
    'edit'              => 'Ret Indlæg',
    'move'              => 'Flyt Emne',
    'split'             => 'Split Topic',
    'ban'               => 'Forbyd IP-adresse',
    'movetopic'         => 'Flyt Emne',
    'movetopicmsg'      => '<br' . XHTML . '> Du kan flytte emnet <b>%s</b> til følgende forummer:',
    'splittopicmsg'     => '<br' . XHTML . '>Create a new Topic with this post: "<b>%s</b>"<br' . XHTML . '><em>By:</em>&nbsp;%s&nbsp <em>On:</em>&nbsp;%s',
    'selectforum'       => 'Select new forum:',
    'lockedpost'        => 'Add Reply Post',
    'splitheading'      => 'Split thread option:',
    'splitopt1'         => 'Move all posts from this point',
    'splitopt2'         => 'Move only this one post'
);

$LANG_GF04 = array (
    'label_forum'             => 'Forum Profil',
    'label_location'          => 'Sted',
    'label_aim'               => 'AIM Navn',
    'label_yim'               => 'YIM Navn',
    'label_icq'               => 'ICQ Identitet',
    'label_msnm'              => 'MSN Messenger Navn',
    'label_interests'         => 'Interesser',
    'label_occupation'        => 'Erhverv',
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
    1   => 'Statistics',
    2   => 'Settings',
    3   => 'Forums',
    4   => 'Moderator',
    5   => 'Convert',
    6   => 'Messages',
    7   => 'IP Mgmt'
);


/* User Functions Navbar */
$LANG_GF07 = array (
    1   => 'View Forums',
    2   => 'Preferences',
    3   => 'Popular Topics',
    4   => 'Subscriptions',
    5   => 'Members'
);


/* Forum User Features */
$LANG_GF08 = array (
    1   => 'Topic Notifications',
    2   => 'Track Forum Notifications',
    3   => 'Topic Exception Notifications'
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
    'gfstats'            => 'Forum Statistik',
    'statsmsg'           => 'Her er de nuværende statistikker for dit forum:',
    'totalcats'          => 'Antal Kategorier:',
    'totalforums'        => 'Antal Forummer:',
    'totaltopics'        => 'Antal Emner:',
    'totalposts'         => 'Antal Indlæg:',
    'totalviews'         => 'Antal Læst:',
    'avgpmsg'            => 'Gennemsnitligt antal indlæg pr.:',
    'category'           => 'Kategori:',
    'forum'              => 'Forum:',
    'topic'              => 'Emne:',
    'avgvmsg'            => 'Gennemsnitlig antal læst pr.:'
);

$LANG_GF92 = array (
    'gfsettings'         => 'Forum Indstillinger',
    'showiframe'         => 'Vis Emne gennemsyn:',
    'showiframedscp'     => 'Vis emne gennemsyn (i en ramme) i bunden ved svar på et indlæg',
    'topicspp'           => 'Emner pr. Side:',
    'topicsppdscp'       => 'Antallet af emner der skal vises på forum startsiden',
    'postspp'            => 'Indlæg per Side:',
    'postsppdscp'        => 'Antallet af indlæg der skal vises pr. side',
    'setsavemsg'         => 'Indstillinger gemt.',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => 'Forum Administrator',
    'addcat'             => 'Tilføj Kategori',
    'addforum'           => 'Tilføj Forum',
    'catorder'           => 'Kategori rækkefølge',
    'catadded'           => 'Kategori tilføjet.',
    'catdeleted'         => 'Kategori slettet',
    'catedited'          => 'Kategori slettet.',
    'forumadded'         => 'Forum tilføjet.',
    'forumaddError'      => 'Fejl ved oprettelse af forum.',
    'forumdeleted'       => 'Forum slettet',
    'forumedited'        => 'Forum rettet',
    'forumordered'       => 'Forum rækkefølge ændret',
    'back'               => 'Tilbage',
    'addnote'            => 'Bemærk: Du kan rette disse værdier.',
    'editforumnote'      => 'Ret Forum Detaljer for: <b>"%s"</b>',
    'deleteforumnote1'   => 'Ønsker du at slette forummet <b>"%s"</b>&nbsp;?',
    'editcatnote'        => 'Ret Kategori detaljer for: <b>"%s"</b>',
    'deletecatnote1'     => 'Ønsker du at slette kategorien <b>"%s"</b>&nbsp;?',
    'deletecatnote2'     => 'Alle forummer og emner postet under denne kategori vil også blive slettet.',
    'undercat'           => 'Under kategori',
    'deleteforumnote2'   => 'Alle emner under den vil også blive slettet.',
    'groupaccess'        => 'Gruppe Adgang: ',
    'action'             => 'Handlinger',
    'forumdescription'   => 'Forum Beskrivelse',
    'posts'              => 'Indlæg',
    'ordertitle'         => 'Rækkefølge',
    'ModEdit'            => 'Ret',
    'ModMove'            => 'Flyt',
    'ModStick'           => 'Fastgør',
    'ModBan'             => 'Forbyd',
    'addmoderator'       => "Tilføj\nModerator",
    'delmoderator'       => " Slet\nValgte",
    'moderatorwarning'   => '<b>Advarsel: Ingen forummer defineret</b><br' . XHTML . '><br' . XHTML . '>Opret Forum Kategorier og opret mindst ét forum<br' . XHTML . '>før du tilføjer Moderatorer',
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
    'mod_title'          => 'Forum Moderatorer',
    'allforums'          => 'All Forums'
);

$LANG_GF95 = array (
    'header1'           => 'Discussion Board Messages',
    'header2'           => 'Discussion Board Messages for forum&nbsp;&raquo;&nbsp;%s',
    'notyet'            => 'Faciliteten findes endnu ikke',
    'delall'            => 'Slet Alle',
    'delallmsg'         => 'Er du sikker på at du vil slette alle indlæg i: %s?',
    'underforum'        => '<b>Under Forum: %s (ID #%s)',
    'moderate'          => 'Moderatorfunktioner',
    'nomess'            => 'Der er endnu ikke postet noget! '
);

$LANG_GF96 = array (
    'ip'                 => 'IP',
    'enterip'            => 'Enter below an IP address to ban',
    'gfipman'            => 'IP-adresse Administration',
    'ban'                => 'Forbyd',
    'noips'              => 'Ingen IP-adresser er blevet forbudt endnu!',
    'unban'              => 'Tillad',
    'ipbanned'           => 'IP-addresse Forbudt',
    'banip'              => 'Bekræft IP-adresse Forbud',
    'banipmsg'           => 'Er du sikker på at du vil forbyde disse ip-adresser %s?',
    'specip'             => 'Vælg hvilken IP-addresse du vil forbyde!',
    'ipunbanned'         => 'IP-address Tilladt.',
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
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => TRUE, 'False' => FALSE),
    5 => array('Top Of Page' => 1, 'After Featured Story' => 2, 'Bottom Of Page' => 3),
    6 => array('Left Blocks' => 'leftblocks', 'Right Blocks' => 'rightblocks', 'All Blocks' => 'allblocks', 'No Blocks' => 'noblocks'),
    7 => array('Block Menu' => 'blockmenu', 'Navigation Bar' => 'navbar', 'None' => 'none'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3),
);
?>
