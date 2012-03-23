<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.8.0                                               |
// +---------------------------------------------------------------------------+
// | italian.php                                                               |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2011 by the following authors:                              |
// |    Rouslan Placella    rouslan AT placella DOT com                        |
// |                                                                           |
// | Copyright (C) 2004 by the following authors:                              |
// |    magomarcelo      magomarcelo AT gmail DOT com                          |
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

$PLG_forum_MESSAGE1 = 'Aggiornamento dell\'Estensione Forum: Aggiornamento completato con successo.';
$PLG_forum_MESSAGE2 = 'Aggiornamento dell\'Estensione Forum: Non é possibile aggiornare questa versione automaticamente. Vedi la documentazione delle estensioni.';
$PLG_forum_MESSAGE5 = 'L\'aggiornamento dell\'estensione Forum é fallito - vedi file error.log';
$PLG_forum_MESSAGE3002 = $LANG32[9];

$LANG_GF00 = array (
    'pluginlabel'       => 'Forum',         // What shows up in the siteHeader
    'searchlabel'       => 'Forum',
    'statslabel'        => 'Totale Messaggi Forum',
    'statsheading1'     => 'Top 10 Argomenti Forum per Numero Visite',
    'statsheading2'     => 'Top 10 Argomenti Forum per Numero Risposte',
    'statsheading3'     => 'Nessun argomento sul quale riportare',
    'useradminmenu'     => 'Funzionalitá del Forum',
    'access_denied'     => 'Accesso Negato',
    'autotag_desc_forum' => '[forum: id alternate title] - Displays a link to a forum topic using the text \'here\' as the title. An alternate title may be specified but is not required.'
);


