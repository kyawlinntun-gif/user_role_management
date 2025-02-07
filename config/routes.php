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
        '/admin/users' => [
            'action' => 'App\\Controllers\\Admin\\UserController@index',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/users/{id}' => [
            'action' => 'App\\Controllers\\Admin\\UserController@edit',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/roles' => [
            'action' => 'App\\Controllers\\Admin\\RoleController@index',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/roles/create' => [
            'action' => 'App\\Controllers\\Admin\\RoleController@create',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/roles/{id}' => [
            'action' => 'App\\Controllers\\Admin\\RoleController@edit',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/roles/{id}/manage' => [
            'action' => 'App\\Controllers\\Admin\\RoleController@manageRolePermission',
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
        ],
        '/admin/users/{id}' => [
            'action' => 'App\\Controllers\\Admin\\UserController@update',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/users/{id}/delete' => [
            'action' => 'App\\Controllers\\Admin\\UserController@destroy',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/roles/create' => [
            'action' => 'App\\Controllers\\Admin\\RoleController@store',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/roles/{id}' => [
            'action' => 'App\\Controllers\\Admin\\RoleController@update',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/roles/{id}/delete' => [
            'action' => 'App\\Controllers\\Admin\\RoleController@destroy',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ],
        '/admin/roles/{id}/manage' => [
            'action' => 'App\\Controllers\\Admin\\RoleController@updateRolePermission',
            'middleware' => [
                'RoleMiddleware' => ['admin']
            ]
        ]
    ]
];