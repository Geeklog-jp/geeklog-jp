<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.8.0                                               |
// +---------------------------------------------------------------------------+
// | dutch_utf-8.php                                                           |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2011 by the following authors:                              |
// |    Zippo            Zippohontas AT gmail DOT com                          |
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

$PLG_forum_MESSAGE1 = 'Forum Plugin Upgrade: Update succesvol voltooid.';
$PLG_forum_MESSAGE2 = 'Forum Plugin upgrade: We kunnen deze versie niet automatisch updaten. Kijk in de plugin documentatie.';
$PLG_forum_MESSAGE5 = 'Forum Plugin Upgrade gefaald - controleer error.log';
$PLG_forum_MESSAGE3002 = $LANG32[9];

$LANG_GF00 = array (
    'pluginlabel'       => 'Forum',         // What shows up in the siteHeader
    'searchlabel'       => 'Forum',
    'statslabel'        => 'Totaal Aantal Forum Berichten',
    'statsheading1'     => 'Forum Top 10 Gelezen Berichten',
    'statsheading2'     => 'Forum Top 10 Reageer Berichten',
    'statsheading3'     => 'Geen Onderwerpen om over te rapporten',
    'useradminmenu'     => 'Forum Opties',
    'access_denied'     => 'Toegang Geweigerd',
    'autotag_desc_forum' => '[forum: id alternate title] - Laat een link zien naar een forum bericht met de tekst \'here\' als de titel. Een alternatieve titel mag gegeven worden maar is niet verplicht.'
);


