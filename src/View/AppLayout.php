<?php

namespace Mintreu\LaravelLayout\View;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;
use Mintreu\LaravelLayout\Traits\hasLayoutConfiguration;

class AppLayout extends Component
{

    use hasLayoutConfiguration;

    protected array $layoutConfig=[];
    public string $title;
    public string $favicon;

    public array $keyword;
    public string $description;
    public bool $manifest;
    public array $config=[];
    protected array $faviconConfig;
    protected array $viteAssets;

    public function __construct(string $title='',string $favicon='',array $keyword=[],string $description='',array $config=[])
    {

        $this->title = empty($title) ? config('app.name') : $title;
        $this->loadFavicon($favicon);
        $this->keyword = $keyword;
        $this->description = !empty($description) ? $description : 'welcome '.Str::lower($this->title);
        $this->layoutConfig = $this->loadLayoutConfig($config);
        $this->manifest = file_exists(public_path('/manifest.json'));

        // override vite asset list
        // Read more at: https://laravel.com/docs/9.x/vite#loading-your-scripts-and-styles
        $this->viteAssets = ['resources/js/app.js'];
        // override vite asset list


        $this->config = [
            'layout' => $this->layoutConfig,
            'favicon' => $this->faviconConfig,
            'vite' => $this->viteAssets,
        ];


    }



    protected function loadFavicon(string $favicon='')
    {

        if(!empty($favicon))
        {
            $this->favicon = file_exists(public_path($favicon)) ? $favicon : 'favicon.ico';
        }else{
            $this->favicon = file_exists(public_path('favicon.ico')) ? 'favicon.ico' : 'error.gif';
        }
        $faviconExt = match (Str::lower(Str::afterLast($this->favicon, '.'))) {
            "ico" => 'x-icon',
            "gif" => 'gif',
            default => 'png',
        };

        $this->faviconConfig = [
            'name' => $this->favicon,
            'ext' => $faviconExt,
        ];
    }


    protected function loadLayoutConfig(array $config=[])
    {
        $this->analyzeGivenConfig($config);



        return $config;
    }



    /**
     * Get the view / contents that represents the component.
     *
     * @return View
     */
    public function render():View
    {
        return view('layout::layouts.app',$this->config);
    }


}
