<?php

// 1. Paksa format JSON
$_SERVER['HTTP_ACCEPT'] = 'application/json';

// 2. Buat folder sementara khusus Vercel di memori /tmp
$tmpStorage = '/tmp/storage';
$directories = [
    'framework/views',
    'framework/cache',
    'framework/cache/data',
    'framework/sessions',
    'logs'
];

foreach ($directories as $dir) {
    if (!is_dir("$tmpStorage/$dir")) {
        mkdir("$tmpStorage/$dir", 0777, true);
    }
}

// 3. Beritahu Laravel untuk membuang file view ke /tmp
putenv("VIEW_COMPILED_PATH=$tmpStorage/framework/views");
$_ENV['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";

require __DIR__ . '/../public/index.php';