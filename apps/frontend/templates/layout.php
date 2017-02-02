<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>

        <link rel="icon" href="/images/favicon.ico"/>

        <!-- Bootstrap core CSS -->
        <link href="http://static.megamed.mn/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- Font Awesome CSS -->
        <link href="/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

        <!-- Fontello CSS -->
        <link href="/fonts/fontello/css/fontello.css" rel="stylesheet"/>

        <!-- Plugins -->
        <link href="http://static.megamed.mn/plugins/rs-plugin/css/settings.css" media="screen" rel="stylesheet"/>
        <link href="http://static.megamed.mn/plugins/rs-plugin/css/extralayers.css" media="screen" rel="stylesheet"/>
        <link href="http://static.megamed.mn/plugins/magnific-popup/magnific-popup.css" rel="stylesheet"/>
        <link href="/css/animations.css" rel="stylesheet"/>
        <link href="http://static.megamed.mn/plugins/owl-carousel/owl.carousel.css" rel="stylesheet"/>

        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>

        <script type="text/javascript" src="http://static.megamed.mn/plugins/jquery.min.js"></script>
    </head>
    <body>
        <!-- scrollToTop -->
        <!-- ================ -->
        <div class="scrollToTop"><i class="icon-up-open-big"></i></div>

        <!-- page wrapper start -->
        <!-- ================ -->
        <div class="page-wrapper">
            <?php include_partial('sidebar/header') ?>

            <?php include_partial('sidebar/menu') ?>

            <?php include_partial('sidebar/flash') ?>

            <?php echo $sf_content ?>

            <?php include_partial('sidebar/footer') ?>
        </div>
        <!-- page-wrapper end -->

        <!-- JavaScript files placed at the end of the document so the pages load faster ================================================== -->
        <!-- Jquery and Bootstap core js files -->
        <script type="text/javascript" src="http://static.megamed.mn/bootstrap/js/bootstrap.min.js"></script>

        <!-- Modernizr javascript -->
        <script type="text/javascript" src="http://static.megamed.mn/plugins/modernizr.js"></script>

        <!-- jQuery REVOLUTION Slider  -->
        <script type="text/javascript" src="http://static.megamed.mn/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="http://static.megamed.mn/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Isotope javascript -->
        <script type="text/javascript" src="http://static.megamed.mn/plugins/isotope/isotope.pkgd.min.js"></script>

        <!-- Owl carousel javascript -->
        <script type="text/javascript" src="http://static.megamed.mn/plugins/owl-carousel/owl.carousel.min.js"></script>

        <!-- Magnific Popup javascript -->
        <script type="text/javascript" src="http://static.megamed.mn/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Appear javascript -->
        <script type="text/javascript" src="http://static.megamed.mn/plugins/jquery.appear.js"></script>

        <!-- Count To javascript -->
        <script type="text/javascript" src="http://static.megamed.mn/plugins/jquery.countTo.js"></script>

        <!-- Parallax javascript -->
        <script src="http://static.megamed.mn/plugins/jquery.parallax-1.1.3.js"></script>

        <!-- Contact form -->
        <script src="http://static.megamed.mn/plugins/jquery.validate.js"></script>

        <!-- SmoothScroll javascript -->
        <script type="text/javascript" src="http://static.megamed.mn/plugins/jquery.browser.js"></script>
        <script type="text/javascript" src="http://static.megamed.mn/plugins/SmoothScroll.min.js"></script>

        <!-- Initialization of Plugins -->
        <script type="text/javascript" src="/js/template.js"></script>

        <!-- Custom Scripts -->
        <script type="text/javascript" src="/js/custom.js"></script>

        <?php if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1'): ?>
            <!-- Google Analytics -->
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-82807299-1', 'auto');
                ga('send', 'pageview');
            </script>

            <script type="application/ld+json">
                {
                "@context": "http://schema.org",
                "@type": "WebSite",
                "url": "http://www.megamed.mn/",
                "potentialAction": {
                "@type": "SearchAction",
                "target": "http://www.megamed.mn/search?q={search_term_string}",
                "query-input": "required name=search_term_string"
                }
                }
            </script>
        <?php endif; ?>
    </body>
</html>