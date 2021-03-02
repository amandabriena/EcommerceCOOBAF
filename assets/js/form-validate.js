function valid_datas( f ){
	
	if( f.name.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your name must not be empty!</span>');
		notice( f.name );
	}else if( f.email.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your email must not be empty and correct format!</span>');
		notice( f.email );
	//}else if( f.phone.value == '' ){
		//jQuery('#form_status').html('<span class="wrong">Your phone must not be empty and correct format!</span>');
		//notice( f.phone );
	}else if( f.subject.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your subject must not be empty!</span>');
		notice( f.subject );
	}else if( f.message.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Your message must not be empty!</span>');
		notice( f.message );
	}else{
		 jQuery.ajax({
			url: 'mail.php',
			type: 'post',
			data: jQuery('form#fruitkha-contact').serialize(),
			complete: function(data) {
				jQuery('#form_status').html(data.responseText);
				jQuery('#fruitkha-contact').find('input,textarea').attr({value:''});
				jQuery('#fruitkha-contact').css({opacity:1});
				jQuery('#fruitkha-contact').remove();
			}
		});
		jQuery('#form_status').html('<span class="loading">Sending your message...</span>');
		jQuery('#fruitkha-contact').animate({opacity:0.3});
		jQuery('#fruitkha-contact').find('input,textarea,button').css('border','none').attr({'disabled':''});
	}
	
	return false;
}

function notice( f ){
	jQuery('#fruitkha-contact').find('input,textarea').css('border','none');
	f.style.border = '1px solid red';
	f.focus();
}
function mask(o, f) {
	setTimeout(function() {
	  var v = mphone(o.value);
	  if (v != o.value) {
		o.value = v;
	  }
	}, 1);
  }
  
function mphone(v) {
	var r = v.replace(/\D/g, "");
	r = r.replace(/^0/, "");
	if (r.length > 10) {
	  r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
	} else if (r.length > 5) {
	  r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
	} else if (r.length > 2) {
	  r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
	} else {
	  r = r.replace(/^(\d*)/, "($1");
	}
	return r;
  }
 
  	function fMasc(objeto,mascara) {
		obj=objeto
		masc=mascara
		setTimeout("fMascEx()",1)
	}
	
	function fMascEx() {
		obj.value=masc(obj.value)
	}
	
	function mCPF(cpf){
		cpf=cpf.replace(/\D/g,"")
		cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
		cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
		cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
		return cpf
	}