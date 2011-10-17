<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.8.0                                               |
// +---------------------------------------------------------------------------+
// | swedish.php                                                               |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2003 by the following authors:                              |
// |    Insikt           postmaster AT insikt DOT org                          |
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
    'statslabel'        => 'Totalt antal inl�gg',
    'statsheading1'     => 'Topp-10 l�sta �mnen',
    'statsheading2'     => 'Topp-10 besvarade �mnen',
    'statsheading3'     => 'Inga �mnen att rapportera',
    'useradminmenu'     => 'Foruminst�llningar',
    'access_denied'     => '�tkomst nekad',
    'autotag_desc_forum' => '[forum: id alternate title] - Displays a link to a forum topic using the text \'here\' as the title. An alternate title may be specified but is not required.'
);


$LANG_GF01['FORUM']          = 'Forum';
$LANG_GF01['ALL']            = 'All'; 
$LANG_GF01['YES']            = 'Ja';
$LANG_GF01['NO']             = 'Nej';
$LANG_GF01['NEW']            = 'Nya';
$LANG_GF01['NEXT']           = 'N�sta';
$LANG_GF01['ERROR']          = 'Fel!';
$LANG_GF01['CONFIRM']        = 'Bekr�fta';
$LANG_GF01['UPDATE']         = 'Uppdatera';
$LANG_GF01['SAVE']           = 'Spara';
$LANG_GF01['CANCEL']         = 'Avbryt';
$LANG_GF01['ON']             = ' ';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>On: </b>';
$LANG_GF01['BY']             = 'Av: ';
$LANG_GF01['RE']             = '�mne: ';
$LANG_GF01['DATE']           = 'Datum';
$LANG_GF01['VIEWS']          = 'L�sta';
$LANG_GF01['REPLIES']        = 'Svar';
$LANG_GF01['NAME']           = 'Namn:';
$LANG_GF01['DESCRIPTION']    = 'Beskrivning: ';
$LANG_GF01['TOPIC']          = '�mne';
$LANG_GF01['TOPICS']         = '�mnen:';
$LANG_GF01['TOPICSUBJECT']   = 'Titel�mne';
$LANG_GF01['HOMEPAGE']       = 'Home';
$LANG_GF01['SUBJECT']        = '�mne';
$LANG_GF01['HELLO']          = 'Hej ';
$LANG_GF01['MOVED']          = 'Moved';
$LANG_GF01['POSTS']          = 'Postningar';
$LANG_GF01['LASTPOST']       = 'Senaste Inl�gg';
$LANG_GF01['POSTEDON']       = 'Posted on';
$LANG_GF01['POSTEDBY']       = 'Posted By';
$LANG_GF01['PAGES']          = 'Sidor';
$LANG_GF01['TODAY']          = 'Idag klockan ';
$LANG_GF01['REGISTERED']     = 'Registrerad';
$LANG_GF01['ORDERBY']        = 'Sorteringsordning:';
$LANG_GF01['ORDER']          = 'Ordning:';
$LANG_GF01['USER']           = 'Anv�ndare';
$LANG_GF01['GROUP']          = 'Group';
$LANG_GF01['ANON']           = 'Anonym: ';
$LANG_GF01['ADMIN']          = 'Admin';
$LANG_GF01['AUTHOR']         = 'F�rfattare';
$LANG_GF01['NOMOOD']         = 'No Mood';
$LANG_GF01['REQUIRED']       = '[Kr�vs]';
$LANG_GF01['OPTIONAL']       = '[Valfritt]';
$LANG_GF01['SUBMIT']         = 'Skicka';
$LANG_GF01['PREVIEW']        = 'F�rhandsgrandska';
$LANG_GF01['REMOVE']         = 'Ta bort';
$LANG_GF01['EDIT']           = 'Redigera';
$LANG_GF01['DELETE']         = 'Ta bort';
$LANG_GF01['OPTIONS']        = 'Val:';
$LANG_GF01['MISSINGSUBJECT'] = '�mne tomt';
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
$LANG_GF01['back2parent']    = 'F�reg�ende �mne';
$LANG_GF01['forumname']      = '';   // Enter name here if you want it to show in the footer of the admin screens
$LANG_GF01['category']       = 'Kategori: ';
$LANG_GF01['loginreqview']   = '<b>Du m�ste tyv�rr %s registrera dig</a> eller %s logga in </a> f�r att anv�nda detta forum</b>';
$LANG_GF01['loginreqpost']   = '<b>Du m�ste tyv�rr registrera dig eller logga in f�r att skriva inl�gg p� dessa forum</b>';
$LANG_GF01['nolastpostmsg']  = 'N/A';
$LANG_GF01['no_one']         = 'Ingen.';
$LANG_GF01['back2top']       = 'Tillbaks till toppen';
$LANG_GF01['TEXTMODE']       = 'Text Mode:';
$LANG_GF01['HTMLMODE']       = 'HTML Mode:';
$LANG_GF01['TopicPreview']   = 'F�rhandsgrandska �mne';
$LANG_GF01['moderator']      = 'Moderator';
$LANG_GF01['admin']          = 'Admin';
$LANG_GF01['DATEADDED']      = 'Tillagd';
$LANG_GF01['PREVTOPIC']      = 'F�reg�ende �mne';
$LANG_GF01['NEXTTOPIC']      = 'N�sta �mne';
$LANG_GF01['RESYNC']         = "Synkronisera";
$LANG_GF01['RESYNCCAT']      = "ReSync Category Forums";  
$LANG_GF01['EDITICON']       = 'Edit';
$LANG_GF01['QUOTEICON']      = 'Quote';
$LANG_GF01['ProfileLink']    = 'Profile';
$LANG_GF01['WebsiteLink']    = 'Website';
$LANG_GF01['PMLink']         = 'PM';
$LANG_GF01['EmailLink']      = 'Email';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Subscribe to this forum';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'Un-Subscribe to this forum';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'Subscribe:Enabled';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['NEWTOPIC']       = 'New Topic';
$LANG_GF01['POSTREPLY']      = 'Post Reply';
$LANG_GF01['SubscribeLink']  = 'Subscribe';
$LANG_GF01['unSubscribeLink'] = 'Un-Subscribe';
$LANG_GF01['SubscribeLink_TRUE']  = 'Subscribe:Enabled';
$LANG_GF01['SubscribeLink_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['SUBSCRIPTIONS']  = 'Subscriptions';
$LANG_GF01['TOP']            = 'Top of Post';
$LANG_GF01['PRINTABLE']      = 'Printable Version';
$LANG_GF01['USERPREFS']      = 'User Preferences';
$LANG_GF01['SPEEDLIMIT']     = '"Your last comment was %s seconds ago.<br' . XHTML . '>This site requires at least %s seconds between forum posts."';
$LANG_GF01['ACCESSERROR']    = 'ACCESS ERROR';
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
$LANG_GF02['msg05']    = '<center><em>Inga �mnen har skapats �nnu.</em></center>';
$LANG_GF02['msg07']    = 'Anv�ndare Online:';
$LANG_GF02['msg14']    = 'Du har blivit avst�ngd och f�r inte delta.<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'Om du tycker att detta inte st�mmer, kontakta <A HREF="mailto:%s?subject=Guestbook IP Ban">Site Admin</A>.';
$LANG_GF02['msg18']    = 'Problem! Alla f�lten �r inte ifyllda eller f�r kort skrivna.';
$LANG_GF02['msg19']    = 'Ditt meddelande har postats.';
$LANG_GF02['msg22']    = '- Forum Inl�ggsnotis';
$LANG_GF02['msg23a']   = "\nEtt svar har gjorts i tr�den '%s' av %s\n\nDetta �mne p�b�rjades av: %s i %s forum.\n";
$LANG_GF02['msg23b']   = "Ett nytt �mne '%s' har skickats av %s i %s's forum p� %s websidan.\nDu kan l�sa det p�: %s/forum/viewtopic.php?forum=%s&showtopic=%s\n";
$LANG_GF02['msg23c']   = "\nDu kan l�sa det p�: %s/forum/index.php?forum=%s&showtopic=%s\n";
$LANG_GF02['msg25']    = "\nHa en bra dag! \n";
$LANG_GF02['msg26']    = "\nDu har f�tt detta mail f�r att du har valt att f� en notis n�r ett svar har gjorts till �mnet. \n";
$LANG_GF02['msg27']    = 'F�r att sluta bevaka detta �mne tryck <a href="%s">h�r</a> f�r att avbryta det.';
$LANG_GF02['msg33']    = 'Namn: [Kr�vs]';
$LANG_GF02['msg36']    = 'Hum�r: [Valfritt]';
$LANG_GF02['msg38']    = 'Meddela mig vid svar ';
$LANG_GF02['msg40']    = '<br' . XHTML . '>Du har redan bett om att f� meddelande vid svar p� detta �mne.<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg44']    = 'Du har inga nya rapporter.';
$LANG_GF02['msg49']    = '(L�st %s g�nger) ';
$LANG_GF02['msg55']    = 'Inl�gget raderat.';
$LANG_GF02['msg56']    = 'IP Bannlyst.';
$LANG_GF02['msg59']    = 'Normalt �mne';
$LANG_GF02['msg60']    = 'Nytt inl�gg';
$LANG_GF02['msg61']    = 'Klistrat �mne';
$LANG_GF02['msg62']    = 'Meddela mig vid svar';
$LANG_GF02['msg64']    = '�r du s�ker p� att du vill ta bort �mnet %s som heter: %s ?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>Detta �r ett huvud�mne, s� alla svar som postats i kedjan kommer ocks� raderas.';
$LANG_GF02['msg68']    = 'OBS! VAR F�RSIKTIG N�R DU BANNAR/UTESLUTER, endast administrat�rer har r�ttigheter att ta bort s�dant.';
$LANG_GF02['msg69']    = '<br' . XHTML . '>Vill du verkligen utesluta ipadressen %s?';
$LANG_GF02['msg71']    = 'Ingen funktion �r vald, v�lj en post och sedan en moderatorfunktion.<br' . XHTML . '>OBS! Du m�ste vara moderator f�r att f� utf�ra dessa funktioner.';
$LANG_GF02['msg72']    = 'Om meddelandet �r online s� har du inte r�tt att utf�ra denna moderatorfunktion.';
$LANG_GF02['msg74']    = 'Senaste %s foruminl�gg';
$LANG_GF02['msg75']    = 'Topp %s �mnen efter visningar';
$LANG_GF02['msg76']    = 'Topp %s �mnen efter postningar';
$LANG_GF02['msg77']    = '<br' . XHTML . '>Du skall inte vara h�r!<br' . XHTML . '>Detta forum har begr�nsad tillg�ng.';
$LANG_GF02['msg83']    = '<br' . XHTML . '>Du m�ste vara inloggad f�r att anv�nda denna funktion.<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg84']    = 'Markera alla �mnen som l�sta';
$LANG_GF02['msg85']    = 'G� till sida:';
$LANG_GF02['msg86']    = '&nbsp;Senaste %s inl�ggen av&nbsp;';
$LANG_GF02['msg87']    = '<br' . XHTML . '>Varning: Detta �mnet �r l�st av moderatorn.<br' . XHTML . '>Inga fler inl�gg �r till�tna';
$LANG_GF02['msg88']    = 'Mitt forums medlemmar';
$LANG_GF02['msg88b']   = 'Forum Activity Only';
$LANG_GF02['msg89']    = 'Mina aktiva bevakningar';
$LANG_GF02['msg101']   = 'Forum Regler:';
$LANG_GF02['msg103']   = 'Hoppa till forum:';
$LANG_GF02['msg106']   = 'V�lj ett forum';
$LANG_GF02['msg108']   = 'Normalt Forum';
$LANG_GF02['msg109']   = 'L�st �mne';        
$LANG_GF02['msg110']   = 'G�r till sida f�r meddelanderedigering..';
$LANG_GF02['msg111']   = 'Nya inl�gg sedan senaste bes�ket:';
$LANG_GF02['msg112']   = 'L�s nya inl�gg';
$LANG_GF02['msg113']   = 'L�s nya inl�gg i detta forum';
$LANG_GF02['msg114']   = 'L�st �mne';
$LANG_GF02['msg115']   = 'Klistrat �mne M/ Nya inl�gg';
$LANG_GF02['msg116']   = 'L�st �mne M/ Nya inl�gg';
$LANG_GF02['msg117']   = 'S�k alla';
$LANG_GF02['msg118']   = 'S�k i detta forum';
$LANG_GF02['msg119']   = 'S�kresultat:';
$LANG_GF02['msg120']   = 'Mest l�sta inl�gg';
$LANG_GF02['msg121']   = 'All times are %s. Klockan �r nu %s.';
$LANG_GF02['msg122']   = 'Popul�r Gr�ns:';
$LANG_GF02['msg123']   = 'Antal inl�gg innan popul�rgr�nsen uppn�s';
$LANG_GF02['msg126']   = 'S�k rader:';
$LANG_GF02['msg127']   = 'Antal rader att visa i s�kresultat';
$LANG_GF02['msg128']   = 'Medlemmar per sida:';
$LANG_GF02['msg129']   = 'For the Members listing screen';
$LANG_GF02['msg130']   = 'Visa anonyma inl�gg:';
$LANG_GF02['msg131']   = 'Till�ter dig att filtrera bort anonyma inl�gg?';
$LANG_GF02['msg132']   = 'Meddela alltid:';
$LANG_GF02['msg133']   = 'Aktivera automatisk bevakning p� alla dina �mnen';
$LANG_GF02['msg134']   = 'Prenumerationen �r upplagd';
$LANG_GF02['msg135']   = 'Du kommer nu meddelas om alla nya inl�gg p� detta forum.';
$LANG_GF02['msg136']   = 'Du m�ste v�lja ett forum att prenumerera p�.';
$LANG_GF02['msg137']   = 'Bevakning av �mnet �r aktiverat';
$LANG_GF02['msg138']   = '<b>Prenumerera p� hela forumet</b>';
$LANG_GF02['msg142']   = 'Bevakning sparad.';
$LANG_GF02['msg144']   = '�terg� till �mne';
$LANG_GF02['msg146']   = 'Raderat';
$LANG_GF02['msg147']   = 'Forum [utskriftsv�nlig version av �mne';
$LANG_GF02['msg148']   = 'Tryck <a href="javascript:history.back()">H�R</a> f�r att �terv�nda';
$LANG_GF02['msg155']   = 'Inga inl�gg.';
$LANG_GF02['msg156']   = 'Totalt antal foruminl�gg';
$LANG_GF02['msg157']   = 'Senaste 10 inl�ggen';
$LANG_GF02['msg158']   = 'Senaste 10 inl�ggen av ';
$LANG_GF02['msg159']   = 'Are you sure you want to DELETE these selected Moderator records?';
$LANG_GF02['msg160']   = 'View last page of topic';
$LANG_GF02['msg163']   = 'Post moved';
$LANG_GF02['msg164']   = 'Mark all Categories and Topics Read';
$LANG_GF02['msg166']   = 'ERROR: Invalid topic or Topic not found';
$LANG_GF02['msg167']   = 'Notification Option';
$LANG_GF02['msg168']   = 'Setting of No will disable email notifictions';
$LANG_GF02['msg169']   = 'Return to Members listing';
$LANG_GF02['msg170']   = 'Latest Forum Posts';
$LANG_GF02['msg171']   = 'Forum Access Error';
$LANG_GF02['msg172']   = 'Topic does not exist. It possibly has been deleted';
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
$LANG_GF02['PostReply']   = 'Post New Reply';
$LANG_GF02['PostTopic']   = 'Post New Topic';
$LANG_GF02['EditTopic']   = 'Edit Topic';
$LANG_GF02['quietforum']  = 'Forum has no new topics';

