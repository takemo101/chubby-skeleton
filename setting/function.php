<?php

// Executed after DI container dependency settings are completed.
// Here, mainly configure routing and middleware.

use App\NameController;
use Takemo101\Chubby\Http\Renderer\HtmlRenderer;

$http = http();

$http->get(
    '/',
    fn () => new HtmlRenderer(
        <<<HTML
            <div>
                <h1>Hello, World!</h1>
                <p>This is a sample page.</p>
            </div>
        HTML
    ),
);

$http->get(
    '/hello/{name}',
    [NameController::class, 'hello'],
);
