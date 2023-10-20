<?php

// Executed after DI container dependency settings are completed.
// Here, mainly configure routing and middleware.

use App\NameController;
use Psr\Http\Message\ResponseInterface;

$http = http();

$http->get(
    '/',
    function (ResponseInterface $response) {
        $response
            ->getBody()
            ->write('Welcome to Chubby!');

        return $response;
    },
);

$http->get(
    '/hello/{name}',
    [NameController::class, 'hello'],
);
