<?php

namespace Mintreu\LaravelLayout\Traits;

trait hasLayoutConfiguration
{

        protected function getAvailableKeys()
        {
            return [
                'title','favicon','keyword','description','manifest'
            ];
        }


        protected function analyzeGivenConfig($config)
        {
            //dd($config);

            if(!empty($config))
            {
                foreach ($config as $key => $value)
                {
                    if(in_array($key,$this->getAvailableKeys()))
                    {
                        $this->{$key} = $value;
                    }

                }


            }


        }


}
