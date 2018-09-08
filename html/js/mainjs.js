/*global $, console*/
$(function () {
	"use strict";
	
	/* Adjest pannel same height */
	
	var maxhirght = 0;
	
	$(".pannel").each(function () {
		
		if($(this).height() > maxhirght ){
			maxhirght = $(this).height();
		}
		
		console.log($(".pannel").height());
	});
	
	$(".pannel").height(maxhirght);
	
	/* Chose food type */
	
	$(".menu-list .food-type .header h3").on("click", function () {
		$(".menu-list .food-type .header ul").slideDown();
	});
	
	$(".menu-list .food-type .header ul li").on("click", function () {
		$(".menu-list .food-type .header ul").slideUp();
		$("#foodkind").text($(this).text());
	});
	
	$(".food-type").on("click", function (e) {
		e.stopPropagation();
	});
	
	$("html, body").on("click", function () {
		$(".menu-list .food-type .header ul").slideUp();
	});
	
});