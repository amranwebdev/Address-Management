@extends('backend.inc.master')
@section('content')
 
<section class="content-header">
  <h1>Manage Division</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Division</li>
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
              Edit Division 
              @else
              Add Division 
              @endif                  

              <a class="btn btn-success float-right btn-sm" href="{{route('divisions.view')}}"><i class="fa fa-list"></i> Division List</a>
            </h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <form action="{{(@$editData)?route('divisions.update',$editData->id):route('divisions.store')}}" method="post" id="myForm">
              @csrf
              <div class="form-row">                    
                <div class="form-group col-md-6">
                  <label>Division </label>
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
$(document).ready(function (){
  $('#myForm').validate({
    rules: {
      name: {
        required: true,        
      },
    },
    messages: {
      name: {
        required: "The Division field is required",        
      },
    },
  });
});
</script>

@endsection