@extends('backend.inc.master')
@section('content')
 
<section class="content-header">
  <h1>Manage District</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">District</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="card-header">
            <h3>
              @if(isset($editData))
              Edit District 
              @else
              Add District 
              @endif                  
              <a class="btn btn-success float-right btn-sm" href="{{route('districts.view')}}"><i class="fa fa-list"></i> District List</a>
            </h3>
          </div>
          <div class="card-body">
            <form action="{{(@$editData)?route('districts.update',$editData->id):route('districts.store')}}" method="post" id="myForm">
              @csrf
              <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label>Division Name </label>
                    <select name="division_id" class="form-control" id="division_id">
                        <option value="" disabled selected>Select Division</option>
                        @foreach ($divisions as $division)
                            <option value="{{$division->id}}" {{(@$editData->division_id==$division->id)?"selected":""}}>{{$division->name}}</option>
                        @endforeach

                    </select>
                    <font style="color:red">
                      {{($errors->has('division_id'))?($errors->first('division_id')):''}}
                    </font>
                </div> 

                <div class="form-group col-md-6">
                  <label>District Name</label>
                  <input type="text" name="name" value="{{@$editData->name}}" class="form-control">
                  <font style="color:red">
                    {{($errors->has('name'))?($errors->first('name')):''}}
                  </font>
                </div>                    
                
                <div class="form-group col-md-12" style="padding-top: 30px;">                                         
                  <button type="submit" class="btn btn-primary">{{(@$editData)?'Update':'Submit'}}</button>
                </div>                    
              </div>
            </form>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section>            

<script type="text/javascript">
$(document).ready(function () {
  
  $('#myForm').validate({
    rules: {
        division_id: {
        required: true,        
      },
      name: {
        required: true,        
      },
            
    },
    messages: {
        division_id: {
        required: "The Division field is required",        
      },
      name: {
        required: "The District field is required",        
      },
      
    },
    
  });
});
</script>

@endsection