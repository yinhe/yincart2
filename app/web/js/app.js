/***
* not include this js
*/
function display(a,b){
 	$(a).click(function(){  
	 	if($(b).css('display')=='block'){
	 		$(b).hide();
	 	}else{
	 		$(b).show();
	 	}
	 });
 }