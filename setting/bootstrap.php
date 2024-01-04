<?php

use App\AppProvider;
use Takemo101\Chubby\ApplicationBuilder;
use Takemo101\Chubby\ApplicationOption;

$app = ApplicationBuilder::buildStandard(
    ApplicationOption::from(
        basePath: getenv('APP_BASE_PATH') ?: dirname(__DIR__),
    ),
);

// Please add a Provider here to extend the functionality.
// $app->addProvider(new ExampleProvider());

$app->addProvider(
    AppProvider::class,
);

return $app;
