@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('public/backend/images/Amran.png')}}" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." />
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="">
          <a href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{($prefix=='/divisions')?'dropdown':''}}">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>Division</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('divisions.view')}}" class="{{($route=='divisions.view')?'active treeview':''}}"><i class="fa fa-circle-o"></i> View Division</a></li>
          </ul>
        </li>
        <li class="treeview {{($prefix=='/districts')?'dropdown':''}}">
          <a href="#">
            <i class="fa fa-university"></i>
            <span>District</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('districts.view')}}" class="{{($route=='districts.view')?'active treeview':''}}"><i class="fa fa-circle-o"></i> View District</a></li>
          </ul>
        </li>
        <li class="treeview {{($prefix=='/upazilas')?'dropdown':''}}">
          <a href="#">
            <i class="fa fa-building"></i>
            <span>Upazila</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('upazilas.view')}}" class="{{($route=='upazilas.view')?'active treeview':''}}"><i class="fa fa-circle-o"></i> View Upazila</a></li>
          </ul>
        </li>
        <li class="treeview {{($prefix=='/unions')?'dropdown':''}}">
          <a href="#">
            <i class="fa fa-area-chart"></i>
            <span>Union</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('unions.view')}}" class="{{($route=='unions.view')?'active treeview':''}}"><i class="fa fa-circle-o"></i> View Union</a></li>
          </ul>
        </li>

        <li class="treeview {{($prefix=='/villages')?'dropdown':''}}">
          <a href="#">
            <i class="fa fa-map-marker"></i>
            <span>Village</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('villages.view')}}" class="{{($route=='villages.view')?'active treeview':''}}"><i class="fa fa-circle-o"></i> View Village</a></li>
          </ul>
        </li>

        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>