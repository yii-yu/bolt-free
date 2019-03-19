<?php

session_start();

$reg = new Registration();

class Registration {

    const FILE = 'data.json';
    const EMAIL_FROM = 'noreply@iqeon.com ';
    const EMAIL_NOTIFICATION = 'support@iqeon.com';
    const BASE_URL_HREF = 'https://iqeon.com';

    private $error = '';
    private $email = '';
    private $token = '';
    private $lang = '';

    public function __construct() {
        $this->lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
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

        if (!$this->sendEmail()) {
            echo '{"error":"' . $this->error . '"}';
            return;
        }

        $message = '<h4>' . $this->translate("thanks for registering") . '</h4><p>' . $this->translate("a message with a link to activate your account has been sent to your e-mail") . '</p>';

        echo '{"success":"' . $message . '"}';
    }

    function validate() {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $this->error = $this->translate('email field is required');
            return false;
        }

        if (!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['email'])) {
            $this->error = $this->translate('you entered an incorrect e-mail');
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
            $this->error = 'Email ' . $this->email . ' ' . $this->translate('already registered in the system');
            return false;
        }

        $newData = array(
            'email' => $this->email,
            'ip' => $this->getIp(),
            'date' => date('Y-m-d H:i:s'),
            'token' => $this->generateToken(),
            'verified' => false
        );

        array_push($content, $newData);


        $result = file_put_contents(self::FILE, json_encode($content));

        if (!$result) {
            $this->error = $this->translate('error writing to file');
            return false;
        }

        return true;
    }

    function sendEmail() {

        $to = $this->email;
        $subject = $this->translate('register with iqeon');

        $message = '
            <html>
            <head>
              <title>' . $this->translate("register with iqeon") . '</title>
            </head>
            <body>
              <p>' . $this->translate("to complete the registration and receive the bonus, click on the link") . '</p>  
              <a href="' . self::BASE_URL_HREF . '?token=' . $this->token . '" target="_blank">' . $this->translate("to complete the registration") . '</a>
            </body>
            </html>
            ';

        $mailheaders = "Content-type:text/html;charset=windows-1251rn";
        $mailheaders .= "From: Robot <" . self::EMAIL_FROM . ">";
        $mailheaders .= "Reply-To: ".self::EMAIL_FROM;

        if (!mail($to, $subject, $message, $mailheaders)) {
            $this->error = $this->translate('error when sending message to mail');
            return false;
        }

        return true;
    }

    function getDictionary() {
        $file = file_get_contents('../translation/' . $this->lang . '/translation.json');

        if (!$file) {
            return false;
        }

        $content = json_decode($file, true);
        return $content;
    }

    function translate($word) {
        $dictionary = $this->getDictionary();

        if (!$dictionary) {
            return '';
        }

        if (array_key_exists($word, $dictionary)) {
            return $dictionary[$word];
        }

        return '';
    }

}
