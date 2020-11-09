@extends('layouts.admin_layouts.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Details</h3>
              </div>
              <!--check current password session -->
              <!-- @if(session('error'))
              
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
              
              @endif -->
              <!--change password success message-->
              @if(session('message'))
              
              <div class="alert alert-success" role="alert">
                  {{session('message')}}
              </div>
            
            @endif
              <!-- form start -->
              <form role="form" action="{{route('updateadmindetails')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{Auth::guard('admin')->user()->name}}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" required="" class="form-control" id="email" value="{{Auth::guard('admin')->user()->email}}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Name</label>
                    <input type="text"  class="form-control" id="name" name="name" value="{{Auth::guard('admin')->user()->name}}">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Mobile Number</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" value="{{Auth::guard('admin')->user()->mobile}}" placeholder="Enter Mobile Number">
                    <span class="text-danger">{{$errors->first('mobile')}}</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <span class="text-danger">{{$errors->first('image')}}</span>

                  </div>
                  <a target="blank" href="{{url('/storage/images/admin_images/'.Auth::guard('admin')->user()->image)}}">View Image</a>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Now</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @endsection