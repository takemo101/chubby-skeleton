<?php

// Executed after DI container dependency settings are completed.
// Here, mainly configure routing and middleware.

use App\Action\AssetAction;
use App\Controller\NameController;
use App\Error\ErrorPageRender;
use Psr\Container\ContainerInterface;
use Takemo101\Chubby\Http\ErrorHandler\ErrorResponseRenders;
use Takemo101\Chubby\Http\Renderer\HtmlRenderer;
use Takemo101\Chubby\Support\ApplicationSummary;

$hook = hook();

$hook->onTyped(
    function (ErrorResponseRenders $renders, ContainerInterface $container) {
        /** @var ApplicationSummary */
        $summary = $container->get(ApplicationSummary::class);

        if ($summary->isDebugMode()) {
            $renders->addRender(
                new ErrorPageRender(),
            );
        }
    },
);

$http = http();

$http->get(
    '/',
    function () {

        $imgSrc = route('asset', ['path' => 'example.jpeg']);

        return new HtmlRenderer(
            <<<HTML
                <div>
                    <h1>Hello, World!</h1>
                    <p>This is a sample page.</p>
                    <img src="{$imgSrc}"/>
                </div>
            HTML
        );
    },
)->setName('home');

$http->get(
    '/hello/{name}',
    [NameController::class, 'hello'],
)->setName('hello');

$http->get(
    '/assets/{path:.*}',
    AssetAction::class,
)->setName('asset');
