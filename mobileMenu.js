// JavaScript Document

function mobileMenuClicked(menu) {
	"use strict";
	if(menu.classList.contains("change")) {
		menu.classList.toggle("change");
		document.getElementById("mobile_menu_content").style.display = "none";
	} else {
		menu.classList.toggle("change");
		document.getElementById("mobile_menu_content").style.display = "inline-block";
	}
}