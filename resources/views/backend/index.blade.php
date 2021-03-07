@extends('backend.inc.master')

@section('content')

<section class="content-header">
  <h1>Dashboard</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        @php
          $division=DB::Table('divisions')->count('id');
        @endphp
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Division</span>
            <span class="info-box-number">{{$division}}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        @php
          $district=DB::Table('districts')->count('id');
        @endphp
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-university"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total District</span>
            <span class="info-box-number">{{$district}}</span>
          </div>
        </div>
      </div>

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        @php
          $upazila=DB::Table('upazilas')->count('id');
        @endphp
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Upazila</span>
            <span class="info-box-number">{{$upazila}}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        @php
          $union=DB::Table('unions')->count('id');
        @endphp
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-area-chart"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Union</span>
            <span class="info-box-number">{{$union}}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        @php
          $village=DB::Table('villages')->count('id');
        @endphp
        <div class="info-box">
          <span class="info-box-icon bg-secondary"><i class="fa fa-map-marker"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Village</span>
            <span class="info-box-number">{{$village}}</span>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection