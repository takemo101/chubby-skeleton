<?php

// Executed after DI container dependency settings are completed.
// Here, mainly configure routing and middleware.

use App\Action\AssetAction;
use App\Controller\NameController;
use App\Error\ErrorPageRender;
use Slim\Interfaces\RouteParserInterface;
use Takemo101\Chubby\Http\ErrorHandler\ErrorHandler;
use Takemo101\Chubby\Http\Renderer\HtmlRenderer;

hook()->onByType(
    fn (ErrorHandler $handler) => $handler->addRender(
        new ErrorPageRender(),
    ),
);

$http = http();

$http->get(
    '/',
    fn (RouteParserInterface $route) => new HtmlRenderer(
        <<<HTML
            <div>
                <h1>Hello, World!</h1>
                <p>This is a sample page.</p>
                <img src="{$route->urlFor('asset', ['path' => 'example.jpeg'])}"/>
            </div>
        HTML
    ),
)->setName('home');

$http->get(
    '/hello/{name}',
    [NameController::class, 'hello'],
)->setName('hello');

$http->get(
    '/assets/{path:.*}',
    AssetAction::class,
)->setName('asset');
