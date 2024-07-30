(function($) {
    "use strict";

    $(document).ready(function() {

    
        /*
        ========================================
            counter Odometer
        ========================================
        */
        function WPHex_CounterUp($scope, $) {
            $scope.find(".single_counter__count").each(function () {
                    for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
                        var el = document.querySelectorAll('.odometer')[i];
                        el.innerHTML = el.getAttribute("data-odometer-final");
                };
            });
        }

        let elementJSCallback = {
            'wphex-counterup-two-widget.default': WPHex_CounterUp,
            // 'wphex-latest-product-one-widget.default': WPHex_Slick_Slider,
        }
        $(window).on('elementor/frontend/init', function () {
            let $EF = elementorFrontend;
            $.each(elementJSCallback, function (widgetName, fuHandler) {
                $EF.hooks.addAction('frontend/element_ready/' + widgetName, fuHandler);
            })
        });
    });

})(jQuery);