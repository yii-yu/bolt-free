<?php

$reg = new Registration();

class Registration {

    const FILE = 'data.json';
    const EMAIL_FROM = 'noreply@iqeon.com ';
    const EMAIL_NOTIFICATION = 'support@iqeon.com';
    const BASE_URL_HREF = 'https://iqeon.com';

    private $error = '';
    private $email = '';
    private $token = '';

    public function __construct() {
        $this->init();
        die;
    }

    function init() {
        if (!$this->validate()) {
            echo '{"error":"' . $this->error . '"}';
            return;
        }

        if (!$this->saveEmail()) {
            echo '{"error":"' . $this->error . '"}';
            return;
        }

        $message = '<h4>Спасибо за регистрацию!</h4><p>На указанную вами почту отправлено сообщение с ссылкой для активации вашего аккаунта</p>';

        echo '{"success":"' . $message . '"}';
    }

    function validate() {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $this->error = "поле Email обязательно для заполнения";
            return false;
        }

        if (!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['email'])) {
            $this->error = 'введен не корректный e-mail';
            return false;
        }

        $this->email = $_POST['email'];

        return true;
    }

    function getIp() {
        $ip = "";

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function generateToken($length = 12) {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        $string .= '_' . time();
        $this->token = base64_encode($string);
        return $this->token;
    }

    function saveEmail() {
        $file = file_get_contents(self::FILE);
        $content = json_decode($file, true);

        if (!$content) {
            $content = [];
        }

        $key = array_search($this->email, array_column($content, 'email'));

        if ($key !== false) {
            $this->error = 'Email ' . $this->email . ' уже зарегистрирован в системе';
            return false;
        }

        $newData = array(
            'email' => $this->email,
            'ip' => $this->getIp(),
            'date' => date('Y-m-d H:i:s'),
            'token' => $this->generateToken()
        );

        array_push($content, $newData);


        $result = file_put_contents(self::FILE, json_encode($content));

        if (!$result) {
            $this->error = 'Ошибка записи в файл';
            return false;
        }

        return true;
    }

    function sendEmail() {

        $to = $this->email;
        $subject = 'Регистрация в IQeon';

        $message = '
            <html>
            <head>
              <title>Регистрация в beta.iqeon.com</title>
            </head>
            <body>
              <p>Для завершения регистрации перейдите по ссылке <a href="' . self::BASE_URL_HREF . '?token=' . $this->token . '"></a></p>              

            </body>
            </html>
            ';

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers[] = 'To: <' . $this->email . '>';
        $headers[] = 'From: IQeon robot <' . self::EMAIL_FROM . '>';

        if (!mail($to, $subject, $message, implode("\r\n", $headers))) {
            $this->error = 'Ошибка при отправке сообщения на почту';
            return false;
        }

        return true;
    }

}
