<?php

$app = Takemo101\Chubby\ApplicationBuilder::buildStandard(
    Takemo101\Chubby\ApplicationOption::from(
        basePath: getenv('APP_BASE_PATH') ?: dirname(__DIR__),
    ),
);

// Please add a Provider here to extend the functionality.
// $app->addProvider(new ExampleProvider());

return $app;