$LANG_GF01['FORUM']          = 'Forum';
$LANG_GF01['ALL']            = 'Alle'; 
$LANG_GF01['YES']            = 'Ja';
$LANG_GF01['NO']             = 'Nee';
$LANG_GF01['NEW']            = 'Nieuw';
$LANG_GF01['NEXT']           = 'Volgende';
$LANG_GF01['ERROR']          = 'Fout!';
$LANG_GF01['CONFIRM']        = 'Bevestig';
$LANG_GF01['UPDATE']         = 'Update';
$LANG_GF01['SAVE']           = 'Bewaar';
$LANG_GF01['CANCEL']         = 'Annuleer';
$LANG_GF01['ON']             = 'Aan: ';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>Aan: </b>';
$LANG_GF01['BY']             = 'Door: ';
$LANG_GF01['RE']             = 'Re: ';
$LANG_GF01['DATE']           = 'Datum';
$LANG_GF01['VIEWS']          = 'Gelezen';
$LANG_GF01['REPLIES']        = 'Reacties';
$LANG_GF01['NAME']           = 'Naam:';
$LANG_GF01['DESCRIPTION']    = 'Omschrijving: ';
$LANG_GF01['TOPIC']          = 'Topic';
$LANG_GF01['TOPICS']         = 'Topics:';
$LANG_GF01['TOPICSUBJECT']   = 'Topic Onderwerp';
$LANG_GF01['HOMEPAGE']       = 'Home';
$LANG_GF01['SUBJECT']        = 'Onderwerp';
$LANG_GF01['HELLO']          = 'Hallo ';
$LANG_GF01['MOVED']          = 'Verplaatst';
$LANG_GF01['POSTS']          = 'Berichten';
$LANG_GF01['LASTPOST']       = 'Laatste Bericht';
$LANG_GF01['POSTEDON']       = 'Geplaatst op';
$LANG_GF01['POSTEDBY']       = 'Geplaatst door';
$LANG_GF01['PAGES']          = 'Paginas';
$LANG_GF01['TODAY']          = 'Vandaag om ';
$LANG_GF01['REGISTERED']     = 'Geregistreerd';
$LANG_GF01['ORDERBY']        = 'Order:&nbsp;';
$LANG_GF01['ORDER']          = 'Order:';
$LANG_GF01['USER']           = 'Gebruiker';
$LANG_GF01['GROUP']          = 'Groep';
$LANG_GF01['ANON']           = 'Anoniem: ';
$LANG_GF01['ADMIN']          = 'Admin';
$LANG_GF01['AUTHOR']         = 'Schrijver';
$LANG_GF01['NOMOOD']         = 'Geen Humeur';
$LANG_GF01['REQUIRED']       = '[Verplicht]';
$LANG_GF01['OPTIONAL']       = '[Optioneel]';
$LANG_GF01['SUBMIT']         = 'Verstuur';
$LANG_GF01['PREVIEW']        = 'Voorbeeld';
$LANG_GF01['REMOVE']         = 'Verwijder';
$LANG_GF01['EDIT']           = 'Bewerk';
$LANG_GF01['DELETE']         = 'Verwijder';
$LANG_GF01['OPTIONS']        = 'Opties:';
$LANG_GF01['MISSINGSUBJECT'] = 'Onderwerp is leeg';
$LANG_GF01['MIGRATE_NOW']    = 'Voeg samen NU'; 
$LANG_GF01['FILTERLIST']     = 'Filter Lijst';
$LANG_GF01['SELECTFORUM']    = 'Selecteer Forum';
$LANG_GF01['DELETEAFTER']    = 'Verwijder na';
$LANG_GF01['TITLE']          = 'Titel';
$LANG_GF01['COMMENTS']       = 'Commentaar'; 
$LANG_GF01['SUBMISSIONS']    = 'Plaatsingen';
$LANG_GF01['HTML_FILTER_MSG']  = 'Beperkt HTML Toegestaan';
$LANG_GF01['HTML_FULL_MSG']  = 'Volledig HTML Toegestaan';
$LANG_GF01['HTML_MSG']       = 'HTML Toegestaan';
$LANG_GF01['CENSOR_PERM_MSG']  = 'Gecensoreerde Inhoud';
$LANG_GF01['ANON_PERM_MSG']    = 'Bekijk Anonieme Berichten';
$LANG_GF01['POST_PERM_MSG1']    = 'kan plaatsen';
$LANG_GF01['POST_PERM_MSG2']    = 'Anonieme gebruikers kunnen plaatsen';
$LANG_GF01['GO']             = 'GA';
$LANG_GF01['STATUS']         = 'Status:';
$LANG_GF01['ONLINE']         = 'online';
$LANG_GF01['OFFLINE']        = 'offline';
$LANG_GF01['back2parent']    = 'Hoofd Topic';
$LANG_GF01['forumname']      = '';   // Enter name here if you want it to show in the footer of the admin screens
$LANG_GF01['category']       = 'Categorie: ';
$LANG_GF01['loginreqview']   = '<b>Sorry je moet %s geregistreerd zijn</a> of %s login </a> om deze fora te gebruiken</b>';
$LANG_GF01['loginreqpost']   = '<b>Sorry je moet registreren of inloggen op deze fora te plaatsen</b>';
$LANG_GF01['nolastpostmsg']  = 'Nvt';
$LANG_GF01['no_one']         = 'Geen een.';
$LANG_GF01['back2top']       = 'Naar boven';
$LANG_GF01['TEXTMODE']       = 'Tekst Mode:';
$LANG_GF01['HTMLMODE']       = 'HTML Mode:';
$LANG_GF01['TopicPreview']   = 'Topic voorbeeld';
$LANG_GF01['moderator']      = 'Moderator';
$LANG_GF01['admin']          = 'Admin';
$LANG_GF01['DATEADDED']      = 'Datum toegevoegd';
$LANG_GF01['PREVTOPIC']      = 'Vorig Topic';
$LANG_GF01['NEXTTOPIC']      = 'Volgend Topic';
$LANG_GF01['RESYNC']         = "ReSync";
$LANG_GF01['RESYNCCAT']      = "ReSync Categorie Fora";  
$LANG_GF01['EDITICON']       = 'Bewerk';
$LANG_GF01['QUOTEICON']      = 'Quote';
$LANG_GF01['ProfileLink']    = 'Profiel';
$LANG_GF01['WebsiteLink']    = 'Website';
$LANG_GF01['PMLink']         = 'PM';
$LANG_GF01['EmailLink']      = 'Email';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Abonneer op dit forum';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'Stop Abonnement op dit forum';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'Abonnement: Aan';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'Abonnement:Uit';
$LANG_GF01['NEWTOPIC']       = 'Nieuw Topic';
$LANG_GF01['POSTREPLY']      = 'Plaats Reactie';
$LANG_GF01['SubscribeLink']  = 'Abonneer';
$LANG_GF01['unSubscribeLink'] = 'Stop Abonnement';
$LANG_GF01['SubscribeLink_TRUE']  = 'Abonnement: Aan';
$LANG_GF01['SubscribeLink_FALSE'] = 'Abonnement:Uit';
$LANG_GF01['SUBSCRIPTIONS']  = 'Abonnementen';
$LANG_GF01['TOP']            = 'Bovenkant van bericht';
$LANG_GF01['PRINTABLE']      = 'Afdruk Versie';
$LANG_GF01['USERPREFS']      = 'Gebruiker Voorkeuren';
$LANG_GF01['SPEEDLIMIT']     = '"Je laatste commentaar was %s seconden geleden.<br' . XHTML . '>Deze site verplicht minstens %s seconden tussen plaatsingen."';
$LANG_GF01['ACCESSERROR']    = 'TOEGANG FOUT';
$LANG_GF01['ACTIONS']        = 'Acties';
$LANG_GF01['DELETEALL']      = 'Verwijder alle geselecteerde records';
$LANG_GF01['DELCONFIRM']     = 'Ben je zeker om de gelecteerde records te VERWIJDEREN?';
$LANG_GF01['DELALLCONFIRM']  = 'Ben je zeker om ALLE gelecteerde records te VERWIJDEREN?';
$LANG_GF01['STARTEDBY']      = 'Gestart door:';
$LANG_GF01['WARNING']        = 'Waarschuwing';
$LANG_GF01['MODERATED']      = 'Moderators: %s';
$LANG_GF01['LASTREPLYBY']    = 'Laatste reactie door:&nbsp;%s';
$LANG_GF01['UID']            = 'UID';
$LANG_GF01['INDEXPAGE']      = 'Forum Index';
$LANG_GF01['FEATURE']        = 'Optie';
$LANG_GF01['SETTING']        = 'Instelling';
$LANG_GF01['MARKALLREAD']    = 'Markeer AllE als gelezen';
$LANG_GF01['MSG_NO_CAT']     = 'Geen Categorieen of Fora Gedefineerd';

