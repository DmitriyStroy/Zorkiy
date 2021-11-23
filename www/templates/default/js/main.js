let V_phone = "/^\+380\d{3}\d{2}\d{2}\d{2}$/",
    V_email = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/,
    V_string = /[A-Za-zА-Яа-яЁёІіЇї]/;


const beginWithoutDigit = /^\D.*$/;
const withoutSpecialChars = /^[^-() /]*$/;
const containsLetters = /^.*[a-zA-Z]+.*$/;
const minimum6Chars = /^.{3,}$/;

(function($) {

    var $window = $(window),
        $head = $('head'),
        $body = $('body');

    // Breakpoints.
    breakpoints({
        xlarge: ['1281px', '1680px'],
        large: ['981px', '1280px'],
        medium: ['737px', '980px'],
        small: ['481px', '736px'],
        xsmall: ['361px', '480px'],
        xxsmall: [null, '360px'],
        'xlarge-to-max': '(min-width: 1681px)',
        'small-to-xlarge': '(min-width: 481px) and (max-width: 1680px)'
    });

    // Stops animations/transitions until the page has ...

    // ... loaded.
    $window.on('load', function() {
        window.setTimeout(function() {
            $body.removeClass('is-preload');
        }, 100);
    });

    // ... stopped resizing.
    var resizeTimeout;

    $window.on('resize', function() {

        // Mark as resizing.
        $body.addClass('is-resizing');

        // Unmark after delay.
        clearTimeout(resizeTimeout);

        resizeTimeout = setTimeout(function() {
            $body.removeClass('is-resizing');
        }, 100);

    });

    // Fixes.

    // Object fit images.
    if (!browser.canUse('object-fit') ||
        browser.name == 'safari')
        $('.image.object').each(function() {

            var $this = $(this),
                $img = $this.children('img');

            // Hide original image.
            $img.css('opacity', '0');

            // Set background.
            $this
                .css('background-image', 'url("' + $img.attr('src') + '")')
                .css('background-size', $img.css('object-fit') ? $img.css('object-fit') : 'cover')
                .css('background-position', $img.css('object-position') ? $img.css('object-position') : 'center');

        });

    // Sidebar.
    var $sidebar = $('#sidebar'),
        $sidebar_inner = $sidebar.children('.inner');

    // Inactive by default on <= large.
    breakpoints.on('<=large', function() {
        $sidebar.addClass('inactive');
    });

    breakpoints.on('>large', function() {
        $sidebar.removeClass('inactive');
    });

    // Hack: Workaround for Chrome/Android scrollbar position bug.
    if (browser.os == 'android' &&
        browser.name == 'chrome')
        $('<style>#sidebar .inner::-webkit-scrollbar { display: none; }</style>')
        .appendTo($head);

    // Toggle.
    $('<a href="#sidebar" class="toggle">Toggle</a>')
        .appendTo($sidebar)
        .on('click', function(event) {

            // Prevent default.
            event.preventDefault();
            event.stopPropagation();

            // Toggle.
            $sidebar.toggleClass('inactive');

        });

    // Events.

    // Link clicks.
    $sidebar.on('click', 'a', function(event) {

        // >large? Bail.
        if (breakpoints.active('>large'))
            return;

        // Vars.
        var $a = $(this),
            href = $a.attr('href'),
            target = $a.attr('target');

        // Prevent default.
        event.preventDefault();
        event.stopPropagation();

        // Check URL.
        if (!href || href == '#' || href == '')
            return;

        // Hide sidebar.
        $sidebar.addClass('inactive');

        // Redirect to href.
        setTimeout(function() {

            if (target == '_blank')
                window.open(href);
            else
                window.location.href = href;

        }, 500);

    });

    // Prevent certain events inside the panel from bubbling.
    $sidebar.on('click touchend touchstart touchmove', function(event) {

        // >large? Bail.
        if (breakpoints.active('>large'))
            return;

        // Prevent propagation.
        event.stopPropagation();

    });

    // Hide panel on body click/tap.
    $body.on('click touchend', function(event) {

        // >large? Bail.
        if (breakpoints.active('>large'))
            return;

        // Deactivate.
        $sidebar.addClass('inactive');

    });

    // Scroll lock.
    // Note: If you do anything to change the height of the sidebar's content, be sure to
    // trigger 'resize.sidebar-lock' on $window so stuff doesn't get out of sync.

    $window.on('load.sidebar-lock', function() {

        var sh, wh, st;

        // Reset scroll position to 0 if it's 1.
        if ($window.scrollTop() == 1)
            $window.scrollTop(0);

        $window
            .on('scroll.sidebar-lock', function() {

                var x, y;

                // <=large? Bail.
                if (breakpoints.active('<=large')) {

                    $sidebar_inner
                        .data('locked', 0)
                        .css('position', '')
                        .css('top', '');

                    return;

                }

                // Calculate positions.
                x = Math.max(sh - wh, 0);
                y = Math.max(0, $window.scrollTop() - x);

                // Lock/unlock.
                if ($sidebar_inner.data('locked') == 1) {

                    if (y <= 0)
                        $sidebar_inner
                        .data('locked', 0)
                        .css('position', '')
                        .css('top', '');
                    else
                        $sidebar_inner
                        .css('top', -1 * x);

                } else {

                    if (y > 0)
                        $sidebar_inner
                        .data('locked', 1)
                        .css('position', 'fixed')
                        .css('top', -1 * x);

                }

            })
            .on('resize.sidebar-lock', function() {

                // Calculate heights.
                wh = $window.height();
                sh = $sidebar_inner.outerHeight() + 30;

                // Trigger scroll.
                $window.trigger('scroll.sidebar-lock');

            })
            .trigger('resize.sidebar-lock');

    });

    // Menu.
    var $menu = $('#menu'),
        $menu_openers = $menu.children('ul').find('.opener');

    // Openers.
    $menu_openers.each(function() {

        var $this = $(this);

        $this.on('click', function(event) {

            // Prevent default.
            event.preventDefault();

            // Toggle.
            $menu_openers.not($this).removeClass('active');
            $this.toggleClass('active');

            // Trigger resize (sidebar lock).
            $window.triggerHandler('resize.sidebar-lock');

        });

    });

})(jQuery);

