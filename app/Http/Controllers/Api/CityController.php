<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $query = City::with('state');

        if ($request->has('state_id')) {
            $query->where('state_id', $request->state_id);
        }

        return response()->json($query->get());
    }
}
