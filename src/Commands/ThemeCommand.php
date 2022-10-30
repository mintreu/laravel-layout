<?php

namespace Mintreu\LaravelLayout\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Mintreu\LaravelLayout\Commands\Traits\hasFilesManipulator;

class ThemeCommand extends Command
{
    use hasFilesManipulator;

    public $signature = 'layout:theme {name?}';

    public $description = 'Create Your Theme Using Mintreu::Layout';

    /**
     * @return int
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function handle(): int
    {
        $themeName = (string) Str::of($this->argument('name') ?? $this->askRequired('Name (e.g. `awesome-theme`)', 'name'))
            ->trim('/')
            ->trim('\\')
            ->trim(' ')
            ->replace('/', '\\');

//        $this->copyStubToApp('manifest',public_path('manifest.json'));

        $this->copyStubToApp('theme',resource_path('views/'.$themeName.'.blade.php'),[
            'layout_title' => ucfirst($themeName).'|'.config('app.name'),
            'layout_keyword' => implode(',',[$themeName,config('app.name'),'new theme,mintreu,layout']),
            'layout_description' => config('app.name').'meta description goes here',
        ]);


        $this->comment('Mintreu::Layout -  Hurrah! Your Theme Generate Successfully');

        return self::SUCCESS;
    }










}

