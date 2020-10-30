(function($) {

    $('#reset').on('click', function() {
        $('#register-form').reset();
    });

})(jQuery);

$('.owl-hocbong').owlCarousel({
    loop: true,
    dots: false,
    margin: 10,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 3,
            nav: true,
            loop: false
        }
    }
})

function checkInput(value, type) {
    switch (type) {
        case 'email':
            pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            break;
        case 'username':
            pattern = /^[\s\w]{4,31}$/;
            break;
        case 'password':
            pattern = /^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,8}$/;
            break;
        case 'product':
            pattern = /^[*]{4,31}$/;
            break;
        case 'sdt':
            pattern = /^[0-9]{10,12}$/;
            break;
        default:
            pattern = /^[\w\s]{1,100}$/;
    }
    flag = pattern.test(value);
    console.log(flag);
    return flag;
}
jQuery('#dangkybutton').click(function(event) {
    event.preventDefault();
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;
    var chose = $('.chose').value;
    var school = document.getElementById('school').value;
    error = 0;
    if (name == '' || school == '' || email == '') {
        jQuery('.error_blank').show();
        error = 1;
    } else {
        jQuery('.error_blank').hide();
    }

    if (!checkInput(phone, 'sdt')) {
        jQuery('.error_sdt').show();
        error = 1;
    } else {
        jQuery('.error_sdt').hide();
    }

    if (!error) {
        // Ajax sendmail
        jQuery('.loader').show();
        jQuery.ajax({
            url: "sendmail.php",
            type: "post",
            dateType: "text",
            data: {
                name: name,
                phone: phone,
                email: email,
                chose: chose,
                school: school
            },
            success: function(result) {
                jQuery('.loader').hide();
                jQuery('#popup').html(result);
            }
        });
    }
});

console.log($('.chose'));