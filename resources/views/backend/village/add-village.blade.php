@extends('backend.inc.master')
@section('content')
 
<section class="content-header">
  <h1>Manage Village</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Village</li>
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
                Edit Village 
                @else
                Add Village 
                @endif                  

                <a class="btn btn-success float-right btn-sm" href="{{route('villages.view')}}"><i class="fa fa-list"></i> Village List</a>
              </h3>
            </div>
            <div class="card-body">
              <form action="{{(@$editData)?route('villages.update',$editData->id):route('villages.store')}}" method="post" id="myForm">
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
                    <label>District Name </label>
                    <select name="district_id" class="form-control" id="district_id">
                        <option value="" disabled selected>Select District</option>
                    </select>
                    <font style="color:red">
                      {{($errors->has('district_id'))?($errors->first('district_id')):''}}
                    </font>
                  </div> 

                  <div class="form-group col-md-6">
                    <label>Upazila Name </label>
                    <select name="upazila_id" class="form-control" id="upazila_id">
                        <option value="" disabled selected>Select Upazila</option>
                    </select>
                    <font style="color:red">
                      {{($errors->has('upazila_id'))?($errors->first('upazila_id')):''}}
                    </font>
                  </div> 

                  <div class="form-group col-md-6">
                    <label>Union Name </label>
                    <select name="union_id" class="form-control" id="union_id">
                        <option value="" disabled selected>Select Union</option>
                    </select>
                    <font style="color:red">
                      {{($errors->has('union_id'))?($errors->first('union_id')):''}}
                    </font>
                  </div> 

                  <div class="form-group col-md-6">
                    <label>Village Name</label>
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
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function () {
  
  $('#myForm').validate({
    rules: {
        division_id: {
        required: true,        
        },
        district_id: {
        required: true,        
        },
        upazila_id: {
        required: true,        
        },
        union_id: {
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
        district_id: {
        required: "The District field is required",        
        },
        upazila_id: {
        required: "The Upazila field is required",        
        },
        union_id: {
        required: "The Union field is required",        
        },
        name: {
          required: "The Village field is required",        
        },
      
    },
    
  });
});
</script>

<script type="text/javascript">
  $(function(){
    $(document).on('change','#division_id', function(){
      var division_id = $(this).val();
      $.ajax({
        type:"GET",
        url:"{{route('default.get-district')}}",
        data:{division_id:division_id},
        success:function(data){
          var html = '<option value="">Select District</option>';
          $.each(data,function(key,v){
            html +='<option value="'+v.id+'">'+v.name+'</option>';
          });
          $('#district_id').html(html);
          var district_id = "{{@$editData->district_id}}";
          if(district_id != ''){
            $('#district_id').val(district_id).trigger('change');
          }
        }
      });
    });
  });
</script>

<script type="text/javascript">
    $(function(){
      $(document).on('change','#district_id', function(){
        var district_id = $(this).val();
        $.ajax({
          type:"GET",
          url:"{{route('default.get-upazila')}}",
          data:{district_id:district_id},
          success:function(data){
            var html = '<option value="">Select Upazila</option>';
            $.each(data,function(key,v){
              html +='<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#upazila_id').html(html);
            var upazila_id = "{{@$editData->upazila_id}}";
            if(upazila_id != ''){
              $('#upazila_id').val(upazila_id).trigger('change');
            }
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(function(){
      $(document).on('change','#upazila_id', function(){
        var upazila_id = $(this).val();
        $.ajax({
          type:"GET",
          url:"{{route('default.get-union')}}",
          data:{upazila_id:upazila_id},
          success:function(data){
            var html = '<option value="">Select Union</option>';
            $.each(data,function(key,v){
              html +='<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#union_id').html(html);
            var union_id = "{{@$editData->union_id}}";
            if(union_id != ''){
              $('#union_id').val(union_id);
            }
          }
        });
      });
    });
  </script>
<script type="text/javascript">
  $(function(){
    var division_id = "{{@$editData->division_id}}";
    if(division_id){
      $('#division_id').val(division_id).trigger('change');
    }
  });
</script>

@endsection