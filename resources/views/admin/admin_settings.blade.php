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
                <h3 class="card-title">Change Password</h3>
              </div>
              <!--check current password session -->
              @if(session('error'))
              
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
              
              @endif
              <!--change password success message-->
              @if(session('message'))
              
              <div class="alert alert-success" role="alert">
                  {{session('message')}}
              </div>
            
            @endif
            <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->
              <!-- form start -->
              <form role="form" action="{{route('changepassword')}}" method="post">
                  @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$admindata->name}}" readonly="">
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email"  class="form-control" id="exampleInputEmail1" value="{{$admindata->email}}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Current Password</label>
                    <input type="password" class="form-control" name="current_pwd" id="current_pwd" placeholder="Current Password">
                    <span class="text-danger">{{$errors->first('current_pwd')}}</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> New Password</label>
                    <input type="password" class="form-control" name="new_pwd" id="new_pwd" placeholder="New Password">
                    <span class="text-danger">{{$errors->first('new_pwd')}}</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Confirm New Password</label>
                    <input type="password"  class="form-control" name="confirm_new_pwd" id="confirm_new_pwd" placeholder="Confirm New Password">
                    <span class="text-danger">{{$errors->first('confirm_new_pwd')}}</span>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Change Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @endsection