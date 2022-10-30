<?php

namespace Mintreu\LaravelLayout\View;

use Mintreu\LaravelLayout\LaravelLayout;

class Theme extends LaravelLayout
{
    protected string $layout = 'theme';


    /**
     * @param string $title
     * @param string $favicon
     * @param array $keyword
     * @param string $description
     * @param array $config
     * @param bool $preloader
     * @param array $preloaderConfig
     * @param bool $manifest
     */
    public function __construct(string $title='',string $favicon='',array $keyword=[],string $description='',array $config=[],bool $preloader=true,array $preloaderConfig=[],bool $manifest=true)
    {
        $this->title = $title;
        $this->description = $description;
        $this->favicon = $favicon;
        $this->keyword = $keyword;
        $this->manifest = $manifest;
        $this->preloader = $preloader;
        $this->layoutConfig = $config;
        $this->preloaderConfig = [
            'gif' => (file_exists(public_path('preloader.gif')) ? asset('preloader.fig') : isset($preloaderConfig['gif'])) ? $preloaderConfig['gif'] : '',
            'bg' => $preloaderConfig['bg'] ?? '',
            'primary' => $preloaderConfig['primary'] ?? '',
            'secondary' => $preloaderConfig['secondary'] ?? '',
        ];

        parent::__construct();
    }

    /**
     * @return array
     */
    public function stylesheet(): array
    {
        return [
            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">',
        ];
    }

    /**
     * @return array
     */
    public function javascript(): array
    {
        return [];
    }
}
