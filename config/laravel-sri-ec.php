<?php

return [
    'test' => env('SRI_TEST', false),
    'certificate' => [
        'path' => env('SRI_CERTIFICATE_PATH'),
        'password' => env('SRI_CERTIFICATE_PASSWORD'),
    ],
    'path' => env('SRI_PATH'),
];
