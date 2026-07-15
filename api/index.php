<?php

// Paksa Laravel untuk selalu membalas dengan format teks JSON (bukan HTML)
$_SERVER['HTTP_ACCEPT'] = 'application/json';

require __DIR__ . '/../public/index.php';