<?php
if(!defined('ROOT_DIR')) die("Access Denied");

//root folder
$config["root"] = "exec_grapevine";

//the default (landing) controller
$config["index"] = "c_default";

//dev, test or prod
$config["general"]["environment"] = "dev";

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