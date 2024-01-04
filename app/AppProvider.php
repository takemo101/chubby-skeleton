<?php

namespace App;

use Takemo101\Chubby\ApplicationContainer;
use Takemo101\Chubby\Bootstrap\Definitions;
use Takemo101\Chubby\Bootstrap\Provider\Provider;
use Takemo101\Chubby\Filesystem\LocalFilesystem;
use Takemo101\Chubby\Support\ApplicationPath;

class AppProvider implements Provider
{
    /**
     * @var string Provider name.
     */
    public const ProviderName = 'app';

    /**
     * constructor
     *
     * @param ApplicationPath $path
     * @param LocalFilesystem $filesystem
     */
    public function __construct(
        private ApplicationPath $path,
        private LocalFilesystem $filesystem,
    ) {
        //
    }

    /**
     * {@inheritDoc}
     */
    public function register(Definitions $definitions): void
    {
        $definitions->add([
            // Add your definitions here.
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function boot(ApplicationContainer $container): void
    {
        // Add your booting process here.

        $helperPath = $this->path->getSettingPath('helper.php');

        if ($this->filesystem->exists($helperPath)) {
            require_once $helperPath;
        }
    }
}
