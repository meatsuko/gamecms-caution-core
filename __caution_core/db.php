<?php

$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '',
    'port'      => '3306',
    'database'  => 'default_db',
    'username'  => 'gen_user',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',

    'options' => [
        PDO::MYSQL_ATTR_SSL_CA                 => false,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        PDO::MYSQL_ATTR_SSL_CIPHER             => 'DHE-RSA-AES256-SHA',
    ],
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();