$LANG_GF01['FORUM']          = 'Forum';
$LANG_GF01['ALL']            = 'Tutti'; 
$LANG_GF01['YES']            = 'Si';
$LANG_GF01['NO']             = 'No';
$LANG_GF01['NEW']            = 'Nuovo';
$LANG_GF01['NEXT']           = 'Successivo';
$LANG_GF01['ERROR']          = 'Errore!';
$LANG_GF01['CONFIRM']        = 'Conferma';
$LANG_GF01['UPDATE']         = 'Aggiorna';
$LANG_GF01['SAVE']           = 'Registra';
$LANG_GF01['CANCEL']         = 'Annulla';
$LANG_GF01['ON']             = 'Il: ';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>Il: </b>';
$LANG_GF01['BY']             = 'Da: ';
$LANG_GF01['RE']             = 'Re: ';
$LANG_GF01['DATE']           = 'Data';
$LANG_GF01['VIEWS']          = 'Visite';
$LANG_GF01['REPLIES']        = 'Risposte';
$LANG_GF01['NAME']           = 'Nome:';
$LANG_GF01['DESCRIPTION']    = 'Descrizione: ';
$LANG_GF01['TOPIC']          = 'Argomento';
$LANG_GF01['TOPICS']         = 'Argomenti';
$LANG_GF01['TOPICSUBJECT']   = 'Oggetto Argomento';
$LANG_GF01['HOMEPAGE']       = 'Home';
$LANG_GF01['SUBJECT']        = 'Argomenti';
$LANG_GF01['HELLO']          = 'Ciao ';
$LANG_GF01['MOVED']          = 'Spostato';
$LANG_GF01['POSTS']          = 'Messaggi';
$LANG_GF01['LASTPOST']       = 'Ultimo Messaggio';
$LANG_GF01['POSTEDON']       = 'Inviato il';
$LANG_GF01['POSTEDBY']       = 'Inviato Da';
$LANG_GF01['PAGES']          = 'Pagine';
$LANG_GF01['TODAY']          = 'Oggi alle ';
$LANG_GF01['REGISTERED']     = 'Registrato il';
$LANG_GF01['ORDERBY']        = 'Ordina Per:';
$LANG_GF01['ORDER']          = 'Ordine:';
$LANG_GF01['USER']           = 'Utente';
$LANG_GF01['GROUP']          = 'Gruppo';
$LANG_GF01['ANON']           = 'Anonimo: ';
$LANG_GF01['ADMIN']          = 'Amministratore';
$LANG_GF01['AUTHOR']         = 'Autore';
$LANG_GF01['NOMOOD']         = 'Nessun Umore';
$LANG_GF01['REQUIRED']       = '[Richiesto]';
$LANG_GF01['OPTIONAL']       = '[Opzionale]';
$LANG_GF01['SUBMIT']         = 'Invia';
$LANG_GF01['PREVIEW']        = 'Anteprima';
$LANG_GF01['REMOVE']         = 'Rimuovi';
$LANG_GF01['EDIT']           = 'Modifica';
$LANG_GF01['DELETE']         = 'Elimina';
$LANG_GF01['OPTIONS']        = 'Opzioni:';
$LANG_GF01['MISSINGSUBJECT'] = 'Oggetto mancante';
$LANG_GF01['MIGRATE_NOW']    = 'Migrate Now'; //
$LANG_GF01['FILTERLIST']     = 'Filter List';//
$LANG_GF01['SELECTFORUM']    = 'Seleziona un Forum';
$LANG_GF01['DELETEAFTER']    = 'Rimouvi dopo';
$LANG_GF01['TITLE']          = 'Titolo';
$LANG_GF01['COMMENTS']       = 'Commenti'; 
$LANG_GF01['SUBMISSIONS']    = 'Submissions';//
$LANG_GF01['HTML_FILTER_MSG']  = 'HTML Filtrato Consentito';
$LANG_GF01['HTML_FULL_MSG']  = 'Tutto HTML Consentito';
$LANG_GF01['HTML_MSG']       = 'HTML Consentito';
$LANG_GF01['CENSOR_PERM_MSG']  = 'Contenuto Censurato';
$LANG_GF01['ANON_PERM_MSG']    = 'Vedi Messaggi Anonimi';
$LANG_GF01['POST_PERM_MSG1']    = 'Able to post';//
$LANG_GF01['POST_PERM_MSG2']    = 'Utenti anonimi possono scrivere';
$LANG_GF01['GO']             = 'VAI';
$LANG_GF01['STATUS']         = 'Stato:';
$LANG_GF01['ONLINE']         = 'online';
$LANG_GF01['OFFLINE']        = 'offline';
$LANG_GF01['back2parent']    = 'Argomento Superiore';
$LANG_GF01['forumname']      = '';   // Enter name here if you want it to show in the footer of the admin screens
$LANG_GF01['category']       = 'Categoria: ';
$LANG_GF01['loginreqview']   = '<b>Spiacente, devi %s registrarti</a> o %s loggarti </a> per usare questi forum</b>';
$LANG_GF01['loginreqpost']   = '<b>Spiacente, devi registrarti o loggarti per inviare messaggi su questi forum</b>';
$LANG_GF01['nolastpostmsg']  = 'N/A';
$LANG_GF01['no_one']         = 'Nessuno.';
$LANG_GF01['back2top']       = 'Inizio Pagina';
$LANG_GF01['TEXTMODE']       = 'Modo Testo:';
$LANG_GF01['HTMLMODE']       = 'Modo HTML:';
$LANG_GF01['TopicPreview']   = 'Anteprima invio argomento';
$LANG_GF01['moderator']      = 'Moderatore';
$LANG_GF01['admin']          = 'Admin';
$LANG_GF01['DATEADDED']      = 'Data Aggiunto';
$LANG_GF01['PREVTOPIC']      = 'Argomento Precedente';
$LANG_GF01['NEXTTOPIC']      = 'Argomento Successivo';
$LANG_GF01['RESYNC']         = "Sicronizza";
$LANG_GF01['RESYNCCAT']      = "Sicronizza Categorie Forum";  
$LANG_GF01['EDITICON']       = 'Modifica';
$LANG_GF01['QUOTEICON']      = 'Quote';//
$LANG_GF01['ProfileLink']    = 'Profilo';
$LANG_GF01['WebsiteLink']    = 'Sito Internet';
$LANG_GF01['PMLink']         = 'MP';
$LANG_GF01['EmailLink']      = 'Email';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Iscriviti a questo forum';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'Un-Subscribe to this forum';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'Subscribe:Enabled';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['NEWTOPIC']       = 'Nuovo Argomento';
$LANG_GF01['POSTREPLY']      = 'Risposta al Messaggio';
$LANG_GF01['SubscribeLink']  = 'Iscriviti';
$LANG_GF01['unSubscribeLink'] = 'Un-Subscribe';
$LANG_GF01['SubscribeLink_TRUE']  = 'Subscribe:Enabled';
$LANG_GF01['SubscribeLink_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['SUBSCRIPTIONS']  = 'Iscrizioni';
$LANG_GF01['TOP']            = 'Inizio Messaggio';
$LANG_GF01['PRINTABLE']      = 'Versione Stampabile';
$LANG_GF01['USERPREFS']      = 'Preferenze Utente';
$LANG_GF01['SPEEDLIMIT']     = '"Your last comment was %s seconds ago.<br' . XHTML . '>This site requires at least %s seconds between forum posts."';
$LANG_GF01['ACCESSERROR']    = 'ERRORE DI ACCESSO';
$LANG_GF01['ACTIONS']        = 'Azioni';
$LANG_GF01['DELETEALL']      = 'Elimina tutti gli oggetti selezionati';
$LANG_GF01['DELCONFIRM']     = 'Sei sicuro di volr eliminare gli oggetti selezionati?';
$LANG_GF01['DELALLCONFIRM']  = 'Sei sicuro di volr Eliminare TUTTI gli oggetti selezionati??';
$LANG_GF01['STARTEDBY']      = 'Iniziato da:';
$LANG_GF01['WARNING']        = 'Avviso';
$LANG_GF01['MODERATED']      = 'Moderatori: %s';
$LANG_GF01['LASTREPLYBY']    = 'Ultima risposta da:&nbsp;%s';
$LANG_GF01['UID']            = 'UID';
$LANG_GF01['INDEXPAGE']      = 'Lista dei Forum';
$LANG_GF01['FEATURE']        = 'Funzionalitá';
$LANG_GF01['SETTING']        = 'Impostazione';
$LANG_GF01['MARKALLREAD']    = 'Segna Tutti come Visti';
$LANG_GF01['MSG_NO_CAT']     = 'Nessuna Categoria o Forum Disponibili';

// Language for bbcode toolbar
$LANG_GF01['CODE']           = 'Codice';
$LANG_GF01['FONTCOLOR']      = 'Colore Font';
$LANG_GF01['FONTSIZE']       = 'Dimensioni Font';
$LANG_GF01['CLOSETAGS']      = 'Chiudi Tag';
$LANG_GF01['CODETIP']        = 'Suggerimento: Gli stili possono essere applicati rapidamente al testo selezionato';
$LANG_GF01['TINY']           = 'Minuscolo';
$LANG_GF01['SMALL']          = 'Piccolo';
$LANG_GF01['NORMAL']         = 'Normale';
$LANG_GF01['LARGE']          = 'Grande';
$LANG_GF01['HUGE']           = 'Enorme';
$LANG_GF01['DEFAULT']        = 'Predefinito';
$LANG_GF01['DKRED']          = 'Rosso Scuro';
$LANG_GF01['RED']            = 'Rosso';
$LANG_GF01['ORANGE']         = 'Arancione';
$LANG_GF01['BROWN']          = 'Marrone';
$LANG_GF01['YELLOW']         = 'Giallo';
$LANG_GF01['GREEN']          = 'Verde';
$LANG_GF01['OLIVE']          = 'Olivastro';
$LANG_GF01['CYAN']           = 'Ciano';
$LANG_GF01['BLUE']           = 'Blu';
$LANG_GF01['DKBLUE']         = 'Blu Scuro';
$LANG_GF01['INDIGO']         = 'Indigo';
$LANG_GF01['VIOLET']         = 'Violetto';
$LANG_GF01['WHITE']          = 'Bianco';
$LANG_GF01['BLACK']          = 'Nero';

$LANG_GF01['b_help']         = "Grassetto: [b]testo[/b]";
$LANG_GF01['i_help']         = "Corsivo: [i]testo[/i]";
$LANG_GF01['u_help']         = "Sottolineato: [u]testo[/u]";
$LANG_GF01['q_help']         = "Quote text: [quote]testo[/quote]";
$LANG_GF01['c_help']         = "Visualizzazione code: [code]code[/code]";
$LANG_GF01['l_help']         = "Lista: [list]testo[/list]";
$LANG_GF01['o_help']         = "Lista ordinata: [olist]testo[/olist]";
$LANG_GF01['p_help']         = "[img]http://url_immagine[/img]  o [img w=100 h=200][/img]";
$LANG_GF01['w_help']         = "Insert URL: [url]http://url[/url] o [url=http://url]Titolo[/url]";
$LANG_GF01['a_help']         = "Cliudi tuuti i tag bbCode aperti";
$LANG_GF01['s_help']         = "Colore font: [color=red]testo[/color]  suggerimento: puoi anche usari i colori in questo formato #FF0000";
$LANG_GF01['f_help']         = "Dimensione font: [size=7]testo piccolo[/size]";
$LANG_GF01['h_help']         = "Clicca qui per vedere una guida piú dettagliata";


$LANG_GF02['msg01']    = 'Spiacente, vedi registrarti per utilizzare questo forum';
$LANG_GF02['msg02']    = 'Non dovresti essere qui!<br' . XHTML . '>L\'accesso a questo forum é ristretto';
$LANG_GF02['msg03']    = 'Attendi mentre vieni trasferito';
$LANG_GF02['msg05']    = '<center><em>Spiacente, non é ancora stato creato alcun argomento.</center></em>';
$LANG_GF02['msg07']    = 'Utenti Online:';
$LANG_GF02['msg14']    = 'Spiacente, Ti é stato impedito di creare nuovi inserimenti.<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'Se pensi che si tratti di un errore, contatta <a href="mailto:%s?subject=Guestbook IP Ban">l\'Amministratore del Sito</a>.';
$LANG_GF02['msg18']    = 'Errore! Non tutti i campi richiesti sono stati completati oppure erano troppo corti come lunghezza.';
$LANG_GF02['msg19']    = 'Il tuo messaggio é stato inviato.';
$LANG_GF02['msg22']    = '- Notifica Nuovo Messaggio sul Forum';
$LANG_GF02['msg23a']   = "\nUna risposta è stata aggiunta all'argomento '%s' da %s\n\nQuesto argomento è stato aperto da %s nel forum %s.\n";
$LANG_GF02['msg23b']   = "Il nuovo argomento '%s' è stato aggiunto da %s nel forum %s sul sito web %s.\nPuoi vederlo su: %s/forum/viewtopic.php?forum=%s&showtopic=%s\n";
$LANG_GF02['msg23c']   = "\nPuoi leggerlo su: %s/forum/viewtopic.php?forum=%s&showtopic=%s&lastpost=true\n";
$LANG_GF02['msg25']    = "\nBuona giornata! \n";
$LANG_GF02['msg26']    = "\nHai ricevuto questa e-mail perchè hai scelto di ricevere una notifica\nper ogni risposta aggiunta.";
$LANG_GF02['msg27']    = 'Per non ricevere più notifiche su questo argomento vai <a href="%s">qui</a> per rimuoverti.';
$LANG_GF02['msg33']    = 'Autore: ';
$LANG_GF02['msg36']    = 'Umore:';
$LANG_GF02['msg38']    = 'Inviami una Notifica per ogni risposta ';
$LANG_GF02['msg40']    = '<br' . XHTML . '>Spiacente, ma hai giá chiesto di ricevere notifiche per risposte a questo argomento.<br/><br/>';
$LANG_GF02['msg44']    = 'Al momento non hai nessuna notifica attiva.<p/>';
$LANG_GF02['msg49']    = '(Letto %s volte) ';
$LANG_GF02['msg55']    = 'Messaggio Eliminato.';
$LANG_GF02['msg56']    = 'IP Bloccato.';
$LANG_GF02['msg59']    = 'Argomento Normale';
$LANG_GF02['msg60']    = 'Nuovo Messaggio';
$LANG_GF02['msg61']    = 'Argomento Segnalato';
$LANG_GF02['msg62']    = 'Inviami una notifica ad ogni risposta';
$LANG_GF02['msg64']    = 'Sei sicuro di voler eliminare l\'argomento %s con titolo: %s ?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>C\'é un argomento superiore, per cui saranno eliminate anche tutte le risposte a questo.';
$LANG_GF02['msg68']    = 'Nota: FAI ATTENZIONI QUANDO BLOCCHI QUALCUNO, solo gli amministratori hanno i diritti per sbloccare qualcuno.';
$LANG_GF02['msg69']    = '<br' . XHTML . '>Vuoi davvero bloccare l\'indirizzo IP: %s?';
$LANG_GF02['msg71']    = 'Nessuna funzione selezionata, scegli un messaggio e poi una funzione di moderazione.<br' . XHTML . '>Nota: Devi essere un moderatore per utilizzare queste funzionalitá.';
$LANG_GF02['msg72']    = 'Se questo messaggio é online non hai i diritti per eseguire questa operazione di moderazione.';
$LANG_GF02['msg74']    = 'Ultimi %s Messaggi sul Forum';
$LANG_GF02['msg75']    = 'Top %s Argomenti Per Visite';
$LANG_GF02['msg76']    = 'Top %s Argomenti Per Numero Messaggi';
$LANG_GF02['msg77']    = '<br' . XHTML . '><p style="padding-left:10px;">Non dovresti essere qui!<br' . XHTML . '>Questo forum é ad accesso riservato.</p>';
$LANG_GF02['msg83']    = '<br' . XHTML . '><br' . XHTML . '>Devi essere loggato per utilizzare questa funzionalitá di questo forum.</p>';
$LANG_GF02['msg84']    = 'Segnala tutti gli argomenti come giá letti';
$LANG_GF02['msg85']    = 'Pagina:';
$LANG_GF02['msg86']    = 'Ultimi 10 messaggi per: ';
$LANG_GF02['msg87']    = '<br' . XHTML . '>Attenzione: Questo argomento é stato bloccato dal moderatore.<br' . XHTML . '>Non é possibile inviare altri messaggi';
$LANG_GF02['msg88']    = 'Utenti con Attivitá sul Forum';
$LANG_GF02['msg88b']   = 'Forum Activity Only';
$LANG_GF02['msg89']    = 'Notifiche Attive';
$LANG_GF02['msg101']   = 'Regole Forum:';
$LANG_GF02['msg103']   = 'Vai al Forum:';
$LANG_GF02['msg106']   = 'Selezionate un Forum';
$LANG_GF02['msg108']   = 'Forum Normale';
$LANG_GF02['msg109']   = 'Argomento Bloccato';        
$LANG_GF02['msg110']   = 'Trasferimento a pagina di modifica messaggio..';
$LANG_GF02['msg111']   = 'Nuovi Messaggi dalla vostra ultima visita:';
$LANG_GF02['msg112']   = 'Leggi tutti i nuovi messaggi';
$LANG_GF02['msg113']   = 'Leggi i nuovi messaggi';
$LANG_GF02['msg114']   = 'Argomento Bloccato';
$LANG_GF02['msg115']   = 'Argomento Segnalato C/ Nuovi Messaggi';
$LANG_GF02['msg116']   = 'Argomento Bloccato C/ Nuovi Messaggi';
$LANG_GF02['msg117']   = 'Cerca Ovunque';
$LANG_GF02['msg118']   = 'Cerca in questo Forum';
$LANG_GF02['msg119']   = 'Risultati Ricerca Forum per:';
$LANG_GF02['msg120']   = 'Messaggi piú visti per';
$LANG_GF02['msg121']   = 'Tutti gli orari sono %s. L\'ora attuale é %s.';
$LANG_GF02['msg122']   = 'Limite Messaggi Popolari:';
$LANG_GF02['msg123']   = 'Numero messaggi prima di chiamare un argomento popolare';
$LANG_GF02['msg126']   = 'Cerca Righe:';
$LANG_GF02['msg127']   = 'Numero righe da visualizzare come risultato della ricerca';
$LANG_GF02['msg128']   = 'Utenti Per Pagina:';
$LANG_GF02['msg129']   = 'Per la pagina elenco Utenti';
$LANG_GF02['msg130']   = 'Vedi Messaggi Anonimi:';
$LANG_GF02['msg131']   = 'L\'impostazione No filtrerá i messaggi anonimi';
$LANG_GF02['msg132']   = 'Notifica Sempre:';
$LANG_GF02['msg133']   = 'Impostando Si attiverai la notifica automatica<br' . XHTML . '>per ogni argomento creato o in risposta';
$LANG_GF02['msg134']   = 'Iscrizione Aggiunta';
$LANG_GF02['msg135']   = 'Riceverai una notifica per ogni messaggio inviato su questo forum.';
$LANG_GF02['msg136']   = 'Devi scegliere un forum cui iscrivervi.';
$LANG_GF02['msg137']   = 'Notifica per argomento attiva';
$LANG_GF02['msg138']   = "<b>Iscritto all'intero forum</b>";
$LANG_GF02['msg142']   = 'Notifica registrata.';
$LANG_GF02['msg144']   = "Ritorna all'argomento";
$LANG_GF02['msg146']   = 'Notifica Eliminata';
$LANG_GF02['msg147']   = 'Forum [versione stampabile dell\'argomento';
$LANG_GF02['msg148']   = 'Fate clic <a href="javascript:history.back()">QUI</a> per ritornare';
$LANG_GF02['msg155']   = "Nessun messaggio dall'utente.";
$LANG_GF02['msg156']   = 'Numero totale messaggi nel forum';
$LANG_GF02['msg157']   = 'Ultimi 10 messaggi nel Forum';
$LANG_GF02['msg158']   = 'Ultimi 10 messaggi nel Forum per ';
$LANG_GF02['msg159']   = 'Sei sicuro di voler ELIMINARE i record Moderatori selezionati?';
$LANG_GF02['msg160']   = 'Vai all\'ultima pagina dell\'argomento';
$LANG_GF02['msg163']   = 'Messaggio spostato';
$LANG_GF02['msg164']   = 'Segnala tutte le Categorie e gli Argomento come Letti';
$LANG_GF02['msg166']   = 'ERRORE: Argomento non valido o non trovato';
$LANG_GF02['msg167']   = 'Opzione di Notifica';
$LANG_GF02['msg168']   = 'Impostando No disabiliterai le notifiche via e-mail';
$LANG_GF02['msg169']   = 'Torna alla lista Utenti';
$LANG_GF02['msg170']   = 'Ultimi Messaggi sul Forum';
$LANG_GF02['msg171']   = 'Errore di Accesso al Forum';
$LANG_GF02['msg172']   = 'L\'argomento non esiste. Probabilmente é stato eliminato';
$LANG_GF02['msg173']   = 'Trasferimento alla Pagina del Messaggio..';
$LANG_GF02['msg174']   = 'Impossibile BLOCCARE l\'utente - Indirizzo IP non valido o vuoto';
$LANG_GF02['msg175']   = 'Ritorna alla Lista dei Forum';
$LANG_GF02['msg176']   = 'Seleziona un utente';
$LANG_GF02['msg177']   = 'Tutti gli Utenti';
$LANG_GF02['msg178']   = 'Solo i Messaggi Iniziali';
$LANG_GF02['msg179']   = 'Contenuto creato in: %s secondi';
$LANG_GF02['msg180']   = 'Avviso Forum Posting'; // FUZZY
$LANG_GF02['msg181']   = 'Come moderatore, non hai accesso ad altri forum';
$LANG_GF02['msg182']   = 'Conferma di Moderazione';
$LANG_GF02['msg183']   = 'In nuovo argomento é stato creato nel forum: %s';
$LANG_GF02['msg184']   = 'Notifica Solo Una Volta';
$LANG_GF02['msg185']   = 'Notifiche verranno solo inviato una volta per i forum e argomenti che potrebbero contenere multipli messaggi dalla tua ultima visita.';
$LANG_GF02['msg186']   = 'Titolo del Nuovo Argomento';
$LANG_GF02['msg187']   = 'Ritorna al argomento - clicca <a href="%s">qui</a>';
$LANG_GF02['msg188']   = 'Clicca per andare direttamente all\'ulmito messaggio';
$LANG_GF02['msg189']   = 'Errore: Non puoi piú modificare questo messaggio';
$LANG_GF02['msg190']   = 'Modifica Nascosta';
$LANG_GF02['msg191']   = 'Modifica non permessa. Il tempo di modifica consentito é scaduto o hai bisogno di permessi da moderatore';
$LANG_GF02['msg192']   = 'Completato ... Migrato %s argomenti e %s commenti.';
$LANG_GF02['msg193']   = 'ATRICOLO&nbsp;&nbsp;A&nbsp;&nbsp;FORUM&nbsp;&nbsp;MIGRAZIONE&nbsp;&nbsp;EXTRA';
$LANG_GF02['msg194']   = 'Quiet Forum'; //
$LANG_GF02['msg195']   = 'Clicca per Andare al Forum';
$LANG_GF02['msg196']   = 'Mostra la lista principale di Forum';
$LANG_GF02['msg197']   = 'Segna tutte le Categorie come viste';
$LANG_GF02['msg198']   = 'Aggiorna le tue impostazioni del forum';
$LANG_GF02['msg199']   = 'Vedi o rimuovi notifiche dei forum';
$LANG_GF02['msg200']   = 'Relazione sugli Utenti del Sito';
$LANG_GF02['msg201']   = 'Argomenti Popolari';
$LANG_GF02['msg202']   = 'Nessun nuovo messaggio';
$LANG_GF02['msg300']   = 'Il blocco per messaggi anonimi é attivo nelle tue preferenze';
$LANG_GF02['msg301']   = 'Davvero segnare tutte le categorie come lette?';
$LANG_GF02['msg302']   = 'Davvero segnare tutti gli argomenti come letti?';
$LANG_GF02['PostReply']   = 'Invia Nuova Risposta';
$LANG_GF02['PostTopic']   = 'Invia Nuovo Argomento';
$LANG_GF02['EditTopic']   = 'Modifica Argomento';
$LANG_GF02['quietforum']  = 'Il forum non ha nuovi argomenti';

$LANG_GF03 = array (
    'delete'            => 'Elimina Messaggio',
    'edit'              => 'Modifica Messaggio',
    'move'              => 'Sposta Argomento',
    'split'             => 'Split Topic',
    'ban'               => 'Blocca IP',
    'movetopic'         => 'Sposta Argomento',
    'movetopicmsg'      => '<br' . XHTML . '>É possibile spostare l\'argomento <b>%s</b> nei seguenti forum:',
    'splittopicmsg'     => '<br' . XHTML . '>Create a new Topic with this post: "<b>%s</b>"<br' . XHTML . '><em>By:</em>&nbsp;%s&nbsp <em>On:</em>&nbsp;%s',
    'selectforum'       => 'Select new forum:',
    'lockedpost'        => 'Add Reply Post',
    'splitheading'      => 'Split thread option:',
    'splitopt1'         => 'Move all posts from this point',
    'splitopt2'         => 'Move only this one post'
);

$LANG_GF04 = array (
    'label_forum'             => 'Profilo Forum',
    'label_location'          => 'Localitá',
    'label_aim'               => 'AIM',
    'label_yim'               => 'Yahoo IM',
    'label_icq'               => 'ICQ',
    'label_msnm'              => 'MSN Messenger',
    'label_interests'         => 'Interessi',
    'label_occupation'        => 'Occupazione',
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
    1   => 'Statistiche',
    2   => 'Impostazioni',
    3   => 'Forum',
    4   => 'Moderatori',
    5   => 'Converti',
    6   => 'Messaggi',
    7   => 'Gestione IP'
);


/* User Functions Navbar */
$LANG_GF07 = array (
    1   => 'Visita Forum',
    2   => 'Preferenze',
    3   => 'Argomenti Popolari',
    4   => 'Iscrizioni',
    5   => 'Utenti'
);


/* Forum User Features */
$LANG_GF08 = array (
    1   => 'Notifiche degli Argomenti',
    2   => 'Segui le Notifiche del Forum',
    3   => 'Segui le Notifiche delle Eccezioni'
);

/* Text for the buttons */
$LANG_GF09 = array (
    'edit'     => 'Modifica',
    'email'    => 'Email',
    'home'     => 'Home',
    'lastpost' => 'Ultimo Messaggio',
    'pm'       => 'MP', // private message
    'profile'  => 'Profilo',
    'quote'    => 'Quote',//
    'website'  => 'Sito Internet',
    'newtopic' => 'Nuovo Argomento',
    'replytopic' => 'Rispondi al Messaggio'
);

$LANG_GF91 = array (
    'gfstats'            => 'Statistiche Forum di Discussione',
    'statsmsg'           => 'Queste sono le statistiche attuali per il vostro forum:',
    'totalcats'          => 'Totale Categorie:',
    'totalforums'        => 'Totale Forum:',
    'totaltopics'        => 'Totale Argomenti:',
    'totalposts'         => 'Totale Messaggi:',
    'totalviews'         => 'Totale Visite:',
    'avgpmsg'            => 'Media messaggi per:',
    'category'           => 'Categoria:',
    'forum'              => 'Forum:',
    'topic'              => 'Argomento:',
    'avgvmsg'            => 'Media visite per:'
);

$LANG_GF92 = array (
    'gfsettings'         => 'Impostazioni Forum di Discussione',
    'showiframe'         => 'Mostra Rivedi Argomento:',
    'showiframedscp'     => 'Mostra Rivedi Argomento (Iframe) in basso quando<br' . XHTML . '>si risponde ad un argomento',
    'topicspp'           => 'Argomenti Per Pagina:',
    'topicsppdscp'       => 'Numero argomenti da visualizzare sulla pagina indice del forum',
    'postspp'            => 'Messaggi Per Pagina:',
    'postsppdscp'        => 'Numero di messaggi da mostrare in una pagina',
    'setsavemsg'         => 'Impostazioni registrate.',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => 'Amministrazione Forum di Discussione',
    'addcat'             => 'Aggiungi Categoria Forum',
    'addforum'           => 'Aggiungi Un Forum',
    'catorder'           => 'Ordina per Categorie',
    'catadded'           => 'Categoria Aggiunta.',
    'catdeleted'         => 'Categoria Eliminata',
    'catedited'          => 'Categoria Modificate.',
    'forumadded'         => 'Forum Aggiunto.',
    'forumaddError'      => 'Errore in Aggiunta Forum.',
    'forumdeleted'       => 'Forum Eliminato',
    'forumedited'        => 'Forum Modificato',
    'forumordered'       => 'Ordine dei Forum Modificato',
    'back'               => 'Indietro',
    'addnote'            => 'Nota: Puoi modificare questi valori.',
    'editforumnote'      => 'Modifica Dettagli Forum per: <b>"%s"</b>',
    'deleteforumnote1'   => 'Vuoi eliminare il forum <b>"%s"</b>&nbsp;?',
    'editcatnote'        => 'Modifica Dettagli Categoria per: <b>"%s"</b>',
    'deletecatnote1'     => 'Vuoi elimiare la categoria <b>"%s"</b>&nbsp;?',
    'deletecatnote2'     => 'Saranno eliminati i forum ed anche tutti messaggi inviati in tali forum.',
    'undercat'           => 'Sotto Categoria',
    'deleteforumnote2'   => 'Tutti gli argomenti inviati sotto saranno pure eliminati.',
    'groupaccess'        => 'Accesso Gruppo: ',
    'action'             => 'Azioni',
    'forumdescription'   => 'Descrizione Forum',
    'posts'              => 'Messaggi',
    'ordertitle'         => 'Ordina',
    'ModEdit'            => 'Modifica',
    'ModMove'            => 'Sposta',
    'ModStick'           => 'Evidenzia',
    'ModBan'             => 'Blocca',
    'addmoderator'       => "Aggiungi\nModeratore",
    'delmoderator'       => " Elimina\nSelezionato",
    'moderatorwarning'   => '<b>Attenzione: Non é stato definito alcun Forum</b><br' . XHTML . '><br' . XHTML . '>Imposta le Categorie dei Forum e Aggiungi almeni 1 forum<br' . XHTML . '>prima di provare ad aggiungere Moderatori',
    'private'            => 'Forum Privato',
    'filtertitle'        => 'Seleziona i Moderatori da Vedere',
    'addmessage'         => 'Aggiungi unj Nuovo Moderatore',
    'allowedfunctions'   => 'Functioni Consentite',
    'userrecords'        => 'Elenco Utenti',
    'grouprecords'       => 'Elenco Gruppi',
    'filterview'         => 'Mostra',
    'readonly'           => 'Forum in Sola Lettura',
    'readonlydscp'       => 'Solo Moderatori posso scrivere in questo forum',
    'hidden'             => 'Forum Nascosti',
    'hiddendscp'         => 'Forum non verrá mostrato nell\'elenco dei forum',
    'hideposts'          => 'Nascondi i Nuovi Messaggi',
    'hidepostsdscp'      => 'Gli aggiornamenti non verranno mostrati nel Blocco dei Nuovi Messaggi o i flussi RSS',
    'mod_title'          => 'Moderatori Forum',
    'allforums'          => 'Tutti i Forum'
);

$LANG_GF95 = array (
    'header1'           => 'Messaggi delle Conversazioni',
    'header2'           => 'Messaggi delle Conversazioni per il forum&nbsp;&raquo;&nbsp;%s',
    'notyet'            => 'Questa funzionalitá non é stata ancora implementata',
    'delall'            => 'Elimina Tutto',
    'delallmsg'         => 'Sei sicuro di voler eliminare tutti i messaggi inviati da: %s?',
    'underforum'        => '<b>Sotto il Forum: %s (ID #%s)',
    'moderate'          => 'Modera',
    'nomess'            => 'Non sono ancora stati inviati messaggi! '
);

$LANG_GF96 = array (
    'ip'                 => 'IP',
    'enterip'            => 'Entra un indirizzo IP da bloccare',
    'gfipman'            => 'Gestione IP',
    'ban'                => 'Blocca',
    'noips'              => 'Nessun IP é stato ancora bloccato!',
    'unban'              => 'Sblocca',
    'ipbanned'           => 'Indirizzo IP Bloccato',
    'banip'              => 'Conferma Blocco IP',
    'banipmsg'           => 'Sei sicuro di voler bloccare l\ip %s?',
    'specip'             => 'Prego specifica un indirizzo IP da bloccare!',
    'ipunbanned'         => 'Indirizzo IP Sbloccato.',
    'noip'               => 'You did not provide an IP address!'
);

// Localization of the Admin Configuration UI
$LANG_configsections['forum'] = array(
    'label' => 'Forum',
    'title' => 'Configurazione Forum'
);

$LANG_confignames['forum'] = array(
    'registration_required' => 'Login Necessario per Vedere Messaggi?',
    'registered_to_post'    => 'Login Necessario per Inviare Messaggi?',
    'allow_notification'    => 'Consentire Notifiche?',
    'show_topicreview'      => 'Mostrare Revisione Dell\'Argomento Durante l\'Invio della Risposta?',
    'allow_user_dateformat' => 'Consentire Formati Personalizzati della Data?',
    'use_pm_plugin'         => 'Utilizzare l\'Estensione dei Messaggi Privati?',
    'show_topics_perpage'   => 'Numbero di Topics to Show per Page',
    'show_posts_perpage'    => 'Numbero di Posts to Show per Page',
    'show_messages_perpage' => 'Numbero di Message Lines per Page',
    'show_searches_perpage' => 'Numbero di Search Results per Page',
    'showblocks'            => 'Block Columns to Show with Forum',//
    'usermenu'              => 'Tipo del Menu Utente',
    'use_themes_template'   => 'Use templates in the theme directory',
    // ----------------------------------
    'show_subject_length'   => 'Mass Lunghezza del Oggetto',
    'min_username_length'   => 'Min Lunghezza del Nome Utente',
    'min_subject_length'    => 'Min Lunghezza del Oggetto',
    'min_comment_length'    => 'Min Lunghezza del Contenuto dei Messaggi',
    'views_tobe_popular'    => 'Numero di Visualizzazzioni Per Essere Popolare',
    'post_speedlimit'       => 'Limite di Velocitá per l\'Inviodei Messaggi (sec)',
    'allowed_editwindow'    => 'Tempo(sec) per Consentire la Modifica dei Messaggi',
    'allow_html'            => 'Consentire Modalitá HTML?',
    'post_htmlmode'         => 'Impostare Modalitá HTML come Predefinita?',
    'convert_break'         => 'Convertire i Ritorni a Capo al Tag HTML &lt;BR&gt;?',
    'use_censor'            => 'Utilizzare la Funzionalitá di Cenura di Geeklog?',
    'use_glfilter'          => 'Utilizzare la Funzionalitá di Filtraggio di Geeklog?',
    'use_geshi'             => 'Utilizzare Geshi per Formattare Codice?',
    'use_spamx_filter'      => 'Utilizzare l\'Estensione Spam-X?',
    'show_moods'            => 'Abilitare Umoris?',
    'allow_smilies'         => 'Abilitare Smilies?',
    'use_smilies_plugin'    => 'Utilizzare l\Estensione Smilies?',
    'avatar_width'          => 'Larghezza dell\'Avatar degli Utenti',
    // ----------------------------------
    'show_centerblock'      => 'Abilitare il Blocco Centrale?',
    'centerblock_homepage'  => 'Abilitare Solo sulla Homepage?',
    'centerblock_numposts'  => 'Numbero di Argomenti da Mostare',
    'cb_subject_size'       => 'Mass Lunghezza dell\'Oggetto',
    'centerblock_where'     => 'Posizionamento nella Pagina',
    // ----------------------------------
    'sideblock_numposts'    => 'Numbero di Messaggi da Mostrare',
    'sb_subject_size'       => 'Mass Lunghezza dell\'Oggetto',
    'sb_latestpostonly'     => 'Mostare Solo i Post Recenti?',
    // ----------------------------------
    'level1'                => 'Numero di Messaggi per Raggiungere Grado 1',
    'level2'                => 'Numero di Messaggi per Raggiungere Grado 2',
    'level3'                => 'Numero di Messaggi per Raggiungere Grado 3',
    'level4'                => 'Numero di Messaggi per Raggiungere Grado 4',
    'level5'                => 'Numero di Messaggi per Raggiungere Grado 5',
    'level1name'            => 'Nominativo del Grado 1',
    'level2name'            => 'Nominativo del Grado 2',
    'level3name'            => 'Nominativo del Grado 3',
    'level4name'            => 'Nominativo del Grado 4',
    'level5name'            => 'Nominativo del Grado 5'
);

$LANG_configsubgroups['forum'] = array(
    'sg_main' => 'Impostazioni Principali'
);

$LANG_tab['forum'] = array(
    'tab_main'         => 'Impostazioni Generali del Forum',
    'tab_topicposting' => 'Invio Argomenti',
    'tab_centerblock'  => 'Blocco Centrale',
    'tab_sideblock'    => 'Blocchi Laterali',
    'tab_rank'         => 'Grado'
);

$LANG_fs['forum'] = array(
    'fs_main'         => 'Impostazioni Generali del Forum',
    'fs_topicposting' => 'Invio Argomenti',
    'fs_centerblock'  => 'Blocco Centrale',
    'fs_sideblock'    => 'Blocchi Laterali',
    'fs_rank'         => 'Grado'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['forum'] = array(
    0 => array('Si' => 1, 'No' => 0),
    1 => array('Si' => TRUE, 'No' => FALSE),
    5 => array('Inizio Pagina' => 1, 'Dopo L\'Articolo in Vetrina' => 2, 'Fine Pagina' => 3),
    6 => array('Con Blocchi Sinistri' => 'leftblocks', 'Con Blocchi Destri' => 'rightblocks', 'Con Tutti i Blocchi' => 'allblocks', 'Senza Blocchi' => 'noblocks'),
    7 => array('Menu nel Blocco' => 'blockmenu', 'Barra di Navigazione' => 'navbar', 'Nessuno' => 'none'),
    12 => array('Nessun accesso' => 0, 'Solo Lettura' => 2, 'Lettura e Scrittura' => 3),
);
?>
