<?php

namespace Mintreu\LaravelLayout;

use Illuminate\View\Component;
use Illuminate\View\View;

abstract class LaravelLayout  extends Component
{

    protected string $layout;
    protected string $view = 'theme';
    public string $title;
    public string $favicon='';
    public array $keyword=[];
    public string $description='';
    protected bool $preloader=true;
    public bool $manifest=true;
    public array $preloaderConfig=[];

    protected array $layoutConfig=[];


    abstract public function stylesheet(): array;

    abstract public function javascript(): array;


    public function __construct()
    {
        $this->loadCustomLayout();
        $this->title = empty($this->title) ? config('app.name') : $this->title;
        $this->layoutConfig = [
            'css' => $this->stylesheet(),
            'js' => $this->javascript(),
        ];
    }


    /**
     * @return void
     */
    public function loadCustomLayout()
    {
        $viewFile = $this->view.'.blade.php';
        if(file_exists(resource_path('views/layouts/'.$viewFile)))
        {
            $this->layout = 'layouts.' . $this->view;
        }elseif (file_exists(resource_path('views/components/'.$viewFile))){
            $this->layout = 'components.' . $this->view;
        }elseif(file_exists(dirname(__DIR__,1).'/resources/views/layouts/'.$viewFile)){
            $this->layout = 'layout::layouts.' . $this->view;
        }
    }


    /**
     * Get the view / contents that represents the component.
     *
     * @return View
     */
    public function render()
    {
        return view($this->layout, [
            'layout' => $this->layoutConfig,
        ]);
    }
}
