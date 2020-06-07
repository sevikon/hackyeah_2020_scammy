<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>Metronic | FAQ 1</title>
    <meta name="description" content="Faq example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Asap+Condensed:500">
    <!--end::Fonts -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link
        href="https://keenthemes.com/metronic/themes/metronic/theme/default/demo11/dist/assets/plugins/global/plugins.bundle.css"
        rel="stylesheet" type="text/css"/>
    <link href="https://keenthemes.com/metronic/themes/metronic/theme/default/demo11/dist/assets/css/style.bundle.css"
          rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <!--end::Layout Skins -->

    <link rel="shortcut icon"
          href="https://keenthemes.com/metronic/themes/metronic/theme/default/demo11/dist/assets/media/logos/favicon.ico"/>

    <!-- Hotjar Tracking Code for keenthemes.com -->
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            }
            h._hjSettings = {hjid: 1070954, hjsv: 6}
            a = o.getElementsByTagName('head')[0]
            r = o.createElement('script')
            r.async = 1
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv
            a.appendChild(r)
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=')
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    <script>
        window.dataLayer = window.dataLayer || []

        function gtag() {
            dataLayer.push(arguments)
        }

        gtag('js', new Date())
        gtag('config', 'UA-37564768-1')
    </script>
</head>
<style>
    .faq-wrapper table {
        float: left;
        display: inline-block;
    }

    .faq-wrapper table td, .faq-wrapper table th {
        padding: 5px 10px;
    }
</style>
<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">


<!-- begin:: Page -->
<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="/metronic/preview/demo11/index.html">
            <img alt="Logo"
                 src="https://keenthemes.com/metronic/themes/metronic/theme/default/demo11/dist/assets/media/logos/logo-11-sm.png"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left"
                id="kt_aside_mobile_toggler"><span></span></button>

        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                class="flaticon-more-1"></i></button>
    </div>
</div>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
                <div class="kt-container  kt-container--fluid ">

                </div>
            </div>
            <!-- end:: Header -->
            <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch faq-wrapper"
                 id="kt_body">
                <div class="kt-container  kt-container--fluid  kt-grid kt-grid--ver">
                    <!-- begin:: Aside -->
                    <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

                    <!-- end:: Aside -->
                    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                        <!-- begin:: Content -->
                        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <!--begin::Portlet-->
                            <div class="kt-portlet kt-faq-v1" style="margin-top: 20px">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            {{$title}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">
                                    {{$view}}
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>
                        <!-- end:: Content -->

                    </div>
                </div>
            </div>

            <!-- begin:: Footer -->
            <div class="kt-footer kt-grid__item" id="kt_footer">
                <div class="kt-container  kt-container--fluid ">
                    <div class="kt-footer__wrapper">
                        <div class="kt-footer__copyright">
                            2020&nbsp;&copy;&nbsp; DOCUMENTATION FOR HACKYEAH
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:: Footer -->                            </div>
    </div>
</div>

<!-- end:: Page -->


</body>
<!-- end::Body -->
</html>
