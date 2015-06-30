




/* 

1. get all element with class "post-media standard-img"
2. get the parent article 's class value , similar to "post-42 ... " , extract the post id "42"
3. if chinren of the "post-media standard-img" , without <img> , add node <img > with special class such as "ext_42"
4. collect all the post id , and put together to the ajax to query and get the featured url from database;
5. put the url data to the <img > with special class just have mark.

*/

//document ready
$(document).ready(function(){
    //alert(" ready ok ");
    
    //$(".post-599 .standard-img a").remove();
    //$(".post-599 .standard-img a").append("<img width='220' height='250' title='' alt='Standard Post' class='attachment-tie-w2' src='https://lh3.googleusercontent.com/-NvS72x5N4kE/VXT_vrIhH2I/AAAAAAAAAJQ/l9tCGdUVK9o/s1600/mmexport1427983415256.jpg'>")
    

});


Behavior2.Class('test', 'div article.post-1', {
  click: {
    'a.more-link': 'removeImage'
  }
}, function($ctx, that) {
	console.log('hello this is that');
  var $img;    
  $img = $ctx.find("div.standard-img");
  that.removeImage = function(e) {
    e.preventDefault();
    $target = $(e.currentTarget);
    $img.remove();
    $target.hide();
    //alert("remove");
    return Behavior2.contentChanged();
    };
});
  

Behavior2.Class('testAJAX', 'div article.post-4', {
  click: {
    'a.more-link': 'addImage'
  }
}, function($ctx, that) {
	console.log('hello this is that');
  var ajax;    
  ajax = function(method) {
      
      var $postid = 444;
      return $.ajax({
        url: "/api/getdd",
        //dataType: 'json',
        method: method,
        data: 'action=get_featured&postid=' + $postid, 
        success: function (str) {
                     if (str)
                         alert(str);
                 }
      });
    };
  that.addImage = function(e) {
  	e.preventDefault();
    ajax('get');
    $target = $(e.currentTarget);
    //$target.hide();
    return Behavior2.contentChanged();
  };
    
   });
