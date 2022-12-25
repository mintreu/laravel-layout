<?php

namespace Mintreu\LaravelLayout\Traits;

use Illuminate\Support\Str;

trait layoutResolver
{


    /**
     * @param string|null $title
     * @param array $keywords
     * @param string|null $description
     * @param string|null $favicon
     * @return void
     */
    protected function analyzeLayoutConfig(string $title=null,array $keywords=[],string $description=null,string $favicon=null): void
    {
        if(!is_null($title))
        {
            $this->title = $title;
        }

        if(is_null($this->title) && isset($this->label))
        {
            $this->title = $this->label;
        }

        if(is_null($this->title) && isset($this->name))
        {
            $this->title = $this->name;
        }

        if(is_array($keywords) && !empty($keywords))
        {
            $this->keyword = implode(',',$keywords);
        }

        if(!empty($this->keyword))
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
