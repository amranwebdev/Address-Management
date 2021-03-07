<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\District;
use App\Model\Upazila;
use App\Model\Union;

class DefaultController extends Controller
{
    public function getDistrict(Request $request){
        $division_id = $request->division_id;
        // dd($division_id);
        $allDistrict = District::where('division_id',$division_id)->get();
         return response()->json($allDistrict);
    }

    public function getUpazila(Request $request){
        $district_id = $request->district_id;
        $allUpazila = Upazila::where('district_id',$district_id)->get();
         return response()->json($allUpazila);
    }

    public function getUnion(Request $request){
        $upazila_id = $request->upazila_id;
        $allUnion = Union::where('upazila_id',$upazila_id)->get();
         return response()->json($allUnion);
    }
}
