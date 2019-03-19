<?php
session_start();
$countBonus = countVerified();
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
?>

<html lang="<?= $lang ?>" style=" height: 100%;">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>IQeon</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
        <!-- Slicknav -->
        <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
        <!-- Off Canvas Menu -->
        <link rel="stylesheet" type="text/css" href="assets/css/menu_sideslide.css">
        <!-- Color Switcher -->
        <link rel="stylesheet" type="text/css" href="assets/css/vegas.min.css">
        <!-- Animate -->
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    </head>
    <body style="background: url(assets/img/bg.svg);height: 100%;background-size: cover;background-repeat: no-repeat;">
        <div class="lang-bar">
            <ul>
                <li id="btn_lang_en" class="<?= $lang == 'en' ? 'active' : '' ?>">en</li>
                <li>|</li>
                <li id="btn_lang_ru" class="<?= $lang == 'ru' ? 'active' : '' ?>">ru</li>
            </ul>
        </div>      
        <section class="countdown-timer"> 
            <div class="container" style="">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="heading-count">
                            <h2><?= translate('Starting IQeon') ?><span style="
                                                                        background: #fff;
                                                                        padding: 5px 10px;
                                                                        margin: 0px 10px;
                                                                        border-radius: 5px;
                                                                        font-size: 76%;
                                                                        color: #dc3545;
                                                                        ">Beta</span> 🚀</h2>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row time-countdown justify-content-center">
                            <div id="clock" class="time-count" style="">
                                <div class="time-entry days">
                                    <span>7</span>
                                    <div><?= translate('days') ?></div>
                                </div> 
                                <div class="time-entry hours">
                                    <span>07</span> Hours</div> 
                                <div class="time-entry minutes">
                                    <span>32</span> Minutes</div> 
                                <div class="time-entry seconds">
                                    <span>55</span> 
                                    Seconds
                                </div> 
                            </div>
                        </div>
                        <p>
                            <?= translate('take_part_in_the_open_beta') ?>
                            <br>
                            <?= translate('become_one_of_thousands') ?>
                            <img src="https://telegra.ph/file/afb7e6464a52ebd3a9460.png" style="height: 22px;margin: 6px;">
                            <span style="font-weight: bold;"><?= translate('bonus') ?></span>
                        </p>
                        <p style="
                           font-size: 18px;
                           padding-top: 18px;
                           font-weight: bold;
                           "><?= translate('remain only') ?><span id="count_bonus" style="
                                                               background: #fff;
                                                               padding: 5px 10px;
                                                               border-radius: 5px;
                                                               font-size: 76%;
                                                               color:  #dc3545;
                                                               font-size: 20px;
                                                               font-weight: bold;
                                                               margin: 5px 10px;
                                                               "><?= 1000 - $countBonus; ?></span><?= translate('bonuses') ?></p><div class="button-group">
                            <a href="#" class="btn btn-common" data-toggle="modal" data-target="#modalRegistration" style="background-color: #dc3545; display: inline-block;font-family: rubik, sans-serif;font-size: 14px;font-weight: 700;line-height: 58px;padding: 0 25px;color: #fff;border: 1px solid transparent;border-radius: 30px;text-decoration: none;-webkit-transition: all .25s;transition: all .25s;text-align: center;position: relative;-webkit-box-shadow: 0 7px 18px 2px rgba(254, 100, 129, .4);box-shadow: 0 7px 18px 2px rgba(254, 100, 129, .4);width: 250px;"><?= translate('get_your_bonus_now') ?></a>
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
                        <div class="social mt-4">
                            <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
                            <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
                            <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
                            <a class="google" href="#"><i class="lni-google-plus"></i></a>
                        </div>              
                    </div>
                </div>
            </div>
            <br><br>

        </section>
 
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

