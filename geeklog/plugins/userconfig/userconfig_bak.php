<?php
if(strcmp(VERSION,'1.4.1')<0){
  $nmox_v141_flag=0;
  $nmox_cal_flag=1;
}else{
  $nmox_v141_flag=1;
  $nmox_cal_flag=0;
}

$nmox_site_name='no data';
if($nmox_site_name!=="no data"){$_CONF['site_name']=$nmox_site_name;}
$nmox_site_slogan='no data';
if($nmox_site_slogan!=="no data"){$_CONF['site_slogan']=$nmox_site_slogan;}
$nmox_theme='no data';
if($nmox_theme!=="no data"){
	$_CONF['theme']=$nmox_theme;
	$_CONF['layout_url']=$_CONF['site_url'].'/layout/'.$_CONF['theme'];
	$_CONF['path_layout']=$_CONF['path_themes'].$_CONF['theme'].'/';
}
//$nmox_language='no data';
//if($nmox_language!=="no data"){$_CONF['language']=$nmox_language;}
$nmox_language_flag='no data';
if($nmox_language_flag!=="no data"){$_CONF['language_flag']=$nmox_language_flag;}
$nmox_languages=array('no data','no data');
$nmox_language_files=array('no data','no data');
if($nmox_v141_flag and $nmox_language_flag==1){
	if($nmox_languages[0]!=="no data"){$_CONF['languages']=$nmox_languages;}
	if($nmox_language_files[0]!=="no data"){$_CONF['language_files']=$nmox_language_files;}
}else{
	$_CONF['languages']=null;
	$_CONF['language_files']=null;
}
if (!empty($_CONF['languages'])) {
	asort($_CONF['languages']);
	asort($_CONF['language_files']);
}
$nmox_menu_elements=array('no data','no data');
if($nmox_menu_elements[0]!=="no data"){$_CONF['menu_elements']=$nmox_menu_elements;}
$nmox_site_mail='no data';
if($nmox_site_mail!=="no data"){$_CONF['site_mail']=$nmox_site_mail;}

$nmox_disable_new_user_registration='no data';
if($nmox_disable_new_user_registration!=="no data"){$_CONF['disable_new_user_registration']=$nmox_disable_new_user_registration;}
$nmox_loginrequired='no data';
if(is_numeric($nmox_loginrequired)){$_CONF['loginrequired']=$nmox_loginrequired;}
$nmox_submitloginrequired='no data';
if(is_numeric($nmox_submitloginrequired)){$_CONF['submitloginrequired']=$nmox_submitloginrequired;}
$nmox_commentsloginrequired='no data';
if(is_numeric($nmox_commentsloginrequired)){$_CONF['commentsloginrequired']=$nmox_commentsloginrequired;}
if($nmox_cal_flag){
$nmox_calendarloginrequired='no data';
if(is_numeric($nmox_calendarloginrequired)){$_CONF['calendarloginrequired']=$nmox_calendarloginrequired;}
}
$nmox_statsloginrequired='no data';
if(is_numeric($nmox_statsloginrequired)){$_CONF['statsloginrequired']=$nmox_statsloginrequired;}
$nmox_searchloginrequired='no data';
if(is_numeric($nmox_searchloginrequired)){$_CONF['searchloginrequired']=$nmox_searchloginrequired;}
$nmox_profileloginrequired='no data';
if(is_numeric($nmox_profileloginrequired)){$_CONF['profileloginrequired']=$nmox_profileloginrequired;}
$nmox_emailuserloginrequired='no data';
if(is_numeric($nmox_emailuserloginrequired)){$_CONF['emailuserloginrequired']=$nmox_emailuserloginrequired;}
$nmox_emailstoryloginrequired='no data';
if(is_numeric($nmox_emailstoryloginrequired)){$_CONF['emailstoryloginrequired']=$nmox_emailstoryloginrequired;}
$nmox_directoryloginrequired='no data';
if(is_numeric($nmox_directoryloginrequired)){$_CONF['directoryloginrequired']=$nmox_directoryloginrequired;}
$nmox_storysubmission='no data';
if(is_numeric($nmox_storysubmission)){$_CONF['storysubmission']=$nmox_storysubmission;}
if($nmox_cal_flag){
$nmox_eventsubmission='no data';
if(is_numeric($nmox_eventsubmission)){$_CONF['eventsubmission']=$nmox_eventsubmission;}
}
$nmox_usersubmission='no data';
if(is_numeric($nmox_usersubmission)){$_CONF['usersubmission']=$nmox_usersubmission;}
$nmox_allow_user_themes='no data';
if(is_numeric($nmox_allow_user_themes)){$_CONF['allow_user_themes']=$nmox_allow_user_themes;}
$nmox_allow_username_change='no data';
if(is_numeric($nmox_allow_username_change)){$_CONF['allow_username_change']=$nmox_allow_username_change;}
$nmox_allow_account_delete='no data';
if(is_numeric($nmox_allow_account_delete)){$_CONF['allow_account_delete']=$nmox_allow_account_delete;}
$nmox_hide_author_exclusion='no data';
if(is_numeric($nmox_hide_author_exclusion)){$_CONF['hide_author_exclusion']=$nmox_hide_author_exclusion;}

