<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.8.0                                               |
// +---------------------------------------------------------------------------+
// | hebrew_utf-8.php                                                          |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006 by the following authors:                              |
// |    LWC                                               lior.weissbrod.com   |
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

$PLG_forum_MESSAGE1 = 'התקנת ה-forum plugin הסתיימה בהצלחה!';
$PLG_forum_MESSAGE2 = 'Forum Plugin upgrade: We are unable to update this version automatically. Refer to the plugin documentation.';
$PLG_forum_MESSAGE5 = 'התקנה ה-forum plugin נכשלה - בידקו את ה-error.log';
$PLG_forum_MESSAGE3002 = $LANG32[9];

$LANG_GF00 = array (
    'pluginlabel'       => 'פורום',         // What shows up in the siteHeader
    'searchlabel'       => 'פורומים',
    'statslabel'        => 'סך הכל דיונים (תגובות) בפורומים',
    'statsheading1'     => '%s הדיונים הכי נצפים בפורומים',
    'statsheading2'     => '%s הדיונים עם הכי הרבה תגובות בפורומים',
    'statsheading3'     => 'אין דיונים לדווח עליהם',
    'useradminmenu'     => 'הגדרות פורום',
    'access_denied'     => 'הגישה לא אושרה',
    'autotag_desc_forum' => '[forum: id alternate title] - Displays a link to a forum topic using the text \'here\' as the title. An alternate title may be specified but is not required.'
);


