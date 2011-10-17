<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.8.0                                               |
// +---------------------------------------------------------------------------+
// | norwegian.php                                                             |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2007 by the following authors:                              |
// |    casper                                                                 |
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
    'statslabel'        => 'Antall innlegg i forumet',
    'statsheading1'     => 'Forum Topp Ti Viste Emner',
    'statsheading2'     => 'Forum Topp TI Besvarte Emner',
    'statsheading3'     => 'Ingen emner å vise',
    'useradminmenu'     => 'Forum Innstillinger',
    'access_denied'     => 'Adgang nektet',
    'autotag_desc_forum' => '[forum: id alternate title] - Displays a link to a forum topic using the text \'here\' as the title. An alternate title may be specified but is not required.'
);


$LANG_GF01['FORUM']          = 'Forum';
$LANG_GF01['ALL']            = 'Alle'; 
$LANG_GF01['YES']            = 'Ja';
$LANG_GF01['NO']             = 'Nei';
$LANG_GF01['NEW']            = 'Ny';
$LANG_GF01['NEXT']           = 'Neste';
$LANG_GF01['ERROR']          = 'Feil!';
$LANG_GF01['CONFIRM']        = 'Bekreft';
$LANG_GF01['UPDATE']         = 'Oppdater';
$LANG_GF01['SAVE']           = 'Lagre';
$LANG_GF01['CANCEL']         = 'Avbryt';
$LANG_GF01['ON']             = 'Tid: ';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>Den: </b>';
$LANG_GF01['BY']             = 'Av: ';
$LANG_GF01['RE']             = 'Sv: ';
$LANG_GF01['DATE']           = 'Dato';
$LANG_GF01['VIEWS']          = 'Visninger';
$LANG_GF01['REPLIES']        = 'Svar';
$LANG_GF01['NAME']           = 'Navn:';
$LANG_GF01['DESCRIPTION']    = 'Beskrivelse: ';
$LANG_GF01['TOPIC']          = 'Emne';
$LANG_GF01['TOPICS']         = 'Emner:';
$LANG_GF01['TOPICSUBJECT']   = 'Emnenavn';
$LANG_GF01['HOMEPAGE']       = 'Hjem';
$LANG_GF01['SUBJECT']        = 'Overskrift';
$LANG_GF01['HELLO']          = 'Hallo ';
$LANG_GF01['MOVED']          = 'Flyttet';
$LANG_GF01['POSTS']          = 'Innlegg';
$LANG_GF01['LASTPOST']       = 'Siste innlegg';
$LANG_GF01['POSTEDON']       = 'Skrevet den';
$LANG_GF01['POSTEDBY']       = 'Skrevet av';
$LANG_GF01['PAGES']          = 'Sider';
$LANG_GF01['TODAY']          = 'I dag ';
$LANG_GF01['REGISTERED']     = 'Registrert';
$LANG_GF01['ORDERBY']        = 'Sorter:&nbsp;';
$LANG_GF01['ORDER']          = 'Sorter:';
$LANG_GF01['USER']           = 'Bruker';
$LANG_GF01['GROUP']          = 'Gruppe';
$LANG_GF01['ANON']           = 'Anonym: ';
$LANG_GF01['ADMIN']          = 'Admin';
$LANG_GF01['AUTHOR']         = 'Author';
$LANG_GF01['NOMOOD']         = 'No Mood';
$LANG_GF01['REQUIRED']       = '[Påkrevd]';
$LANG_GF01['OPTIONAL']       = '[Valgfritt]';
$LANG_GF01['SUBMIT']         = 'Send inn';
$LANG_GF01['PREVIEW']        = 'Forhåndsvis';
$LANG_GF01['REMOVE']         = 'Fjern';
$LANG_GF01['EDIT']           = 'Endre';
$LANG_GF01['DELETE']         = 'Slett';
$LANG_GF01['OPTIONS']        = 'Valg:';
$LANG_GF01['MISSINGSUBJECT'] = 'Overskrift tom';
$LANG_GF01['MIGRATE_NOW']    = 'Migrer nå'; 
$LANG_GF01['FILTERLIST']     = 'Filtrer Liste';
$LANG_GF01['SELECTFORUM']    = 'Velg Forum';
$LANG_GF01['DELETEAFTER']    = 'Slett etterpå';
$LANG_GF01['TITLE']          = 'Tittel';
$LANG_GF01['COMMENTS']       = 'Kommentarer'; 
$LANG_GF01['SUBMISSIONS']    = 'Submissions';
$LANG_GF01['HTML_FILTER_MSG']  = 'Filtrert HTML Tillatt';
$LANG_GF01['HTML_FULL_MSG']  = 'Full HTML Tillatt';
$LANG_GF01['HTML_MSG']       = 'HTML Tillatt';
$LANG_GF01['CENSOR_PERM_MSG']  = 'Sensurert Innhold';
$LANG_GF01['ANON_PERM_MSG']    = 'Vis Anonyme Innlegg';
$LANG_GF01['POST_PERM_MSG1']    = 'Kan skrive';
$LANG_GF01['POST_PERM_MSG2']    = 'Anonyme brukere kan skrive';
$LANG_GF01['GO']             = 'GÅ';
$LANG_GF01['STATUS']         = 'Status:';
$LANG_GF01['ONLINE']         = 'online';
$LANG_GF01['OFFLINE']        = 'offline';
$LANG_GF01['back2parent']    = 'Hovedemne';
$LANG_GF01['forumname']      = '';   // Enter name here if you want it to show in the footer of the admin screens
$LANG_GF01['category']       = 'Kategori: ';
$LANG_GF01['loginreqview']   = '<b>Du må %s registrere deg</a> eller %s logge inn </a> for å lese i forumet</b>';
$LANG_GF01['loginreqpost']   = '<b>Du må registrere deg eller logge inn for å skrive i forumet</b>';
$LANG_GF01['nolastpostmsg']  = 'N/A';
$LANG_GF01['no_one']         = 'Ingen.';
$LANG_GF01['back2top']       = 'Til toppen';
$LANG_GF01['TEXTMODE']       = 'Tekstmodus:';
$LANG_GF01['HTMLMODE']       = 'HTML-modus:';
$LANG_GF01['TopicPreview']   = 'Forhåndsvisning';
$LANG_GF01['moderator']      = 'Moderator';
$LANG_GF01['admin']          = 'Admin';
$LANG_GF01['DATEADDED']      = 'Dato lagt til';
$LANG_GF01['PREVTOPIC']      = 'Forrige&nbsp;emne';
$LANG_GF01['NEXTTOPIC']      = 'Neste&nbsp;emne';
$LANG_GF01['RESYNC']         = "ReSynkroniser";
$LANG_GF01['RESYNCCAT']      = "ReSynkroniser Category Forums";  
$LANG_GF01['EDITICON']       = 'Endre';
$LANG_GF01['QUOTEICON']      = 'Sitèr';
$LANG_GF01['ProfileLink']    = 'Profil';
$LANG_GF01['WebsiteLink']    = 'Webside';
$LANG_GF01['PMLink']         = 'PM';
$LANG_GF01['EmailLink']      = 'Email';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Abbonner på dette forumet';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'Stopp abbonnement';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'Subscribe:Enabled';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['NEWTOPIC']       = 'Nytt&nbsp;Emne';
$LANG_GF01['POSTREPLY']      = 'Skriv&nbsp;Svar';
$LANG_GF01['SubscribeLink']  = 'Abbonner';
$LANG_GF01['unSubscribeLink'] = 'Stopp Abbonnement';
$LANG_GF01['SubscribeLink_TRUE']  = 'Subscribe:Enabled';
$LANG_GF01['SubscribeLink_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['SUBSCRIPTIONS']  = 'Varslinger';
$LANG_GF01['TOP']            = 'Til toppen';
$LANG_GF01['PRINTABLE']      = 'Utskriftsvennlig';
$LANG_GF01['USERPREFS']      = 'Forum innstillinger';
$LANG_GF01['SPEEDLIMIT']     = '"Ditt siste innlegg var for %s sekunder siden.<br' . XHTML . '>Systemet krever minst %s sekunder mellom innlegg."';
$LANG_GF01['ACCESSERROR']    = 'ADGANGSFEIL';
$LANG_GF01['ACTIONS']        = 'Handlinger';
$LANG_GF01['DELETEALL']      = 'Slett alle valgte';
$LANG_GF01['DELCONFIRM']     = 'Er du sikker på å slette alle valgte?';
$LANG_GF01['DELALLCONFIRM']  = 'Er du sikker på å slette alle valgte?';
$LANG_GF01['STARTEDBY']      = 'Startet av:';
$LANG_GF01['WARNING']        = 'Advarsel';
$LANG_GF01['MODERATED']      = 'Moderatorer: %s';
$LANG_GF01['LASTREPLYBY']    = 'Siste svar av:&nbsp;%s';
$LANG_GF01['UID']            = 'UID';
$LANG_GF01['INDEXPAGE']      = 'Forum forsiden';
$LANG_GF01['FEATURE']        = 'Funksjon';
$LANG_GF01['SETTING']        = 'Innstilling';
$LANG_GF01['MARKALLREAD']    = 'Merk alle som lest';
$LANG_GF01['MSG_NO_CAT']     = 'No Categories or Forums Defined';

// Language for bbcode toolbar
$LANG_GF01['CODE']           = 'Kode';
$LANG_GF01['FONTCOLOR']      = 'Font farge';
$LANG_GF01['FONTSIZE']       = 'Font størrelse';
$LANG_GF01['CLOSETAGS']      = 'Lukk tagger';
$LANG_GF01['CODETIP']        = 'Tips: Stiler kan raskt legges til valgt tekst';
$LANG_GF01['TINY']           = 'X-Liten';
$LANG_GF01['SMALL']          = 'Liten';
$LANG_GF01['NORMAL']         = 'Normal';
$LANG_GF01['LARGE']          = 'Stor';
$LANG_GF01['HUGE']           = 'X-Stor';
$LANG_GF01['DEFAULT']        = 'Standard';
$LANG_GF01['DKRED']          = 'Mørk rød';
$LANG_GF01['RED']            = 'Rod';
$LANG_GF01['ORANGE']         = 'Oransj';
$LANG_GF01['BROWN']          = 'Brun';
$LANG_GF01['YELLOW']         = 'Gul';
$LANG_GF01['GREEN']          = 'Grønn';
$LANG_GF01['OLIVE']          = 'Oliven';
$LANG_GF01['CYAN']           = 'Cyan';
$LANG_GF01['BLUE']           = 'Blå';
$LANG_GF01['DKBLUE']         = 'Mørk Blå';
$LANG_GF01['INDIGO']         = 'Indigo';
$LANG_GF01['VIOLET']         = 'Fiolett';
$LANG_GF01['WHITE']          = 'Hvit';
$LANG_GF01['BLACK']          = 'Svart';

$LANG_GF01['b_help']         = "Fet skrift: [b]tekst[/b]";
$LANG_GF01['i_help']         = "Skråstillt skrift: [i]tekst[/i]";
$LANG_GF01['u_help']         = "Underlinjer skrift: [u]tekst[/u]";
$LANG_GF01['q_help']         = "Siter tekst: [quote]tekst[/quote]";
$LANG_GF01['c_help']         = "Vis kode: [code]kode[/code]";
$LANG_GF01['l_help']         = "Liste: [list]tekst[/list]";
$LANG_GF01['o_help']         = "Ordnet liste: [olist]tekst[/olist]";
$LANG_GF01['p_help']         = "[img]http://bilde_url[/img]  eller [img w=100 h=200][/img]";
$LANG_GF01['w_help']         = "Sett inn URL: [url]http://url[/url] eller [url=http://url]URL tekst[/url]";
$LANG_GF01['a_help']         = "Lukk alle åpne bbKode tagger";
$LANG_GF01['s_help']         = "Skriftfarge: [color=red]tekst[/color]  Tips: du kan også bruke color=#FF0000";
$LANG_GF01['f_help']         = "Skriftstørrelse: [size=x-small]small tekst[/size]";
$LANG_GF01['h_help']         = "Klikk for å vise mer detaljert hjelp";


$LANG_GF02['msg01']    = 'Du må være registrert for å bruke forumet';
$LANG_GF02['msg02']    = 'Her skulle du ikke vært!<br' . XHTML . '>Begrenset adgang til dette forumet';
$LANG_GF02['msg03']    = 'Please wait while you are redirected';
$LANG_GF02['msg05']    = '<center><em>Beklager, ingen emner er satt opp ennå.</em></center>';
$LANG_GF02['msg07']    = 'Online brukere:';
$LANG_GF02['msg14']    = 'Du er sperret fra å lage innlegg.<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'Om du mener dette er feil, kontakt <A HREF="mailto:%s?subject=Forum IP Ban">Webmaster</A>.';
$LANG_GF02['msg18']    = 'Feil! Alle felt er ikke fylt i, elle er for korte i lengde.';
$LANG_GF02['msg19']    = 'Ditt innlegg er postet.';
$LANG_GF02['msg22']    = '- Forumvarsel';
$LANG_GF02['msg23a']   = "Et svar er skrevet i tråden '%s' av %s.\n\nInnlegget ble startet av %s i emnet %s . ";
$LANG_GF02['msg23b']   = "Et nytt innlegg '%s' er postet av %s i emnet %s på %s webside. Du kan vise det her:\n%s/forum/viewtopic.php?showtopic=%s\n";
$LANG_GF02['msg23c']   = "Du kan vise det her:\n%s/forum/viewtopic.php?showtopic=%s&lastpost=true\n";
$LANG_GF02['msg25']    = "\nHa en strålende dag! \n";
$LANG_GF02['msg26']    = "\nDu mottar denne mailen fordi du har valgt å bli varslet når et svar har blitt skrevet i denne tråden. ";
$LANG_GF02['msg27']    = "For å stoppe mottak av varsler gå til <%s> for å fjerne varsling.\n";
$LANG_GF02['msg33']    = 'Av: ';
$LANG_GF02['msg36']    = 'Mood:';
$LANG_GF02['msg38']    = 'Varsle svar ';
$LANG_GF02['msg40']    = '<br' . XHTML . '>Du har allerde bedt om varsling på dette emnet.<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg44']    = '<p style="margin:0px; padding:5px;">Du har ingen varslinger.</p>';
$LANG_GF02['msg49']    = '(Vist %s ganger) ';
$LANG_GF02['msg55']    = 'Innlegg Slettet.';
$LANG_GF02['msg56']    = 'IP Banned.';
$LANG_GF02['msg59']    = 'Normalt Emne';
$LANG_GF02['msg60']    = 'Nytt Innlegg';
$LANG_GF02['msg61']    = 'Prioritert Emne';
$LANG_GF02['msg62']    = 'Varsle meg ved svar';
$LANG_GF02['msg64']    = 'Er du sikker på at du vil slette emnet %s med navn: %s ?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>Dette er hovedinnlegget, så alle svar vil også bli slettet.';
$LANG_GF02['msg68']    = 'Note: BE CAREFUL WHEN YOU BAN, only admins have the rights to unban someone.';
$LANG_GF02['msg69']    = 'Do you really want to ban the ip address: %s?';
$LANG_GF02['msg71']    = 'No function selected, choose a post and then a moderator function.<br' . XHTML . '>Note: You must be a moderator to perform these functions.';
$LANG_GF02['msg72']    = 'Warning, you do not have rights to perform this moderation function.';
$LANG_GF02['msg74']    = 'Siste %s Foruminnlegg';
$LANG_GF02['msg75']    = 'Topp %s Emner Etter Visninger';
$LANG_GF02['msg76']    = 'Topp %s Emner Etter Innlegg';
$LANG_GF02['msg77']    = '<br' . XHTML . '><p style="padding-left:10px;">Her skulle du ikke vært!<br' . XHTML . '>Begrenset adgang til dette emnet.</p>';
$LANG_GF02['msg83']    = '<br' . XHTML . '><br' . XHTML . '>Du må være logget inn for å bruke denne forumfunksjonen.</p>';
$LANG_GF02['msg84']    = 'Merk alle emner som lest';
$LANG_GF02['msg85']    = 'Side:';
$LANG_GF02['msg86']    = '&nbsp;Siste %s innlegg&nbsp;';
$LANG_GF02['msg87']    = '<br' . XHTML . '>Advarsel: Dette emnet er låst.<br' . XHTML . '>Ingen fler innlegg er mulig';
$LANG_GF02['msg88']    = 'Registrete brukere';
$LANG_GF02['msg88b']   = 'Kun forumaktivitet';
$LANG_GF02['msg89']    = 'Mine varslinger';
$LANG_GF02['msg101']   = 'Forum Regler:';
$LANG_GF02['msg103']   = 'Forum Valg:';
$LANG_GF02['msg106']   = 'Velg et Forum';
$LANG_GF02['msg108']   = 'Aktivt Emne';
$LANG_GF02['msg109']   = 'Låst Emne';
$LANG_GF02['msg110']   = 'Overfører til endringssiden..';
$LANG_GF02['msg111']   = 'Nye innlegg siden ditt forrige besøk';
$LANG_GF02['msg112']   = 'Vis alle nye innlegg';
$LANG_GF02['msg113']   = 'Vis nye innlegg';
$LANG_GF02['msg114']   = 'Låst Emne';
$LANG_GF02['msg115']   = 'Prioritert emne med nytt innlegg';
$LANG_GF02['msg116']   = 'Låst emne med nytt innlegg';
$LANG_GF02['msg117']   = 'Søk Alle';
$LANG_GF02['msg118']   = 'Søk i denne kategorien';
$LANG_GF02['msg119']   = 'Søkeresultat for forespørselen:';
$LANG_GF02['msg120']   = 'Mest populære innlegg';
$LANG_GF02['msg121']   = 'Alle tider er %s. Tiden er nå %s.';
$LANG_GF02['msg122']   = 'Populær Begrensning:';
$LANG_GF02['msg123']   = 'Antall innlegg før emnet skal kalles populært';
$LANG_GF02['msg126']   = 'Søkelinjer:';
$LANG_GF02['msg127']   = 'Antall linjer å vise pr side i søkeresultat';
$LANG_GF02['msg128']   = 'Medlemmer pr side:';
$LANG_GF02['msg129']   = 'For medlemslisting';
$LANG_GF02['msg130']   = 'Vis Innlegg fra Anonyme:';
$LANG_GF02['msg131']   = 'Ved å velge Nei blir anonyme brukere filtrert vekk';
$LANG_GF02['msg132']   = 'Alltid varsle:';
$LANG_GF02['msg133']   = 'Ved å velge Ja vil automatisk varsling bli aktivert for alle innlegg du skriver';
$LANG_GF02['msg134']   = 'Abbonnering lagt til';
$LANG_GF02['msg135']   = 'Du blir nå varlset om alle innlegg i denne kategorien.';
$LANG_GF02['msg136']   = 'Du må velge kategori å abbonnere på.';
$LANG_GF02['msg137']   = 'Varsling for kategori aktivert';
$LANG_GF02['msg138']   = '<b>Varsling for komplett forum</b>';
$LANG_GF02['msg142']   = 'Varlsing lagret.';
$LANG_GF02['msg144']   = 'Returner til emne';
$LANG_GF02['msg146']   = 'Varlsing slettet';
$LANG_GF02['msg147']   = 'Forum [utskriftsvennlig versjon av emnet';
$LANG_GF02['msg148']   = 'Klikk <a href="javascript:history.back()">HER</a> for å returnere';
$LANG_GF02['msg155']   = 'Ingen brukerinnlegg.';
$LANG_GF02['msg156']   = 'Totalt antall foruminnlegg';
$LANG_GF02['msg157']   = 'Siste 10 Foruminnlegg';
$LANG_GF02['msg158']   = 'Siste 10 Foruminnlegg av ';
$LANG_GF02['msg159']   = 'Er du sikker på at du ønsker å slette valge moderatoroppføringer?';
$LANG_GF02['msg160']   = 'Vis siste side av emnet';
$LANG_GF02['msg163']   = 'Innlegg flyttet';
$LANG_GF02['msg164']   = 'Merk alle kategorier og emner som lest';
$LANG_GF02['msg166']   = 'FEIL: Ygyldig eller ikke funnet emne';
$LANG_GF02['msg167']   = 'Varslingsvalg';
$LANG_GF02['msg168']   = 'Ved å velge Nei vil du deaktivere emailvarslinger';
$LANG_GF02['msg169']   = 'Returner til medlemsliste';
$LANG_GF02['msg170']   = 'Siste foruminnlegg';
$LANG_GF02['msg171']   = 'Forum Adgangsfeil';
$LANG_GF02['msg172']   = 'Emnet eksisterer ikke. Det kan være slettet';
$LANG_GF02['msg173']   = 'Overfører til innleggsmeldingsside..';
$LANG_GF02['msg174']   = 'Unable to BAN Member - Invalid or Empty IP Address';
$LANG_GF02['msg175']   = 'Returner til Forumlisting';
$LANG_GF02['msg176']   = 'Velg medlem';
$LANG_GF02['msg177']   = 'Alle Medlemmer';
$LANG_GF02['msg178']   = 'Kun Hovedinnlegg';
$LANG_GF02['msg179']   = 'Innhold generert på: %s sekunder';
$LANG_GF02['msg180']   = 'Forum Innleggsvarsel';
$LANG_GF02['msg181']   = 'Du har ikke adgang til andre kategorier som moderator';
$LANG_GF02['msg182']   = 'Moderatorbekreftelse';
$LANG_GF02['msg183']   = 'Nytt emne ble lagd fra dette innlegget i kategorien: %s';
$LANG_GF02['msg184']   = 'Varsle kun en gang';
$LANG_GF02['msg185']   = 'Varsling blir kun sendt en gang for kategorier og innlegg selvom det har flere innlegg siden ditt siste besøk.';
$LANG_GF02['msg186']   = 'Nytt emne Tittel';
$LANG_GF02['msg187']   = 'Returner til emne - klikk <a href="%s">her</a>';
$LANG_GF02['msg188']   = 'Klikk for å gå direkte til siste innlegg';
$LANG_GF02['msg189']   = 'Feil: Du kan ikke endre dette innlegget lenger';
$LANG_GF02['msg190']   = 'Stille endring';
$LANG_GF02['msg191']   = 'Endring ikke tillatt. Tillatt tid for endring er utløpt eller du trenger moderatorrettigheter';
$LANG_GF02['msg192']   = 'Ferdig ... Migrert %s emner og %s innlegg.';
$LANG_GF02['msg193']   = 'STORY&nbsp;&nbsp;TO&nbsp;&nbsp;FORUM&nbsp;&nbsp;MIGRATION&nbsp;&nbsp;UTILITY';
$LANG_GF02['msg194']   = 'Vanlig Emne';
$LANG_GF02['msg195']   = 'Klikk for å hoppe til Kategori';
$LANG_GF02['msg196']   = 'Vis forumforsiden';
$LANG_GF02['msg197']   = 'Merk emner i alle kategorier som lest';
$LANG_GF02['msg198']   = 'Oppdater foruminstillinger';
$LANG_GF02['msg199']   = 'Vis eller slett varslinger';
$LANG_GF02['msg200']   = 'Vis meldemsrapport';
$LANG_GF02['msg201']   = 'Vis rapport over populære emner';
$LANG_GF02['msg202']   = 'No new posts';
$LANG_GF02['msg300']   = 'Your preferences have block anonymous posts enabled';
$LANG_GF02['msg301']   = 'Realy mark all categories read?';
$LANG_GF02['msg302']   = 'Realy mark all topics read?';
$LANG_GF02['PostReply']   = 'Skriv svar';
$LANG_GF02['PostTopic']   = 'Nytt emne';
$LANG_GF02['EditTopic']   = 'Endre emne';
$LANG_GF02['quietforum']  = 'Forumet har ingen nye emner';

