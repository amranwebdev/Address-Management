<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Division;
use App\Http\Requests\DivisionRequest;

class DivisionController extends Controller
{
    public function view(){
        $allData = Division::all();
        return view('backend.division.view-division', compact('allData'));
    }

    public function add(){
        return view('backend.division.add-division');
    }

    public function store(Request $request){
        $this->validate($request,[
    		'name'=>'required|unique:divisions,name',
    	]);
    	$data = new Division();
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('divisions.view')->with('success','Data inserted successfully');
        if($data){
            $notification=array(
                'message'=>'Division inserted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('divisions.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Division Insert Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $data['editData'] = Division::find($id);
        return view('backend.division.add-division', $data);
    }

    public function update(DivisionRequest $request, $id){
        
    	$data = Division::find($id);
    	$data->name = $request->name;
    	$data->save();
    	//return redirect()->route('divisions.view')->with('success','Data Updated successfully');
        if($data){
            $notification=array(
                'message'=>'Division Updated successfully !',
                'alert-type'=>'success');
            return Redirect()->route('divisions.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Division Updated Failed !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($id){
         
    	$data = Division::find($id);
    	$data->delete();
    	//return redirect()->route('divisions.view')->with('success','Data Deleted successfully');
        if($data){
            $notification=array(
                'message'=>'Division Deleted successfully !',
                'alert-type'=>'success');
            return Redirect()->route('divisions.view')->with($notification);
        }else{
            $notification=array(
            'message'=>'Division Deleted Fail !',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        }
    }
}
