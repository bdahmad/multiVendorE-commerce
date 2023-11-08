
$(function() {
	"use strict";
	new PerfectScrollbar(".header-message-list"), new PerfectScrollbar(".header-notifications-list"), $(".mobile-search-icon").on("click", function() {
		$(".search-bar").addClass("full-search-bar")
	}), $(".search-close").on("click", function() {
		$(".search-bar").removeClass("full-search-bar")
	}), $(".mobile-toggle-menu").on("click", function() {
		$(".wrapper").addClass("toggled")
	}), $(".toggle-icon").click(function() {
		$(".wrapper").hasClass("toggled") ? ($(".wrapper").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($(".wrapper").addClass("toggled"), $(".sidebar-wrapper").hover(function() {
			$(".wrapper").addClass("sidebar-hovered")
		}, function() {
			$(".wrapper").removeClass("sidebar-hovered")
		}))
	}), $(document).ready(function() {
		$(window).on("scroll", function() {
			$(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
		}), $(".back-to-top").on("click", function() {
			return $("html, body").animate({
				scrollTop: 0
			}, 600), !1
		})
	}), $(function() {
		for (var e = window.location, o = $(".metismenu li a").filter(function() {
				return this.href == e
			}).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
	}), $(function() {
		$("#menu").metisMenu()
	}), $(".chat-toggle-btn").on("click", function() {
		$(".chat-wrapper").toggleClass("chat-toggled")
	}), $(".chat-toggle-btn-mobile").on("click", function() {
		$(".chat-wrapper").removeClass("chat-toggled")
	}), $(".email-toggle-btn").on("click", function() {
		$(".email-wrapper").toggleClass("email-toggled")
	}), $(".email-toggle-btn-mobile").on("click", function() {
		$(".email-wrapper").removeClass("email-toggled")
	}), $(".compose-mail-btn").on("click", function() {
		$(".compose-mail-popup").show()
	}), $(".compose-mail-close").on("click", function() {
		$(".compose-mail-popup").hide()
	}), $(".switcher-btn").on("click", function() {
		$(".switcher-wrapper").toggleClass("switcher-toggled")
	}), $(".close-switcher").on("click", function() {
		$(".switcher-wrapper").removeClass("switcher-toggled")
	}), $("#lightmode").on("click", function() {
		$("html").attr("class", "light-theme")
	}), $("#darkmode").on("click", function() {
		$("html").attr("class", "dark-theme")
	}), $("#semidark").on("click", function() {
		$("html").attr("class", "semi-dark")
	}), $("#minimaltheme").on("click", function() {
		$("html").attr("class", "minimal-theme")
	}), $("#headercolor1").on("click", function() {
		$("html").addClass("color-header headercolor1"), $("html").removeClass("headercolor2 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8")
	}), $("#headercolor2").on("click", function() {
		$("html").addClass("color-header headercolor2"), $("html").removeClass("headercolor1 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8")
	}), $("#headercolor3").on("click", function() {
		$("html").addClass("color-header headercolor3"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8")
	}), $("#headercolor4").on("click", function() {
		$("html").addClass("color-header headercolor4"), $("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8")
	}), $("#headercolor5").on("click", function() {
		$("html").addClass("color-header headercolor5"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor3 headercolor6 headercolor7 headercolor8")
	}), $("#headercolor6").on("click", function() {
		$("html").addClass("color-header headercolor6"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor3 headercolor7 headercolor8")
	}), $("#headercolor7").on("click", function() {
		$("html").addClass("color-header headercolor7"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor3 headercolor8")
	}), $("#headercolor8").on("click", function() {
		$("html").addClass("color-header headercolor8"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor3")
	})


   // sidebar colors



    $('#sidebarcolor1').click(theme1);
    $('#sidebarcolor2').click(theme2);
    $('#sidebarcolor3').click(theme3);
    $('#sidebarcolor4').click(theme4);
    $('#sidebarcolor5').click(theme5);
    $('#sidebarcolor6').click(theme6);
    $('#sidebarcolor7').click(theme7);
    $('#sidebarcolor8').click(theme8);

    function theme1() {
      $('html').attr('class', 'color-sidebar sidebarcolor1');
    }

    function theme2() {
      $('html').attr('class', 'color-sidebar sidebarcolor2');
    }

    function theme3() {
      $('html').attr('class', 'color-sidebar sidebarcolor3');
    }

    function theme4() {
      $('html').attr('class', 'color-sidebar sidebarcolor4');
    }

	function theme5() {
      $('html').attr('class', 'color-sidebar sidebarcolor5');
    }

	function theme6() {
      $('html').attr('class', 'color-sidebar sidebarcolor6');
    }

    function theme7() {
      $('html').attr('class', 'color-sidebar sidebarcolor7');
    }

    function theme8() {
      $('html').attr('class', 'color-sidebar sidebarcolor8');
    }


    // admin profile


});


// admin data update button
let admin_data_update_btn_block = document.getElementById('admin_data_update_btn_block');
let admin_data_reset_btn = document.getElementById('admin_data_reset_btn');
admin_data_reset_btn.addEventListener('click', ()=>{
    document.getElementById('admin_data_update_btn_block').style.display = "none";

});

function show_update_button(){
    document.getElementById('admin_data_update_btn_block').style.display = "block";
}


// admin social link add

// website link
let admin_web_edit_btn = document.getElementById('admin_web_edit_btn');
let admin_web_link_input_form = document.getElementById('admin_web_link_input_form');
let admin_web_input_from_close = document.getElementById('admin_web_input_from_close');
admin_web_link_input_form.style.display = "none";

admin_web_edit_btn.addEventListener("click", function(){
    if(admin_web_link_input_form.style.display == "none"){

        admin_web_link_input_form.setAttribute('class', 'd-flex justify-content-between align-items-center flex-wrap');
        admin_web_edit_btn.style.display = "none";
    }else{
        admin_web_link_input_form.setAttribute('class', ' ');
    }
});

admin_web_input_from_close.addEventListener("click", function(){
    admin_web_edit_btn.style.display = "block";
    admin_web_link_input_form.setAttribute('class', ' ');
})

// facebook link
let admin_facebook_edit_btn = document.getElementById('admin_facebook_edit_btn');
let admin_facebook_link_input_form = document.getElementById('admin_facebook_link_input_form');
let admin_facebook_input_from_close = document.getElementById('admin_facebook_input_from_close');
admin_facebook_link_input_form.style.display = "none";

admin_facebook_edit_btn.addEventListener("click", function(){
    if(admin_facebook_link_input_form.style.display == "none"){

        admin_facebook_link_input_form.setAttribute('class', 'd-flex justify-content-between align-items-center flex-wrap');
        admin_facebook_edit_btn.style.display = "none";
    }else{
        admin_facebook_link_input_form.setAttribute('class', ' ');
    }
});

admin_facebook_input_from_close.addEventListener("click", function(){
    admin_facebook_edit_btn.style.display = "block";
    admin_facebook_link_input_form.setAttribute('class', ' ');
})

// Linkedin link
let admin_linkedin_edit_btn = document.getElementById('admin_linkedin_edit_btn');
let admin_linkedin_link_input_form = document.getElementById('admin_linkedin_link_input_form');
let admin_linkedin_input_from_close = document.getElementById('admin_linkedin_input_from_close');
admin_linkedin_link_input_form.style.display = "none";

admin_linkedin_edit_btn.addEventListener("click", function(){
    if(admin_linkedin_link_input_form.style.display == "none"){

        admin_linkedin_link_input_form.setAttribute('class', 'd-flex justify-content-between align-items-center flex-wrap');
        admin_linkedin_edit_btn.style.display = "none";
    }else{
        admin_linkedin_link_input_form.setAttribute('class', ' ');
    }
});

admin_linkedin_input_from_close.addEventListener("click", function(){
    admin_linkedin_edit_btn.style.display = "block";
    admin_linkedin_link_input_form.setAttribute('class', ' ');
})

// vendor data update button
let vendor_data_update_btn_block = document.getElementById('vendor_data_update_btn_block');
let vendor_data_reset_btn = document.getElementById('vendor_data_reset_btn');
vendor_data_reset_btn.addEventListener('click', ()=>{
    document.getElementById('vendor_data_update_btn_block').style.display = "none";

});

function show_vendor_update_button(){
    document.getElementById('vendor_data_update_btn_block').style.display = "block";
};


// brand data update button
let brand_data_update_btn_block = document.getElementById('brand_data_update_btn_block');
let brand_data_reset_btn = document.getElementById('brand_data_reset_btn');
brand_data_reset_btn.addEventListener('click', ()=>{
    document.getElementById('brand_data_update_btn_block').style.display = "none";

});

function show_brand_update_button(){
    document.getElementById('brand_data_update_btn_block').style.display = "block";
};

// category data update button
let category_data_update_btn_block = document.getElementById('category_data_update_btn_block');
let category_data_reset_btn = document.getElementById('category_data_reset_btn');
category_data_reset_btn.addEventListener('click', ()=>{
    document.getElementById('category_data_update_btn_block').style.display = "none";

});

function show_category_update_button(){
    document.getElementById('category_data_update_btn_block').style.display = "block";
};

// sub category data update button
let sub_category_data_update_btn_block = document.getElementById('sub_category_data_update_btn_block');
let sub_category_data_reset_btn = document.getElementById('sub_category_data_reset_btn');
sub_category_data_reset_btn.addEventListener('click', ()=>{
    document.getElementById('sub_category_data_update_btn_block').style.display = "none";

});

function show_sub_category_update_button(){
    document.getElementById('sub_category_data_update_btn_block').style.display = "block";
};

