/**
*  

<script>
$(function(){
	 $('#input').input({attr:'#input'});  
});

</script>
 
 
	<input id='input'  rel='show'>

	<div id='show' >
		 <span>热门推荐</span>
		 <div class='tab'><a rel='t0' href=''>城市</a> &nbsp;&nbsp;<a rel='t1'  href=''>景点</a></div>
		 <div id='t0' class='value'>
		 	<span>上海</span>，<span>北京</span>，<span>香港</span>
		 </div>
		 <div id='t1'  class='value'>
		 	<span>西湖</span>，<span>黄山</span>
		 </div>
	</div>
	
 
 


* author: sun
* 2012.06.01
* qq: 68103403
* 
*/
 
(function($){

 	$.fn.extend({  
 		myinput: function(options) {  
			var defaults = {  
				val:'.value span', 
				event: 'click',
				hide:'input'
			};
			var opts = $.extend(defaults,options); 
			var tab = opts.tab; 
			var val = opts.val; 
			var val_key = opts.val_key; 
			var event = opts.event; 
			var hide = opts.hide; 
		 	var s = '#'+$(this).attr('rel');
		  	$(s).hide();
		  	var obj = $(this);
			obj.bind(event,function(){  
				 $(s).show();
			}); 
			$(val).bind(event,function(){  
				obj.val($(this).html());
				$(s).hide(); 
			});
			 $(document).click(function(e) {
					var t = $(e.target); 
					var v1 = s+','+hide+','+s+' div,'+s+'  span,'+s+' a,'+s+ ' ul,'+s+ ' li'+s+' dd'+s+' dl';
				 
					if (!t.is(v1)) {
						$(s).hide(); 
					  
					}
				 
			});

    	}
	});
	
})(jQuery); 