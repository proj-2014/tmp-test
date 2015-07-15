
<?php


aop_add_after_returning('wp_head()', function() {
   echo "<meta aop-test='wp_head after ' content='aop-test , thanks.'/>";

   if($_SERVER['REQUEST_URI']=='/' || $_SERVER['REQUEST_URI']=="/index.php")
   {  
      //echo "<script type='text/javascript' src='/extra/public/js/jquery.js'></script>  " ;
      echo "<script type='text/javascript'> window.$=jQuery; </script> ";
      echo "<script type='text/javascript' src='/extra2/common/public/js/underscore.min.js'></script>  " ;
      echo "<script type='text/javascript' src='/extra2/common/public/js/behavior.js'></script>  " ;
      echo "<script type='text/javascript' src='/extra2/patch4remal/public/4home.js'></script>  " ;
      echo "<script type='text/javascript' src='/extra2/patch4remal/public/4home2.js'></script>  " ;
      

    }
   
   /*
   $rule_admin = '/^[/]wp-admin[/](.*)$/' ;
   if( preg_match( $rule_admin, $_SERVER['REQUEST_URI']))
   {
      echo "<script type='text/javascript' src='/extra/public/js/jquery-aop.js'></script>  " ;
      echo "<script type='text/javascript' src='/extra/public/4admin.js'></script>  " ;

   }
   */

});

/*
aop_add_after_returning('vpml_enqueue_scripts($hook)', function() {
    echo "aop heloooooooooooooooo";
    wp_enqueue_script('aop', home_url('/extra/public/js/jquery-aop.js'), array('jquery'));
    wp_enqueue_script('4picasa', home_url('/extra/public/4picasa.js'), array('jquery'));
   


});
*/
?>
