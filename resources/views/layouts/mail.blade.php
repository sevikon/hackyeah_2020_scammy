<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{App::getLocale()}}">
<head>
    <title>{{isset($subject) ? $subject : \App\Services\Common\AdminConfigService::get_config('APP_NAME')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 "/>
    <meta name="format-detection" content="telephone=no"/>
    <style type="text/css">
        /* cyrillic-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: local('Montserrat Regular'), local('Montserrat-Regular'), url(https://fonts.gstatic.com/s/montserrat/v12/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3gTD_u50.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3g3D_u50.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3gbD_u50.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3gfD_u50.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            src: local('Montserrat Bold'), local('Montserrat-Bold'), url(https://fonts.gstatic.com/s/montserrat/v12/JTURjIg1_i6t8kCHKm45_dJE3gnD_g.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>

    <!--[if mso]>
    <style type=”text/css”>
        body * {
            font-family: Open Sans, Arial, sans-serif;
        }
    </style>
    <![endif]-->
    <style type="text/css">
        body {
            -webkit-text-size-adjust: 100% !important;
            -ms-text-size-adjust: 100% !important;
            -webkit-font-smoothing: antialiased !important;
        }

        body * {
            font-family: Montserrat, Open Sans, Arial, sans-serif;
        }

        button {
            font-family: Montserrat, Open Sans, Arial, sans-serif;
        }

        img {
            outline: none !important;
        }

        p {
            Margin: 0px !important;
            Padding: 0px !important;
        }

        table {
            border-collapse: collapse;
            mso-table-lspace: 0px;
            mso-table-rspace: 0px;
        }

        td, a, span {
            border-collapse: collapse;
            mso-line-height-rule: exactly;
        }

        .ExternalClass * {
            line-height: 100%;
        }

        span.MsoHyperlink {
            mso-style-priority: 99;
            color: inherit;
        }

        td a {
            text-decoration: none !important;
        }

        span.MsoHyperlinkFollowed {
            mso-style-priority: 99;
            color: inherit;
        }

        .email-notifications-wrapper a {
            color: #5C6BC0;
            font-weight: 700
        }

    </style>
    <style media="only screen and (min-width:481px) and (max-width:599px)" type="text/css">
        @media only screen and (min-width: 481px) and (max-width: 599px) {
            table[class=em_main_table] {
                width: 100% !important;
            }

            table[class=em_wrapper] {
                width: 100% !important;
            }

            td[class=em_hide], br[class=em_hide] {
                display: none !important;
            }

            img[class=em_full_img] {
                width: 100% !important;
                height: auto !important;
            }

            td[class=em_align_cent] {
                text-align: center !important;
            }

            td[class=em_aside] {
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            td[class=em_height] {
                height: 20px !important;
            }

            td[class=em_font] {
                font-size: 14px !important;
            }

            td[class=em_align_cent1] {
                text-align: center !important;
                padding-bottom: 10px !important;
            }
        }
    </style>
    <style media="only screen and (max-width:480px)" type="text/css">
        @media only screen and (max-width: 480px) {
            table[class=em_main_table] {
                width: 100% !important;
            }

            table[class=em_wrapper] {
                width: 100% !important;
            }

            td[class=em_hide], br[class=em_hide], span[class=em_hide] {
                display: none !important;
            }

            img[class=em_full_img] {
                width: 100% !important;
                height: auto !important;
            }

            td[class=em_align_cent] {
                text-align: center !important;
            }

            td[class=em_align_cent1] {
                text-align: center !important;
                padding-bottom: 10px !important;
            }

            td[class=em_height] {
                height: 20px !important;
            }

            td[class=em_aside] {
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            td[class=em_font] {
                font-size: 14px !important;
                line-height: 28px !important;
            }

            span[class=em_br] {
                display: block !important;
            }
        }
    </style>
</head>
<body style="margin:0px; padding:0px;" bgcolor="#f7f7f7">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f7f7f7">
    <!-- === BODY SECTION=== -->
    <tr>
        <td align="center" valign="top" bgcolor="#f7f7f7">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table"
                    bgcolor="#5C6BC0"
                    style="table-layout:fixed;background-color: #5C6BC0">
                <!-- === LOGO SECTION === -->
                <tr>
                    <td height="40" class="em_height">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center"><a href="{{$link}}"
                                target="_blank" style="text-decoration:none;"><img
                                    src="{{$link.'/img/email_logo.png'}}"
                                    height="64"
                                    style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:700;"
                                    border="0"
                                    alt="{{\App\Services\Common\AdminConfigService::get_config('APP_NAME')}}"/></a>
                    </td>
                </tr>
                <tr>
                    <td height="40" class="em_height">&nbsp;</td>
                </tr>
                <!-- === //NEVIGATION SECTION === -->
                <!-- === IMG WITH TEXT AND COUPEN CODE SECTION === -->
                <tr>
                    <td valign="top" class="em_aside" bgcolor="#ffffff" style="background-color: #ffffff">
                        <table width="100%" border="0" cellspacing="0" cellpadding="20"
                               bgcolor="#ffffff"
                               style="border: solid #EEEEEE 1px; border-top: solid #5C6BC0 3px; background-color: #ffffff">
                            @yield('email_content')
                        </table>
                    </td>
                </tr>
                <!-- === //IMG WITH TEXT AND COUPEN CODE SECTION === -->

                <!-- === FOOTER SECTION === -->
                <tr>
                    <td align="center" valign="top" class="em_aside">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                               bgcolor="#5C6BC0"
                               style="background-color: #5C6BC0">
                            <tr>
                                <td height="35" class="em_height">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="22" class="em_height">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center"
                                    style="font-family:Montserrat, Open Sans, Arial, sans-serif; font-size:14px; line-height:18px; color:#ffffff;">
                                    2019 {{\App\Services\Common\AdminConfigService::get_config('APP_NAME')}}. All Rights
                                    Reserved.
                                </td>
                            </tr>
                            <tr>
                                <td height="35" class="em_height">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- === //FOOTER SECTION === -->

            </table>
        </td>
    </tr>
    <!-- === //BODY SECTION=== -->
</table>
<div style="display:none; white-space:nowrap; font:20px courier; color:#ffffff; background-color:#ffffff;">&nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp;
</div>
</body>
</html>