<?php

namespace Mintreu\LaravelLayout\Commands\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

trait hasFilesManipulator
{


    /**
     * @param string $stub
     * @param string $targetPath
     * @param array $replacements
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function copyStubToApp(string $stub, string $targetPath, array $replacements = []): void
    {

        $filesystem = app(Filesystem::class);
//        $location = dirname(dirname(dirname(__DIR__))). "/stubs/{$stub}.stub";
        $stubPath = $filesystem->exists(dirname(dirname(dirname(__DIR__))). "/stubs/{$stub}.stub") ? dirname(dirname(dirname(__DIR__))). "/stubs/{$stub}.stub" : null;

        if($stubPath != null)
        {
            $stub = Str::of($filesystem->get($stubPath));

            foreach ($replacements as $key => $replacement) {
                $stub = $stub->replace("{{ {$key} }}", $replacement);
            }
            $stub = (string) $stub;
            $this->writeFile($targetPath, $stub,$filesystem);
        }
    }



    /**
     * @param string $path
     * @param string $contents
     * @param Filesystem $filesystem
     * @return void
     */
    protected function writeFile(string $path, string $contents, Filesystem $filesystem): void
    {

        $filesystem->ensureDirectoryExists((string) Str::of($path)->beforeLast('/'),);
        $filesystem->put($path, $contents);
    }



}
