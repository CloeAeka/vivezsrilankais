jQuery(document).ready(function($){

  'use strict';

  var original_img_url = qc_lpp_js_vars.original_img_url;
  var replacing_image_url = qc_lpp_js_vars.replacing_image_url;
  var image_width = qc_lpp_js_vars.qc_lpp_image_width;
  var image_height = qc_lpp_js_vars.qc_lpp_image_height;


function bordel() {
	let logo = document.querySelectorAll('img[src="'+original_img_url+'"]');
for (var i = 0; i < logo.length; i++) {
  logo[i].attributes.src.value = replacing_image_url;
  logo[i].removeAttribute('srcset');
  logo[i].removeAttribute('sizes');


  	if( image_width > 0 ){
  		jQuery(this).attr('width', image_width);
  		jQuery(this).css('maxWidth', image_width+'px');
  	}

  	if( image_height > 0 ){
  		jQuery(this).attr('height', image_height);
  		jQuery(this).css('height', image_height);
  	}
  }
}

bordel();

window.addEventListener('resize', bordel);

});
