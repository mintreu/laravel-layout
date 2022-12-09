<?php


return [

    /*
        |--------------------------------------------------------------------------
        | Assets Configuration
        |--------------------------------------------------------------------------
        |
        | This value is the name of your application assets. This value is used when the
        | framework needs to place the application's assets in a notification or
        | any other location as required by the application or its packages.
        |
        */

   'support' => [
       'vite' => [
           'status' => true,       // enable or disable vite directive
           'hasCss' => false,       // if true load app.css separately or false load via app.js
           'vendorBuild' => null   // set custom build path 'vendor/package/build'
       ],

       'wire' => true,         // livewire status
       'spa'   => true,        // load turbolinks
       'direction' => 'ltr'    // 'ltr'/'rtr'
   ],





];