$('body').on('click', '.pwd-control', function() {
    if ($('#pwd').attr('type') == 'password') {
        $(this).addClass('view');
        $('#pwd').attr('type', 'text');
    } else {
        $(this).removeClass('view');
        $('#pwd').attr('type', 'password');
    }
    return false;
});

$('body').on('click', '.pwd1-control', function() {
    if ($('#pwd1').attr('type') == 'password') {
        $(this).addClass('view');
        $('#pwd1').attr('type', 'text');
    } else {
        $(this).removeClass('view');
        $('#pwd1').attr('type', 'password');
    }
    return false;
});

$('body').on('click', '.pwd2-control', function() {
    if ($('#pwd2').attr('type') == 'password') {
        $(this).addClass('view');
        $('#pwd2').attr('type', 'text');
    } else {
        $(this).removeClass('view');
        $('#pwd2').attr('type', 'password');
    }
    return false;
});

function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}

function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}

function addToCart(itemId) {
    $.ajax({
        url: "/cart/addtocart/" + itemId + '/',
        type: 'POST',
        async: false,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).hide();
                $('#removeCart_' + itemId).show();
            }
        }

    });
    load_shopping_basket();
}

function removeFromCart(itemId) {
    $.ajax({
        url: "/cart/removefromcart/" + itemId + '/',
        type: 'POST',
        async: false,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).show();
                $('#removeCart_' + itemId).hide();
            }
        }
    });
}

function conversionPrice(itemId) {
    var newCnt = $('#itemCnt_' + itemId).val();
    var itemPrice = $('#itemPrice_' + itemId).attr('value');
    var itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}

function GetData(obj_form) {
    var hData = {};
    $('input, textarea, select', obj_form).each(function() {
        if (this.name && this.name != '') {
            hData[this.name] = this.value;
            //console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
}

function RegisterNewUser() {
    var postData = GetData('#registerBox');

    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/register/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                alert(data['message']);
                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                $('#regBox').hide();
                $('#product-add-comments').show();
                $('#BtnSaveOrder').show();
            } else {
                alert(data['message']);
            }
        }
    });
}