$LANG_GF03 = array (
    'delete'            => 'Radera inl�gg',
    'edit'              => 'Redigera inl�gg',
    'move'              => 'Flytta �mne',
    'split'             => 'Split Topic',
    'ban'               => 'Bannlys IP',
    'movetopic'         => 'Flytta �mne',
    'movetopicmsg'      => '<br' . XHTML . '> Du har tillst�nd att flytta �mnet <b>%s</b> till f�ljande forum:',
    'splittopicmsg'     => '<br' . XHTML . '>Create a new Topic with this post: "<b>%s</b>"<br' . XHTML . '><em>By:</em>&nbsp;%s&nbsp <em>On:</em>&nbsp;%s',
    'selectforum'       => 'Select new forum:',
    'lockedpost'        => 'Add Reply Post',
    'splitheading'      => 'Split thread option:',
    'splitopt1'         => 'Move all posts from this point',
    'splitopt2'         => 'Move only this one post'
);

$LANG_GF04 = array (
    'label_forum'             => 'Forum Profil',
    'label_location'          => 'Plats',
    'label_aim'               => 'AIM-Namn',
    'label_yim'               => 'YIM-Namn',
    'label_icq'               => 'ICQ-Identitet',
    'label_msnm'              => 'MS Messenger-Namn',
    'label_interests'         => 'Intressen',
    'label_occupation'        => 'Syssels�ttning',
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
    'gfstats'            => 'Geekforum Statistik',
    'statsmsg'           => 'Nuvarande statistik f�r ditt forum:',
    'totalcats'          => 'Totalt antal Kategorier:',
    'totalforums'        => 'Totalt antal Forum:',
    'totaltopics'        => 'Totalt antal �mnen:',
    'totalposts'         => 'Totalt antal Inl�gg:',
    'totalviews'         => 'Totalt antal Visningar:',
    'avgpmsg'            => 'Genomsnittligt antal inl�gg per:',
    'category'           => 'Kategori:',
    'forum'              => 'Forum:',
    'topic'              => 'Topic:',
    'avgvmsg'            => 'Genomsnittligt antal visningar per:'
);