$LANG_GF01['FORUM']          = 'פורום';
$LANG_GF01['ALL']            = 'All'; 
$LANG_GF01['YES']            = 'כן';
$LANG_GF01['NO']             = 'לא';
$LANG_GF01['NEW']            = 'New';
$LANG_GF01['NEXT']           = 'Next';
$LANG_GF01['ERROR']          = 'שגיאה!';
$LANG_GF01['CONFIRM']        = 'אישור';
$LANG_GF01['UPDATE']         = 'עידכון';
$LANG_GF01['SAVE']           = 'שמירה';
$LANG_GF01['CANCEL']         = 'ביטול';
$LANG_GF01['ON']             = 'מתי: ';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>On: </b>';
$LANG_GF01['BY']             = 'נכתב על ידי: ';
$LANG_GF01['RE']             = 'Re: ';
$LANG_GF01['DATE']           = 'תאריך';
$LANG_GF01['VIEWS']          = 'צפיות';
$LANG_GF01['REPLIES']        = 'תגובות';
$LANG_GF01['NAME']           = 'השם:';
$LANG_GF01['DESCRIPTION']    = 'התיאור: ';
$LANG_GF01['TOPIC']          = 'דיון';
$LANG_GF01['TOPICS']         = 'דיונים';
$LANG_GF01['TOPICSUBJECT']   = 'נושא הדיון';
$LANG_GF01['HOMEPAGE']       = 'Home';
$LANG_GF01['SUBJECT']        = 'נושא';
$LANG_GF01['HELLO']          = 'Hello ';
$LANG_GF01['MOVED']          = 'הועבר לפה';
$LANG_GF01['POSTS']          = 'הודעות';
$LANG_GF01['LASTPOST']       = 'הודעה אחרונה';
$LANG_GF01['POSTEDON']       = 'נכתב ב';
$LANG_GF01['POSTEDBY']       = 'Posted By';
$LANG_GF01['PAGES']          = 'Pages';
$LANG_GF01['TODAY']          = 'היום ב-';
$LANG_GF01['REGISTERED']     = 'נרשם';
$LANG_GF01['ORDERBY']        = 'Order:&nbsp;';
$LANG_GF01['ORDER']          = 'סדר המיון:';
$LANG_GF01['USER']           = 'שם משתמש';
$LANG_GF01['GROUP']          = 'קבוצה';
$LANG_GF01['ANON']           = 'Anonymous: ';
$LANG_GF01['ADMIN']          = 'Admin';
$LANG_GF01['AUTHOR']         = 'מחבר';
$LANG_GF01['NOMOOD']         = 'ללא מצב רוח';
$LANG_GF01['REQUIRED']       = '[Required]';
$LANG_GF01['OPTIONAL']       = '[Optional]';
$LANG_GF01['SUBMIT']         = 'שליחה';
$LANG_GF01['PREVIEW']        = 'תצוגה מקדימה';
$LANG_GF01['REMOVE']         = 'מחיקה';
$LANG_GF01['EDIT']           = 'עריכה';
$LANG_GF01['DELETE']         = 'מחיקה';
$LANG_GF01['OPTIONS']        = 'אפשרויות:';
$LANG_GF01['MISSINGSUBJECT'] = 'בלי נושא';
$LANG_GF01['MIGRATE_NOW']    = 'Migrate Now'; 
$LANG_GF01['FILTERLIST']     = 'Filter List';
$LANG_GF01['SELECTFORUM']    = 'Select Forum';
$LANG_GF01['DELETEAFTER']    = 'Delete after';
$LANG_GF01['TITLE']          = 'Title';
$LANG_GF01['COMMENTS']       = 'Comments'; 
$LANG_GF01['SUBMISSIONS']    = 'Submissions';
$LANG_GF01['HTML_FILTER_MSG']  = '<span dir="rtl">מאופשר HTML מסונן</span>';
$LANG_GF01['HTML_FULL_MSG']  = '<span dir="rtl">מאופשר HTML מלא</span>';
$LANG_GF01['HTML_MSG']       = '<span dir="rtl">שימוש ב-HTML</span>';
$LANG_GF01['CENSOR_PERM_MSG']  = 'התוכן מצונזר';
$LANG_GF01['ANON_PERM_MSG']    = 'מוצגות הודעות אנונימיות';
$LANG_GF01['POST_PERM_MSG1']    = 'אתם יכולים לכתוב';
$LANG_GF01['POST_PERM_MSG2']    = 'משתמשים אנונימיים יכולים לכתוב';
$LANG_GF01['GO']             = 'בצעו';
$LANG_GF01['STATUS']         = 'Status:';
$LANG_GF01['ONLINE']         = 'online';
$LANG_GF01['OFFLINE']        = 'offline';
$LANG_GF01['back2parent']    = 'Parent Topic';
$LANG_GF01['forumname']      = '';   // Enter name here if you want it to show in the footer of the admin screens
$LANG_GF01['category']       = 'Category: ';
$LANG_GF01['loginreqview']   = '<b>אנו מצטערים, עליכם %s להירשם</a> או %s להיכנס למערכת</a> כדי להשתמש בפורומים אלו';
$LANG_GF01['loginreqpost']   = '<b>אנו מצטערים, עליכם להירשם או להיכנס למערכת כדי לכתוב בפורומים אלו</b>';
$LANG_GF01['nolastpostmsg']  = 'אין';
$LANG_GF01['no_one']         = 'No one.';
$LANG_GF01['back2top']       = 'Back to top';
$LANG_GF01['TEXTMODE']       = 'מצב טקסט פשוט:';
$LANG_GF01['HTMLMODE']       = 'מצב HTML:';
$LANG_GF01['TopicPreview']   = 'תצוגה מקדימה של הודעת הדיון';
$LANG_GF01['moderator']      = 'מפקח';
$LANG_GF01['admin']          = 'מנהל';
$LANG_GF01['DATEADDED']      = 'תאריך הוספה';
$LANG_GF01['PREVTOPIC']      = 'הדיון הקודם';
$LANG_GF01['NEXTTOPIC']      = 'הדיון הבא';
$LANG_GF01['RESYNC']         = "בצעו סינכרוניזציה מחדש";
$LANG_GF01['RESYNCCAT']      = "ReSync Category Forums";  
$LANG_GF01['EDITICON']       = 'עריכה&';
$LANG_GF01['QUOTEICON']      = 'צטטו&';
$LANG_GF01['ProfileLink']    = 'פרופיל&';
$LANG_GF01['WebsiteLink']    = 'אתר אינטרנט&';
$LANG_GF01['PMLink']         = 'PM';
$LANG_GF01['EmailLink']      = 'אי מייל&';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Subscribe to this forum';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'Un-Subscribe to this forum';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'Subscribe:Enabled';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['NEWTOPIC']       = 'דיון חדש';
$LANG_GF01['POSTREPLY']      = 'Post Reply';
$LANG_GF01['SubscribeLink']  = 'הרשמה';
$LANG_GF01['unSubscribeLink'] = 'מחיקה מההרשמה';
$LANG_GF01['SubscribeLink_TRUE']  = 'Subscribe:Enabled';
$LANG_GF01['SubscribeLink_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['SUBSCRIPTIONS']  = 'Subscriptions';
$LANG_GF01['TOP']            = 'Top of Post';
$LANG_GF01['PRINTABLE']      = 'גירסה להדפסה';
$LANG_GF01['USERPREFS']      = 'User Preferences';
$LANG_GF01['SPEEDLIMIT']     = 'תגובתכם הקודמת הייתה לפני %s שניות.<br' . XHTML . '>אתר זה דורש לפחות %s שניות בין שליחת הודעות פורומים.';
$LANG_GF01['ACCESSERROR']    = 'שגיאה בגישה';
$LANG_GF01['ACTIONS']        = 'פעולות';
$LANG_GF01['DELETEALL']      = 'מחיקת כל הפריטים המסומנים';
$LANG_GF01['DELCONFIRM']     = 'האם הנכם בטוחים שאתם רוצים למחוק את הפריטים המסומנים';
$LANG_GF01['DELALLCONFIRM']  = 'האם הנכם בטוחים שאתם רוצים למחוק את *כל* הפריטים המסומנים';
$LANG_GF01['STARTEDBY']      = 'נוצר על ידי:';
$LANG_GF01['WARNING']        = 'אזהרה';
$LANG_GF01['MODERATED']      = 'מפקחים: %s';
$LANG_GF01['LASTREPLYBY']    = 'התגובה האחרונה היא של:&nbsp;%s';
$LANG_GF01['UID']            = 'קוד זיהוי משתמש';
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
$LANG_GF02['msg05']    = '<center><em>Sorry, no topics have been created yet.</em></center>';
$LANG_GF02['msg07']    = 'משתמשים מחוברים:';
$LANG_GF02['msg14']    = 'Sorry, You have been banned from making entries.<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'If you feel this is an error, contact <a href="mailto:%s?subject=Forum IP Ban">Site Admin</a>.';
$LANG_GF02['msg18']    = 'שגיאה! לא כל השדות הושלמו או שהם היו קצרים מדי באורכם.';
$LANG_GF02['msg19']    = 'הודעתכם נשלחה.';
$LANG_GF02['msg22']    = '- Forum Post Notification';
$LANG_GF02['msg23a']   = "A reply has been made to the thread '%s' by %s.\n\nThis topic was started by %s in the %s forum. ";
$LANG_GF02['msg23b']   = "A new topic '%s' has been posted by %s in the %s forum on the %s website. You may view it at:\n%s/forum/viewtopic.php?showtopic=%s\n";
$LANG_GF02['msg23c']   = "You may view it at:\n%s/forum/viewtopic.php?showtopic=%s&lastpost=true\n";
$LANG_GF02['msg25']    = "\nHave a great day! \n";
$LANG_GF02['msg26']    = "\nYou are receiving this email because you have chosen to be notified when a reply has been made to this topic. ";
$LANG_GF02['msg27']    = "To stop receiving notifications on this topic go to <%s> to remove it.\n";
$LANG_GF02['msg33']    = 'מחבר: ';
$LANG_GF02['msg36']    = 'מצב רוח:';
$LANG_GF02['msg38']    = 'הודיעו לי על תגובות ';
$LANG_GF02['msg40']    = '<br' . XHTML . '>Sorry, but you have already asked to be notified of replies to this topic.<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg44']    = '<p style="margin:0px; padding:5px;">אין לכם כרגע שום התראות.</p>';
$LANG_GF02['msg49']    = '(נצפה %s פעמים) ';
$LANG_GF02['msg55']    = 'ההודעה נמחקה.';
$LANG_GF02['msg56']    = 'כתובת ה-IP הוחרמה.';
$LANG_GF02['msg59']    = 'דיון רגיל';
$LANG_GF02['msg60']    = 'הודעה חדשה';
$LANG_GF02['msg61']    = 'דיון דביק';
$LANG_GF02['msg62']    = 'Notify me of replies';
$LANG_GF02['msg64']    = 'האם הנכם מעוניינים למחוק את נושא %s שכותרתו: %s ?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>זהו נושא ראשי, ולכן כל התגובות לו ימחקו גם.';
$LANG_GF02['msg68']    = 'שימו לב: *היזהרו כשאתם מחרימים*, רק מנהלים יכולים להפסיק חרם.';
$LANG_GF02['msg69']    = 'האם הנכם באמת מעוניינים להחרים את הכתובת: %s?';
$LANG_GF02['msg71']    = 'שום פונקציה לא נבחרה. ביחרו הודעה ואז פונקציית מפקח.<br' . XHTML . '>שימו לב: הנכם חייבים להיות מפקחים כדי לבצע פונקציות אלה.';
$LANG_GF02['msg72']    = 'אזהרה, אין לכם הרשאה לבצע פעולת פיקוח זו.';
$LANG_GF02['msg74']    = 'Latest %s Forum Posts';
$LANG_GF02['msg75']    = 'Top %s Topics By Views';
$LANG_GF02['msg76']    = 'Top %s Topics By Posts';
$LANG_GF02['msg77']    = '<br' . XHTML . '><p style="padding-left:10px;">You should not be here!<br' . XHTML . '>Restricted access to this forum only.</p>';
$LANG_GF02['msg83']    = '<br' . XHTML . '><br' . XHTML . '>You need to be signed in to use this forum feature.</p>';
$LANG_GF02['msg84']    = 'סמנו את כל הדיונים ככאלו שנקראו';
$LANG_GF02['msg85']    = 'עמוד:';
$LANG_GF02['msg86']    = '&nbsp;%s ההודעות האחרונות&nbsp;';
$LANG_GF02['msg87']    = '<br' . XHTML . '>אזהרה: דיון זה ננעל על ידי המפקחים.<br' . XHTML . '>שום תגובות אליו לא מותרות';
$LANG_GF02['msg88']    = 'משתמשי האתר';
$LANG_GF02['msg88b']   = 'Site Members with Forum Activity';
$LANG_GF02['msg89']    = 'My Enabled Notifications';
$LANG_GF02['msg101']   = 'Forum Rules:';
$LANG_GF02['msg103']   = 'Forum Jump:';
$LANG_GF02['msg106']   = 'ביחרו פורום';
$LANG_GF02['msg108']   = 'אין הודעות חדשות מאז כניסתך האחרונה למערכת';
$LANG_GF02['msg109']   = 'דיון נעול';        
$LANG_GF02['msg110']   = 'מעביר לעמוד עריכת ההודעות...';
$LANG_GF02['msg111']   = 'הודעות חדשות מאז כניסתך האחרונה למערכת';
$LANG_GF02['msg112']   = 'צפו בכל ההודעות החדשות';
$LANG_GF02['msg113']   = 'View new posts';
$LANG_GF02['msg114']   = 'דיון נעול';
$LANG_GF02['msg115']   = 'דיון דביק עם הודעה חדשה';
$LANG_GF02['msg116']   = 'דיון נעול עם הודעה חדשה';
$LANG_GF02['msg117']   = 'חיפוש כללי';
$LANG_GF02['msg118']   = 'חיפוש בפורום זה';
$LANG_GF02['msg119']   = 'תוצאות חיפוש בפורום עבור:';
$LANG_GF02['msg120']   = 'ההודעות הפופולריות ביותר על פי';
$LANG_GF02['msg121']   = 'השעה עכשיו היא %s';
$LANG_GF02['msg122']   = 'סף הפופולריות:';
$LANG_GF02['msg123']   = 'מספר ההודעות הדרושות כדי להחשיב נושא כפופולרי';
$LANG_GF02['msg126']   = 'שורות בחיפוש:';
$LANG_GF02['msg127']   = 'מספר השורות שיוצגו בתוצאות חיפושים';
$LANG_GF02['msg128']   = 'משתמשים בכל עמוד:';
$LANG_GF02['msg129']   = 'במסך רשימת המשתמשים';
$LANG_GF02['msg130']   = 'הצגת הודעות אנונימיות';
$LANG_GF02['msg131']   = 'בחירה בלא תסנן הודעות אנונימיות';
$LANG_GF02['msg132']   = 'Always Notify';
$LANG_GF02['msg133']   = 'Setting of Yes will enable auto notifcation for any topics you create or reply';
$LANG_GF02['msg134']   = 'Subscription Added';
$LANG_GF02['msg135']   = 'You will now be notified of all posts to this forum.';
$LANG_GF02['msg136']   = 'You must choose a forum to subscribe to.';
$LANG_GF02['msg137']   = 'Notification for topic enabled';
$LANG_GF02['msg138']   = '<b>רשום לכל הפורום</b>';
$LANG_GF02['msg142']   = 'בקשת ההרשמה נשמרה.';
$LANG_GF02['msg144']   = 'Return to topic';
$LANG_GF02['msg146']   = 'ההתראה נמחקה';
$LANG_GF02['msg147']   = 'פורום [גירסה מודפסת של נושא';
$LANG_GF02['msg148']   = 'ליחצו <a href="javascript:history.back()">כאן</a> כדי לחזור';
$LANG_GF02['msg155']   = 'No user posts.';
$LANG_GF02['msg156']   = 'Total number of forum posts';
$LANG_GF02['msg157']   = 'Last 10 Forum posts';
$LANG_GF02['msg158']   = 'Last 10 Forum posts by ';
$LANG_GF02['msg159']   = 'האם הנכם בטוחים שאתם רוצים *למחוק* את רשומת פיקוח זו';
$LANG_GF02['msg160']   = 'View last page of topic';
$LANG_GF02['msg163']   = 'הדיון הועבר';
$LANG_GF02['msg164']   = 'Mark all Categories and Topics Read';
$LANG_GF02['msg166']   = 'ERROR: Invalid topic or Topic not found';
$LANG_GF02['msg167']   = 'התראות באימייל';
$LANG_GF02['msg168']   = 'קבלו התראות דרך האימייל';
$LANG_GF02['msg169']   = 'חזרה לרשימת המשתמשים';
$LANG_GF02['msg170']   = 'Latest Forum Posts';
$LANG_GF02['msg171']   = 'שגיאה בגישה לפורום';
$LANG_GF02['msg172']   = 'הדיון לא קיים. אולי הוא נמחק.';
$LANG_GF02['msg173']   = 'עובר לעמוד כתיבת ההודעות...';
$LANG_GF02['msg174']   = 'Unable to BAN Member - Invalid or Empty IP Address';
$LANG_GF02['msg175']   = 'חזרה לרשימת הפורומים';
$LANG_GF02['msg176']   = 'ביחרו משתמש';
$LANG_GF02['msg177']   = 'כל המשתמשים';
$LANG_GF02['msg178']   = 'הודעות ראשיות בלבד';
$LANG_GF02['msg179']   = 'התוכן נטען תוך: %s שניות';
$LANG_GF02['msg180']   = 'התרעת כתיבה בפורומים';
$LANG_GF02['msg181']   = 'אין לכם גישה לשום פורום אחר כמפקחים';
$LANG_GF02['msg182']   = 'אישור מפקח';
$LANG_GF02['msg183']   = 'דיון חדש נוצר מהודעה זו בפורום: %s';
$LANG_GF02['msg184']   = 'Notify Once Only';
$LANG_GF02['msg185']   = 'Notifications will only be sent once for forums and topics which have multiple new posts since your last visit.';
$LANG_GF02['msg186']   = 'כותרת דיון חדשה';
$LANG_GF02['msg187']   = 'חיזרו לדיון - ליחצו <a href="%s">כאן</a>';
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
$LANG_GF02['PostReply']   = 'הוסיפו תגובה חדשה';
$LANG_GF02['PostTopic']   = 'הוסיפו דיון חדש';
$LANG_GF02['EditTopic']   = 'Edit Topic';
$LANG_GF02['quietforum']  = 'Forum has no new topics';

