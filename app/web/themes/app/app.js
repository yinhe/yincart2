$(function(){ 
	var ul = $('#side').find('ul:first');
	ul.addClass('nav bs-sidenav'); 
	ul.find('li:first').addClass('active'); 
	$('#side .active').find('ul').addClass('nav');  
	$('.bs-sidenav li a').click(function(){
		$('.bs-sidenav li').removeAttr('class');
		var p = $(this).parent('li:last');
		p.addClass('active');
		p.parent('ul:last').addClass('nav');
		p.parent('ul:last').parent('li:last').addClass('active');
	});

    var $window = $(window);
    var $body   = $(document.body);
    // back to top
    setTimeout(function () {
      var $sideBar = $('.bs-sidebar')

      $sideBar.affix({
        offset: {
          top: function () {
            var offsetTop      = $sideBar.offset().top
            var sideBarMargin  = parseInt($sideBar.children(0).css('margin-top'), 10)
            var navOuterHeight = $('.bs-docs-nav').height()

            return (this.top = offsetTop - navOuterHeight - sideBarMargin)
          }
        , bottom: function () {
            return (this.bottom = $('.bs-footer').outerHeight(true))
          }
        }
      })
    }, 100);

    setTimeout(function () {
      $('.bs-top').affix()
    }, 100);
	
    

});
