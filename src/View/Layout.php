<?php

namespace Mintreu\LaravelLayout\View;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;
use Mintreu\LaravelLayout\Traits\hasLayoutConfiguration;
use Mintreu\LaravelLayout\Traits\layoutResolver;

class Layout extends Component
{
    use layoutResolver;

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
    )
    {
        $hasTitle = !is_null($title) ? $title : $label ?? null;
        $hasKeyword = !is_null($keyword) ? $keyword : $keywords ?? null;
        $hasDesc = !is_null($description) ? $description : $desc ?? null;
        $hasFavicon = !is_null($favicon) ? $favicon : $logo ?? null;

        $this->analyzeLayoutConfig($hasTitle,$hasKeyword,$hasDesc,$hasFavicon);
       $this->support['vite'] = true;
       $this->support['wire'] = true;
       $this->support['spa'] = true;
       $this->support = array_merge($this->support,$support);



    }








    /**
     * Get the view / contents that represents the component.
     *
     * @return View
     */
    public function render():View
    {
        return view('layout::layouts.app');
    }


}