// Language for bbcode toolbar
$LANG_GF01['CODE']           = 'Code';
$LANG_GF01['FONTCOLOR']      = 'Font Kleur';
$LANG_GF01['FONTSIZE']       = 'Font Grootte';
$LANG_GF01['CLOSETAGS']      = 'Sluit Tags';
$LANG_GF01['CODETIP']        = 'Tip: Stijlen kunnen snel geactiveerd worden aan geselecteerde tekst';
$LANG_GF01['TINY']           = 'Erg klein';
$LANG_GF01['SMALL']          = 'Klein';
$LANG_GF01['NORMAL']         = 'Normaal';
$LANG_GF01['LARGE']          = 'Groot';
$LANG_GF01['HUGE']           = 'Enorm';
$LANG_GF01['DEFAULT']        = 'Standaard';
$LANG_GF01['DKRED']          = 'Donker Rood';
$LANG_GF01['RED']            = 'Rood';
$LANG_GF01['ORANGE']         = 'Oranje';
$LANG_GF01['BROWN']          = 'Bruin';
$LANG_GF01['YELLOW']         = 'Geel';
$LANG_GF01['GREEN']          = 'Groen';
$LANG_GF01['OLIVE']          = 'Olijf';
$LANG_GF01['CYAN']           = 'Cyaan';
$LANG_GF01['BLUE']           = 'Blauw';
$LANG_GF01['DKBLUE']         = 'Donker Blauw';
$LANG_GF01['INDIGO']         = 'Indigo';
$LANG_GF01['VIOLET']         = 'Violet';
$LANG_GF01['WHITE']          = 'Wit';
$LANG_GF01['BLACK']          = 'Zwart';

$LANG_GF01['b_help']         = "Vet tekst: [b]tekst[/b]";
$LANG_GF01['i_help']         = "Italic tekst: [i]tekst[/i]";
$LANG_GF01['u_help']         = "Onderstreept tekst: [u]tekst[/u]";
$LANG_GF01['q_help']         = "Quote tekst: [quote]tekst[/quote]";
$LANG_GF01['c_help']         = "Code laten zien: [code]code[/code]";
$LANG_GF01['l_help']         = "Lijst: [list]tekst[/list]";
$LANG_GF01['o_help']         = "Geordende lijst: [olist]tekst[/olist]";
$LANG_GF01['p_help']         = "[img]http://image_url[/img]  or [img w=100 h=200][/img]";
$LANG_GF01['w_help']         = "Voeg in URL: [url]http://url[/url] or [url=http://url]URL tekst[/url]";
$LANG_GF01['a_help']         = "Sluit alle geopende bbCode tags";
$LANG_GF01['s_help']         = "Font kleur: [color=red]tekst[/color]  Tip: je can also use color=#FF0000";
$LANG_GF01['f_help']         = "Font grootte: [size=7]small tekst[/size]";
$LANG_GF01['h_help']         = "Klik voor meer gedetailleerde hulp";


