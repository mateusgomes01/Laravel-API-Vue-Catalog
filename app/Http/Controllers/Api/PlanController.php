<?php

namespace App\Http\Controllers\Api;

use App\Plan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return Plan::all(); // returns all plans
        //return CategoryResource::collection(Category::all());
    }
}