$LANG_GF03 = array (
    'delete'            => 'Slett',
    'edit'              => 'Endre',
    'move'              => 'Flytt',
    'split'             => 'Splitt',
    'ban'               => 'Ban IP',
    'movetopic'         => 'Flytt emne',
    'movetopicmsg'      => '<br' . XHTML . '>Emne som flyttes: "<b>%s</b>"',
    'splittopicmsg'     => '<br' . XHTML . '>Lag nytt emne med dette innlegget: "<b>%s</b>"<br' . XHTML . '><em>Av:</em>&nbsp;%s&nbsp <em>Den:</em>&nbsp;%s',
    'selectforum'       => 'Velg nytt forum:',
    'lockedpost'        => 'Legg til svar',
    'splitheading'      => 'Splitt trådvalg:',
    'splitopt1'         => 'Flytt alle innlegg fra her',
    'splitopt2'         => 'Flytt bare dentte innlegget'
);

$LANG_GF04 = array (
    'label_forum'             => 'Faktaboks',
    'label_location'          => 'Bosted',
    'label_aim'               => 'Født',
    'label_yim'               => 'Sivilstatus',
    'label_icq'               => 'ICQ Identity',
    'label_msnm'              => 'MS Messenger Name',
    'label_interests'         => 'Interests',
    'label_occupation'        => 'Yrke',
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
    1   => 'Statistikk',
    2   => 'Innstilling',
    3   => 'Forums',
    4   => 'Moderator',
    5   => 'Convert',
    6   => 'Messages',
    7   => 'IP Mgmt'
);


