@extends('backend.inc.master')

@section('content')

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Division Inserted</span>
            <span class="info-box-number">90<small>%</small></span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total District Inserted</span>
            <span class="info-box-number">41,410</span>
          </div>
        </div>
      </div>

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Upazila Inserted</span>
            <span class="info-box-number">760</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Union Inserted</span>
            <span class="info-box-number">2,000</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-secondary"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Village Inserted</span>
            <span class="info-box-number">2,000</span>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection