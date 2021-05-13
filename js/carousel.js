$(document).ready(function(){
	
	var slider = $(".slider");
	var content = $(".contentCarousel");

	const prev = $(".prev");
	const next = $(".next");

	$(prev).click(function(){
		
		content = $(this).parents(".contentCarousel");
		slider = $(content).children(".slider");

		if($(content).css("justify-content") == "flex-start"){

			var first = $(slider).children("section:first-child")
			var last = $(slider).children("section:last-child")
			$(first).insertAfter(last)
		}
		
		$(content).css("justify-content", "flex-end");
		$(slider).css("transform", "translate(20%)");
		
	});
	
	$(next).click(function(){
		
		content = $(this).parents(".contentCarousel");
		slider = $(content).children(".slider");

		if($(content).css("justify-content") == "flex-end"){

			var first = $(slider).children("section:first-child")
			var last = $(slider).children("section:last-child")
			$(last).insertBefore(first)

		}

		$(content).css("justify-content", "flex-start");
		$(slider).css("transform", "translate(-20%)");
		//$(this).parents('.contentCarousel').children('.slider').css("transform", "translate(-20%)");
		
	});
	
	$(slider).on("transitionend", function(){
		
		var first = $(slider).children("section:first-child");
		var last = $(slider).children("section:last-child");
		
        if($(content).css("justify-content") == "flex-end"){
            $(last).insertBefore(first);
        }
        if($(content).css("justify-content") == "flex-start"){
            $(first).insertAfter(last);
        }
		
		$(first).insertAfter(last)
		
		$(slider).css("transition", "none");
		$(slider).css("transform", "translate(0)");
		
		setTimeout(function(){
			$(slider).css("transition", "all .8s");
		});
	
		
	})
	
});