$LANG_GF03 = array (
    'delete'            => 'מחיקת תגובה',
    'edit'              => 'עריכת תגובה',
    'move'              => 'הזזת דיון',
    'split'             => 'פצלו את הדיון',
    'ban'               => 'החרמת כתובת IP',
    'movetopic'         => 'הזיזו את הדיון',
    'movetopicmsg'      => '<br' . XHTML . '>הדיון להזזה: "<b>%s</b>"',
    'splittopicmsg'     => '<br' . XHTML . '>צרו דיון חדש עם הודעה זו: "<b>%s</b>"<br' . XHTML . '><em>מאת:</em>&nbsp;%s&nbsp <em>נכתבה ב:</em>&nbsp;%s',
    'selectforum'       => 'ביחרו פורום חדש',
    'lockedpost'        => 'הוסיפו תגובה',
    'splitheading'      => 'אפשרות פיצול הדיון:',
    'splitopt1'         => 'הזיזו את כל ההודעות מנקודה זו',
    'splitopt2'         => 'הזיזו רק את ההודעה הספציפית הזו'
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
    1   => 'סטטיסטיקות',
    2   => 'הגדרות',
    3   => 'פורומים',
    4   => 'מפקחים',
    5   => 'המרות',
    6   => 'הודעות',
    7   => 'ניהול ה-IP'
);


