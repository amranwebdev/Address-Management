<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Division;
use App\Model\District;
use App\Model\Upazila;
use App\Http\Requests\UpazilaRequest;

class UpazilaController extends Controller
{
    public function view(){
        $allData = Upazila::all();
        return view('backend.upazila.view-upazila', compact('allData'));
    }

    public function add(){
        $data['divisions'] = Division::all();
        return view('backend.upazila.add-upazila', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'division_id'=>'required',
            'district_id'=>'required',
    		'name'=>'required|unique:upazilas,name',
    	]);
    	$data = new Upazila();
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('upazilas.view')->with('success','Data inserted successfully');
        if($data){
            $notification=array(
                'message'=>'Upazila inserted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('upazilas.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Upazila Insert Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $data['divisions'] = Division::all();
        $data['editData'] = Upazila::find($id);
        return view('backend.upazila.add-district', $data);
    }

    public function update(UpazilaRequest $request, $id){
        
    	$data = Upazila::find($id);
    	$data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('upazilas.view')->with('success','Data Updated successfully');
        if($data){
            $notification=array(
                'message'=>'Upazila Updated successfully !',
                'alert-type'=>'success');
            return Redirect()->route('upazilas.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Upazila Updated Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($id){
        
    	$data = Upazila::find($id);
    	$data->delete();
    	//return redirect()->route('upazilas.view')->with('success','Data Deleted successfully');
        if($data){
            $notification=array(
                'message'=>'Upazila Deleted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('upazilas.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Upazila Deleted Fail !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }


}
