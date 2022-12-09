<?php

namespace Mintreu\LaravelLayout\Traits;

trait hasLayoutSupport
{


    public function resolveSupport(?array $support)
    {

        foreach ($support as $key => $value)
        {
            if(in_array($key,$this->getAvailableSupportKeys()))
            {
                $this->{$key} = $value;
            }
        }


        $this->support['vite']= [
            'status' => config('layout.support.vite.status',true),
            'hasCss' => config('layout.support.vite.hasCss',false),
            'vendorBuild' => config('layout.support.vite.vendorBuild',null)
        ];

        if(!is_null($this->support['vite']['vendorBuild']))
        {
            $this->support['vite_hasVendorBuild'] = ['resources/js/app.js',$this->support['vite']['vendorBuild']];
        }


        $this->support['wire'] = config('layout.support.wire',true);
        $this->support['spa'] = config('layout.support.spa',true);
        $this->support['direction'] =config('layout.support.direction','ltr');
        $this->support = array_merge($this->support,$support);

    }



    protected function getAvailableSupportKeys()
    {
        return [
            'title','name','label',
            'keywords','keyword',
            'description','desc',
            'favicon','logo',

        ];
    }


}
