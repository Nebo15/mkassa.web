<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once(__DIR__.'/../vendor/autoload.php');

$mc = new Mailchimp('2e371d9fe765a8c1c7f1a1586a281bdf-us7');

$params = array(
	"id" => '23207a4ce3',
    "email" => array(
        "email" => filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL),
    ),
    'double_optin' => false
);

if($_REQUEST['type'] == 'json') {
  echo json_encode($mc->call('lists/subscribe', $params));
} else {
  header('Location: /#done');
}

// $recipients = 'korchasa@gmail.com, felix.polianski@gmail.com';
// $log_file = __DIR__.'/../var/senders.log';

// $req = $_POST;

// if(!isset($req['email']))
//  die('{}');


// $subject = "=?utf-8?B?".base64_encode('Schet.ru b2c: Запрос от '.$req['email'])."?=";
// $message = $req['email'];
// $additional_headers  = 'Content-Transfer-Encoding: 8bit' .  "\r\n";
// $additional_headers .= 'Content-Type: text/plain; charset=utf-8' . "\r\n";
// mail ($recipients, $subject, $message, $additional_headers);

// if (!$handle = fopen($log_file, 'a+'))
//  die("Cannot open file ($log_file)");

// $log_string = date("Y-m-d H:i:s").';'.$req['email'].PHP_EOL;
// if (fwrite($handle, $log_string) === FALSE)
//     die("Cannot write to file ($log_file)");

// fclose($handle);

