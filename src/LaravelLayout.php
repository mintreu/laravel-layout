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


    /**
     * @param string|null $title
     * @param string|null $name
     * @param string|null $label
     * @param array|null $keyword
     * @param array|null $keywords
     * @param string|null $description
     * @param string|null $desc
     * @param string|null $favicon
     * @param string|null $logo
     * @param array|null $support
     * @param array|null $config
     */
    public function __construct(
        ?string $title=null,
        ?string $name=null,
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
        $this->preConstruct();

        $hasSupport = $support ?? $config;
        $this->resolveSupport($hasSupport);

        $hasTitle = !is_null($title) ? $title : $label ?? null;
        $hasTitle = !is_null($name) ? $name : $hasTitle;
        $hasTitle = $hasTitle ?? $this->title;

        $hasKeyword = !is_null($keyword) ? $keyword : $keywords ?? null;
        $hasKeyword = $hasKeyword ?? $this->keyword;
        $hasDesc = !is_null($description) ? $description : $desc ?? null;
        $hasDesc = $hasDesc ?? $this->description;
        $hasFavicon = !is_null($favicon) ? $favicon : $logo ?? null;
        $hasFavicon = $hasFavicon ?? $this->favicon;

        $this->analyzeLayoutConfig($hasTitle,$hasKeyword,$hasDesc,$hasFavicon);
        $this->afterConstruct();
    }


    abstract public function preConstruct();
    abstract public function afterConstruct();
    abstract public function preRender();


    /**
     * @return Closure|Htmlable|ViewContract|string
     */
    public function render():View
    {
        $this->preRender();
        return view($this->view);
    }

}