$LANG_GF02['msg01']    = 'Sorry you must register to use these forums';
$LANG_GF02['msg02']    = 'You should not be here!<br' . XHTML . '>Restricted access to this forum only';
$LANG_GF02['msg03']    = 'Please wait while you are redirected';
$LANG_GF02['msg05']    = '<center><em>Sorry, no topics have been created yet.</em></center>';
$LANG_GF02['msg07']    = 'Online Users:';
$LANG_GF02['msg14']    = 'Sorry, You have been banned from making entries.<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'If you feel this is an error, contact <a href="mailto:%s?subject=Forum IP Ban">Site Admin</a>.';
$LANG_GF02['msg18']    = 'Error! Not all required fields were completed or were too short in length.';
$LANG_GF02['msg19']    = 'Your message has been posted.';
$LANG_GF02['msg22']    = '- Forum Post Notification';
$LANG_GF02['msg23a']   = "A reply has been made to the thread '%s' by %s.\n\nThis topic was started by %s in the %s forum. ";
$LANG_GF02['msg23b']   = "A new topic '%s' has been posted by %s in the %s forum on the %s website. You may view it at:\n%s/forum/viewtopic.php?showtopic=%s\n";
$LANG_GF02['msg23c']   = "You may view it at:\n%s/forum/viewtopic.php?showtopic=%s&lastpost=true\n";
$LANG_GF02['msg25']    = "\nHave a great day! \n";
$LANG_GF02['msg26']    = "\nYou are receiving this email because you have chosen to be notified when a reply has been made to this topic. ";
$LANG_GF02['msg27']    = "To stop receiving notifications on this topic go to <%s> to remove it.\n";
$LANG_GF02['msg33']    = 'Author: ';
$LANG_GF02['msg36']    = 'Mood:';
$LANG_GF02['msg38']    = 'Notify me of replies ';
$LANG_GF02['msg40']    = '<br' . XHTML . '>Sorry, but you have already asked to be notified of replies to this topic.<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg44']    = '<p style="margin:0px; padding:5px;">You have no notifications currently.</p>';
$LANG_GF02['msg49']    = '(Read %s times) ';
$LANG_GF02['msg55']    = 'Post Deleted.';
$LANG_GF02['msg56']    = 'IP Banned.';
$LANG_GF02['msg59']    = 'Normal Topic';
$LANG_GF02['msg60']    = 'New Post';
$LANG_GF02['msg61']    = 'Sticky Topic';
$LANG_GF02['msg62']    = 'Notify me of replies';
$LANG_GF02['msg64']    = 'Are you sure you want to delete topic %s titled: %s ?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>This is a parent topic, so all replies posted to it will also be deleted.';
$LANG_GF02['msg68']    = 'Note: BE CAREFUL WHEN YOU BAN, only admins have the rights to unban someone.';
$LANG_GF02['msg69']    = 'Do you really want to ban the ip address: %s?';
$LANG_GF02['msg71']    = 'No function selected, choose a post and then a moderator function.<br' . XHTML . '>Note: You must be a moderator to perform these functions.';
$LANG_GF02['msg72']    = 'Warning, you do not have rights to perform this moderation function.';
$LANG_GF02['msg74']    = 'Latest %s Forum Posts';
$LANG_GF02['msg75']    = 'Top %s Topics By Views';
$LANG_GF02['msg76']    = 'Top %s Topics By Posts';
$LANG_GF02['msg77']    = '<br' . XHTML . '><p style="padding-left:10px;">You should not be here!<br' . XHTML . '>Restricted access to this forum only.</p>';
$LANG_GF02['msg83']    = '<br' . XHTML . '><br' . XHTML . '><p>You need to be signed in to use this forum feature.</p>';
$LANG_GF02['msg84']    = 'Mark all topics read';
$LANG_GF02['msg85']    = 'Page:';
$LANG_GF02['msg86']    = '&nbsp;Last %s posts&nbsp;';
$LANG_GF02['msg87']    = '<br' . XHTML . '>Warning: This topic has been locked by the moderator.<br' . XHTML . '>No additional posts are permitted';
$LANG_GF02['msg88']    = 'Site Members';
$LANG_GF02['msg88b']   = 'Forum Activity Only';
$LANG_GF02['msg89']    = 'My Enabled Notifications';
$LANG_GF02['msg101']   = 'Forum Rules:';
$LANG_GF02['msg103']   = 'Forum Jump:';
$LANG_GF02['msg106']   = 'Select a Forum';
$LANG_GF02['msg108']   = 'Active Forum';
$LANG_GF02['msg109']   = 'Locked Topic';
$LANG_GF02['msg110']   = 'Transferring to message edit page..';
$LANG_GF02['msg111']   = 'New posts since your last visit';
$LANG_GF02['msg112']   = 'View all new posts';
$LANG_GF02['msg113']   = 'View new posts';
$LANG_GF02['msg114']   = 'Locked Topic';
$LANG_GF02['msg115']   = 'Sticky Topic W/ New Post';
$LANG_GF02['msg116']   = 'Locked Topic W/ New Post';
$LANG_GF02['msg117']   = 'Search All';
$LANG_GF02['msg118']   = 'Search This Forum';
$LANG_GF02['msg119']   = 'Forum Search results for the query:';
$LANG_GF02['msg120']   = 'Most popular posts by';
$LANG_GF02['msg121']   = 'All times are %s. The time is now %s.';
$LANG_GF02['msg122']   = 'Popular Limit';
$LANG_GF02['msg123']   = 'Number of posts before calling a topic popular';
$LANG_GF02['msg126']   = 'Search Lines';
$LANG_GF02['msg127']   = 'Number of lines to display in search results';
$LANG_GF02['msg128']   = 'Members Per Page';
$LANG_GF02['msg129']   = 'For the Members listing screen';
$LANG_GF02['msg130']   = 'View Anonymous Posts';
$LANG_GF02['msg131']   = 'Setting of No will filter out anonymous posts';
$LANG_GF02['msg132']   = 'Always Notify';
$LANG_GF02['msg133']   = 'Setting of Yes will enable auto notifcation for any topics you create or reply';
$LANG_GF02['msg134']   = 'Subscription Added';
$LANG_GF02['msg135']   = 'You will now be notified of all posts to this forum.';
$LANG_GF02['msg136']   = 'You must choose a forum to subscribe to.';
$LANG_GF02['msg137']   = 'Notification for topic enabled';
$LANG_GF02['msg138']   = '<b>Subscribed to complete forum</b>';
$LANG_GF02['msg142']   = 'Notification saved.';
$LANG_GF02['msg144']   = 'Return to topic';
$LANG_GF02['msg146']   = 'Notification Deleted';
$LANG_GF02['msg147']   = 'Forum [printable version of topic';
$LANG_GF02['msg148']   = 'Click <a href="javascript:history.back()">HERE</a> to return';
$LANG_GF02['msg155']   = 'No user posts.';
$LANG_GF02['msg156']   = 'Total number of forum posts';
$LANG_GF02['msg157']   = 'Last 10 Forum posts';
$LANG_GF02['msg158']   = 'Last 10 Forum posts by ';
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
    'delete'            => 'Delete Post',
    'edit'              => 'Edit Post',
    'move'              => 'Move Topic',
    'split'             => 'Split Topic',
    'ban'               => 'Ban IP',
    'movetopic'         => 'Move Topic',
    'movetopicmsg'      => '<br' . XHTML . '>Topic to be moved: "<b>%s</b>"',
    'splittopicmsg'     => '<br' . XHTML . '>Create a new Topic with this post: "<b>%s</b>"<br' . XHTML . '><em>By:</em>&nbsp;%s&nbsp <em>On:</em>&nbsp;%s',
    'selectforum'       => 'Select new forum:',
    'lockedpost'        => 'Add Reply Post',
    'splitheading'      => 'Split thread option:',
    'splitopt1'         => 'Move all posts from this point',
    'splitopt2'         => 'Move only this one post'
);

