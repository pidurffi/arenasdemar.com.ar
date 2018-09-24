

var wrapper_error_css = {
			    'padding'    : '20px 30px',
			    'background' : '#DD4B39',
			    'display'    : 'none',
			    'z-index'    : '999999',
			    'font-size'  : '16px',
			    'font-weight': 600
			  }
	  
var wrapper_success_css = {
		'padding'    : '20px 30px',
		'background' : '#00a65a',
		'display'    : 'none',
		'z-index'    : '999999',
		'font-size'  : '16px',
		'font-weight': 600
}

var wrapper_info_css = {
		'padding'    : '20px 30px',
		'background' : '#00c0ef',
		'display'    : 'none',
		'z-index'    : '999999',
		'font-size'  : '16px',
		'font-weight': 600
}

var wrapper_warning_css = {
		'padding'    : '20px 30px',
		'background' : '#f39c12',
		'display'    : 'none',
		'z-index'    : '999999',
		'font-size'  : '16px',
		'font-weight': 600
}

var link_css = {
			    'color'          : 'rgba(255, 255, 255, 0.9)',
			    'display'        : 'inline-block',
			    'margin-right'   : '10px',
			    'text-decoration': 'none'
			  }

var link_hover_css = {
			    'text-decoration': 'underline',
			    'color'          : '#f9f9f9'
			  }

/*var btn_css = {
			    'margin-top' : '-5px',
			    'border'     : '0',
			    'box-shadow' : 'none',
			    'color'      : '#f39c12',
			    'font-weight': '600',
			    'background' : '#fff'
			  }
*/
var close_css = {
			    'color'    : '#fff',
			    'font-size': '20px'
			  }


function addErrorMessage(text) {
	return addGeneralMessage(wrapper_error_css,text,'fa-warning');
}
function addSuccessMessage(text) {
	return addGeneralMessage(wrapper_success_css,text,'fa-check');
}
function addInfoMessage(text) {
	return addGeneralMessage(wrapper_info_css,text,'fa-info');
}
function addWarningMessage(text) {
	return addGeneralMessage(wrapper_warning_css,text,'fa-ban');
}
/*
self::TYPE_INFO => 'icon fa fa-info',
self::TYPE_SUCCESS => 'icon fa fa-check',
self::TYPE_WARNING => 'icon fa fa-warning',
self::TYPE_DANGER => 'icon fa fa-ban',
*/
function addGeneralMessage(css_type,text,i_class){
	var wrapper = $('<div />').css(css_type)
	var link    = $('<p />'/*, { href: 'https://themequarry.com' }*/)
	.html('<i class="icon fa '+i_class+'"></i> '+text)
	.css(link_css)
	.hover(function () {
		$(this).css(link_hover_css)
	}, function () {
		$(this).css(link_css)
	});
	
	/*var btn     = $('<a />', {
		'class': 'btn btn-default btn-sm',
		href   : 'https://themequarry.com'
	}).html('Let\'s Do It!').css(btn_css);
	 */
	
	var close   = $('<a />', {
		'class'         : 'pull-right',
		href            : '#',
		'data-toggle'   : 'tooltip',
		'data-placement': 'left',
		//'title'         : 'Never show me this again!'
	}).html('&times;')
	.css(close_css)
	.click(function (e) {
		e.preventDefault()
		$(wrapper).slideUp()
		if (ds) {
			ds.setItem('no_show', true)
		}
	})
	
	wrapper.append(close);
	wrapper.append(link);
	//wrapper.append(btn);
	
	$('.content-wrapper').prepend(wrapper);
	wrapper.hide(4).delay(500).slideDown();
	
	
}