<?php

namespace Mintreu\LaravelLayout\Traits;

use Mintreu\LaravelLayout\View\Themes\TallTheme;

trait hasLayoutSupport
{

    /**
     * @param array|null $support
     * @return void
     */
    public function resolveSupport(?array $support): void
    {
        // Predefine Support Configs
        $this->support['vite']= [
            'status' => config('layout.support.vite.status',true),
            'hasCss' => config('layout.support.vite.hasCss',false),
            'vendor' => false,
            'onlyVendor' => false,
            'vendorBuild' => config('layout.support.vite.vendorBuild',null)
        ];

        $this->support['wire'] = config('layout.support.wire',true);
        $this->support['spa'] = config('layout.support.spa',true);
        $this->support['direction'] = config('layout.support.direction','ltr');
        if($this instanceof TallTheme)
        {
            $this->support['alpine'] = true;
        }else{
            $this->support['alpine'] = config('layout.support.alpine',false);
        }

        $this->support['htmlClass'] = null;
        $this->support['bodyClass'] = null;


        // Overwrite Support Configs
        foreach ($support as $key => $value)
        {
            // Set Base Config
            if(in_array($key,$this->getAvailableSupportKeys()))
            {
                $this->{$key} = $value;
            }

        }
        // Merge All Support Keys And Values Set Via Layout
        $this->support = array_merge($this->support,$support);
    }



    protected function getAvailableSupportKeys(): array
    {
        return ['title','name','label', 'keywords','keyword', 'description','desc', 'favicon','logo'];
    }


}
