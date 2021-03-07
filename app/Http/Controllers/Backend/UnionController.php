<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Division;
use App\Model\District;
use App\Model\Upazila;
use App\Model\Union;
use App\Http\Requests\UnionRequest;

class UnionController extends Controller
{
    public function view(){
        $allData = Union::all();
        return view('backend.union.view-union', compact('allData'));
    }

    public function add(){
        $data['divisions'] = Division::all();
        return view('backend.union.add-union', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'division_id'=>'required',
            'district_id'=>'required',
            'upazila_id'=>'required',
    		'name'=>'required|unique:unions,name',
    	]);
    	$data = new Union();
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('upazilas.view')->with('success','Data inserted successfully');
        if($data){
            $notification=array(
                'message'=>'Union inserted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('unions.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Union Insert Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $data['divisions'] = Division::all();
        $data['editData'] = Union::find($id);
        return view('backend.union.add-union', $data);
    }

    public function update(UnionRequest $request, $id){
        
    	$data = Union::find($id);
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->upazila_id = $request->upazila_id;
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('upazilas.view')->with('success','Data Updated successfully');
        if($data){
            $notification=array(
                'message'=>'Union Updated successfully !',
                'alert-type'=>'success');
            return Redirect()->route('unions.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Union Updated Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($id){
        
    	$data = Union::find($id);
    	$data->delete();
    	//return redirect()->route('upazilas.view')->with('success','Data Deleted successfully');
        if($data){
            $notification=array(
                'message'=>'Union Deleted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('unions.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Union Deleted Fail !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }
}
