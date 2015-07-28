<?PHP


class ApiDataHandler {

    function get() {
           
    }
    
    function post_xhr() {
        
        global $mydb ; 
       
        if( eregi( '^/api/data/pagedata.*', $_SERVER['REQUEST_URI']))
        {              
              //echo $_POST['url'].$_POST['search'].$_POST['args'];
              $rdata = json_encode($_POST);
              echo json_encode($_POST) ;
        
              //$data_test = '{"images":"http://www.ruanyifeng.com/blog/upload/2010/02/bg2010021101.jpg",

              //global $mydb;
              //$mydb->query('call p5("'.$rdata.'", @result)'); 


               /* 
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
		    //$str = 'call save_picasa_albums("'+ $al_id +'",'+ $al_num +',"'+ $al_title +'","'+ $al_feature +'")';
		    $mydb->query($str);
		}  
               */

        }     

        // -----------------------------------------------------------------------
        // follow is add for front query picasa albums and photos ,  20150623
        
        if( eregi( '^/api/picasa/query_albums.*', $_SERVER['REQUEST_URI']))
        {
              
               $str= "select * from albums" ;
               $mydb->query($str);
               $albums = $mydb->get_results(null, OBJECT);

               echo json_encode($albums);
               //$len = $albums.length;
               //debug_out("query albums is: ".json_encode($albums));
        }
         
    }
}


?>
