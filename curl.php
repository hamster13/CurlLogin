<?php
$login = $_POST['login'];
$password = $_POST['password'];
$url = 'passport.meta.ua';
if (!$ch = curl_init()) die("��������� �������� ����� CURL");

$data = array(
    'login' => $login,
    'password' => $password,
    'subm' => '�����'
);

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_COOKIEJAR => $_SERVER['DOCUMENT_ROOT'] . '/cookie.txt',
);

curl_setopt_array($ch, $options);
$result = curl_exec($ch);
curl_close($ch);

$rgo = strpos($result, "http://passport.meta.ua/logout/");
if ($rgo == 0) {
    echo "Error! You have not logged in!";
} else {
    echo $result;
}