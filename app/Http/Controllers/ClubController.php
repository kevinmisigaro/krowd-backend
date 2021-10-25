<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller
{
    public function index(){    
        $clubs = Club::get();
        return \response()->json($clubs, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'entrance_fee' => 'required',
            'alcohol_price' => 'required'
        ]);


        Club::create([
            'name' => $request->name,
            'entrance_fee' => $request->entrance_fee,
        ]);

        return response()->json('Club added', 201);
    }
}
