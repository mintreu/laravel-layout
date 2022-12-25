<?php


return [

    /*
        |--------------------------------------------------------------------------
        | Layout Configuration [MINTREU]
        |--------------------------------------------------------------------------
        |
        | This value is the name of your application layout configuration. This value is used when the
        | framework needs to place the application's layout,assets,themes in a notification or
        | any other location as required by the application or its packages.
        |
        */

   'support' => [
       'vite' => [
           'status' => true,       // enable or disable vite directive
           'hasCss' => false,       // if true load app.css separately or false load via app.js
           'onlyVendor' => false,
           'vendorBuild' => null   // set custom build path 'vendor/package/build'
       ],

       'mix' => [
           'status' => false,       // enable or disable vite directive
           'hasCss' => false,       // if true load app.css separately or false load via app.js
           'onlyVendor' => false,
           'vendorBuild' => [   // set custom build path 'vendor/package/assets/css|js'
               'css' => [],
               'js' => [],
           ]
       ],

       'wire' => true,         // livewire status
       'spa'   => true,        // load turbolinks
       'direction' => 'ltr',    // 'ltr'/'rtr',
       'alpine' => false,
   ],





];
