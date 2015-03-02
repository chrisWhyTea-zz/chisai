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

$app->group('/auth', function () use ($app) {
    $app->addRoutes([
        '/' => [
            'get' => [
                'AuthController:showLogin',
                function () {
                }
            ],
            'post' => [
                'AuthController:login',
                function () {
                }
            ]
        ],
        '/logout(/)' => 'AuthController:Logout',
        '/register(/)' => [
            'get' => [
                'AuthController:showRegistration',
                function () {
                }
            ],
            'post' => [
                'AuthController:registration',
                function () {
                }
            ]
        ],
    ]);
});

$app->group('/:short', function () use ($app) {
    $app->addRoutes([
        '/' => 'ShorturlController:redirect',
        '/details(/)' => 'ShorturlController:details'
    ]);
});