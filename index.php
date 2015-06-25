<?php

//require("toro.php");

require("extra/handler.php");
require("extra/aop.php");


/*
aop_add_after_returning('wp_head()', function() {
   echo "<meta aop-test='wp_head after ' content='aop-test , thanks.'/>";
});

//echo "this is index.php in root<br\>      ";
echo $_SERVER['REQUEST_URI'];

echo " ===== ";


class HelloHandler {
    function get() {
      echo "Hello, world";
    }
}

class DefaultHandler {

    function __construct() {
        ToroHook::add("before_handler", function() { echo "Before  <>  "; echo "test aaa"; });
        ToroHook::add("after_handler", function() { echo "After  <>  "; echo $_SERVER['REQUEST_URI']; });
    }

   function get()  {
      //echo  " this is default";
      include("wp-index.php");
    }

}
*/
Toro::serve(array(
    "/hello" => "HelloHandler",
    "/api/picasa/(.*)" => "ApiPicasaHandler",
    "/api/(.*)" => "ApiHandler",
    "/tpl/admin/(.*)" => "TplAdminHandler",
    "/tpl/(.*)" => "TplHandler",
    "/(.*)" => "DefaultHandler"
));


