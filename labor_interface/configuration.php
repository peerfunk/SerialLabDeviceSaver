<?php
class config{
	public static $default_view = 'welcome';
	public static $offline = '0';
	public static $offline_message = 'This site is down for maintenance.';
	public static $sitename = '';
	public static $dbtype = 'mysqli';
	public static $host = 'localhost';
	public static $user = 'root';
	public static $pass = '';
	public static $dbName = 'labor';
	public static $secret = '';
	public static $mailonline = '1';
	public static $mailer = 'mail';
	public static $mailfrom = '';
	public static $fromname = '';
	public static $sendmail = '/usr/sbin/sendmail';
	public static $smtpauth = '0';
	public static $smtpuser = '';
	public static $smtppass = '';
	public static $smtphost = 'localhost';
	public static $smtpsecure = 'none';
	public static $smtpport = '25';
	public static $MetaDesc = '';
	public static $MetaKeys = '';
	public static $MetaTitle = '1';
	public static $MetaAuthor = '1';
	public static $MetaVersion = '0';
	public static $log_path = '';
	public static $tmp_path = '';
	public static $SessionLifetime = '15';
}