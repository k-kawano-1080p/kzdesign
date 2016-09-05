<?php if(is_page( '2' ) ): ?>
<!-- 作品集
======================================================================================================================================== -->
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.4.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.js"></script>
    <script type="text/javascript">
    jQuery(function($) {

        $('#slider1').bxSlider();



        $('#slider2').bxSlider({
            auto: true,
            pause: 3500,
            mode: 'vertical',
            easing: 'ease-in-out'
        });

        $('#slider3').bxSlider({
            auto: true,
            minSlides: 2,
            maxSlides: 2,
            slideWidth: 470,
            slideMargin: 10
        });

        var slider = $('#slider4').bxSlider({
            auto: true,
            speed: 500,
            pause: 3500,
            onSlideAfter: function() {
                slider.startAuto();
            }
        });





        var rand = Math.floor(Math.random() * 3);
        var modes = ['vertical', 'horizontal', 'fade'];
        var bx_mode = modes[rand];

        var slider = $('#slider5').bxSlider({
            auto: true,
            speed: 500,
            pause: 3500,
            mode: bx_mode,
            easing: 'ease-in-out',
            onSlideAfter: function() {
                slider.startAuto();
            }
        });


        $('#slider5_2').bxSlider({
            auto: true,
            pause: 3500,
            captions: true
        });

    });
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.masonry.min.js"></script>
    <script>
    $(function() {

        var $container = $('#masonry-container');

        $container.imagesLoaded(function() {
            $container.masonry({
                itemSelector: '.box',
                columnWidth: 100
            });
        });

        $container.infinitescroll({
                navSelector: '#page-nav', // selector for the paged navigation
                nextSelector: '#page-nav a', // selector for the NEXT link (to page 2)
                itemSelector: '.box', // selector for all items you'll retrieve
                loading: {
                    finishedMsg: 'No more pages to load.',
                    img: '<?php echo get_template_directory_uri(); ?>/images/loading2.gif'
                }
            },
            // trigger Masonry as a callback
            function(newElements) {
                // hide new items while they are loading
                var $newElems = $(newElements).css({
                    opacity: 0
                });
                // ensure that images load before adding to masonry layout
                $newElems.imagesLoaded(function() {
                    // show elems now they're ready
                    $newElems.animate({
                        opacity: 1
                    });
                    $container.masonry('appended', $newElems, true);
                });
            }
        );

    });
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
    <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        menuRight = document.getElementById('cbp-spmenu-s2'),
        menuTop = document.getElementById('cbp-spmenu-s3'),
        menuBottom = document.getElementById('cbp-spmenu-s4'),
        showLeft = document.getElementById('showLeft'),
        showRight = document.getElementById('showRight'),
        showTop = document.getElementById('showTop'),
        showBottom = document.getElementById('showBottom'),
        showLeftPush = document.getElementById('showLeftPush'),
        showRightPush = document.getElementById('showRightPush'),
        body = document.body;

    showLeft.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeft');
    };
    showRight.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuRight, 'cbp-spmenu-open');
        disableOther('showRight');
    };
    showTop.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuTop, 'cbp-spmenu-open');
        disableOther('showTop');
    };
    showBottom.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuBottom, 'cbp-spmenu-open');
        disableOther('showBottom');
    };
    showLeftPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };
    showRightPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toleft');
        classie.toggle(menuRight, 'cbp-spmenu-open');
        disableOther('showRightPush');
    };

    function disableOther(button) {
        if (button !== 'showLeft') {
            classie.toggle(showLeft, 'disabled');
        }
        if (button !== 'showRight') {
            classie.toggle(showRight, 'disabled');
        }
        if (button !== 'showTop') {
            classie.toggle(showTop, 'disabled');
        }
        if (button !== 'showBottom') {
            classie.toggle(showBottom, 'disabled');
        }
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
        if (button !== 'showRightPush') {
            classie.toggle(showRightPush, 'disabled');
        }
    }
    </script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightbox.js"></script>
