<?php

namespace Mintreu\LaravelLayout\Directives;

use Illuminate\Support\Facades\Blade;
use Mintreu\LaravelLayout\Commands\Traits\hasFilesManipulator;

class BladeDirective
{
    use hasFilesManipulator;


    /**
     * @return void
     */
    public function loadLayoutDirectives(): void
    {
        Blade::directive('asset', function (string $filename) {
            return file_exists(public_path($filename)) ? asset($filename) : asset(config('layout.asset.path').'/'.$filename);
        });

        Blade::directive('img', function (string $filename) {
            if(file_exists(public_path($filename)))
            {
                $path = asset($filename);
            }elseif (file_exists(public_path(config('layout.asset.path').'/'.$filename)))
            {
                $path = asset(config('layout.asset.path').'/'.$filename);
            }else{
                if (!file_exists(public_path('/error.gif')))
                {
                    $this->copyStubToApp('error',public_path('/error.gif'),[],'gif');
                }
                if(file_exists(public_path('error.gif')))
                {
                    $path = asset('error.gif');
                }elseif (file_exists(public_path(config('layout.asset.path').'/error.gif'))){
                    $path = asset(config('layout.asset.path').'/error.gif');
                }else{
                    $path='asset-url-environment-value-not-set-properly';
                }
            }
            return $path;
        });
    }



}
