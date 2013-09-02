<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

$recipients = 'korchasa@gmail.com, felix.polianski@gmail.com';
$log_file = __DIR__.'/../var/senders.log';

$req = $_POST;

if(!isset($req['email']))
	die('{}');
$req['email'] = filter_var($req['email'], FILTER_SANITIZE_EMAIL);

$subject = "=?utf-8?B?".base64_encode('Schet.ru: Запрос от '.$req['email'])."?=";
$message = $req['email'];
$additional_headers  = 'Content-Transfer-Encoding: 8bit' .  "\r\n";
$additional_headers .= 'Content-Type: text/plain; charset=utf-8' . "\r\n";
mail ($recipients, $subject, $message, $additional_headers);

if (!$handle = fopen($log_file, 'a+'))
	die("Cannot open file ($log_file)");

$log_string = date("Y-m-d H:i:s").';'.$req['name'].';'.$req['company_name'].';'.$req['contact'].PHP_EOL;
if (fwrite($handle, $log_string) === FALSE)
    die("Cannot write to file ($log_file)");

fclose($handle);

echo '{}';