/* User Functions Navbar */
$LANG_GF07 = array (
    1   => 'Vis Forum',
    2   => 'Innstillinger',
    3   => 'Populære emner',
    4   => 'Varslinger',
    5   => 'Medlemmer'
);


/* Forum User Features */
$LANG_GF08 = array (
    1   => 'Emnevarslinger',
    2   => 'Følg forumvarslinger',
    3   => 'Ekskluderte emnevarslinger'
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
    'gfstats'            => 'Forumstatistikk',
    'statsmsg'           => 'Dette er nåværende statistikk for forumet:',
    'totalcats'          => 'Totalt Kategorier:',
    'totalforums'        => 'Totalt Forum:',
    'totaltopics'        => 'Totalt Emner:',
    'totalposts'         => 'Totalt Innlegg:',
    'totalviews'         => 'Totalt Vist:',
    'avgpmsg'            => 'Snitt innlegg pr:',
    'category'           => 'Kategori:',
    'forum'              => 'Forum:',
    'topic'              => 'Emne:',
    'avgvmsg'            => 'Snitt visninger pr:'
);

$LANG_GF92 = array (
    'gfsettings'         => 'Foruminnstillinger',
    'showiframe'         => 'Vis emnesammendrag',
    'showiframedscp'     => 'Vis emnesammendrag (Iframe) i bunn når det skrives svar',
    'topicspp'           => 'Emner pr side',
    'topicsppdscp'       => 'Antall emner som vises pr side på forsiden',
    'postspp'            => 'Innlegg pr side',
    'postsppdscp'        => 'Antall innlegg som vises pr side',
    'setsavemsg'         => 'Innstillinger lagret.',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => 'Forum Admin',
    'addcat'             => 'Legg til hovedkategori',
    'addforum'           => 'Legg til kategori',
    'catorder'           => 'Kategorirekkefølge',
    'catadded'           => 'Kategori lagt til.',
    'catdeleted'         => 'Kategori slettet',
    'catedited'          => 'Kategori endret.',
    'forumadded'         => 'Forum lagt til.',
    'forumaddError'      => 'Feil ved å legge til forum.',
    'forumdeleted'       => 'Forum slettet',
    'forumedited'        => 'Forum endret',
    'forumordered'       => 'Forumrekkefølge endret',
    'back'               => 'Tilbake',
    'addnote'            => 'Merk: Du kan endre disse verdiene.',
    'editforumnote'      => 'Endre forumdetaljer for: <b>"%s"</b>',
    'deleteforumnote1'   => 'Vil du slette forumet <b>"%s"</b>&nbsp;?',
    'editcatnote'        => 'Endre kategoridetaljer for: <b>"%s"</b>',
    'deletecatnote1'     => 'Vil du slette kategorien <b>"%s"</b>&nbsp;?',
    'deletecatnote2'     => 'Alle kategorier og emner under dette forumet blir også slettet.',
    'undercat'           => 'Underkategori',
    'deleteforumnote2'   => 'Alle emner skrevet blir også slettet.',
    'groupaccess'        => 'Gruppeaksess: ',
    'action'             => 'Handlinger',
    'forumdescription'   => 'Forumbeskrivelse',
    'posts'              => 'Innlegg',
    'ordertitle'         => 'Rekkefølge',
    'ModEdit'            => 'Endre',
    'ModMove'            => 'Flytt',
    'ModStick'           => 'Stick',
    'ModBan'             => 'Ban',
    'addmoderator'       => "Add Record",
    'delmoderator'       => " Delete\nSelected",
    'moderatorwarning'   => '<b>Warning: No Forums Defined</b><br' . XHTML . '><br' . XHTML . '>Setup Forum Categories and Add at least 1 forum<br' . XHTML . '>before attempting to add Modertators',
    'private'            => 'Privat Forum',
    'filtertitle'        => 'Velg moderatoroppføringer å vise',
    'addmessage'         => 'Legg til ny Moderator',
    'allowedfunctions'   => 'Tillatte funksjoner',
    'userrecords'        => 'Brukeroppføringer',
    'grouprecords'       => 'Gruppeoppføringer',
    'filterview'         => 'Filtrer visning',
    'readonly'           => 'KunLes Forum',
    'readonlydscp'       => 'Kun Moderator kan skrive i dette forumet',
    'hidden'             => 'Skjult Forum',
    'hiddendscp'         => 'Forum vises ikke på forumforsiden',
    'hideposts'          => 'Skjul nye innlegg',
    'hidepostsdscp'      => 'Oppdateringer vises ikke i blokker eller RSS Feeds',
    'mod_title'          => 'Forum Moderatorer',
    'allforums'          => 'Alle Forum'
);

$LANG_GF95 = array (
    'header1'           => 'Innlegg',
    'header2'           => 'Innlegg for forum&nbsp;&raquo;&nbsp;%s',
    'notyet'            => 'Feature has not been implemented yet',
    'delall'            => 'Slett Alle',
    'delallmsg'         => 'Vil du slette alle innlegg fra: %s?',
    'underforum'        => '<b>Under Forum: %s (ID #%s)',
    'moderate'          => 'Moderer',
    'nomess'            => 'Ingen innlegg er skrevet ennå! '
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