$LANG_GF04 = array (
    'label_forum'             => 'Forum Profile',
    'label_location'          => 'Location',
    'label_aim'               => 'AIM Handle',
    'label_yim'               => 'YIM Handle',
    'label_icq'               => 'ICQ Identity',
    'label_msnm'              => 'MS Messenger Name',
    'label_interests'         => 'Interests',
    'label_occupation'        => 'Occupation',
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
    'gfstats'            => 'Discussion Forum Stats',
    'statsmsg'           => 'Here are the current statistics for your forum:',
    'totalcats'          => 'Total Categories:',
    'totalforums'        => 'Total Forums:',
    'totaltopics'        => 'Total Topics:',
    'totalposts'         => 'Total Posts:',
    'totalviews'         => 'Total Views:',
    'avgpmsg'            => 'Average posts per:',
    'category'           => 'Category:',
    'forum'              => 'Forum:',
    'topic'              => 'Topic:',
    'avgvmsg'            => 'Average views per:'
);

$LANG_GF92 = array (
    'gfsettings'         => 'Discussion Forum Settings',
    'showiframe'         => 'Show Topic Review',
    'showiframedscp'     => 'Show Topic Review (Iframe) at bottom when replying to a topic',
    'topicspp'           => 'Topics Per Page',
    'topicsppdscp'       => 'Number of topics to display when viewing the forum index',
    'postspp'            => 'Posts Per Page',
    'postsppdscp'        => 'Number of posts to show per page',
    'setsavemsg'         => 'Settings saved.',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => 'Discussion Forum Board Admin',
    'addcat'             => 'Add Forum Category',
    'addforum'           => 'Add A Forum',
    'catorder'           => 'Category Order',
    'catadded'           => 'Category Added.',
    'catdeleted'         => 'Category Deleted',
    'catedited'          => 'Category Edited.',
    'forumadded'         => 'Forum Added.',
    'forumaddError'      => 'Error Adding Forum.',
    'forumdeleted'       => 'Forum Deleted',
    'forumedited'        => 'Forum Edited',
    'forumordered'       => 'Forum Order Edited',
    'back'               => 'Back',
    'addnote'            => 'Note: You can edit these values.',
    'editforumnote'      => 'Edit Forum Details for: <b>"%s"</b>',
    'deleteforumnote1'   => 'Do you want to delete the forum <b>"%s"</b>&nbsp;?',
    'editcatnote'        => 'Edit Category Details for: <b>"%s"</b>',
    'deletecatnote1'     => 'Do you want to delete the category <b>"%s"</b>&nbsp;?',
    'deletecatnote2'     => 'All forums and topics posted under those forums will also be deleted.',
    'undercat'           => 'Under Category',
    'deleteforumnote2'   => 'All topics posted under it will also be deleted.',
    'groupaccess'        => 'Group Access: ',
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
    'mod_title'          => 'Forum Moderators',
    'allforums'          => 'All Forums'
);

$LANG_GF95 = array (
    'header1'           => 'Discussion Board Messages',
    'header2'           => 'Discussion Board Messages for forum&nbsp;&raquo;&nbsp;%s',
    'notyet'            => 'Feature has not been implemented yet',
    'delall'            => 'Delete All',
    'delallmsg'         => 'Are you sure you want to delete all messages from: %s?',
    'underforum'        => '<b>Under Forum: %s (ID #%s)',
    'moderate'          => 'Moderate',
    'nomess'            => 'There have been no messages posted yet! '
);

$LANG_GF96 = array (
    'ip'                 => 'IP',
    'enterip'            => 'Enter below an IP address to ban',
    'gfipman'            => 'IP Management',
    'ban'                => 'Ban',
    'noips'              => '<p style="margin:0px; padding:5px;">No IPs have been banned yet!</p>',
    'unban'              => 'Un-Ban',
    'ipbanned'           => 'IP Address Banned',
    'banip'              => 'Ban IP Confirmation',
    'banipmsg'           => 'Are you sure you want to ban the ip %s?',
    'specip'             => 'Please specify an IP Address to ban!',
    'ipunbanned'         => 'IP Address Un-Banned.',
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
    'use_themes_template'   => 'Use Templates in the Theme Directory',
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
