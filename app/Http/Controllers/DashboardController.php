<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  //ecommerce
  public function dashboardEcommerce(){
    return view('pages.dashboard-ecommerce');
  }
  // analystic
  public function dashboardAnalytics(){
    return view('pages.dashboard-analytics');
  }
  public function index1(){
    return view('pages.index1');
  }
  public function dashboard(){
    return view('pages.dashboard');
  }
  public function customers() {
    return view('pages.customers');
  }
}
