<?php

namespace App\Http\Controllers\Api;

use App\Plan;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        //return Plan::all(); // returns all plans
        return PlanResource::collection(Plan::all()); // returns only the desired fields
    }
}