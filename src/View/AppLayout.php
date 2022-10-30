<?php

namespace Mintreu\LaravelLayout\View;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{

    protected array $layoutConfig=[];
    public string $title;
    public string $favicon;
    public array $keyword;
    public string $description;
    protected bool $preloader;
    public bool $manifest;
    protected array $preloaderConfig;


    public function __construct(string $title='',string $favicon='',array $keyword=[],string $description='',array $config=[],bool $preloader=true,array $preloaderConfig=[],bool $manifest=true)
    {
        $this->title = $title;
        $this->favicon = $favicon;
        $this->keyword = $keyword;
        $this->description = $description;
        $this->layoutConfig = $config;
        $this->preloader = $preloader;
        $this->preloaderConfig = [
          'gif' => (file_exists(public_path('preloader.gif')) ? asset('preloader.fig') : isset($preloaderConfig['gif'])) ? $preloaderConfig['gif'] : '',
          'bg' => $preloaderConfig['bg'] ?? "#f3f3f3",
          'primary' => $preloaderConfig['primary'] ?? "#f3f3f3",
          'secondary' => $preloaderConfig['secondary'] ?? "#444444",
        ];
        $this->manifest = $manifest;
    }


    /**
     * Get the view / contents that represents the component.
     *
     * @return View
     */
    public function render()
    {
        return view('layout::layouts.app',[
            'layout' => $this->layoutConfig,
            'preloader' => [
                'status' => $this->preloader,
                'config' => $this->preloaderConfig,
            ]
        ]);
    }


}
