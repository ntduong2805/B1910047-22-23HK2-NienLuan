<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'admin' => [
        'booking' => [
            'name' =>  'Booking',
            'actions' => [
                'room_booking' => 'admin/room_booking',
            ],
            'icon' => 'ti-control-forward'
        ],

        'roomtype' => [
            'name' => 'Room Type',
            'actions' => [
                'view' => 'admin/roomtype',
            ],
            'icon' => 'ti-home'
        ],
        'facility' => [
            'name' => 'Facility',
            'actions' => [
                'view' => 'admin/facility',
            ],
            'icon' => 'ti-crown'
        ],
        'user' => [
            'name' => 'User',
            'actions' => [
                'view' => 'admin/user',
            ],
            'icon' => 'ti-user'
        ],
        'slider' => [
            'name' => 'Slider',
            'actions' => [
                'view' => 'admin/slider',
            ],
            'icon' => 'ti-layout-grid2'
        ],
        'Review' => [
            'name' => 'Review',
            'actions' => [
                'view' => 'admin/review',
            ],
            'icon' => 'ti-star'
        ],
    ],

];