$nmox_advanced_editor='no data';
if($nmox_advanced_editor!=="no data"){$_CONF['advanced_editor']=$nmox_advanced_editor;}
$nmox_notification='no data';
if($nmox_notification!=="no data"){$_CONF['notification']=$nmox_notification;}
$nmox_listdraftstories='no data';
if(is_numeric($nmox_listdraftstories)){$_CONF['listdraftstories']=$nmox_listdraftstories;}

$nmox_maximagesperarticle='no data';
if(is_numeric($nmox_maximagesperarticle)){$_CONF['maximagesperarticle']=$nmox_maximagesperarticle;}
$nmox_limitnews='no data';
if(is_numeric($nmox_limitnews)){$_CONF['limitnews']=$nmox_limitnews;}
$nmox_minnews='no data';
if(is_numeric($nmox_minnews)){$_CONF['minnews']=$nmox_minnews;}
$nmox_contributedbyline='no data';
if(is_numeric($nmox_contributedbyline)){$_CONF['contributedbyline']=$nmox_contributedbyline;}
$nmox_hideviewscount='no data';
if(is_numeric($nmox_hideviewscount)){$_CONF['hideviewscount']=$nmox_hideviewscount;}
$nmox_hideemailicon='no data';
if(is_numeric($nmox_hideemailicon)){$_CONF['hideemailicon']=$nmox_hideemailicon;}
$nmox_hideprintericon='no data';
if(is_numeric($nmox_hideprintericon)){$_CONF['hideprintericon']=$nmox_hideprintericon;}
$nmox_allow_page_breaks='no data';
if(is_numeric($nmox_allow_page_breaks)){$_CONF['allow_page_breaks']=$nmox_allow_page_breaks;}
$nmox_article_image_align='no data';
if($nmox_article_image_align!=="no data"){$_CONF['article_image_align']=$nmox_article_image_align;}
$nmox_show_topic_icon='no data';
if(is_numeric($nmox_show_topic_icon)){$_CONF['show_topic_icon']=$nmox_show_topic_icon;}
$nmox_max_image_width='no data';
if(is_numeric($nmox_max_image_width)){$_CONF['max_image_width']=$nmox_max_image_width;}
$nmox_max_image_height='no data';
if(is_numeric($nmox_max_image_height)){$_CONF['max_image_height']=$nmox_max_image_height;}
$nmox_max_topicicon_width='no data';
if(is_numeric($nmox_max_topicicon_width)){$_CONF['max_topicicon_width']=$nmox_max_topicicon_width;}
$nmox_max_topicicon_height='no data';
if(is_numeric($nmox_max_topicicon_height)){$_CONF['max_topicicon_height']=$nmox_max_topicicon_height;}
$nmox_postmode='no data';
if($nmox_postmode!=="no data"){$_CONF['postmode']=$nmox_postmode;}

$nmox_showstorycount='no data';
if(is_numeric($nmox_showstorycount)){$_CONF['showstorycount']=$nmox_showstorycount;}
$nmox_showsubmissioncount='no data';
if(is_numeric($nmox_showsubmissioncount)){$_CONF['showsubmissioncount']=$nmox_showsubmissioncount;}
$nmox_hide_home_link='no data';
if(is_numeric($nmox_hide_home_link)){$_CONF['hide_home_link']=$nmox_hide_home_link;}

