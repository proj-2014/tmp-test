<?PHP

require_once("lib/Toro/toro.php");

// ==========================================
// init global db handler

require_once("lib/ezSQL/shared/ez_sql_core.php");
require_once("lib/ezSQL/mysql/ez_sql_mysql.php");

$mydb = new ezSQL_mysql('root', 'root', 'db_test_extra', 'localhost');
//$mydb->get_var("SELECT count(*) FROM test_wp01_users");


// ===========================================

$file = "debug_out.txt";
function debug_out($content) {
    global $file;
    file_put_contents($file, "-----------".$content."\n",FILE_APPEND);
}


// ===========================================



class HelloHandler {
    function get() {
      echo "Hello, world";
    }
}

class DefaultHandler {

    function __construct() {
        //ToroHook::add("before_handler", function() { echo "Before  <>  ";/* echo $_SERVER['REQUEST_URI'];*/ echo "test aaa"; });
        //ToroHook::add("after_handler", function() { echo "After  <>  "; echo $_SERVER['REQUEST_URI']; });
    }

   function get()  {
      //echo  " this is default";
      include("wp-index.php");
    }

}

class ApiHandler {

     function get() {
       echo " this is api get ";

     }
     function get_xhr() {

         $action = $_GET["action"];
         $id = $_GET["postid"];
         
         //echo $action.$id;
        
         $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}'; 
         echo $json; 
  
  
       // echo "aabbccd";


     }

}


class ApiPicasaHandler {

    function get() {
           echo "aabbccdd"; 
           // test code here
           $albumsArray = '[{"al_id":"6157842700476096001","al_num":1,"al_title":"2015-06-07","al_feature":"http://lh3.googleusercontent.com/-kSX_nHBm5ik/VXUNT3icHgE/AAAAAAAAAKk/xJ62xX9p0CY/2015060707.jpg"},{"al_id":"6157827782655382369","al_num":2,"al_title":"2015-06-07","al_feature":"http://lh3.googleusercontent.com/-boPc1GStSiI/VXT_viU0k2E/AAAAAAAAAJs/zlb5QlfFwgo/2015060706.jpg"}]';
		
           global $mydb;
	               /*
                $albums = json_decode($albumsArray, true);
		$rows = count($albums);
		for( $i=0; $i<$rows; $i++) 
		{
                    echo "now begin foo";
		    $al_id =$albums[$i]['al_id'];
		    $al_num = $albums[$i]['al_num'];
		    $al_title = $albums[$i]['al_title'];
		    $al_feature = $albums[$i]['al_feature'];

		    $str = 'INSERT INTO albums ( al_id, al_num, al_title, al_feature) VALUES ("'. $al_id . '",'.$al_num . ',"' . $al_title . '","' . $al_feature . '")';
                    echo $str;
		    $mydb->query($str);
		}
               */
               echo "url is:  " . $_SERVER['REQUEST_URI'];
               $url_save_albums = '/^[/]api[/]picasa[/](.*)$/';
               //if( preg_match( $url_save_album , $_SERVER['REQUEST_URI']))
               if( eregi( '^/api/picasa/de.*', $_SERVER['REQUEST_URI']))
                     echo "====  match";
               debug_out($_SERVER['REQUEST_URI']."hello this is debug_out , ");

    }
    
    function post_xhr() {
        
        global $mydb ; 

        debug_out("now i in Post_xhr");
        if( eregi( '^/api/picasa/save_albums.*', $_SERVER['REQUEST_URI']))
        {

              
              echo $_POST['albums'];
             //$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}'; 
             // echo $json; 

		$albumsArray = $_POST['albums'];
		$albums = json_decode($albumsArray, true);
		$rows = count($albums);
		for( $i=0; $i<$rows; $i++) 
		{
		    $al_id =$albums[$i]['al_id'];
		    $al_num = $albums[$i]['al_num'];
		    $al_title = $albums[$i]['al_title'];
		    $al_feature = $albums[$i]['al_feature'];

		    $str = 'INSERT INTO albums ( al_id, al_num, al_title, al_feature) VALUES ("'. $al_id . '",' . $al_num . ',"' . $al_title . '","' . $al_feature . '")';
		    $mydb->query($str);
		}  

        }     
        if( eregi( '^/api/picasa/save_photos.*', $_SERVER['REQUEST_URI']))
        {
                //echo $_POST['photos']; 
                
                $photosArray = $_POST['photos'];
                $photos = json_decode($photosArray, true);
                $rows = count($photos);
                for( $i=0; $i<$rows; $i++)
                {
                    $ph_id =$photos[$i]['ph_id'];
                    $ph_width = $photos[$i]['ph_width'];
                    $ph_height = $photos[$i]['ph_height'];
                    $ph_type = $photos[$i]['ph_type'];
                    $ph_src = $photos[$i]['ph_src'];                    
                    $ph_title = $photos[$i]['ph_title'];
                    $str = 'INSERT INTO photos ( ph_id, ph_width, ph_height, ph_type, ph_src, ph_title) VALUES ("'. $ph_id . '",' . $ph_width . ',' . $ph_height . ',"' . $ph_type .'","' . $ph_src . '","' . $ph_title . '")';
                    debug_out("ithem: ".$i.$str); 
                    $mydb->query($str);
                } 
               

        }


    }
}


?>