function login() {
    let inp_email = document.querySelector('#email');
    let span_email = document.querySelector('.span_email');

    let inp_pwd = document.querySelector('#pwd');
    let span_pwd = document.querySelector('.span_pwd');

    var B_email = false;
    var B_pwd = false;

    if (!V_email.test(inp_email.value)) {
        notValid(inp_email, span_email, 'Проверте правильность эл.почты.');
    } else {
        Valid(inp_email, span_email, '');
        B_email = true;
    }

    if (minimum6Chars.test(inp_pwd.value) && containsLetters.test(inp_pwd.value)) {
        Valid(inp_pwd, span_pwd, '');
        B_pwd = true;
    } else {
        notValid(inp_pwd, span_pwd, 'Пароль должен быть не корече 6 символов и содержать символы латинского алфавита.');
    }

    if (B_email && B_pwd) {
        var postData = GetData('#authorization');
        $.ajax({
            type: 'POST',
            async: false,
            url: "/user/login/",
            data: postData,
            dataType: 'json',
            success: function(data) {
                if (data['success']) {
                    $('#regBox').hide();
                    $('#userLink').attr('href', '/user/');
                    $('#userLink').html(data['displayName']);
                    $('#userBox').show();
                    $('#product-add-comments').show();
                    $('#BtnSaveOrder').show();
                    document.querySelector('#authorization').classList.remove('open');
                } else {
                    notValid(inp_pwd, span_pwd, data['message']);

                }
            }
        });

    }
}

function forgotpassword() {
    let inp_email = document.querySelector('#fp-email');
    let span_email = document.querySelector('.span');


    if (!V_email.test(inp_email.value)) {
        notValid(inp_email, span_email, 'Проверте правильность эл.почты.');
    } else {
        var postData = { email: $('#fp-email').val() };
        $.ajax({
            type: 'POST',
            async: false,
            url: "/user/forgotpassword/",
            data: postData,
            dataType: 'json',
            success: function(data) {
                if (data['success']) {
                    Valid(inp_email, span_email, data['message']);

                } else {
                    Valid(inp_email, span_email, data['message']);
                }
            }

        });
    }
}

function UpdateUserData() {
    var postData = GetData('#UserData');
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/update/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#userLink').html(data['displayName']);
                alert(data['message']);
            } else {
                alert(data['message']);
            }
        }
    });
}

function RequestConfirmationEmail() {
    var postData = null;
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/requestconfirmationemail/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#userLink').html(data['displayName']);
                alert(data['message']);
            } else {
                alert(data['message']);
            }
        }
    });
}

function SaveOrder() {
    var postData = GetData('#OrederUserInfoBox');
    $.ajax({
        type: 'POST',
        async: false,
        url: "/checkout/save/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                alert(data['message']);
                window.location.href = '/orders/';
            } else {
                alert(data['message']);
            }
        }
    });
}

function feedback() {
    var postData = GetData('#feedback');
    $.ajax({
        type: 'POST',
        async: false,
        url: "/feedback/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                alert(data['message']);
                //window.location.href = '/';
            } else {
                alert(data['message']);
            }
        }
    });
}

function offer() {
    var postData = GetData('#offer');
    $.ajax({
        type: 'POST',
        async: false,
        url: "/offer/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                alert(data['message']);
                //window.location.href = '/';
            } else {
                alert(data['message']);
            }
        }
    });
}

function selectMethod() {
    var select = document.getElementById("Delivery_method");
    if (select.selectedIndex == -1)
        return null;
    var numb = select.options[select.selectedIndex].text;

    if (numb == 'Самовывоз') {
        $('#OurStoreBox').show();
        $('#TargetedDeliveryBox').hide();
        $('#PostOfficeBox').hide();
    } else if (numb == 'Доставка курьером') {
        $('#PostOfficeBox').hide();
        $('#TargetedDeliveryBox').show();
        $('#OurStoreBox').hide();
    } else if (numb == 'Самовывоз из отделений почтовых операторов') {
        $('#PostOfficeBox').show();
        $('#OurStoreBox').hide();
        $('#TargetedDeliveryBox').hide();
    }

}

/*
let inp = document.querySelector('#fp-email');
let span = document.querySelector('.span');

document.querySelector('.primary').onclick = function(e) {
    e.preventDefault();
    if (!reg.test(inp.value)) {
        notValid(inp, span, 'проверка не пройдена')
    } else {
        Valid(inp, span, '')
    }
}*/

function validate(regex, inp) {
    return regex.test(inp);
}

function notValid(inp, el, message) {
    inp.classList.remove('valid');
    inp.classList.add('invalid');
    el.innerHTML = message;
}

function Valid(inp, el, message) {
    inp.classList.remove('invalid');
    inp.classList.add('valid');
    el.innerHTML = message;
}


var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides-images");
    var dots = document.getElementsByClassName("demo-images");

    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active-images", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active-images";
}