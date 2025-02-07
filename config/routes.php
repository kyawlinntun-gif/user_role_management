<?php

return [
    'GET' => [
        '/' => [
            'action' => 'App\\Controllers\\HomeController@index',
            'middleware' => 'AuthMiddleware'
        ],
        '/login' => [
            'action' => 'App\\Controllers\\Auth\\LoginController@showLoginForm',
            'middleware' => 'RedirectIfAuthenticate'
        ],
        '/logout' => [
            'action' => 'App\\Controllers\\Auth\\LoginController@logout',
            'middleware' => 'GuestMiddleware'
        ],
        '/register' => [
            'action' => 'App\\Controllers\\Auth\\RegisterController@showRegisterForm',
            'middleware' => 'RedirectIfAuthenticate'
        ],
        '/admin' => [
            'action' => 'App\Controllers\\Admin\\HomeController@index',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/profile' => [
            'action' => 'App\\Controllers\\Admin\\HomeController@profile',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/user/{id}' => [
            'action' => 'App\\Controllers\\Admin\\HomeController@editUser',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ]
    ],
    'POST' => [
        '/login' => [
            'action' => 'App\\Controllers\\Auth\\LoginController@login'
        ],
        '/register' => [
            'action' => 'App\\Controllers\\Auth\\RegisterController@register'
        ]
    ]
];