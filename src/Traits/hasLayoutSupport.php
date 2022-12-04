<?php

namespace Mintreu\LaravelLayout\Traits;

trait hasLayoutSupport
{


    public function resolveSupport(?array $support)
    {

        foreach ($support as $key => $value)
        {
            $this->{$key} = $value;
        }


        $this->support['vite'] = true;
        $this->support['wire'] = true;
        $this->support['spa'] = true;
        $this->support = array_merge($this->support,$support);

    }



}
