/**
This is to print the tool tip

Author: Raman Tehlan
Date of creation: 09/09/2017
**/

$(document).ready(function(){
   

    $(".tooltip_object").hover(function(){
        $(this).find(".tooltip_box").fadeIn(50,"swing");
    },function(){
    	 $(this).find(".tooltip_box").fadeOut(50,"swing");
    });


  });