<?php

ini_set('display_errors', 1);

define('DSN', 'mysql:host=mydbinstancesecond.ccofwfooa2bk.ap-northeast-1.rds.amazonaws.com;unix_socket=/var/lib/mysql/mysql.sock;charset=utf8;dbname=recprog_app'); // DataSourceName
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'dbuserpass0505');
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/recprog_checker/public_html');

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

session_start();