$nmox_hidenewstories='no data';
if(is_numeric($nmox_hidenewstories)){$_CONF['hidenewstories']=$nmox_hidenewstories;}
$nmox_hidenewcomments='no data';
if(is_numeric($nmox_hidenewcomments)){$_CONF['hidenewcomments']=$nmox_hidenewcomments;}
$nmox_hidenewtrackbacks='no data';
if(is_numeric($nmox_hidenewtrackbacks)){$_CONF['hidenewtrackbacks']=$nmox_hidenewtrackbacks;}
$nmox_hidenewplugins='no data';
if(is_numeric($nmox_hidenewplugins)){$_CONF['hidenewplugins']=$nmox_hidenewplugins;}
if($nmox_cal_flag){
$nmox_personalcalendars='no data';
if(is_numeric($nmox_personalcalendars)){$_CONF['personalcalendars']=$nmox_personalcalendars;}
$nmox_showupcomingevents='no data';
if(is_numeric($nmox_showupcomingevents)){$_CONF['showupcomingevents']=$nmox_showupcomingevents;}
$nmox_upcomingeventsrange='no data';
if(is_numeric($nmox_upcomingeventsrange)){$_CONF['upcomingeventsrange']=$nmox_upcomingeventsrange;}
$nmox_event_types='no data';
if($nmox_event_types!=="no data"){$_CONF['event_types']=$nmox_event_types;}
}
$nmox_default_permissions_block='no data';
if($nmox_default_permissions_block!=="no data"){$_CONF['default_permissions_block']=$nmox_default_permissions_block;}
if($nmox_cal_flag){
$nmox_default_permissions_event='no data';
if($nmox_default_permissions_event!=="no data"){$_CONF['default_permissions_event']=$nmox_default_permissions_event;}
}
$nmox_default_permissions_story='no data';
if($nmox_default_permissions_story!=="no data"){$_CONF['default_permissions_story']=$nmox_default_permissions_story;}
$nmox_default_permissions_topic='no data';
if($nmox_default_permissions_topic!=="no data"){$_CONF['default_permissions_topic']=$nmox_default_permissions_topic;}

$nmox_censormode='no data';
if(is_numeric($nmox_censormode)){$_CONF['censormode']=$nmox_censormode;}
$nmox_censorreplace='no data';
if($nmox_censorreplace!=="no data"){$_CONF['censorreplace']=$nmox_censorreplace;}
$nmox_censorlist='no data';
if($nmox_censorlist!=="no data"){$_CONF['censorlist']=$nmox_censorlist;}

$nmox_allow_domains='no data';
if($nmox_allow_domains!=="no data"){$_CONF['allow_domains']=$nmox_allow_domains;}

$nmox_url_rewrite='no data';
if($nmox_url_rewrite!=="no data"){$_CONF['url_rewrite']=$nmox_url_rewrite;}
$nmox_locale='no data';
if($nmox_locale!=="no data"){$_CONF['locale']=$nmox_locale;}
$nmox_date='no data';
if($nmox_date!=="no data"){$_CONF['date']=$nmox_date;}
$nmox_daytime='no data';
if($nmox_daytime!=="no data"){$_CONF['daytime']=$nmox_daytime;}
$nmox_shortdate='no data';
if($nmox_shortdate!=="no data"){$_CONF['shortdate']=$nmox_shortdate;}
$nmox_dateonly='no data';
if($nmox_dateonly!=="no data"){$_CONF['dateonly']=$nmox_dateonly;}
$nmox_timeonly='no data';
if($nmox_timeonly!=="no data"){$_CONF['timeonly']=$nmox_timeonly;}
$nmox_week_start='no data';
if($nmox_week_start!=="no data"){$_CONF['week_start']=$nmox_week_start;}

$nmox_image_lib='no data';
if($nmox_image_lib!=="no data"){$_CONF['image_lib']=$nmox_image_lib;}
$nmox_keep_unscaled_image='no data';
if(is_numeric($nmox_keep_unscaled_image)){$_CONF['keep_unscaled_image']=$nmox_keep_unscaled_image;}

$nmox_trackback_enabled='no data';
if($nmox_trackback_enabled!=="no data"){$_CONF['trackback_enabled']=$nmox_trackback_enabled;}
$nmox_pingback_enabled='no data';
if($nmox_pingback_enabled!=="no data"){$_CONF['pingback_enabled']=$nmox_pingback_enabled;}
$nmox_ping_enabled='no data';
if($nmox_ping_enabled!=="no data"){$_CONF['ping_enabled']=$nmox_ping_enabled;}
$nmox_trackback_code='no data';
if($nmox_trackback_code!=="no data"){$_CONF['trackback_code']=$nmox_trackback_code;}
$nmox_trackbackspeedlimit='no data';
if($nmox_trackbackspeedlimit!=="no data"){$_CONF['trackbackspeedlimit']=$nmox_trackbackspeedlimit;}

