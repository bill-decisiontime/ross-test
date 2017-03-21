<?php
    require 'vendor/autoload.php';
    use Mailgun\Mailgun;

    $mgClient = new Mailgun("key-7abfa9e8fc58f2b67140022630a1200e");
    $domain = "sandboxf4d957256b09434abbcaca5ae33cea79.mailgun.org";

    $result = $mgClient->sendMessage($domain, array(
        'from'    => 'Excited User <ross.walker@teamsolutionz.com>',
        'to'      => $_POST['email'],
        'subject' => 'Hello',
        'text'    => 'Hello world!'
    ));
