<?php

namespace App\Http\Controllers;

use App\Services\Home\Widget\WidgetService;

class HomeController extends Controller
{

    public function index(string $name)
    {
        return WidgetService::get($name);
    }
}
