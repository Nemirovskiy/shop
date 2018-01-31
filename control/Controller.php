<?
session_start();
include "control/autoload.php";

$user = new User;
$page = new Page;

$user->userInit();

$page->building($user);