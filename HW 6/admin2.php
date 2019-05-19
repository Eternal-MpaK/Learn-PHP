<?php
//require __DIR__."./vendor/autoload.php";
//$remoteIp = $_SERVER['REMOTE_ADDR'];
//$gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
//$recaptcha = new \ReCaptcha\ReCaptcha("6LeJbqEUAAAAAIl0RsgRWVqNBdM8tZx48tT52CHq");
//$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
//if ($resp->isSuccess()) {
//    echo "Успех, капча пройдена";
//} else {
//    echo "Поражен вашей неудачей, сударь";
//}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LeJbqEUAAAAAIl0RsgRWVqNBdM8tZx48tT52CHq',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
            $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
    } else {
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!
        echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    }
}