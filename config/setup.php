<?php
if(!defined('ROOT_DIR')) die("Access Denied");

$url_base = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
$url_base .= '://'.$_SERVER['HTTP_HOST'].'/'.$config["root"];			
define("URL_BASE", $url_base);

require_once(SYS_DIR."/core/handler.php");
new Handler($config);

$uri = $_SERVER['REQUEST_URI'];
parse_str($uri, $query);


if(!isset($query['c']) || !file_exists(APP_DIR."/controllers/".$query['c'].".php")){
	$query['c'] = $config["index"];
	$query['m'] = "index";
}

if(ENV == 'test'){
	define("MASTER", SYS_DIR."/test/master_test.php");
	require_once(MASTER);
	$master = new Master();
	$master->controller($query);
}
else{
	define("MASTER", SYS_DIR."/core/master.php");
	require_once(MASTER);
	$master = new Master();
	$master->controller($query);
}

?>