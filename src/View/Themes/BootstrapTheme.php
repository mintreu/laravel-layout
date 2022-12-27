<?php

namespace Mintreu\LaravelLayout\View\Themes;


use Mintreu\LaravelLayout\LaravelLayout;

class BootstrapTheme extends LaravelLayout
{

    protected ?string $view = 'layout::layouts.themes.bootstrap';
    /**
     * latest bootstrap version used as default
     * @var string|null
     */

    public const LATEST_VERSION = '5.1';
    public const AVAILABLE_VERSIONS =  ['5.1','5','5.0','4.6'];




}
