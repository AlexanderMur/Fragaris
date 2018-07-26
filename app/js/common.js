//= ../libs/swiper-master/dist/js/swiper.js
//= ../libs/lightGallery-master\dist\js\lightgallery-all.js
//= ../libs/ion.rangeSlider-master\js
//= ../libs/input-number.js
//= ../libs/Magnific-Popup-master/dist/jquery.magnific-popup.js

// +function($){
//     // ../libs/bootstrap-4.0.0\js\dist\util.js
//     // ../libs/bootstrap-4.0.0\js\dist\modal.js
// }(jQuery)


jQuery(function($){
    $('#toggle-menu').on('click',function(){
        $(this).toggleClass('is-active')
        $(this).next().stop(true).slideToggle()
        return false
    })

    mySwiper = new Swiper('.swiper-container', {
        // Optional parameters
        slidesPerView: 3.05,
        roundLengths: true,
        spaceBetween: 15,
        navigation: {
          nextEl: '.button-next',
          prevEl: '.button-prev',
        },
        breakpoints: {
            992: {
              slidesPerView: 2,
              spaceBetween: 15
            },

            576: {
              slidesPerView: 1,
              spaceBetween: 10
            }
        }
    })

    $(".lightgallery").lightGallery({
        selector: '.lg-image',
        thumbnail:true,
        download: false,
        share: false
    });



    myRange = $("#example_id").ionRangeSlider({
        type: "double",
        grid: true,
        min: 500,
        max: 3000,
        from: 0,
        from_fixed: true,
        to: 3000,
        values: [500, 1000, 1500, 2000, 3000],
        hide_min_max: true,

        prettify_enabled: true,
        hide_from_to: true,
        grid: false,
        onChange: function(data){
            $('.p_weight').val(this.p_values[data.to_pretty])
        }
    }).data("ionRangeSlider");


    function getRadioValue(buttons) {
       for(var i = 0; i < buttons.length; i++) {
          var button = buttons[i];
          if(button.checked) {
             return button.value;
          }
       }
       return null;
    }

    rangeUpdate = function(range,options){
        bundle = {}
        for(var i in options){
            if(range.options[i] != options[i]){
                bundle[i] = options[i]
            }
        }
        if(Object.keys(bundle).length){
            range.update(bundle)
        }
    }
    priceTable = settings.priceTable

    $('.form-calcul').on('change',formUpdate)
    function formUpdate(e){
        candy_box = getRadioValue(this.package) == 2
        rangeUpdate(myRange,{
                disable: candy_box,
        })
        if(!this.add_chocostrawberry.checked){
            this.chocostrawberry_num.parentNode.classList.add('disabled')
            this.chocostrawberry_num.disabled = true
        } else {
            this.chocostrawberry_num.parentNode.classList.remove('disabled')
            this.chocostrawberry_num.disabled = false
        }
        $('.range-min').text(myRange.options.p_values[0] + ' гр')
        $('.range-max').text(myRange.options.p_values[myRange.options.p_values.length - 1] + ' гр')
        if(candy_box){
            $('.str_price').text('1 шт = '+priceTable.chocostrawberry2+' руб')
        } else {
            $('.str_price').text('1 шт = '+priceTable.chocostrawberry+' руб')
        }

        add_chocostrawberry = this.add_chocostrawberry.checked
        weight              = (!(getRadioValue(this.package) == 2) && +this.weight.value.split(';')[1]) || 0
        chocostrawberry_num = (add_chocostrawberry && +this.chocostrawberry_num.value) || 0
        add_berries         = this.add_berries.checked
        add_topper          = this.add_topper.checked
        package             = getRadioValue(this.package)

        total = 0
        total += priceTable.packages[package][weight]        
        if(candy_box){
            total += priceTable.chocostrawberry2 * chocostrawberry_num
        } else {
            total += priceTable.chocostrawberry * chocostrawberry_num
        }
        total += add_berries * priceTable.add_berries
        total += add_topper * priceTable.add_topper

        total_pretty = total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
        $('.amount').text(total_pretty)
    }
    $('form').submit(function(e) {
        var $form = $(this);
        var $submit = $form.find('[type="submit"]');
        $submit.text('Отправка...')
        $.ajax({
            type: 'POST',
            url: settings.ajax_url + '/?action=send_mail',
            data: $form.serialize()
        }).done(function() {
            $submit.text('Ваша заявка принята!')
        }).fail(function() {
            $submit.text('Ошибка')
        });
      e.preventDefault(); 
    });
    $('.input-number').inputNumber();
    
    $(window).on('resize',function(){
        apply()
    })
    apply = function(){
            btn_prev = $('.slider > .button-prev')[0]
            btn_next = $('.slider > .button-next')[0]
            left = btn_prev.getBoundingClientRect().left
            if(left < 0){
                btn_prev.style.left = "0px"
                btn_next.style.right = "0px"

                btn_prev.classList.add('in')
                btn_next.classList.add('in')
            } else if(left > 70 && $(btn_prev).css('left') == '0px'){
                btn_prev.style.left = "-60px"
                btn_next.style.right = "-60px"

                btn_prev.classList.remove('in')
                btn_next.classList.remove('in')
            }

    }
    apply()

    $('.call-popup').magnificPopup({
        type: 'inline',
        overflowY: 'scroll',
        mainClass: 'mfp-zoom-in',
        removalDelay: 300,

    });

    $(document).on('click','.scrollTo',function(){
        href = $(this).attr('href')
        if(href == '#'){
            $("body, html").animate({
                scrollTop: 0 
            });
        } else {
            offset = $(href).offset().top
            $("body, html").animate({
                scrollTop: offset 
            });
        }
        return false
    })
})
$ = jQuery

