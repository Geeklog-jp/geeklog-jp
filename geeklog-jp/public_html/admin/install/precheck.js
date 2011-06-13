/**
* Check DB settings as a part of Precheck for Geeklog
*
* @author   mystral-kk <geeklog AT mystral-kk DOT net>
* @date     2011-06-13
* @version  1.4.2
* @license  GPLv2 or later
* @note     This script (precheck.js) needs 'core.js' published
*           by SitePoint Pty. Ltd.
*/
var callback = {
	/**
	* Callback function when a database was selected
	*/
	showCountResult: function(req) {
		var install_submit, db_name_warning;
		
		install_submit = $('install_submit');
		db_name_warning = $('db_name_warning');
		
		if ((req.responseText == '-ERR') || (parseInt(req.responseText) > 0)) {
			install_submit.disabled = true;
			Core.removeClass(db_name_warning, 'hidden');
			Core.addClass(db_name_warning, 'bad');
		} else {
			install_submit.disabled = false;
			Core.removeClass(db_name_warning, 'bad');
			Core.addClass(db_name_warning, 'hidden');
		}
	},
	
	/**
	* Callback function when db_name selection was changed
	*/
	dbSelected: function() {
		var type, host, user, pass, name, prefix, args;
			
		$('install_submit').disabled = true;
		Core.addClass($('db_name_warning'), 'hidden');
		
		if ($('db_name').value != '--') {
			type   = $('db_type').value;
			host   = $('db_host').value;
			user   = $('db_user').value;
			pass   = $('db_pass').value;
			name   = $('db_name').value;
			prefix = $('db_prefix').value;
			args = {
				'url': 'precheck.php',
				'method': 'get',
				'params': 'mode=counttable&type=' + type + '&host=' + host + '&user=' + user + '&pass=' + pass + '&name=' + name + '&prefix=' + prefix,
				'onSuccess': callback.showCountResult
			}
			
			// prefix could be an empty string, so we don't check it here
			if ((host != '') && (user != '') && (pass != '') && (name != '')) {
				if (!Core.Ajax(args)) {
					alert('サーバとの通信に失敗しました。');
				}
			}
		}
	},
	
	/**
	* Callback function for Ajax
	*/
	showLookupResult: function(req) {
		var db_name, install_submit, dbs, node, db, i;
		
		db_name = $('db_name');
		install_submit = $('install_submit');
		
		if (req.responseText.substring(0, 4) == '-ERR') {
			db_name.disabled = true;
			install_submit.disabled = true;
			
			if (req.responseText.length > 4) {
				$('db_err').innerHTML = req.responseText.substring(4);
				Core.addClass($('db_err'), 'bad');
			}
		} else {
			dbs = req.responseText.split(';');
			
			while (db_name.length > 0) {
				db_name.removeChild(db_name.childNodes[0]);
			}
			
			node = document.createElement('option');
			node.value = '--';
			node.appendChild(document.createTextNode('選択してください'));
			db_name.appendChild(node);
			
			for (i = 0; i < dbs.length; i ++) {
				db = dbs[i];
				node = document.createElement('option');
				node.value = db;
				node.appendChild(document.createTextNode(db));
				db_name.appendChild(node);
			}
			
			db_name.disabled = false;
			install_submit.disabled = true;
		}
	},
	
	/**
	* Callback function when <input> values were changed
	*/
	dataEntered: function() {
		var type, host, user, pass, args;
		
		type = $('db_type').value;
		host = $('db_host').value;
		user = $('db_user').value;
		pass = $('db_pass').value;
		args = {
			'url': 'precheck.php',
			'method': 'get',
			'params': 'mode=lookupdb&type=' + type + '&host=' + host + '&user=' + user + '&pass=' + pass,
			'onSuccess': callback.showLookupResult
		}
		
		if ((host != '') && (user != '') && (pass != '')) {
			if (!Core.Ajax(args)) {
				alert('サーバとの通信に失敗しました。');
			}
		}
	},
	
	/**
	* Change <input type="text"> element into <select>
	*/
	modifyDbnameField: function() {
		var db_name_parent, select, db_name_warning;
		
		if ($('db_name_input')) {
			Core.addClass($('db_name_input'), 'none');
		}
		
		if ($('db_name')) {
			Core.removeClass($('db_name'), 'none');
		}
	},
	
	/**
	* Append event listeners
	*/
	init: function() {
		this.modifyDbnameField();
		$('install_submit').setAttribute('disabled', true);
		Core.addEventListener($('db_type'), 'change', this.dataEntered);
		Core.addEventListener($('db_host'), 'keyup', this.dataEntered);
		Core.addEventListener($('db_user'), 'keyup', this.dataEntered);
		Core.addEventListener($('db_pass'), 'keyup', this.dataEntered);
		Core.addEventListener($('db_name'), 'change', this.dbSelected);
		Core.addEventListener($('db_name_input'), 'change', this.dbSelected);
	}
}

Core.start(callback);
