<?php

define('MYDB_NAME', 'db_test_wp2');
define('MYDB_USER', 'root');
define('MYDB_PASSWORD', 'root');
define('MYDB_HOST', 'localhost');
define('EXTRAPAHT', dirname(__FILE__) . '/extra2/');
define('COMMONPATH', EXTRAPATH . 'common/');



if($_SERVER["HTTP_HOST"]=="test01.tmp0230.ml")
{
    require("extra/handler.php");
    require("extra/aop.php");

    Toro::serve(array(
	"/hello" => "HelloHandler",
	"/api/picasa/(.*)" => "ApiPicasaHandler",
	"/api/(.*)" => "ApiHandler",
	"/tpl/admin/(.*)" => "TplAdminHandler",
	"/tpl/(.*)" => "TplHandler",
	"/(.*)" => "DefaultHandler"
	));
	      
}
else if($_SERVER["HTTP_HOST"]=="test02.tmp0230.ml")
{

     define('PATCHPATH', EXTRAPATH . 'patch4the7/');

     require_once(COMMONPATH . 'init.php');
     require_once(PATCHPATH . 'patch.php');
   
     Toro::serve(array(
	"/hello" => "HelloHandler",
	"/tpl/admin/(.*)" => "TplAdminHandler",
	"/(.*)" => "DefaultHandler"
	));
} 

?>