$LANG_GF92 = array (
    'gfsettings'      => 'Geekforum Inst�llningar',
    'showiframe'         => 'Visa �mnesgranskningar:',
    'showiframedscp'     => 'Visa �mnesgranskningar (Iframe) i botten vid besvarande av �mne',
    'topicspp'           => '�mnen per sida:',
    'topicsppdscp'       => 'Antal �mnen att visa i forumindex',
    'postspp'            => 'Inl�gg per sida:',
    'postsppdscp'        => 'Antal inl�gg att visa per sida',
    'setsavemsg'         => 'Inst�llningar sparade.',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => 'Geekforum �mnesomr�den',
    'addcat'             => 'L�gg till kategori',
    'addforum'           => 'L�gg till forum',
    'catorder'           => 'Kategori-Ordning',
    'catadded'           => 'Kategori Tillagd.',
    'catdeleted'         => 'Kategori Borttagen',
    'catedited'          => 'Kategori Redigerad.',
    'forumadded'         => 'Forum tillagt.',
    'forumaddError'      => 'Error Adding Forum.',
    'forumdeleted'       => 'Forum borttaget',
    'forumedited'        => 'Forum redigerat',
    'forumordered'       => 'Forum-Ordning Redigerad',
    'back'               => 'Tillbaks',
    'addnote'            => 'OBS: Du kan �ndra detta senare.',
    'editforumnote'      => '<br' . XHTML . '>�ndra egenskaper i forum f�r: <b>"%s"</b>',
    'deleteforumnote1'   => 'Vill du ta bort forumet <b>"%s"</b>&nbsp;?',
    'editcatnote'        => '<br' . XHTML . '>Redigera kategoriegenskaper f�r: <b>"%s"</b>',
    'deletecatnote1'     => 'Vill du radera kategorin <b>"%s"</b>&nbsp;?',
    'deletecatnote2'     => 'Alla forum och �mnen som skickats under dessa forum kommer ocks� att raderas.',
    'undercat'           => 'Under kategori',
    'deleteforumnote2'   => 'Alla �mnen som postats under kommer ocks� att raderas.',
    'groupaccess'        => 'Grupp Access: ',
    'action'             => 'Actions',
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
    'mod_title'          => 'Forum Moderatorer',
    'allforums'          => 'All Forums'
);

