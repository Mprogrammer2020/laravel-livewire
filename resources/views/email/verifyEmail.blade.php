
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email Template</title>
    <style>
        @import url('http://fonts.cdnfonts.com/css/circular-std');

        body {
            font-family: 'Circular Std', sans-serif;
        }
    </style>
</head>

<body>

    <!--email templte starts-->
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0;">
        <meta name="format-detection" content="telephone=no" />

        <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
    https://github.com/konsav/email-templates/  -->

        <style>
            /* Reset styles */
            body {
                margin: 0;
                padding: 0;
                min-width: 100%;
                width: 100% !important;
                height: 100% !important;
            }

            body,
            table,
            td,
            div,
            p,
            a {
                -webkit-font-smoothing: antialiased;
                text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
                line-height: 100%;
            }

            li {
                color: #fff;
            }

            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
                border-collapse: collapse !important;
                border-spacing: 0;
            }

            img {
                border: 0;
                line-height: 100%;
                outline: none;
                text-decoration: none;
                -ms-interpolation-mode: bicubic;
            }

            #outlook a {
                padding: 0;
            }

            .ReadMsgBody {
                width: 100%;
            }

            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            /* Rounded corners for advanced mail clients only */
            @media all and (min-width: 560px) {
                .container {
                    border-radius: 8px;
                    -webkit-border-radius: 8px;
                    -moz-border-radius: 8px;
                    -khtml-border-radius: 8px;
                }
            }

            /* Set color for auto links (addresses, dates, etc.) */
            a,
            a:hover {
                color: #127DB3;
            }

            .footer a,
            .footer a:hover {
                color: #999999;
            }
        </style>

        <!-- MESSAGE SUBJECT -->
        <title>Get this Email</title>

    </head>

    <!-- BODY -->
    <!-- Set message background color (twice) and text color (twice) -->

    <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%"
        style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
    background-color: #F0F0F0;
    color: #000000;" bgcolor="#F0F0F0" text="#000000">

        <!-- SECTION / BACKGROUND -->
        <!-- Set message background color one again -->
        <table width="100%" border="0" cellpadding="0" cellspacing="0"
            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;"
            class="background">
            <tr>
                <td align="left" valign="top"
                    style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#F0F0F0">


                    <table border="0" cellpadding="0" cellspacing="0" width="920" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
        max-width: 850px; margin: 0 auto; " class="wrapper">
                    </table>

                    <table border="0" cellpadding="0" cellspacing="0" bgcolor="#000" width="920" style="border-collapse: collapse; border-spacing: 0; padding: 0; 
        max-width: 850px; margin: 0 auto;  background: #fff" class="container">
                        <tr>
                            <td colspan="3" valign="top" style="border-collapse: collapse; border-spacing: 0; padding-top: 30px !important; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 100%; font-size: 18px; font-weight: bold; line-height: 130%;
                background: #fff;
                font-family: sans-serif; text-align: left;" class="header">
                                <img src="{{url('/welcome_assets/images/logo.png')}}" alt="">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 100%; font-size: 18px; font-weight: bold; line-height: 130%;
                color: #fff;
                font-family: sans-serif;" class="header">
                                <!-- <p>Order date: Thu, Oct 21, 2021</p> -->
                            </td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>
                            <td colspan="3" align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;
                padding-top: 25px;" class="line">
                                <hr color="#E0E0E0" align="left" width="100%" size="1" noshade
                                    style="margin: 0; padding: 0;" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 100%; font-size: 32px; font-weight: bold; 
        color: #379633; font-size: 35px; text-align: left;" class="header">
                                <br>
                                Hello {{($user != null && $user->name) ? $user->name : 'User'}},
                            </td>
                        </tr>

                        <tr>

                            <td colspan="3" align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 100%; font-size: 17px; font-weight: 400; line-height: 160%;
                padding-top: 0; 
                color: #000;" class="paragraph">
                                <br>
                                Congratulations, Thank You for registering with <b>Gentlemen's Cannabis</b>. Please verify your email by clicking on the link below. <br/><br/>
                                
                                
                               <br/><br/>
                                
                                <div class="button" style="text-align: left;">
                                    <a href="{{ route('user.email.verify', $token) }}?_un={{base64_encode($id)}}" style="
                                    background: #379633;
                                    border: 7px solid rgba(255, 255, 255, .2);
                                    border-radius: 70px;
                                    color: #fff !important;
                                    padding: 9px 40px;
                                    font-size: 16px;
                                    font-weight: 500;
                                    outline: 6px solid rgb(191 191 191 / 31%) !important;
                                    margin-top: 45px;"
                                    >Verify Account</a>
                                </div>
                             
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;
                padding-top: 25px;" class="line">
                                <hr color="#E0E0E0" align="left" width="100%" size="1" noshade
                                    style="margin: 0; padding: 0;" />
                            </td>
                        </tr>


                        <tr>
                            <td colspan="3" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 100%; font-size: 18px; font-weight: bold; line-height: 130%;
                color: #919191;
                font-family: sans-serif;" class="header">
                                <p style="line-height: 25px;">Thank you,<br> The Gentlemen's Team</p>
                            </td>
                        </tr>

                    </table>


                    <!-- End of SECTION / BACKGROUND -->
                </td>
            </tr>
        </table>

    </body>

    </html>
    <!--email templte ends-->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> -->

    <script>
        $(window).scroll(function () {
            if ($(this).scrollTop() > 10) {
                $('#header-box').addClass('head-bg');
            } else {
                $('#header-box').removeClass('head-bg');
            }
        });
    </script>


</body>

</html>
