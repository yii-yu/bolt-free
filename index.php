<?php
$email = false;
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
}
?>
<html lang="en" style="
      height: 100%;
      "><head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Bolt - Coming Soon Template</title>

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

        <!-- Coundown Section Start -->
        <section class="countdown-timer" style="/* height: 100%; */">
            <div class="container" style="
                 /* background: url(https://iqeon.com/images/desctop2.png); */
                 /* background-size: contain; */
                 /* background-repeat: no-repeat; */
                 ">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="heading-count">
                            <h2>Запуск IQeon<span style="
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
                            <div id="clock" class="time-count" style="
                                 "><div class="time-entry days"><span>7</span> Days</div> <div class="time-entry hours"><span>07</span> Hours</div> <div class="time-entry minutes"><span>32</span> Minutes</div> <div class="time-entry seconds"><span>55</span> Seconds</div> </div>
                        </div>
                        <p>Примите участие в Открытом Бета Тестировании игровой PvP платформы IQeon<br>Станьте одним из 1000 первых игроков, которые гарантированно получат <img src="https://telegra.ph/file/afb7e6464a52ebd3a9460.png" style="
                                                                                                                                                                                 height: 22px;
                                                                                                                                                                                 margin: 6px;
                                                                                                                                                                                 "><span style="
                                                                                                                                                                                 font-weight: bold;
                                                                                                                                                                                 ">бонус</span></p>
                        <p style="
                           font-size: 18px;
                           padding-top: 18px;
                           font-weight: bold;
                           ">Осталось всего<span style="
                                              background: #fff;
                                              padding: 5px 10px;
                                              border-radius: 5px;
                                              font-size: 76%;
                                              color:  #dc3545;
                                              font-size: 20px;
                                              font-weight: bold;
                                              margin: 5px 10px;
                                              ">1000</span>бонусов</p><div class="button-group" style="
                            /* border-radius: 50%; */
                                                     ">
                            <a href="#" class="btn btn-common" data-toggle="modal" data-target="#modalRegistration" style="background-color: #dc3545; display: inline-block;font-family: rubik, sans-serif;font-size: 14px;font-weight: 700;line-height: 58px;padding: 0 25px;color: #fff;border: 1px solid transparent;border-radius: 30px;text-decoration: none;-webkit-transition: all .25s;transition: all .25s;text-align: center;position: relative;-webkit-box-shadow: 0 7px 18px 2px rgba(254, 100, 129, .4);box-shadow: 0 7px 18px 2px rgba(254, 100, 129, .4);width: 250px;">Получить Бонус Сейчас</a>

                            <div class="modal fade" id="modalRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="index.php" method="post">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="inputEmail1">Email</label>
                                                    <input type="email" name="email" class="form-control" id="inputEmail1" placeholder="Enter email">
                                                </div>

                                            </div>
                                            <div class="modal-footer">                                            
                                                <input type="submit" class="btn btn-primary" value="Зарегистрироваться">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <?php if ($email): ?>
                                <div class="modal fade"  tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">



                                            </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
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
        <!-- Coundown Section End -->

        <!-- Preloader -->
        <div id="preloader" style="display: none;">
            <div class="loader" id="loader-1"></div>
        </div>
        <!-- End Preloader -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="assets/js/jquery-min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/vegas.min.js"></script>
        <script src="assets/js/jquery.countdown.min.js"></script>
        <script src="assets/js/classie.js"></script>
        <script src="assets/js/jquery.nav.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script> 
        <script src="assets/js/main.js"></script>
        <script src="assets/js/site.js"></script>


        <script type="text/javascript">
            $("#example").vegas({
                timer: false,
                delay: 6000,
                transitionDuration: 2000,
                transition: "blur",
                slides: [
                    {src: "assets/img/slide1.jpg"},
                    {src: "assets/img/slide2.jpg"},
                    {src: "assets/img/slide3.jpg"}
                ]
            });
        </script>



    </body></html>

