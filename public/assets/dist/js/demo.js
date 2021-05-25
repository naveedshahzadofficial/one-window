/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */
(function ($) {
  'use strict'

  var $sidebar   = $('.control-sidebar')
  var $container = $('<div />', {
    class: 'p-3 control-sidebar-content'
  })

  $sidebar.append($container)

  var navbar_dark_skins = [
    'navbar-primary',
    'navbar-secondary',
    'navbar-info',
    'navbar-success',
    'navbar-danger',
    'navbar-indigo',
    'navbar-purple',
    'navbar-pink',
    'navbar-navy',
    'navbar-lightblue',
    'navbar-teal',
    'navbar-cyan',
    'navbar-dark',
    'navbar-gray-dark',
    'navbar-gray',
  ]

  var navbar_light_skins = [
    'navbar-light',
    'navbar-warning',
    'navbar-white',
    'navbar-orange',
  ]

  $container.append(
    '<h5>Customize AdminLTE</h5><hr class="mb-2"/>'
  )


 if (getCookie('no_navbar_border')) {
       $('.main-header').addClass('border-bottom-0')
  }

  var $no_border_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.main-header').hasClass('border-bottom-0'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-header').addClass('border-bottom-0')
       setCookie('no_navbar_border','1',7)
    } else {
      $('.main-header').removeClass('border-bottom-0')
        eraseCookie('no_navbar_border')

    }
  })
  var $no_border_container = $('<div />', {'class': 'mb-1'}).append($no_border_checkbox).append('<span>No Navbar border</span>')
  $container.append($no_border_container)



 if (getCookie('body_small_text')) {
       $('body').addClass('text-sm')
  }
  var $text_sm_body_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('body').hasClass('text-sm'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('text-sm')
       setCookie('body_small_text','1',7)
    } else {
      $('body').removeClass('text-sm')
      eraseCookie('body_small_text')
    }
  })
  var $text_sm_body_container = $('<div />', {'class': 'mb-1'}).append($text_sm_body_checkbox).append('<span>Body small text</span>')
  $container.append($text_sm_body_container)



 
   if (getCookie('navbar_small_text')) {
    $('.main-header').addClass('text-sm')
  }   
  var $text_sm_header_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.main-header').hasClass('text-sm'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-header').addClass('text-sm')
       setCookie('navbar_small_text','1',7)
    } else {
      $('.main-header').removeClass('text-sm')
      eraseCookie('navbar_small_text')
    }
  })
  var $text_sm_header_container = $('<div />', {'class': 'mb-1'}).append($text_sm_header_checkbox).append('<span>Navbar small text</span>')
  $container.append($text_sm_header_container)



 

  if (getCookie('sidebar_nav_small_text')) {
        $('.nav-sidebar').addClass('text-sm')
  } 
  var $text_sm_sidebar_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.nav-sidebar').hasClass('text-sm'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('text-sm')
       setCookie('sidebar_nav_small_text','1',7)
    } else {
      $('.nav-sidebar').removeClass('text-sm')
      eraseCookie('sidebar_nav_small_text')
    }
  })
  var $text_sm_sidebar_container = $('<div />', {'class': 'mb-1'}).append($text_sm_sidebar_checkbox).append('<span>Sidebar nav small text</span>')
  $container.append($text_sm_sidebar_container)



 if (getCookie('footer_small_text')) {
      $('.main-footer').addClass('text-sm')
  }

  var $text_sm_footer_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.main-footer').hasClass('text-sm'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-footer').addClass('text-sm')

     setCookie('footer_small_text','1',7)

    } else {
      $('.main-footer').removeClass('text-sm')
      eraseCookie('footer_small_text')
    }
  })
  var $text_sm_footer_container = $('<div />', {'class': 'mb-1'}).append($text_sm_footer_checkbox).append('<span>Footer small text</span>')
  $container.append($text_sm_footer_container)

  
  if (getCookie('sidebar_nav_flat_style')) {
      $('.nav-sidebar').addClass('nav-flat')
    }

  var $flat_sidebar_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.nav-sidebar').hasClass('nav-flat'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('nav-flat')
       setCookie('sidebar_nav_flat_style','1',7)
    } else {
      $('.nav-sidebar').removeClass('nav-flat')
       eraseCookie('sidebar_nav_flat_style')

    }
  })
  var $flat_sidebar_container = $('<div />', {'class': 'mb-1'}).append($flat_sidebar_checkbox).append('<span>Sidebar nav flat style</span>')
  $container.append($flat_sidebar_container)


  

 if (getCookie('sidebar_nav_legacy_style')) {
       $('.nav-sidebar').addClass('nav-legacy')
  }
  var $legacy_sidebar_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.nav-sidebar').hasClass('nav-legacy'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('nav-legacy')
       setCookie('sidebar_nav_legacy_style','1',7)

    } else {
      $('.nav-sidebar').removeClass('nav-legacy')
        eraseCookie('sidebar_nav_legacy_style')

    }
  })
  var $legacy_sidebar_container = $('<div />', {'class': 'mb-1'}).append($legacy_sidebar_checkbox).append('<span>Sidebar nav legacy style</span>')
  $container.append($legacy_sidebar_container)


   if (getCookie('sidebar_nav_compact')) {
       $('.nav-sidebar').addClass('nav-compact')
  }

  var $compact_sidebar_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.nav-sidebar').hasClass('nav-compact'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('nav-compact')
      setCookie('sidebar_nav_compact','1',7)
    } else {
      $('.nav-sidebar').removeClass('nav-compact')
       eraseCookie('sidebar_nav_compact')
    }
  })
  var $compact_sidebar_container = $('<div />', {'class': 'mb-1'}).append($compact_sidebar_checkbox).append('<span>Sidebar nav compact</span>')
  $container.append($compact_sidebar_container)

   
  if (getCookie('sidebar_nav_child_indent')) {
       $('.nav-sidebar').addClass('nav-child-indent')
  }

  var $child_indent_sidebar_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.nav-sidebar').hasClass('nav-child-indent'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('nav-child-indent')
       setCookie('sidebar_nav_child_indent','1',7)

    } else {
      $('.nav-sidebar').removeClass('nav-child-indent')
        eraseCookie('sidebar_nav_child_indent')

    }
  })
  var $child_indent_sidebar_container = $('<div />', {'class': 'mb-1'}).append($child_indent_sidebar_checkbox).append('<span>Sidebar nav child indent</span>')
  $container.append($child_indent_sidebar_container)

   
 if (getCookie('sidebar_disable_hover_auto_expand')) {
       $('.main-sidebar').addClass('sidebar-no-expand')
  }

  var $no_expand_sidebar_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.main-sidebar').hasClass('sidebar-no-expand'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-sidebar').addClass('sidebar-no-expand')
      setCookie('sidebar_disable_hover_auto_expand','1',7)
    } else {
      $('.main-sidebar').removeClass('sidebar-no-expand')
     eraseCookie('sidebar_disable_hover_auto_expand')
    }
  })
  var $no_expand_sidebar_container = $('<div />', {'class': 'mb-1'}).append($no_expand_sidebar_checkbox).append('<span>Main Sidebar disable hover/focus auto expand</span>')
  $container.append($no_expand_sidebar_container)

   

  if (getCookie('brand_small_text')) {
      $('.brand-link').addClass('text-sm')
  }

  var $text_sm_brand_checkbox = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.brand-link').hasClass('text-sm'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.brand-link').addClass('text-sm')
       setCookie('brand_small_text','1',7)

    } else {
      $('.brand-link').removeClass('text-sm')
        eraseCookie('brand_small_text')

    }
  })
  var $text_sm_brand_container = $('<div />', {'class': 'mb-4'}).append($text_sm_brand_checkbox).append('<span>Brand small text</span>')
  $container.append($text_sm_brand_container)

  

  $container.append('<h6>Navbar Variants</h6>')

  var $navbar_variants        = $('<div />', {
    'class': 'd-flex'
  })
  var navbar_all_colors       = navbar_dark_skins.concat(navbar_light_skins)


  
  if (getCookie('navbar_variant_color')) {
     var cookie_color=getCookie('navbar_variant_color')

    var $main_header2 = $('.main-header')
    $main_header2.removeClass('navbar-dark').removeClass('navbar-light')
    navbar_all_colors.map(function (cookie_color) {
      $main_header2.removeClass(cookie_color)
    })
    if (navbar_dark_skins.indexOf(cookie_color) > -1) {
    
      $main_header2.addClass('navbar-dark')
    } else {
      $main_header2.addClass('navbar-light')
    }
    
    $main_header2.addClass(cookie_color)
  }
  

  var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function (e) {

    var color = $(this).data('color')
    var $main_header = $('.main-header')
    $main_header.removeClass('navbar-dark').removeClass('navbar-light')
    navbar_all_colors.map(function (color) {
      
      $main_header.removeClass(color)
    })

   
    if (navbar_dark_skins.indexOf(color) > -1) {
    
      $main_header.addClass('navbar-dark')
    } else {
      $main_header.addClass('navbar-light')
    }
    
    $main_header.addClass(color)
    setCookie('navbar_variant_color',color,7)
  })

  $navbar_variants.append($navbar_variants_colors)

  $container.append($navbar_variants)

  var sidebar_colors = [
    'bg-primary',
    'bg-warning',
    'bg-info',
    'bg-danger',
    'bg-success',
    'bg-indigo',
    'bg-lightblue',
    'bg-navy',
    'bg-purple',
    'bg-fuchsia',
    'bg-pink',
    'bg-maroon',
    'bg-orange',
    'bg-lime',
    'bg-teal',
    'bg-olive'
  ]

  var accent_colors = [
    'accent-primary',
    'accent-warning',
    'accent-info',
    'accent-danger',
    'accent-success',
    'accent-indigo',
    'accent-lightblue',
    'accent-navy',
    'accent-purple',
    'accent-fuchsia',
    'accent-pink',
    'accent-maroon',
    'accent-orange',
    'accent-lime',
    'accent-teal',
    'accent-olive'
  ]

  var sidebar_skins = [
    'sidebar-dark-primary',
    'sidebar-dark-warning',
    'sidebar-dark-info',
    'sidebar-dark-danger',
    'sidebar-dark-success',
    'sidebar-dark-indigo',
    'sidebar-dark-lightblue',
    'sidebar-dark-navy',
    'sidebar-dark-purple',
    'sidebar-dark-fuchsia',
    'sidebar-dark-pink',
    'sidebar-dark-maroon',
    'sidebar-dark-orange',
    'sidebar-dark-lime',
    'sidebar-dark-teal',
    'sidebar-dark-olive',
    'sidebar-light-primary',
    'sidebar-light-warning',
    'sidebar-light-info',
    'sidebar-light-danger',
    'sidebar-light-success',
    'sidebar-light-indigo',
    'sidebar-light-lightblue',
    'sidebar-light-navy',
    'sidebar-light-purple',
    'sidebar-light-fuchsia',
    'sidebar-light-pink',
    'sidebar-light-maroon',
    'sidebar-light-orange',
    'sidebar-light-lime',
    'sidebar-light-teal',
    'sidebar-light-olive'
  ]

  $container.append('<h6>Accent Color Variants</h6>')
  var $accent_variants = $('<div />', {
    'class': 'd-flex'
  })

