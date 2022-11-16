<?php

function send_email($email_addr = '', $subject = '', $message = '', $attachement = '')
{


    $email = \Config\Services::email();
    /*$config['protocol'] = 'sendmail';
        $config['mailPath'] = '/usr/sbin/sendmail';
        $config['charset']  = 'iso-8859-1';
        $config['wordWrap'] = true;

        $email->initialize($config);*/
    $config['charset']  = 'iso-8859-1';
    $config['wordWrap'] = true;
    $config['mailType'] = 'html';
    $email->initialize($config);
    $email->setFrom('no-reply@freshlinks.co.za', COMPANY_NAME);
    $email->setTo($email_addr);
    //$email->mailType('html');


    if ($attachement) {
        // $email->attach($attachement);
        $email->attach($attachement, 'application/pdf', "Policy File " . date("Y-m-d H-i-s") . ".pdf", false);
    }

    $email->setSubject($subject);
    $email->setMessage($message);

    return $email->send();
}
function timeAgofunc($timestamp)
{
    $datetime1 = new DateTime("now");
    $datetime2 = date_create($timestamp);
    $diff = date_diff($datetime1, $datetime2);
    $timemsg = '';
    if ($diff->y > 0) {
        $timemsg = $diff->y . ' year' . ($diff->y > 1 ? "'s" : '');
    } else if ($diff->m > 0) {
        $timemsg = $diff->m . ' month' . ($diff->m > 1 ? "'s" : '');
    } else if ($diff->d > 0) {
        $timemsg = $diff->d . ' day' . ($diff->d > 1 ? "'s" : '');
    } else if ($diff->h > 0) {
        $timemsg = $diff->h . ' hour' . ($diff->h > 1 ? "'s" : '');
    } else if ($diff->i > 0) {
        $timemsg = $diff->i . ' minute' . ($diff->i > 1 ? "'s" : '');
    } else if ($diff->s > 0) {
        $timemsg = $diff->s . ' second' . ($diff->s > 1 ? "'s" : '');
    }

    $timemsg = $timemsg . ' ago';
    return $timemsg;
}
function timeAgo($phpDate)
{
    $timestamp = date('Y-m-d H:i:s');

    $timestampYear = substr($phpDate, 0, 4);
    $timestampMonth = substr($phpDate, 5, 2);
    $timestampDay = substr($phpDate, 8, 2);
    $timestampHour = substr($phpDate, 11, 2);
    $timestampMin = substr($phpDate, 14, 2);
    $timestampSec = substr($phpDate, 17, 2);

    //php date Strings
    $Year = substr($timestamp, 0, 4);
    $Month = substr($timestamp, 5, 2);
    $Day = substr($timestamp, 8, 2);
    $Hour = substr($timestamp, 11, 2);
    $Min = substr($timestamp, 14, 2);
    $Sec = substr($timestamp, 17, 2);

    $diffYear = ($Year - $timestampYear);
    $diffMonth = ($Month - $timestampMonth);
    $diffDay = ($Day - $timestampDay);

    $diffHours = ($Hour - $timestampHour);
    $diffMinutes = ($Min - $timestampMin);
    $diffSeconds = ($Sec - $timestampSec);

    $timemsg = '';
    if ($diffYear > 0) {
        $timemsg = $diffYear . ' year' . ($diffYear > 1 ? "'s" : '');
    } else if ($diffMonth > 0) {
        $timemsg = $diffMonth . ' month' . ($diffMonth > 1 ? "'s" : '');
    } else if ($diffDay > 0) {
        $timemsg = $diffDay . ' day' . ($diffDay > 1 ? "'s" : '');
    } else if ($diffHours > 0) {
        $timemsg = $diffHours . ' hour' . ($diffHours > 1 ? "'s" : '');
    } else if ($diffMinutes > 0) {
        $timemsg = $diffMinutes . ' minute' . ($diffMinutes > 1 ? "'s" : '');
    } else if ($diffSeconds > 0) {
        $timemsg = $diffSeconds . ' second' . ($diffSeconds > 1 ? "'s" : '');
    }

    $timemsg = $timemsg . ' ago';
    return $timemsg;
}
function send_simple_email($email, $subject, $message)
{

    $cnf = [
        'from_email' => COMPANY_EMAIL,
        'from_name'  => COMPANY_NAME,
        'email'      => $email,
        'subject'    => $subject,
        'message'    => $message,
    ];

    $email = \Config\Services::email();

    $email->setFrom($cnf['from_email'], $cnf['from_name']);
    $email->setTo($cnf['email']);
    $email->setMailType('html');

    $email->setSubject($cnf['subject']);
    $email->setMessage(email_header() . $cnf['message'] . email_footer());
    $email->send();

    if ($email->send()) {

        return true;
    }

    return false;
}
function email_header()
{
    return '<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%;
        }

        table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top;
        }

        /* -------------------------------------
                 BODY & CONTAINER
                 ------------------------------------- */
        .body {
            background-color: #f6f6f6;
            width: 100%;
        }

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */

        .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 680px;
            padding: 10px;
            width: 680px;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */

        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 680px;
            padding: 10px;
        }

        /* -------------------------------------
                 HEADER, FOOTER, MAIN
                 ------------------------------------- */

        .main {
            background: #fff;
            border-radius: 3px;
            width: 100%;
        }

        .wrapper {
            box-sizing: border-box;
            padding: 20px;
        }

        .footer {
            clear: both;
            padding-top: 10px;
            text-align: center;
            width: 100%;
        }

        .footer td,
        .footer p,
        .footer span,
        .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center;
        }

        hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0;
        }

        /* -------------------------------------
                 RESPONSIVE AND MOBILE FRIENDLY STYLES
                 ------------------------------------- */

        @media only screen and (max-width: 620px) {
            table[class=body] .content {
                padding: 0 !important;
            }

            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important;
            }

            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }
        }
    </style>
</head>

<body class="">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
            <td>&nbsp;</td>
            <td class="container">
                <div class="content">
                    <!-- START CENTERED WHITE CONTAINER -->
                    <table class="main">
                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="wrapper">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>';
}

function email_footer()
{
    return '</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- END MAIN CONTENT AREA -->
                    </table>
                    <!-- START FOOTER -->
                    <div class="footer">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="content-block">
                                    <span>{companyname}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- END FOOTER -->
                    <!-- END CENTERED WHITE CONTAINER -->
                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</body>

</html>';
}
