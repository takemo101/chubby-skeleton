<?php

namespace App\Action;

use DI\Attribute\Inject;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;
use Takemo101\Chubby\Filesystem\LocalFilesystem;
use Takemo101\Chubby\Filesystem\PathHelper;
use Takemo101\Chubby\Http\Renderer\StaticRenderer;

readonly class AssetAction
{
    /**
     * constructor
     *
     * @param LocalFilesystem $filesystem
     * @param PathHelper $pathHelper
     * @param string $assetDirectory
     */
    public function __construct(
        private LocalFilesystem $filesystem,
        private PathHelper $pathHelper,
        #[Inject('config.asset.directory')]
        private string $assetDirectory,
    ) {
        //
    }

    /**
     * Hello to you
     *
     * @param string $path
     * @return StaticRenderer
     */
    public function __invoke(ServerRequestInterface $request, string $path): StaticRenderer
    {
        $assetPath = $this->pathHelper->join($this->assetDirectory, $path);

        if (
            !$this->filesystem->exists($assetPath)
            || !$this->filesystem->isFile($assetPath)
        ) {
            throw new HttpNotFoundException($request, 'Asset not found.');
        }

        return StaticRenderer::fromPath($assetPath);
    }
}
