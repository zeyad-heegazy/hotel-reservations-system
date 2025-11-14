<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController
{
   public function index(): View
   {
       return view("dashboard");
   }
}
