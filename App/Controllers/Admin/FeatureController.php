<?php
namespace App\Controllers\Admin;

use App\Models\Feature;

class FeatureController
{
  public function index()
  {
    $feature = new Feature();
    $features = $feature->getAllFeatures();
    return view('admin.feature.index', ['features' => $features]);
  }
}