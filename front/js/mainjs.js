/*global $*/
$(function () {
	"use strict";

	/* Adjest pannel same height */

	var maxhirght = 0;

	$(".pannel").each(function () {

		if ($(this).height() > maxhirght) {
			maxhirght = $(this).height();
		}

	});

	$(".pannel").height(maxhirght);

	$(window).on("resize", function () {
		

		$(".pannel").each(function () {

			if ($(this).height() > maxhirght) {
				maxhirght = $(this).height();
			}

		});

		$(".pannel").height(maxhirght);
	});

	/* Chose food type */

	$(".menu-list .food-type .header h3").on("click", function () {
		$(".menu-list .food-type .header ul").slideToggle();
	});



	$(".food-type").on("click", function (e) {
		e.stopPropagation();
	});


	$(document).on("click", function () {
		$(".menu-list .food-type .header ul").slideUp();
	});
	
	/* Go to prev page */
	
	$("#back").click(function () {
		window.history.back();
	});



});
