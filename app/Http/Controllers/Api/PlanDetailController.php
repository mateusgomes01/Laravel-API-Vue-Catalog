<?php

namespace App\Http\Controllers\Api;

use App\PlanDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanDetailController extends Controller
{
    public function index()
    {
        return PlanDetail::all(); // returns all plandetails
    }
}