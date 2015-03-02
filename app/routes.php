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
    ]
]);
$app->group('/:short', function () use ($app) {
    $app->addRoutes([
        '/' => 'ShorturlController:redirect',
        '/details(/)' => 'ShorturlController:details'
    ]);
});