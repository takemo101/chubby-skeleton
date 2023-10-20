<?php

return Takemo101\Chubby\Application::create(
    Takemo101\Chubby\ApplicationOption::from(
        basePath: getenv('APP_BASE_PATH') ?: dirname(__DIR__),
    ),
)->addProvider(
    new Takemo101\Chubby\Bootstrap\Provider\HttpProvider(),
    new Takemo101\Chubby\Bootstrap\Provider\ConsoleProvider(),
);
