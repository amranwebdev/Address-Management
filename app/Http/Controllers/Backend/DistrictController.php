<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Division;
use App\Model\District;
use App\Http\Requests\DistrictRequest;

class DistrictController extends Controller
{
    public function view(){
        $allData = District::all();
        return view('backend.district.view-district', compact('allData'));
    }

    public function add(){
        $data['divisions'] = Division::all();
        return view('backend.district.add-district', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'division_id'=>'required',
    		'name'=>'required|unique:districts,name',
    	]);
    	$data = new District();
        $data->division_id = $request->division_id;
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('districts.view')->with('success','Data inserted successfully');
        if($data){
            $notification=array(
                'message'=>'District inserted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('districts.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'District Insert Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $data['divisions'] = Division::all();
        $data['editData'] = District::find($id);
        return view('backend.district.add-district', $data);
    }

    public function update(DistrictRequest $request, $id){
        
    	$data = District::find($id);
    	$data->division_id = $request->division_id;
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('districts.view')->with('success','Data Updated successfully');
        if($data){
            $notification=array(
                'message'=>'District Updated successfully !',
                'alert-type'=>'success');
            return Redirect()->route('districts.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'District Updated Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($id){
        
    	$data = District::find($id);
    	$data->delete();
    	//return redirect()->route('districts.view')->with('success','Data Deleted successfully');
        if($data){
            $notification=array(
                'message'=>'District Deleted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('districts.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'District Deleted Fail !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }
}
