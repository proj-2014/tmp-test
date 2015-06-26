

var ph_feature=[];

$(document).ready(function(){
    //alert("now is in 4home2.js, onready ");
    update_features();
  
    //set_featureImg();
});


function set_featureImg() {

      
      var cls=$("[class^='post-'][class$='isotope-item']");//.attr("class");
   
      for( var i=0; i<cls.length; i++) {

          attr = cls.eq(i).attr("class");
          s= attr.match(/\d+/);
          
          url = localStorage.getItem(s);
          //alert(url);
          if(url) cls.eq(i).find('a').eq(0).append('<img class="attachment-tie-w1"  width=190 src="'+url+'" >');
      }

      /*
      //var re=/^post-(\d+)/g ;
      var re = new RegExp("^post-(\d+)","ig");

      var attr = re.exec(cls);
      var po_id = RegExp.$1; 
      */

}

function update_features() {

    
    query_albums();
    //init_features();
}

function init_features() {

    var tmp = localStorage.getItem("albums");
    var albums = JSON.parse(tmp);

    var len = albums.length;
    for(var i=0; i<len; i++){
        al_fea = albums[i].al_feature;
        po_id  = (albums[i].po_id) ;

        if( po_id!=null  && al_fea) {
            //alert(po_id);
            localStorage.setItem(po_id, al_fea);
        }
    }

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
            init_features();
            set_featureImg();
        }
    }); 
   
}




