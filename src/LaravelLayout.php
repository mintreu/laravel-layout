<?php

namespace Mintreu\LaravelLayout;

use Illuminate\View\Component;
use Illuminate\View\View;
use Mintreu\LaravelLayout\Traits\hasLayoutSupport;
use Mintreu\LaravelLayout\Traits\layoutResolver;

abstract class LaravelLayout extends Component
{

    use layoutResolver,hasLayoutSupport;

    protected ?string $view;

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
        ?array $config=[],
    )
    {
        $hasSupport = $support ?? $config;

        $this->resolveSupport($hasSupport);

        $hasTitle = !is_null($title) ? $title : $label ?? null;
        $hasTitle = $hasTitle ?? $this->title;

        $hasKeyword = !is_null($keyword) ? $keyword : $keywords ?? null;
        $hasKeyword = $hasKeyword ?? $this->keyword;
        $hasDesc = !is_null($description) ? $description : $desc ?? null;
        $hasDesc = $hasDesc ?? $this->description;
        $hasFavicon = !is_null($favicon) ? $favicon : $logo ?? null;
        $hasFavicon = $hasFavicon ?? $this->favicon;

        $this->analyzeLayoutConfig($hasTitle,$hasKeyword,$hasDesc,$hasFavicon);




    }

    /**
     * @return Closure|Htmlable|ViewContract|string
     */
    public function render():View
    {
        return view($this->view);
    }

}