if (getCookie('accent_color_variant')) {
     var cookie_accent_color=getCookie('accent_color_variant')
    var $body2      = $('body')
    accent_colors.map(function (skin) {
      $body2.removeClass(skin)
    })
    $body2.addClass(cookie_accent_color)
 }


  $container.append($accent_variants)
  $container.append(createSkinBlock(accent_colors, function () {
    var color         = $(this).data('color')
    var accent_class = color
    var $body      = $('body')
    accent_colors.map(function (skin) {
      $body.removeClass(skin)
    })
    $body.addClass(accent_class)
    setCookie('accent_color_variant',accent_class,7);

  }))


 if (getCookie('dark_sidebar_variant')) {
     var dark_sidebar_variant=getCookie('dark_sidebar_variant')
    var sidebar_class2 = 'sidebar-dark-' + dark_sidebar_variant.replace('bg-', '')
    var $sidebar2      = $('.main-sidebar')
    sidebar_skins.map(function (skin) {
      $sidebar2.removeClass(skin)
    })

    $sidebar2.addClass(dark_sidebar_variant)
}
  

  $container.append('<h6>Dark Sidebar Variants</h6>')
  var $sidebar_variants_dark = $('<div />', {
    'class': 'd-flex'
  })
  $container.append($sidebar_variants_dark)
  $container.append(createSkinBlock(sidebar_colors, function () {
    var color         = $(this).data('color')
    var sidebar_class = 'sidebar-dark-' + color.replace('bg-', '')
    var $sidebar      = $('.main-sidebar')
    sidebar_skins.map(function (skin) {
      $sidebar.removeClass(skin)
    })
   
    $sidebar.addClass(sidebar_class)
     setCookie('dark_sidebar_variant',sidebar_class,7);
      eraseCookie('light_sidebar_variant');
  }))



  if (getCookie('light_sidebar_variant')) {
       var light_sidebar_variant=getCookie('light_sidebar_variant')
      
      var sidebar_class = 'sidebar-light-' + light_sidebar_variant.replace('bg-', '')
      var $sidebar      = $('.main-sidebar')
      sidebar_skins.map(function (skin) {
        $sidebar.removeClass(skin)
      })

      $sidebar.addClass(light_sidebar_variant)
  }

  $container.append('<h6>Light Sidebar Variants</h6>')
  var $sidebar_variants_light = $('<div />', {
    'class': 'd-flex'
  })
  $container.append($sidebar_variants_light)
  $container.append(createSkinBlock(sidebar_colors, function () {
    var color         = $(this).data('color')
    var sidebar_class = 'sidebar-light-' + color.replace('bg-', '')
    var $sidebar      = $('.main-sidebar')
    sidebar_skins.map(function (skin) {
      $sidebar.removeClass(skin)
    })

    $sidebar.addClass(sidebar_class)
    setCookie('light_sidebar_variant',sidebar_class,7);
    eraseCookie('dark_sidebar_variant');
  }))


  var logo_skins = navbar_all_colors
  $container.append('<h6>Brand Logo Variants</h6>')
  var $logo_variants = $('<div />', {
    'class': 'd-flex'
  })

