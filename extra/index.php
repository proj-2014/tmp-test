<?php

require("lib/Toro/toro.php");

echo "this is index.php in extra<br\>      ";
echo "<p> test</p>";

echo $_SERVER['REQUEST_URI'];

echo "<p> dive2 ===== </p>";
class HelloHandler {
    function get() {
      echo "Hello, world";
    }
}

class LoginHandler {
    function get() {
      echo " Test index";
      //include("views/login.php");
    }
}

class ApiHandler {
    function get() {
     echo " this is api ";
    }



}

class DefaultHandler {
   function get()  {
      echo  " this is default";
    }

}

Toro::serve(array(
    "/extra/" => "HelloHandler",
    "/extra/login" => "LoginHandler",
    "/extra/([a-zA-Z]*)" => "DefaultHandler",
    "/extra/api" => "ApiHandler"
));