<?php print("\n"); ?>
<?php elseif( is_page( '12' ) ): ?>
<!-- お問い合わせページ
======================================================================================================================================== -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.4.min.js" charset="utf-8"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
    <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        menuRight = document.getElementById('cbp-spmenu-s2'),
        menuTop = document.getElementById('cbp-spmenu-s3'),
        menuBottom = document.getElementById('cbp-spmenu-s4'),
        showLeft = document.getElementById('showLeft'),
        showRight = document.getElementById('showRight'),
        showTop = document.getElementById('showTop'),
        showBottom = document.getElementById('showBottom'),
        showLeftPush = document.getElementById('showLeftPush'),
        showRightPush = document.getElementById('showRightPush'),
        body = document.body;

    showLeft.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeft');
    };
    showRight.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuRight, 'cbp-spmenu-open');
        disableOther('showRight');
    };
    showTop.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuTop, 'cbp-spmenu-open');
        disableOther('showTop');
    };
    showBottom.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuBottom, 'cbp-spmenu-open');
        disableOther('showBottom');
    };
    showLeftPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };
    showRightPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toleft');
        classie.toggle(menuRight, 'cbp-spmenu-open');
        disableOther('showRightPush');
    };

    function disableOther(button) {
        if (button !== 'showLeft') {
            classie.toggle(showLeft, 'disabled');
        }
        if (button !== 'showRight') {
            classie.toggle(showRight, 'disabled');
        }
        if (button !== 'showTop') {
            classie.toggle(showTop, 'disabled');
        }
        if (button !== 'showBottom') {
            classie.toggle(showBottom, 'disabled');
        }
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
        if (button !== 'showRightPush') {
            classie.toggle(showRightPush, 'disabled');
        }
    }
    </script>
<?php print("\n"); ?>
<?php elseif( is_page( '9' ) || is_page() || is_category() || is_tag() || is_search() || is_single() ): ?>
<!-- ブログTOPページ、シングルページ、カテゴリー,タグ,検索ページ
======================================================================================================================================== -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.4.min.js" charset="utf-8"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
    <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        menuRight = document.getElementById('cbp-spmenu-s2'),
        menuTop = document.getElementById('cbp-spmenu-s3'),
        menuBottom = document.getElementById('cbp-spmenu-s4'),
        showLeft = document.getElementById('showLeft'),
        showRight = document.getElementById('showRight'),
        showTop = document.getElementById('showTop'),
        showBottom = document.getElementById('showBottom'),
        showLeftPush = document.getElementById('showLeftPush'),
        showRightPush = document.getElementById('showRightPush'),
        body = document.body;

    showLeft.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeft');
    };
    showRight.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuRight, 'cbp-spmenu-open');
        disableOther('showRight');
    };
    showTop.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuTop, 'cbp-spmenu-open');
        disableOther('showTop');
    };
    showBottom.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuBottom, 'cbp-spmenu-open');
        disableOther('showBottom');
    };
    showLeftPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };
    showRightPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toleft');
        classie.toggle(menuRight, 'cbp-spmenu-open');
        disableOther('showRightPush');
    };

    function disableOther(button) {
        if (button !== 'showLeft') {
            classie.toggle(showLeft, 'disabled');
        }
        if (button !== 'showRight') {
            classie.toggle(showRight, 'disabled');
        }
        if (button !== 'showTop') {
            classie.toggle(showTop, 'disabled');
        }
        if (button !== 'showBottom') {
            classie.toggle(showBottom, 'disabled');
        }
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
        if (button !== 'showRightPush') {
            classie.toggle(showRightPush, 'disabled');
        }
    }
    </script>
<?php print("\n"); ?>
<?php elseif(is_home()): ?>
<!-- ホーム
======================================================================================================================================== -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.4.min.js" charset="utf-8"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
    <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        menuRight = document.getElementById('cbp-spmenu-s2'),
        menuTop = document.getElementById('cbp-spmenu-s3'),
        menuBottom = document.getElementById('cbp-spmenu-s4'),
        showLeft = document.getElementById('showLeft'),
        showRight = document.getElementById('showRight'),
        showTop = document.getElementById('showTop'),
        showBottom = document.getElementById('showBottom'),
        showLeftPush = document.getElementById('showLeftPush'),
        showRightPush = document.getElementById('showRightPush'),
        body = document.body;

    showLeft.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeft');
    };
    showRight.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuRight, 'cbp-spmenu-open');
        disableOther('showRight');
    };
    showTop.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuTop, 'cbp-spmenu-open');
        disableOther('showTop');
    };
    showBottom.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(menuBottom, 'cbp-spmenu-open');
        disableOther('showBottom');
    };
    showLeftPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };
    showRightPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toleft');
        classie.toggle(menuRight, 'cbp-spmenu-open');
        disableOther('showRightPush');
    };

    function disableOther(button) {
        if (button !== 'showLeft') {
            classie.toggle(showLeft, 'disabled');
        }
        if (button !== 'showRight') {
            classie.toggle(showRight, 'disabled');
        }
        if (button !== 'showTop') {
            classie.toggle(showTop, 'disabled');
        }
        if (button !== 'showBottom') {
            classie.toggle(showBottom, 'disabled');
        }
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
        if (button !== 'showRightPush') {
            classie.toggle(showRightPush, 'disabled');
        }
    }
    </script>
<?php print("\n"); ?>
<?php endif; ?>