if (getCookie('brand_logo_variant')) {
    
       var brand_logo_variant=getCookie('brand_logo_variant')
       var $logo = $('.brand-link')
    logo_skins.map(function (skin) {
      $logo.removeClass(skin)
    })
    $logo.addClass(brand_logo_variant)  
  }

  $container.append($logo_variants)
  var $clear_btn = $('<a />', {
    href: 'javascript:void(0)'
  }).text('clear').on('click', function () {
    resetAllCookie();
    var $logo = $('.brand-link')
    logo_skins.map(function (skin) {
      $logo.removeClass(skin)
    })
  })

  $container.append(createSkinBlock(logo_skins, function () {
    var color = $(this).data('color')
    var $logo = $('.brand-link')
    logo_skins.map(function (skin) {
      $logo.removeClass(skin)
    })
    $logo.addClass(color)
    setCookie('brand_logo_variant',color,7);
  }).append($clear_btn))

  function createSkinBlock(colors, callback) {
    var $block = $('<div />', {
      'class': 'd-flex flex-wrap mb-3'
    })

    colors.map(function (color) {
      var $color = $('<div />', {
        'class': (typeof color === 'object' ? color.join(' ') : color).replace('navbar-', 'bg-').replace('accent-', 'bg-') + ' elevation-2'
      })

      $block.append($color)

      $color.data('color', color)

      $color.css({
        width       : '40px',
        height      : '20px',
        borderRadius: '25px',
        marginRight : 10,
        marginBottom: 10,
        opacity     : 0.8,
        cursor      : 'pointer'
      })

      $color.hover(function () {
        $(this).css({ opacity: 1 }).removeClass('elevation-2').addClass('elevation-4')
      }, function () {
        $(this).css({ opacity: 0.8 }).removeClass('elevation-4').addClass('elevation-2')
      })

      if (callback) {
        $color.on('click', callback)
      }
    })

    return $block
  }

  $('.product-image-thumb').on('click', function() {
    const image_element = $(this).find('img');
    $('.product-image').prop('src', $(image_element).attr('src'))
    $('.product-image-thumb.active').removeClass('active');
    $(this).addClass('active');
  });

  function resetAllCookie(){
    eraseCookie('navbar_variant_color');
    eraseCookie('accent_color_variant');
    eraseCookie('dark_sidebar_variant');
    eraseCookie('light_sidebar_variant');
    eraseCookie('brand_logo_variant');
    window.location.reload();
  }

 function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

})(jQuery)
