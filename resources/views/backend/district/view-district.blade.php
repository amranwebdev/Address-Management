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
          <div class="content mt-3">
            <div class="animated fadeIn">
              <div class="row">  
                <div class="content mt-3">
                    <div class="animated fadeIn">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>District List
                                            <a class="btn btn-success float-right btn-sm" href="{{route('districts.add')}}"><i class="fa fa-plus-circle"></i> Add District</a>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                  <th>SL.</th>
                                                  <th>Division Name</th>
                                                  <th>District Name</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($allData as $key => $value)
                                                <tr>
                                                  <td>{{$key+1}}</td>
                                                  <td>{{$value['division']['name']}}</td>
                                                  <td>{{$value->name}}</td>
                                                  <td>
                                                      <a title="edit" class="btn btn-primary btn-sm" href="{{route('districts.edit',$value->id)}}"><i class="fa fa-edit"> Edit</i></a>
                                                      <a title="delete" id="delete" class="btn btn-danger btn-sm" href="{{route('districts.delete',$value->id)}}" ><i class="fa fa-trash"> Delete</i></a>
                                                  </td>                      
                                                </tr>
                                                @endforeach
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div><!-- .animated -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection