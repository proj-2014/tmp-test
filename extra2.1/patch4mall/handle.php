
<?PHP

class TplAdminHandler { 

    function get() {

        echo "here is tpl handle"; 
        global $twig;
        echo $twig->render('admin.twig', array('name' => 'Admin Panel'));
    }


}


?>
