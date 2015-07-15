<?php

/*
define('MYDB_NAME', 'db_test_extra2');
define('MYDB_USER', 'root');
define('MYDB_PASSWORD', 'root');
define('MYDB_HOST', 'localhost');
*/
define('EXTRAPATH', dirname(__FILE__) . '/extra2/');
define('COMMONPATH', EXTRAPATH . 'common/');


/*
if($_SERVER["HTTP_HOST"]=="test01.tmp0230.ml" || $_SERVER["HTTP_HOST"]=="test01.vlan")
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
	      
}*/
if($_SERVER["HTTP_HOST"]=="test01.tmp0230.ml"|| $_SERVER["HTTP_HOST"]=="test01.vlan" )
{

     define('PATCHPATH', EXTRAPATH . 'patch4remal/');
     require_once(COMMONPATH . 'init.php');
     require_once(PATCHPATH . 'patch.php');
   
     //$mydb = new ezSQL_mysql(MYDB_USER,  MYDB_PASSWORD, MYDB_NAME, MYDB_HOST);
     $mydb = new ezSQL_mysql('root', 'root', 'db_test_extra', 'localhost');

     Toro::serve(array(
	"/hello" => "HelloHandler",
	"/api/picasa/(.*)" => "ApiPicasaHandler",
	"/api/(.*)" => "ApiHandler",
	"/tpl/admin/(.*)" => "TplAdminHandler",
	"/tpl/(.*)" => "TplHandler",
	"/(.*)" => "DefaultHandler"
	));

} 
else if($_SERVER["HTTP_HOST"]=="test02.tmp0230.ml" || $_SERVER["HTTP_HOST"]=="test02.vlan" )
{

     define('PATCHPATH', EXTRAPATH . 'patch4the7/');
     require_once(COMMONPATH . 'init.php');
     require_once(PATCHPATH . 'patch.php');
   
     //$mydb = new ezSQL_mysql(MYDB_USER,  MYDB_PASSWORD, MYDB_NAME, MYDB_HOST);
     $mydb = new ezSQL_mysql('root', 'root', 'db_test_extra2', 'localhost');

     Toro::serve(array(
	"/hello" => "HelloHandler",
	"/tpl/admin/(.*)" => "TplAdminHandler",
	"/(.*)" => "DefaultHandler"
	)); 
} 

?>

