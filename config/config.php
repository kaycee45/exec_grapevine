<?php
if(!defined('ROOT_DIR')) die("Access Denied");

//root folder
$config["root"] = "grapevine";

//the index page (landing controller)
$config["index"] = "c_default";

//development or production
$config["general"]["environment"] = "test";

//default Charset
$config["general"]["charset"] = "UTF-8";

//default database host
$config["database"]["db_host"] = "localhost";

//Username
$config["database"]["db_user"] = "";

//Password
$config["database"]["db_pass"] = "";

//database name
$config["database"]["db_name"] = "";

require_once("setup.php");
?>