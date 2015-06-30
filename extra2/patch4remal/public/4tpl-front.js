
(function() {
     //alert(" now load 4tpl-front.js alread");

})();

jQuery(document).ready(function(){

     //$("head").append('<script type="text/javascript"  src="/extra/public/js/lightbox-2.6.min.js"> </script>');
     //$("head").append('<link rel="stylesheet" type="text/css"  href="/extra/public/css/lightbox.css"/> ');
 

     addSomething();
});

function addSomething(){

    btn1 = ' <input type="button" id="btn-albums" name="name:get albums" value="value:get albums" >';
    $("#wrap").append(btn1);
    $("#btn-albums").click(function(){
        query_albums();
    });

    btn2 = ' <input type="button" id="btn-showA"  value="show  albums " clear="both" >';
    $("#wrap").append(btn2);
    $("#btn-showA").click(function(){
        show_albums();
    });



}

function query_albums() {

    var jsonData = {
        "al_id": "233435",
        "al_title":  "jfjfk"
    };

    jQuery.ajax({
        url:"/api/picasa/query_albums",
        type:"POST",
        data: JSON.stringify(jsonData),
        dataType:"json",
        success:function(data){
            //alert(JSON.stringify(data));
            localStorage.setItem("albums",JSON.stringify(data));
        }
    }); 
   
}

function show_albums() 
{
    var tmp = localStorage.getItem("albums");
    var albums = JSON.parse(tmp);

    var len = albums.length;
    len = 2;

    $("#wrap").css({"width": "40%", "float":"left"});
   

    for(var i=0; i<len; i++){
        al_fea = albums[i].al_feature;
        //if(i==0) alert("now in for 0,and url is "+ al_fea);
        if(albums[i].al_feature){
           var img_node = '<a href="'+ al_fea +'" > <img src="'+ al_fea + '"   width=150  /></a>';
           $("#wrap").append("<b>pic is: </b>");
           $("#wrap").append(img_node);       

           var img_node2 = '<a href="' + al_fea + '"> <img class="img2 img-'+i+'" src="'+ al_fea + '"   /></a>';

           //$(".wrap2").append('<div class="box"> </div>');
           //$(".box:last").append(img_node2);

           $(".wrap2").append(img_node2);
 
           
          
        }

    } 

    $(".img2").wrap('<div class="box"></div>');
    
    //$(".wrap2 a").lightBox();
    $("a.lb").append("<p> hhhhhh</p>");
    //$("a.lb").lightBox();
    $(".wrap2 a").css('data-lightbox','image-set');

    
     $(".box").css({
        "width": "150px",
        //"width": "auto",
        "height": "100px",
        "text-align": "center",
        "border": "1px solid #ccc",
        "margin": "20px 50px 0px 30px",
        "float": "left"
        
    });


    $(".box img").css({
         "max-width": "100%",
         "max-height": "100%",
         "width": "auto",
         "height": "auto",
         "position": "absolute",
         "clip": "rect(10px 90px 90px 20px)"
    });
    
    //getImgSize($(".img-1"));
}



function getImgSize(img) {
	var nWidth, nHeight
	if (img.naturalWidth) { // 现代浏览器
		nWidth = img.naturalWidth
		nHeight = img.naturalHeight
	} else { // IE6/7/8
		var imgae = new Image()
		image.src = img.src
		image.onload = function() {
		callback(image.width, image.height)
		}
	}
        alert(nWidth);
	return [nWidth, nHeight];


}



