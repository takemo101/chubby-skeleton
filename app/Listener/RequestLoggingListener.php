<?php

namespace App\Listener;

use Psr\Log\LoggerInterface;
use Takemo101\Chubby\Http\Event\RequestReceived;
use Takemo101\Chubby\Support\ApplicationSummary;

class RequestLoggingListener
{
    /**
     * constructor
     *
     * @param LoggerInterface $logger
     * @param ApplicationSummary $summary
     */
    public function __construct(
        private LoggerInterface $logger,
        private ApplicationSummary $summary,
    ) {
        //
    }

    /**
     * @param RequestReceived $event
     */
    public function __invoke(RequestReceived $event): void
    {
        $request = $event->getRequest();

        if ($this->summary->isDebugMode()) {
            // Output request log
            $this->logger->info(
                sprintf(
                    'Request: %s %s',
                    $request->getMethod(),
                    $request->getUri()->getPath(),
                ),
            );
        }

        // Do something before controller invoke
    }
}
