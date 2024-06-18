<?php

// Event configuration

use App\Listener\RequestLoggingListener;

return [

    // Event listing class name array
    'listen' => [
        // class-string<object&callable>
        RequestLoggingListener::class,
    ]
];