$LANG_GF95 = array (
    'header1'           => 'Discussion Board Messages',
    'header2'           => 'Discussion Board Messages for forum&nbsp;&raquo;&nbsp;%s',
    'notyet'            => 'Funktionen har inte lagts till �n',
    'delall'            => 'Radera alla',
    'delallmsg'         => '�r du s�ker p� att du vill radera alla meddelanden fr�n: %s?',
    'underforum'        => '<b>Under Forum: %s (ID #%s)',
    'moderate'          => 'Moderera',
    'nomess'            => 'Det har inte skickats n�gra meddelanden �n! '
);

$LANG_GF96 = array (
    'ip'                 => 'IP',
    'enterip'            => 'Enter below an IP address to ban',
    'gfipman'            => 'IP-Hantering',
    'ban'                => 'Banna',
    'noips'              => '<p style="margin:0px; padding:5px;">Inga ipdresser har bannats �nnu!</p>',
    'unban'              => 'Ta bort ban',
    'ipbanned'           => 'Bannad IPAdress',
    'banip'              => 'Bekr�fta bannad ip',
    'banipmsg'           => '�r du s�ker p� att du vill banna %s?',
    'specip'             => 'Specificera en ipadress som skall bannas!',
    'ipunbanned'         => 'IPAdressen bannas inte l�ngre.',
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