/* User Functions Navbar */
$LANG_GF07 = array (
    1   => 'ראו את הפורומים',
    2   => 'Preferences',
    3   => 'דיונים פופולריים',
    4   => 'ההרשמות שלכם',
    5   => 'רשימת המשתמשים'
);


/* Forum User Features */
$LANG_GF08 = array (
    1   => 'התראות דיונים',
    2   => 'התראות פורומים',
    3   => 'התראות יוצאות דופן של דיונים'
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
    'gfstats'            => 'סטטיסטיקות פורומים',
    'statsmsg'           => 'להלן הסטטיסטיקות הנוכחיות עבור הפורומים שלכם:',
    'totalcats'          => 'סך הכל קטגוריות:',
    'totalforums'        => 'סך הכל פורומים:',
    'totaltopics'        => 'סך הכל דיונים:',
    'totalposts'         => 'סך הכל הודעות:',
    'totalviews'         => 'סך הכל צפיות:',
    'avgpmsg'            => 'ממוצע הודעות ל:',
    'category'           => 'קטגוריה:',
    'forum'              => 'פורום:',
    'topic'              => 'נושא:',
    'avgvmsg'            => 'ממוצע צפיות ל:'
);

$LANG_GF92 = array (
    'gfsettings'         => 'הגדרות הפורומים',
    'showiframe'         => 'הראו סקירת דיון',
    'showiframedscp'     => 'הראו סקירת דיון (ב-Iframe) למטה כאשר מגיבים לדיון',
    'topicspp'           => 'דיונים בכל עמוד',
    'topicsppdscp'       => 'מספר הדיונים שיוצגו בעמוד האינדקס של הפורומים',
    'postspp'            => 'הודעות בכל עמוד של דיון',
    'postsppdscp'        => 'מספר ההודעות שיוצגו בכל עמוד של דיון',
    'setsavemsg'         => 'ההעדפות נשמרו.',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => 'ניהול הפורומים',
    'addcat'             => 'הוספת קטגוריית פורומים',
    'addforum'           => 'הוספת פורום',
    'catorder'           => 'סדר מיון הקטגוריה',
    'catadded'           => 'הקטגוריה התווספה.',
    'catdeleted'         => 'הקטגוריה נמחקה',
    'catedited'          => 'הקטגוריה נערכה.',
    'forumadded'         => 'הפורום התווסף.',
    'forumaddError'      => 'שגיאה בהוספת הפורום.',
    'forumdeleted'       => 'הפורום נמחק',
    'forumedited'        => 'הפורום נערך',
    'forumordered'       => 'סדר הפורומים עודכן',
    'back'               => 'חזרה',
    'addnote'            => 'Note: You can edit these values.',
    'editforumnote'      => 'עירכו את פרטי הפורום: <b>"%s"</b>',
    'deleteforumnote1'   => 'האם הנכם רוצים למחוק את הפורום <b>"%s"</b>&nbsp;?',
    'editcatnote'        => 'עירכו את פרטי הקטגוריה: <b>"%s"</b>',
    'deletecatnote1'     => 'האם ברצונכם למחוק את הקטגוריה <b>"%s"</b>&nbsp;?',
    'deletecatnote2'     => 'כל הפורומים והדיונים שנכתבו תחתיהם ימחקו גם.',
    'undercat'           => 'תחת הקטגוריה',
    'deleteforumnote2'   => 'כל הדיונים שנכתבו תחתיו ימחקו גם.',
    'groupaccess'        => 'גישה קבוצתית: ',
    'action'             => 'פעולות',
    'forumdescription'   => 'תיאור הפורום',
    'posts'              => 'הודעות',
    'ordertitle'         => 'סדר המיון',
    'ModEdit'            => 'עריכה',
    'ModMove'            => 'הזזה',
    'ModStick'           => 'הדבקה',
    'ModBan'             => 'החרמה',
    'addmoderator'       => "הוספת רשומה",
    'delmoderator'       => " Delete\nSelected",
    'moderatorwarning'   => '<b>אזהרה: לא הוגדרו פורומים</b><br' . XHTML . '><br' . XHTML . '>הגדירו קטגוריות פורומים והוסיפו לפחות פורום אחד<br' . XHTML . '>לפני שתנסו להוסיף מפקחים',
    'private'            => 'Private Forum',
    'filtertitle'        => 'ביחרו אילו רשומות פיקוח לראות',
    'addmessage'         => 'הוספת מפקחים חדשים',
    'allowedfunctions'   => 'פונקציות מורשות',
    'userrecords'        => 'רשומות משתמשים',
    'grouprecords'       => 'רשומות קבוצות',
    'filterview'         => 'סינון בעזרת הפילטרים',
    'readonly'           => 'פורום לקריאה בלבד',
    'readonlydscp'       => 'רק המפקחים יכולים לכתוב הודעות בפורום זה',
    'hidden'             => 'פורום סודי',
    'hiddendscp'         => 'הסתירו את הפורום מאינדקס הפורומים',
    'hideposts'          => 'החביאו הודעות חדשות',
    'hidepostsdscp'      => 'עדכונים לא יופיעו בקוביות מידע של הודעות חדשות או בהזנות RSS',
    'mod_title'          => 'מפקחי הפורומים',
    'allforums'          => 'כל הפורומים'
);

