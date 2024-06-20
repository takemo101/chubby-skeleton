<?php

// Event configuration

use App\Listener\RequestLoggingListener;

return [

    // Event listing class name array
    'listeners' => [
        // class-string<object&callable>
        RequestLoggingListener::class,
    ]
];
