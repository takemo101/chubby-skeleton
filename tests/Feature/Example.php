<?php

use Fig\Http\Message\StatusCodeInterface;
use Tests\TestCase;

it('root request', function () {
    /** @var TestCase $this */

    $response = $this->get('/');

    expect($response->getStatusCode())->toBe(StatusCodeInterface::STATUS_OK);
});

it('hello request', function (string $name) {
    /** @var TestCase $this */

    $response = $this->get("/hello/{$name}");

    $expected = "Hello, {$name}!";

    expect($response->getStatusCode())->toBe(StatusCodeInterface::STATUS_OK);
    expect($response->getBody()->__toString())->toContain($expected);
})->with(['chubby', 'takemo101', 'php']);

it('asset request', function (string $path, string $expectedContentType) {
    /** @var TestCase $this */

    $response = $this->get("/assets/{$path}");

    expect($response->getStatusCode())->toBe(StatusCodeInterface::STATUS_OK);
    expect($response->getHeaderLine('Content-Type'))->toBe($expectedContentType);
})->with([
    ['example.jpeg', 'image/jpeg'],
]);
