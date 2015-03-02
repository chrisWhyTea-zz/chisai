<?php


$app->addRoutes([
    '/' => [
        'get' => [
            'ShorturlController:index',
            function () {
            }
        ],
        'post' => [
            'ShorturlController:create',
            function () {
            }
        ]
    ],
    '/:short(/)' => 'ShorturlController:redirect',
    '/:short/details(/)' => 'ShorturlController:details'
]);