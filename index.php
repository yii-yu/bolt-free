<?php
session_start();

if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    $get = strip_tags($_GET['lang']);

    if ($get == 'ru' || $get == 'en') {
        $_SESSION['lang'] = $get;
    }
}

$countBonus = countVerified();
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
?>

<html lang="<?= $lang ?>" style=" height: 100%;">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title><?= $lang == "ru" ? "Платформа IQeon - Открытая Бета" : " IQeon Platform - Open Beta" ?>IQeon</title>

        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-K9L3XCH');</script>
        <!-- End Google Tag Manager -->


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">      
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">


    </head>
    <body class="iqeon-timer ">

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9L3XCH"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->


        <div class="lang-bar">
            <ul>
                <li id="btn_lang_en" class="<?= $lang == 'en' ? 'active' : '' ?>">en</li>
                <li>|</li>
                <li id="btn_lang_ru" class="<?= $lang == 'ru' ? 'active' : '' ?>">ru</li>
            </ul>
        </div> 
        <div class="flex-box">

            <div class="timer-header">
                <img src="assets/img/rocket.png">
                <h2><?= translate('Starting IQeon') ?></h2>
                <div class="label-open-beta">open beta</div>
            </div>

            <div class="timer-text">
                <p>
                    <?= translate('take_part_in_the_open_beta') ?>
                    <br>
                    <?= translate('become_one_of_thousands') ?>
                    <img src="assets/img/icon-iqn.png" style="margin: 6px;">
                    <span><?= translate('bonus') ?></span>
                </p>
            </div>


            <div id="clock" class="time-count" style="">

            </div>



            <div class="count-bonus">
                <p>
                    <span id="count_bonus" ><?= 10000 - $countBonus; ?></span>
                    <span ><?= translate('remain only') ?></span>    
                </p>
            </div>
            <div class="button-group">
                <a href="#" class="btn btn-common" data-toggle="modal" data-target="#modalRegistration" style=""><?= translate('get_your_bonus_now') ?></a>
            </div> 
            <div class="social mt-4">
                <a class="facebook" href="https://www.facebook.com/iqeon" target="_blank"><i class="lni-facebook-filled" style="line-height:2"></i></a>                
                <a class="instagram" href="https://t.me/iqeonICO" target="_blank"><i class="lni-telegram" style="line-height:2"></i></a>
                <a class="twitter" href="https://twitter.com/iqeon" target="_blank"><i class="lni-twitter-filled" style="line-height:2"></i></a>
                <a class="google" href="https://vk.com/iqeon" target="_blank"><i class="lni-vk" style="line-height:2"></i></a>
            </div>              
        </div>

        <div class="modal fade" id="modalRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                         
                    </div>

                    <div class="modal-body">
                        <div id="save_success">
                            <h2><?= translate('interested_in_beta-testing') ?></h2>
                            <h3><?= translate('fill_in_the_e-mail_to_participate_in_beta_testing') ?></h3>

                            <form id="form_reg" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="<?= translate('enter_your_email') ?>">
                                    <div id="save_error" style="color: red;font-size: 12px"></div>
                                </div>

                                <input id="btn_submit" type="submit" class="btn btn-primary btn-iqeon" value="<?= translate('sign_up') ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_confirm_token" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button id="btn_close_modal_confirm" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                                         
                    </div>

                    <div class="modal-body ">
                        <div class="verified-text">                                               
                            <h3><?= translate('your_email_has_been_successfully_verified') ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

</section>
</div>

<div id="preloader" style="display: none;">
    <div class="loader" id="loader-1"></div>
</div>

<script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/vegas.min.js"></script>
<script src="assets/js/jquery.countdown.min.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/jquery.nav.js"></script>
<script src="assets/js/jquery.easing.min.js"></script> 
<script src="assets/js/main.js"></script>

<?php if (isset($_GET['token']) && !empty($_GET['token'])): ?>
    <?php $token = strip_tags($_GET['token']); ?>
    <?php if (updateFile($token)): ?>

        <script>
                    $('#modal_confirm_token').modal('show');
        </script>

    <?php endif; ?>
<?php endif; ?>         

<?php

function updateFile($token) {
    $file = file_get_contents('action/data.json');
    $content = json_decode($file, true);

    if (!$content) {
        return false;
    }

    $key = array_search($token, array_column($content, 'token'));

    if ($key === false) {
        return false;
    }

    $content[$key]['verified'] = true;

    $result = file_put_contents('action/data.json', json_encode($content));

    if (!$result) {
        return false;
    }

//            sendEmailToIqeon($content[$key]['email']);

    return true;
}

function countVerified() {
    $count = 0;
    $file = file_get_contents('action/data.json');
    $content = json_decode($file, true);

    if (empty($content)) {
        return false;
    }

    foreach ($content as $item) {
        if ($item['verified']) {
            $count++;
        }
    }

    return $count;
}

function getDictionary($lang) {
    $file = file_get_contents('translation/' . $lang . '/translation.json');

    if (!$file) {
        return false;
    }

    $content = json_decode($file, true);
    return $content;
}

function translate($word) {
    $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
    $dictionary = getDictionary($lang);

    if (!$dictionary) {
        return '';
    }

    if (array_key_exists($word, $dictionary)) {
        return $dictionary[$word];
    }

    return '';
}

function sendEmailToIqeon($email) {

    $to = 'support@iqeon.com';
    $subject = 'Регистрация в IQeon';

    $message = '
            <html>
            <head>
              <title>Регистрация пользователя в iqeon.com</title>
            </head>
            <body>
              <p>Новый пользователь подтвердил зарегистрировался и подтвердил свой email (' . $email . ')</p>                     

            </body>
            </html>
            ';

    $mailheaders = "Content-type:text/html;charset=windows-1251rn";
    $mailheaders .= "From: Robot <noreply@iqeon.com";
    $mailheaders .= "Reply-To: noreply@iqeon.com";

    mail($to, $subject, $message, $mailheaders);
}
?>


</body></html>

