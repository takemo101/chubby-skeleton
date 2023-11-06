<?php

namespace App\Error;

use Takemo101\Chubby\Http\ErrorHandler\ErrorSetting;
use Takemo101\Chubby\Http\ErrorHandler\HtmlErrorResponseRender;
use Throwable;

final class ErrorPageRender extends HtmlErrorResponseRender
{
    /**
     * Create html content.
     *
     * @param Throwable $exception
     * @param ErrorSetting $setting
     *
     * @return string
     */
    protected function createHtmlContent(
        Throwable $exception,
        ErrorSetting $setting,
    ): string {
        return <<<HTML
            <div>
                <h1>Oops!</h1>
                <p>Something went wrong.</p>
                <p>{$exception->getMessage()}</p>
            </div>
        HTML;
    }
}