$nmox_backend='no data';
if(is_numeric($nmox_backend)){$_CONF['backend']=$nmox_backend;}
$nmox_rdf_file='no data';
if($nmox_rdf_file!=="no data"){$_CONF['rdf_file']=$nmox_rdf_file;}
$nmox_rdf_limit='no data';
if(is_numeric($nmox_rdf_limit)){$_CONF['rdf_limit']=$nmox_rdf_limit;}
$nmox_rdf_storytext='no data';
if(is_numeric($nmox_rdf_storytext)){$_CONF['rdf_storytext']=$nmox_rdf_storytext;}
$nmox_syndication_max_headlines='no data';
if(is_numeric($nmox_syndication_max_headlines)){$_CONF['syndication_max_headlines']=$nmox_syndication_max_headlines;}

$nmox_commentspeedlimit='no data';
if(is_numeric($nmox_commentspeedlimit)){$_CONF['commentspeedlimit']=$nmox_commentspeedlimit;}
$nmox_comment_limit='no data';
if(is_numeric($nmox_comment_limit)){$_CONF['comment_limit']=$nmox_comment_limit;}
$nmox_comment_code='no data';
if(is_numeric($nmox_comment_code)){$_CONF['comment_code']=$nmox_comment_code;}

$nmox_check_trackback_link='no data';
if(is_numeric($nmox_check_trackback_link)){$_CONF['check_trackback_link']=$nmox_check_trackback_link;}
$nmox_multiple_trackbacks='no data';
if(is_numeric($nmox_multiple_trackbacks)){$_CONF['multiple_trackbacks']=$nmox_multiple_trackbacks;}
$nmox_pingback_self='no data';
if(is_numeric($nmox_pingback_self)){$_CONF['pingback_self']=$nmox_pingback_self;}


//1.4.1
if($nmox_v141_flag){
$nmox_hour_mode='no data';
if(is_numeric($nmox_hour_mode)){$_CONF['hour_mode']=$nmox_hour_mode;}
$nmox_rootdebug='no data';
if($nmox_rootdebug!=="no data"){$_CONF['rootdebug']=$nmox_rootdebug;}
$nmox_disallow_domains='no data';
if($nmox_disallow_domains!=="no data"){$_CONF['disallow_domains']=$nmox_disallow_domains;}
$nmox_title_trim_length='no data';
if(is_numeric($nmox_title_trim_length)){$_CONF['title_trim_length']=$nmox_title_trim_length;}
$nmox_draft_flag='no data';
if(is_numeric($nmox_draft_flag)){$_CONF['draft_flag']=$nmox_draft_flag;}
$nmox_frontpage='no data';
if(is_numeric($nmox_frontpage)){$_CONF['frontpage']=$nmox_frontpage;}
$nmox_hide_no_news_msg='no data';
if(is_numeric($nmox_hide_no_news_msg)){$_CONF['hide_no_news_msg']=$nmox_hide_no_news_msg;}
$nmox_hide_main_page_navigation='no data';
if(is_numeric($nmox_hide_main_page_navigation)){$_CONF['hide_main_page_navigation']=$nmox_hide_main_page_navigation;}
$nmox_onlyrootfeatures='no data';
if(is_numeric($nmox_onlyrootfeatures)){$_CONF['onlyrootfeatures']=$nmox_onlyrootfeatures;}
}




$nmox_newstoriesinterval='no data';
if($nmox_newstoriesinterval!=="no data"){$_CONF['newstoriesinterval']=$nmox_newstoriesinterval;}
$nmox_newcommentsinterval='no data';
if($nmox_newcommentsinterval!=="no data"){$_CONF['newcommentsinterval']=$nmox_newcommentsinterval;}
$nmox_newtrackbackinterval='no data';
if($nmox_newtrackbackinterval!=="no data"){$_CONF['newtrackbackinterval']=$nmox_newtrackbackinterval;}
$nmox_page_break_comments='no data';
if($nmox_page_break_comments!=="no data"){$_CONF['page_break_comments']=$nmox_page_break_comments;}
$nmox_disable_autolinks='no data';
if($nmox_disable_autolinks!=="no data"){$_CONF['disable_autolinks']=$nmox_disable_autolinks;}

$nmox_show_right_blocks='no data';
if($nmox_show_right_blocks!=="no data"){$_CONF['show_right_blocks']=$nmox_show_right_blocks;}

//$nmox_comment_mode='no data';
//if($nmox_comment_mode!=="no data"){$_CONF['comment_mode']=$nmox_comment_mode;}

?>