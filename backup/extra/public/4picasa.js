



jQuery(document).ready(function(){
    //alert(" ready ok ");
   jQuery.aop.before( {target: window, method: 'vpml_showalbum'}, 
        function() { 
            //alert('About to execute vpml_showalbum'); 
            //save_albums("www");
            save_photos("3333");
        }
   );


   
    
});


function save_photos(al_id) {
    
    vuser = "112389034152258078738";
    al_id = "6157825214333559265";
    
    //http://picasaweb.google.com/data/feed/api/user/112389034152258078738/albumid/6157825214333559265?alt=json
    al_url = "http://picasaweb.google.com/data/feed/api/user/" + vuser + "/albumid/" + al_id + "?alt=json" ;
    
   var photos = [];
   jQuery.getJSON(al_url, function(data) {
           if(data.feed.entry) {
                   var entry = data.feed.entry;
          
                   for (var item=0; item<entry.length; item++) {
                       element = entry[item];
                       ph_id = element["gphoto$id"]["$t"];
                       ph_width = element["gphoto$width"]["$t"];                           
                       ph_height = element["gphoto$height"]["$t"];
                       ph_type = element["content"]["type"];
                       ph_src = element["content"]["src"];                           
                       ph_title = element["title"]["$t"];
                       
                       var str = '{"ph_id":"' + ph_id + '","ph_width":' + ph_width + ',"ph_height":' + ph_height + ',"ph_type":"' + ph_type + '","ph_src":"' + ph_src + '","ph_title":"' + ph_title + '"}';
                       //alert(item + ":" + str);
                   
                       var obj = eval('(' + str + ')');
                       photos.push(obj);
                   }       
          }
          alert(photos[0].ph_id);
          
          if( photos.length >0 ) {

                      var jsonPhotos = JSON.stringify(photos);
                      var ajax_url2 = "/api/picasa/save_photos" ;
                      alert("to url is: "+ ajax_url2);
                      //alert(jsonAlbums);

                      jQuery.ajax({
                            url:ajax_url2,
                            type:'POST',
                            data:{"photos":jsonPhotos},
                            dataType:"json",
                            //contentType:"application/json; charset=utf-8",
                            success:function(data){
                                 alert(JSON.stringify(data));
                            }
                      });
           }


      });

}


function save_albums(jour) {

	var jurl = "http://picasaweb.google.com/data/feed/api/user/112389034152258078738?kind=album&access=public&alt=json";

	var albums = [];
        
	jQuery.getJSON(jurl, function(data){
		  if(data.feed.entry) {
		      var entry = data.feed.entry;
		      
		      for (var item=0; item<entry.length; item++) {
			  element = entry[item];
			  al_id = element["gphoto$id"]["$t"];
			  al_num = element["gphoto$numphotos"]["$t"];
			  al_title = element["title"]["$t"];
			  al_feature = element["media$group"]["media$content"][0]["url"];
			  
			  var str = '{"al_id":"'+ al_id + '", "al_num":' + al_num + ',"al_title":"' + al_title +'","al_feature":"'+ al_feature +'"}';
			  //alert(item + ":" + str);
	   
			  var obj = eval('(' + str + ')');
			  //var obj = JSON.parse(str);
			  albums.push(obj);        
		      }
		      //alert(albums[0].al_id);
		  } 
              
                  if( albums.length >0 ) {

		      var jsonAlbums = JSON.stringify(albums);
		      var ajax_url = "/api/picasa/save_albums" ;
                      alert("to url is: "+ ajax_url);
	              //alert(jsonAlbums);
	    
		      jQuery.ajax({   
			    url:ajax_url, 
			    type:'POST',   
			    data:{"albums":jsonAlbums},  
                            dataType:"json",
			    //contentType:"application/json; charset=utf-8",
			    success:function(data){   
                                 alert(JSON.stringify(data));
			    }  
		      });  
		  }       


	}).fail(function() {
	     alert('User not found! Please try again!');
	});


}



