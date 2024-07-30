;(function($){
    "use strict";
    
    /*
        ========================================
            Faq Accordion
        ========================================
        */
        $(document).on('click', '.faq-contents .faq-title', function (e) {
            var fq = $(this).parent('.faq-item');
            if (fq.hasClass('open')) {
                fq.removeClass('open');
                fq.find('.faq-panel').removeClass('open');
                fq.find('.faq-panel').slideUp(300);
            } else {
                fq.addClass('open');
                fq.children('.faq-panel').slideDown(300);
                fq.siblings('.faq-item').children('.faq-panel').slideUp(300);
                fq.siblings('.faq-item').removeClass('open');
                fq.siblings('.faq-item').find('.faq-title').removeClass('open');
                fq.siblings('.faq-item').find('.faq-panel').slideUp(300);
            }
        });
    
    /*---------------------------------
    * Comparison Part Data filter start
    * --------------------------------*/
		//Button Desing change
		$(".comparison__tab button").on("click", function(){
			$(".comparison__tab button").removeClass("active");
			$(this).addClass("active");
		})	;
		// content change on click
		$(".comparison__tab button").on("click", function(){
			let filter_tab_name = $(this).data("filter");
			$(".comparison__table tbody tr").removeClass("show");
			$(filter_tab_name).addClass("show");
			console.log(filter_tab_name);
		});
	    /*---------------------------------
    * Comparison Part Data filter end
    * --------------------------------*/	
	
    // var $popup = $('#popup');
    // var $closeBtn = $('.close');

    // // Show the popup after 5 seconds
    // setTimeout(function() {
    //     $popup.css({visibility:'visible', opacity:'1'});
    // }, 10000);

    // // Close the popup when the close button is clicked
    // $closeBtn.on('click', function() {
    //     $popup.css('display', 'none');
    // });

    // // Close the popup when the user clicks anywhere outside of the popup content
    // $(window).on('click', function(event) {
    //     if ($(event.target).is($popup)) {
    //         $popup.css('display', 'none');
    //     }
    // });
    
    /*------------------------------
    * Select Menu Increment
    * ----------------------------*/
    var count = 0;
    $("#mySelect").on("change", function() {
        var selectedOption = $(this).find("option:selected").text();
        let data_attr = selectedOption.toLowerCase().replace(" ","_");
        count++; // Increment the count variable
        var newListItem = "<li data-attribute=\""+ data_attr +"\" id=\"element1\" class=\"product_search__list__item\">" + selectedOption + "<span class=\"item_close\"><i class=\"fa-solid fa-times\"></i></span></li>";
        $("#output ul").append(newListItem);

        valueToAvoid();
        selectedBlogs();
    });

    /*---------------------------------------------------------------------
     * Prevent duplicate item with same data-attribute values of the menu
     * -------------------------------------------------------------------*/
    function valueToAvoid() {
        var productIds={};
        $('.product_search__list__item').each(function(){
            var prodId = $(this).attr('data-attribute');
            if(productIds[prodId]){
                $(this).remove();
            }else{
                productIds[prodId] = true;
            }
        });
    }

    /*-----------------------------------------------
    * Remove the li element on clicking the span tag
    * ----------------------------------------------*/
    $(document).on("click","span.item_close",function(event) {
        event.preventDefault();
        $(this).parent('li.product_search__list__item').remove();
        selectedBlogs();
    });

    /*-----------------------------------------------------------------------------------------
    * Match data-attribute of product grid and the select option and show hide them accordingly
    * -----------------------------------------------------------------------------------------*/
    function selectedBlogs(){
        $(".product-grids").addClass("d-none");

        $("#output ul li").each(function (){
            $(".product-grids[data-attribute="+ $(this).attr("data-attribute") +"]").removeClass("d-none");
        });

        if($("#output ul li").length == 0){
            $(".product-grids").removeClass("d-none");
        }
    }

    // Get the Select control
    var selectControl = $('#elementor-control-default-c1351');

    // Add an event listener to detect value changes
    selectControl.on('change', function() {
        // Get the selected value
        var selectedValue = $(this).val();

        // Show/hide HTML blocks based on the selected value
        if (selectedValue === 'one') {
            $('#block1').show();
            $('#block2').hide();
            $('#block3').hide();
        } else if (selectedValue === 'two') {
            $('#block1').hide();
            $('#block2').show();
            $('#block3').hide();
        } else {
            $('#block1').hide();
            $('#block2').hide();
            $('#block3').show();
        }
    });

    jQuery('p:empty').remove();
    /*------------------------------
    * Latest Product Hover
    * ----------------------------*/
    $(window).resize(function () {
        if ($(window).width() > 991){
            $(document).on('mouseover','.single-latest-grid-item',function (e) {

                var el = $(this);
                var imgUrl = el.data('thumbnailurl');
                var imgAlt =  el.data('thumbnailalt');
                var title = el.data('title');
                var categoryName = el.data('category');
                var price =  el.data('price');

                $(this).append('<div class="single-product-hover-wrapper">\n' +
                    '                            <div class="thumbnail">\n' +
                    '                                <img src="'+imgUrl+'" alt="'+imgAlt+'">\n' +
                    '                            </div>\n' +
                    '                            <div class="content-wrap">\n' +
                    '                                <h4 class="title">'+title+'</h4>\n' +
                    '                                <div class="bottom-content">\n' +
                    '                                    <div class="left">\n' +
                    '                                        <span>'+categoryName+'</span>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="right">\n' +
                    '                                        <div class="price-wrap">\n' +
                    '                                            <span class="price">'+price+'</span>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                        </div>');
            });
            $(document).on('mouseout','.single-latest-grid-item',function(){
                $(this).children('.single-product-hover-wrapper').remove();
            });
        }
    });

    if ($(window).width() > 991){
        $(document).on('mouseover','.single-latest-grid-item',function (e) {

            var el = $(this);
            var imgUrl = el.data('thumbnailurl');
            var imgAlt =  el.data('thumbnailalt');
            var title = el.data('title');
            var categoryName = el.data('category');
            var price =  el.data('price');

            $(this).append('<div class="single-product-hover-wrapper">\n' +
                '                            <div class="thumbnail">\n' +
                '                                <img src="'+imgUrl+'" alt="'+imgAlt+'">\n' +
                '                            </div>\n' +
                '                            <div class="content-wrap">\n' +
                '                                <h4 class="title">'+title+'</h4>\n' +
                '                                <div class="bottom-content">\n' +
                '                                    <div class="left">\n' +
                '                                        <span>'+categoryName+'</span>\n' +
                '                                    </div>\n' +
                '                                    <div class="right">\n' +
                '                                        <div class="price-wrap">\n' +
                '                                            <span class="price">'+price+'</span>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>');
        });
        $(document).on('mouseout','.single-latest-grid-item',function(){
            $(this).children('.single-product-hover-wrapper').remove();
        });
    }



    $(document).ready(function () {

    });

    /*---------------------------------------------------
      * Initialize all widget js in elementor init hook
      ---------------------------------------------------*/
    $(window).on( 'elementor/frontend/init' ,function(){
        elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function($scope, $){
            activeTestimonialSliderOne();
            initOurTime();
            initVisitorTime();
        });
    });


    /*----------------------------
    * Testimonial Slider
    * --------------------------*/
    function activeTestimonialSliderOne() {
        var testimonialOneSliderthree = $('.testimonial-carousel');
        if (testimonialOneSliderthree.length < 1){
            return;
        }
        $.each(testimonialOneSliderthree,function (index,value) {
            let el = $(this);
            let $selector = $('#'+el.attr('id'));
            let loop = el.data('loop');
            let items = el.data('items');
            let autoplay =  el.data('autoplay');
            let margin =  el.data('margin');
            let dots =   el.data('dots');
            let nav =  false;
            let autoplaytimeout =  el.data('autoplaytimeout');
            let responsive =  {
                0: {
                    items: 1
                },
                460: {
                    items: 1
                },
                599: {
                    items: 1
                },
                768: {
                    items: 1
                },
                960: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: items
                }
            };

            var sliderSettings = {
                "items": items,
                "loop": loop,
                "dots": dots,
                "margin": margin,
                "autoplay": autoplay,
                "autoPlayTimeout": autoplaytimeout,
                "nav": nav,
                "navtext": ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],

            };

            wowCarouselInit($selector,sliderSettings,responsive,'fadeIn','fadeOut');

        });
    }


    //owl init function
    function wowCarouselInit($selector,sliderSettings,responsive,animateIn=false,animateOut=false){
        $( $selector).owlCarousel({
            loop: sliderSettings.loop,
            autoplay: sliderSettings.autoplay, //true if you want enable autoplay
            autoPlayTimeout: sliderSettings.autoPlayTimeout,
            margin: sliderSettings.margin,
            dots: sliderSettings.dots,
            nav: sliderSettings.nav,
            navText : sliderSettings.navtext,
            animateIn :animateIn,
            animateOut :animateOut,
            responsive: responsive,
            smartSpeed: 2000
        });
    }
    function wowCarouselInitWidthStagePadding($selector,sliderSettings,responsive,animateIn=false,animateOut=false){
        $( $selector).owlCarousel({
            loop: sliderSettings.loop,
            autoplay: sliderSettings.autoplay, //true if you want enable autoplay
            autoPlayTimeout: sliderSettings.autoPlayTimeout,
            margin: sliderSettings.margin,
            dots: sliderSettings.dots,
            nav: sliderSettings.nav,
            navText : sliderSettings.navtext,
            animateIn :animateIn,
            animateOut :animateOut,
            responsive: responsive,
            center: sliderSettings.center,
            stagePadding:100,
            smartSpeed: 2000
        });
    }
    function initOurTime() {
        if (!$('#our_time').length){return}
        renderTime('our_time');
    }
    function initVisitorTime() {
        if (!$('#visitor_time').length){return}
        renderLocalTime('visitor_time');
    }
    function renderTime(selector){
        var bdTime = new Date().toLocaleString("en-US", {timeZone: "asia/dhaka"});
        var currentTime = new Date(bdTime);
        var diem = "AM";

        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();


        if(h == 0){
            h = 12;
        }else if(h > 12){
            h = h - 12;
            diem = "PM"
        }
        if(h < 10){
            h = "0" + h;
        }
        if(m < 10){
            m = "0" + m;
        }
        if(s < 10){
            s = "0" + s;
        }
        var myClock = document.getElementById(selector);
        myClock.textContent = h + ":" + m + ":" + s + " " + diem;
        setTimeout(function (){
            renderTime(selector)
        }, 1000);
    }
 function renderLocalTime(selector){
        var currentTime = new Date();
        var diem = "AM";
        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();


        if(h == 0){
            h = 12;
        }else if(h > 12){
            h = h - 12;
            diem = "PM"
        }
        if(h < 10){
            h = "0" + h;
        }
        if(m < 10){
            m = "0" + m;
        }
        if(s < 10){
            s = "0" + s;
        }
        var myClock = document.getElementById(selector);
        myClock.textContent = h + ":" + m + ":" + s + " " + diem;
        setTimeout(function (){
            renderTime(selector)
        }, 1000);
    }


    $(document).ready(function(){

     /*------------------------------
       counter section activation
     -------------------------------*/
        var counternumber = $('.count-num');
        counternumber.counterUp({
            delay: 20,
            time: 3000
        });
        
        /**
        * weDocs Form auto complete
         * @since 1.0.5
        * */


        $(document).on('focus','.weDocsSearchForm input[name="q"]',function (e){
            $('.weDocs-form-backdrop').addClass('show');
        });
        $(document).on('click','.weDocsSearchForm .close',function (e){
            $('.weDocsSearchForm input[name="q"]').val('');
            $('.weDocs-form-backdrop').removeClass('show');
            $('.weDocsSearchForm .close').removeClass('show');
            $('.weDocs-search-form-wrapper').find('.ajax-search-wrap').removeClass('show');
        });
        $(document).on('click','.weDocs-form-backdrop',function (e){
            $('.weDocs-form-backdrop').removeClass('show');
            if ($('.weDocsSearchForm input[name="q"]').val().length <1){
                $('.weDocs-search-form-wrapper').find('.ajax-search-wrap').removeClass('show');
            }
        });
        $(document).on('keyup','.weDocsSearchForm input[name="q"]',function (e){
            var el = $(this);
            var qValue = el.val();
            var mesContainer = $('.weDocs-search-form-wrapper').find('.ajax-search-wrap');
            var closeBtnWrap =  $('.weDocs-search-form-wrapper .close');

            $('.weDocs-form-backdrop').addClass('show');
            closeBtnWrap.addClass('show');
            if (qValue.length){
                mesContainer.html('<span>searching please wait...</span>');
                mesContainer.addClass('show');
                wedocAjaxCall(qValue);
            }
        });


    function wedocAjaxCall($q){
        var mesContainer = $('.weDocs-search-form-wrapper').find('.ajax-search-wrap');
        $.ajax({
            type : 'POST',
            url: xgObj.ajaxUrl,
            data:{
                action : 'wedoc_search_form_ajax',
                q : $q
            },
            success: function (data){
                if (data){
                    mesContainer.html(data);
                }else{
                    mesContainer.html('<span class="text-danger">Nothing Found</span>');
                }
                // console.log(data)
            },
            error:function (error){
                // console.log(error)
            }
        })
    }
    
    /*---------------------------------
    * Magnific Popup
    * --------------------------------*/
        // $('.video-play-btn,.play-video-btn').magnificPopup({
        //     type: 'video'
        // });

    });

})(jQuery);