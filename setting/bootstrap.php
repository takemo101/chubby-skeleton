<?php

use Takemo101\Chubby\Bootstrap\Provider\ClosureProvider;
use Takemo101\Chubby\Support\ApplicationPath;
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
    new ClosureProvider(
        boot: fn (ApplicationPath $path) => require $path->getSettingPath('helper.php'),
    ),
);

return $app;
