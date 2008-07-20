<?php

/**
* Include any code in this function that will be called by the internal CRON API
* The interval between runs is determined by $_CONF['cron_schedule_interval']
*/

// Example: call Dbman plugin for regular backup

function CUSTOM_runScheduledTask() {

	global $_TABLES, $_PLUGINS;
	
	// Work around except when Geeklog-1.4.0 or later is newly installed
	$result = DB_query("SELECT COUNT(*) AS cnt FROM {$_TABLES['vars']} WHERE (name = 'last_scheduled_run')");
	$A = DB_fetchArray($result);
	if ($A['cnt'] == 0) {
		DB_query("INSERT INTO {$_TABLES['vars']} (name, value) VALUES ('last_scheduled_run', 0)");
	}
	
	// Dbman will be called when installed and enabled
	if (in_array('dbman', $_PLUGINS)) {
		DBMAN_backup(false, false, false, false);
	}

}

?>