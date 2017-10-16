<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class DashboardController extends Controller
{
	public function getDashboard(){
		return View::make('dashboard2/new_dashboard');	
	}

	public function getLegal(){
		return View::make('dashboard2/legal');
	}
}
