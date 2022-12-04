<?php

namespace Mintreu\LaravelLayout\View\Themes;

use Illuminate\Support\Str;
use Illuminate\View\View;
use Mintreu\LaravelLayout\Traits\layoutResolver;

class BootstrapTheme
{
    use layoutResolver;

    /**
     * latest bootstrap version used as default
     * @var string|null
     */
    public $version;
    protected const LATEST_VERSION = '5.1';
    protected const AVAILABLE_VERSIONS =  ['5.1','5','5.0','4.6'];
    public $title;
    public $keyword;
    public $description;
    public $favicon;
    public $favicon_type;
    public $support;

    public function __construct(
        ?string $title=null,
        ?string $label=null,
        ?array $keyword=null,
        ?array $keywords=null,
        ?string $description=null,
        ?string $desc=null,
        ?string $favicon=null,
        ?string $logo=null,
        ?array $support=[],
        ?string $version=null
    )
    {
        $this->version = self::LATEST_VERSION;
        if(in_array($version,self::AVAILABLE_VERSIONS))
        {
            $this->version = $version;
        }

        $hasTitle = !is_null($title) ? $title : $label ?? null;
        $hasKeyword = !is_null($keyword) ? $keyword : $keywords ?? null;
        $hasDesc = !is_null($description) ? $description : $desc ?? null;
        $hasFavicon = !is_null($favicon) ? $favicon : $logo ?? null;

        $this->analyzeLayoutConfig($hasTitle,$hasKeyword,$hasDesc,$hasFavicon);
        $this->support['vite'] = true;
        $this->support['wire'] = true;
        $this->support['spa'] = true;
        $this->support['alpine'] = false;
        $this->support = array_merge($this->support,$support);



    }




    /**
     * Get the view / contents that represents the component.
     *
     * @return View
     */
    public function render():View
    {
        return view('layout::layouts.themes.bootstrap');
    }

}
