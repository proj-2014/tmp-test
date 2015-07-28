
window.$=window.jQuery; 

function test(){
  
    alert("helelo");
    alert("window.location.pathname is" + window.location.pathname);
    alert("window.location.href is "  +  window.location.href);
    alert("window.location.hash is " + window.location.hash);
    alert("window.location.host is " + window.location.host);
   
    alert("window.location.search is " + window.location.search);
   
    var url = window.location.search ;
    var loc = url.substring(url.lastIndexOf('=')+1, url.length);
    alert(" args is " + loc);


}
    

$(document).ready(function(){

    //test();
    var args = parseQueryString(window.location.href);
    alert(JSON.stringify(args));

    //initData();
      });

initData();

function parseQueryString(url) {  
    var str = url.split("?")[1], items = str.split("&");  
    var result = {};  
    var arr;  
    for (var i = 0; i < items.length; i++) {  
        arr = items[i].split("=");  
        result[arr[0]] = arr[1];  
    }  
    return result;  
}  

function initData(){

      var ajax_url = "/api/data/pagedata";

      var path = window.location.pathname;
      var srh = window.location.search;
      var args = parseQueryString(srh);
      var img1 = "https://lh3.googleusercontent.com/-n_uAAv3yQjc/Va7tJCiHJDI/AAAAAAAAAJs/8yIvExy2UD8/3-54d430b6Nce70cd8e.jpg";
      var img2 = "https://lh3.googleusercontent.com/-U66Y9CdHjDA/Va7tC7OGZNI/AAAAAAAAAJU/NHq2atACL4w/1-54d430b2Ndd9c8907.jpg";
      var img3 = "https://lh3.googleusercontent.com/-1iLb7BDOuU8/Va7s-wy4dsI/AAAAAAAAAJE/ga3OXpZnCwg/2-54d430b6Nce70cd8e.jpg";
      var img4 = "https://lh3.googleusercontent.com/-eFC90MggVEs/Va7s7Ij2ZFI/AAAAAAAAAIs/5UrHrv47dpg/4-54d430b8Nd84c2b9e.jpg";

  
      var pkey = window.location.href;   //path + srh ; 
      var pdata = {};
      
      //url = encodeURIComponent(url);
      //srh = encodeURIComponent(srh);
  
      pdata = JSON.parse(localStorage.getItem(pkey));
      //alert(value);

      if(pdata){
  
          alert("datas from local Storage is  " + JSON.stringify(pdata));

      }
      else {
     
	      jQuery.ajax({   
		    url:ajax_url, 
		    type:'POST',   
		    data:{"path":path, "search":srh, "args":args, "img1":img1, "img2":img2, "img3":img3, "img4":img4},  
		    dataType:"json",
		    //contentType:"application/json; charset=utf-8",
		    success:function(data){   
			 alert(JSON.stringify(data));
                         localStorage.setItem(pkey, JSON.stringify(data));
		    }  
	      }); 
      }
}

Behavior2.Class('pic-show', 'div#content .images',{
          click: {

          }
       }, function($ctx, that) {
          
          var $ele;    
	  $ele = $ctx.find("img");

          var pkey = window.location.href;   
          var pdata = {};
          pdata = JSON.parse(localStorage.getItem(pkey));

          var wrapData = function(str){
                   //res = '<img alt="Placeholder" src="'+ str + '">';
                   res = '<img alt="placeholder" src="https://lh3.googleusercontent.com/-n_uAAv3yQjc/Va7tJCiHJDI/AAAAAAAAAJs/8yIvExy2UD8/3-54d430b6Nce70cd8e.jpg" >';

                   return res;
          };

          var map = {
                 "img:first": JSON.stringify(pdata.img1)
              }; 
          var wrap = {
                  "img:first": wrapData
                  //"div #tab-reviews":[{"div #tab-reviews": wrapData},{"div #tab-reviews": wrapData2}]
              };

          var init = function(){
              
              for (var key in wrap){
                    //alert(typeof(wrap[key]));
                    if(typeof(wrap[key]== "function")){
                        map[key] = wrap[key](map[key]);
                    }
                } 

                  for(var key in map){
                       var $p = $ctx.find(key);
                       //$p.html(map[key]);
                       //$p.prop("outHTML", map[key]);
                       $p.after(map[key]);
                       $p.remove();
                  }
                 
                  // $ctx.find("img").remove();
          };     

          init();

      });

Behavior2.Class('desc', 'div#multitabs-detail', {
	  click: {
            '.tab-content': 'hide'
	  }
	}, function($ctx, that) {
	  console.log('hello this is that');
          //alert("now in Behavior function");
 
         // --------------

function layer(p,$c){
	 this.npath = p;  //= "div #tab-description";
	 this.$ctx = $c; 
	 this.res = "";
	 
	 this.env = { 
	     url : window.location.href, 
	     pkey : window.location.href,
             pdata : JSON.parse(localStorage.getItem(window.location.href)),
	     args : ""
	 };	 
 
	 var fn_wrap = new Array() ;  
	 
	 this.add_wrap = function(f, t){
	 	    
	 	    var tmp = {
	 	    	 fn : f,
	 	    	 type : t
	 	    };
	 	    fn_wrap.push(tmp);
	 };
		
};

var rend = function(ly) { res = ly.env.url; alert("in rend " + JSON.stringify(ly.env.pdata)); };
var echo = function(ly) { $node = ly.$ctx.find(ly.npath);  $node.html("hhhhoooolllll"); alert(ly.npath + " in echo"); };

var wrapData = function(ly){
     alert("this is wrpaData env.url " + ly.env.url);
     return "aabb";
}


var map = [
      { "path": "div #tab-description", "rend": rend, "echo": echo },
      { "path": "div #tab-wd_custom", "rend": rend, "echo": echo }
    ];
    
var dispatch = function(){
	
	  for(var i=0; i<map.length; i++){
	  	  var tmp = map[i];
	  	  var ly = new layer(tmp.path, $ctx);
	  	  tmp.rend(ly);
	  	  tmp.echo(ly);
	  };
	     
};

dispatch();

/*
var test = function(){
    var aa = "aa";
    var env = {};
          
};

 */   





         // -----------------

	  var $ele;    
	  $ele = $ctx.find("h2");
	  that.hide = function(e) {
           // alert("now in hide");
	    e.preventDefault();
	    $target = $(e.currentTarget);
	    $ele.remove();
	    $target.hide();
	    //alert("remove");
	    return Behavior2.contentChanged();
	    };
	});

