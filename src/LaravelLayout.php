<?php

namespace Mintreu\LaravelLayout;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\Component;
use Illuminate\View\View;
use Mintreu\LaravelLayout\Traits\hasLayoutSupport;
use Mintreu\LaravelLayout\Traits\layoutResolver;

abstract class LaravelLayout extends Component
{

    use layoutResolver,hasLayoutSupport;

    /**
     * @var string|null
     */
    protected ?string $view;
    /**
     * @var string|null
     */
    public ?string $title = null;
    /**
     * @var string|null
     */
    public ?string $keyword = null;
    /**
     * @var string|null
     */
    public ?string $description = null;
    /**
     * @var string|null
     */
    public ?string $favicon = null;
    /**
     * @var string|null
     */
    public ?string $favicon_type = null;
    /**
     * @var array|null
     */
    public ?array $support = [];


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
        // Callable Child Method
        $this->preConstruct();
        //Analyze Layout Support
        $hasSupport = $support ?? $config;
        $this->resolveSupport($hasSupport);
        // Analyze Layout Vars
        $hasTitle = !is_null($title) ? $title : $label ?? null;
        $hasTitle = !is_null($name) ? $name : $hasTitle;
        $hasTitle = $hasTitle ?? $this->title;
        $hasKeyword = !is_null($keyword) ? $keyword : $keywords ?? null;
        $hasKeyword = $hasKeyword ?? [];
        $hasDesc = !is_null($description) ? $description : $desc ?? null;
        $hasDesc = $hasDesc ?? $this->description;
        $hasFavicon = !is_null($favicon) ? $favicon : $logo ?? null;
        $hasFavicon = $hasFavicon ?? $this->favicon;
        // Layout Vars to Layout Config
        $this->analyzeLayoutConfig($hasTitle,$hasKeyword,$hasDesc,$hasFavicon);
        // Callable Child Method
        $this->postConstruct();
    }


     protected function preConstruct(){}
     protected function postConstruct(){}
     protected function preRender(){}


    /**
     * @return View
     */
    public function render():View
    {
        // Callable Child Method
        $this->preRender();
        return view($this->view);
    }

}
