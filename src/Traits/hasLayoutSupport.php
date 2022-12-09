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
            'status' => true,
            'hasCss' => false,
            'vendorBuild' => null
        ];

        if(!is_null($this->support['vite']['vendorBuild']))
        {
            $this->support['vite_hasVendorBuild'] = ['resources/js/app.js',$this->support['vite']['vendorBuild']];
        }


        $this->support['wire'] = true;
        $this->support['spa'] = true;
        $this->support['direction'] ='ltr';
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
