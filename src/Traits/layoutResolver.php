<?php

namespace Mintreu\LaravelLayout\Traits;

use Illuminate\Support\Str;

trait layoutResolver
{









    protected function analyzeLayoutConfig(
        string $title=null,
        array $keyword=null,
        string $description=null,
        string $favicon=null
    )
    {
        if(!is_null($title))
        {
            $this->title = $title;
        }

        if(!is_null($keyword))
        {
            $this->keyword = implode(',',$keyword);
        }

        if(!empty($this->keyword) && is_array($this->keyword))
        {
            $this->keyword = implode(',',$this->keyword);
        }

        if(!is_null($description))
        {
            $this->description = $description;
        }

        if(!is_null($favicon))
        {
            $this->favicon = $favicon;
            $this->favicon_type = Str::afterlast(Str::afterLast($favicon,'/'),'.');
            $this->favicon_type = ($this->favicon_type == 'ico') ? 'x-icon' : $this->favicon_type;
        }




    }






}
