<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Division;
use App\Model\District;
use App\Model\Upazila;
use App\Model\Union;
use App\Model\Village;
use App\Http\Requests\VillageRequest;

class VillageController extends Controller
{
    public function view(){
        $allData = Village::all();
        return view('backend.village.view-village', compact('allData'));
    }

    public function add(){
        $data['divisions'] = Division::all();
        return view('backend.village.add-village', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'division_id'=>'required',
            'district_id'=>'required',
            'upazila_id'=>'required',
            'union_id'=>'required',
    		'name'=>'required|unique:villages,name',
    	]);
    	$data = new Village();
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
        $data->union_id = $request->union_id;
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('upazilas.view')->with('success','Data inserted successfully');
        if($data){
            $notification=array(
                'message'=>'Village inserted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('villages.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Village Insert Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $data['divisions'] = Division::all();
        $data['editData'] = Village::find($id);
        return view('backend.village.add-village', $data);
    }

    public function update(VillageRequest $request, $id){
        
    	$data = Village::find($id);
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
        $data->union_id = $request->union_id;
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('upazilas.view')->with('success','Data Updated successfully');
        if($data){
            $notification=array(
                'message'=>'Village Updated successfully !',
                'alert-type'=>'success');
            return Redirect()->route('villages.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Village Updated Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($id){
        
    	$data = Village::find($id);
    	$data->delete();
    	//return redirect()->route('upazilas.view')->with('success','Data Deleted successfully');
        if($data){
            $notification=array(
                'message'=>'Village Deleted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('villages.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Village Deleted Fail !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }
}
