<?php

namespace App\Controller;

use DI\Attribute\Inject;
use Takemo101\Chubby\Http\Renderer\HtmlRenderer;

readonly class NameController
{
    /**
     * constructor
     *
     * @param string $appName
     */
    public function __construct(
        #[Inject('config.app.name')]
        private string $appName,
    ) {
        //
    }

    /**
     * Hello to you
     *
     * @param string $name
     * @return string
     */
    public function hello(string $name): HtmlRenderer
    {
        return new HtmlRenderer(
            <<<HTML
                <h1>Hello, {$name}!</h1>
                <p>Enjoy {$this->appName}!</p>
            HTML
        );
    }
}
