<?php 

function post_captcha($user_response) {
    $fields_string = '';
    $fields = array(
        'secret' => '6Le85ocUAAAAACSA_HeP6H9jUC75BjrHF4f3ZHKV',
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

// Agregarmos una variable CaptCha
$res = post_captcha($_POST['g-recaptcha-response']);
// Fin Agregarmos una variable CaptCha

// Comprobamos que el Captcha esté completo
if (!$res['success']) {   
	echo 'error';
} else {
	echo 'ok';
}
// Fin de comprobación Catpcha


?>