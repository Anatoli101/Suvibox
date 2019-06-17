
var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";

	var btn = document.querySelector('.mobile_menu_button');
	var itemsMenu = document.querySelectorAll('.mobile_menu .menu-item');
	
	itemsMenu.forEach(function(itemMenu){
		itemMenu.addEventListener('click',function(){
			if(!this.classList.contains('has_sub')){
			   btn.classList.remove('active');
			};
		});
	});
	
	
	btn.addEventListener('click', function(){
		if(this.classList.contains('active')){
			this.classList.remove('active');
		}else{
			this.classList.add('active');
		}
	})});
