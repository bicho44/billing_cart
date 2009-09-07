/**
 * @projectDescription
 * Session - client-side object permanance using serialisation in a cookie
 * Originally developed for prototyping SmartPort back in the 90s.
 * This version uses JSON as the serialisation format.
 *
 * @requires json2.js (jason.org)
 * @requires JQuery 1.2.3
 *
 * @author jhunter
 */


/**
 * @classDescription {module} manages client-side session objects
 */
var session = {
	data: {},
	config: {
		defaultName: 'session',
		path: '/',
		expires: ''
	},

	/**
	 * @method - retrieves a session
	 * @param name (optional) retrieve a named session otherwise defaults to session.config.defaultName
	 * @return {object} session
	 */
	get: function (name) {
		name = (name || this.config.defaultName);
		name += '=';
		var cookie, cookies = document.cookie.split(';');
		for (var i = 0, len = cookies.length; i < len; i++) {
			cookie = cookies[i];
			while (cookie.charAt(0) == ' ') cookie = cookie.substring(1, cookie.length);
			if (cookie.indexOf(name) == 0) {
				this.data = JSON.parse(unescape(cookie.substring(name.length, cookie.length)));
				return this.data;
			}
		}
	},

	/**
	 * @method - stores a session object
	 * @param data (optional) an object to store otherwise defaults to session.data
	 * @param name (optional) session name - if supplied then data will not overwrite session.data
	 * @param hours (optional) hours for session expiration
	 */
	set: function (data, name, hours) {
		if (!name) {
			data = data || this.data;
			this.data = data;
			name = this.config.defaultName;
		}
		var c = this.config;
		var expires = (c.expires)? c.expires.toGMTString() : '';
		if (hours) expires = this.getHoursFromNow(hours);
		document.cookie = name +'='+ escape(JSON.stringify(data)) +'; expires='+ expires +'; path='+ c.path;
	},

	getHoursFromNow: function (hours) {
		return new Date(new Date().getTime() + hours * 3600000);
	},

	/**
	 * function: returns the document GET request
	 * @return {object} parameters
	 */
	getQueryParams: function () {
		var params = {};
		if (location.search) {
			var item, list = location.search.substring(1).split('&');
			for (var i = 0; i < list.length; i++) {
				item = list[i].split('=');
				var value = item[1].replace(/\+/g, ' ');
				params[unescape(item[0])] = unescape(value);
			}
		}
		return params;
	}
};
