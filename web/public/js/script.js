$(document).ready(function() {
 
	var owl = $("#carousel-home-page");
	var owl_product = $("#carousel-product-page");
 
	owl.owlCarousel({
		items : 6, //10 items above 1000px browser width
		itemsDesktop : [1000,5], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,3], // betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});
 
	owl_product.owlCarousel({
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1000,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,3], // betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});
  
	$(".next").click(function(){
		owl.trigger('owl.next');
		owl_product.trigger('owl.next');
	})
	$(".prev").click(function(){
		owl.trigger('owl.prev');
		owl_product.trigger('owl.prev');
	})
  
  
  
});