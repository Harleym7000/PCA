<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function run() 
    {
        $cache = Artisan::call('cache:clear');
        //dd($cache);

        if($cache) {
            return 'yes';
        }
        else {
            dd('error');
        }
}

public function check() {
    dd('Hello world');
}
}
