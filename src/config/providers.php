<?php
return [
    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => \Vof\Admin\Models\Admin::class,
        ],
    ]
];