$LANG_GF95 = array (
    'header1'           => 'הודעות בפורומים',
    'header2'           => 'הודעות בפורום&nbsp;&raquo;&nbsp;%s',
    'notyet'            => 'Feature has not been implemented yet',
    'delall'            => 'Delete All',
    'delallmsg'         => 'Are you sure you want to delete all messages from: %s?',
    'underforum'        => '<b>Under Forum: %s (ID #%s)',
    'moderate'          => 'פיקוח',
    'nomess'            => 'עוד לא נכתבו שום הודעות! '
);

$LANG_GF96 = array (
    'ip'                 => 'IP',
    'enterip'            => 'Enter below an IP address to ban',
    'gfipman'            => 'ניהול ה-IP',
    'ban'                => 'Ban',
    'noips'              => '<p style="margin:0px; padding:5px;">שום כתובות IP לא הוחרמו עדיין!</p>',
    'unban'              => 'להפסיק להחרים',
    'ipbanned'           => 'IP Address Banned',
    'banip'              => 'Ban IP Confirmation',
    'banipmsg'           => 'Are you sure you want to ban the ip %s?',
    'specip'             => 'אנא ציינו את כתובת ה-IP שברצונכם להחרים!',
    'ipunbanned'         => 'כתובת ה-IP כבר לא מוחרמת.',
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
