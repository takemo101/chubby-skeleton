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

    $response = $this->get('/hello/chubby');

    expect($response->getStatusCode())->toBe(StatusCodeInterface::STATUS_OK);
    expect($response->getBody()->__toString())->toBe('Hello, chubby!');
})->with(['chubby', 'takemo101', 'php']);
