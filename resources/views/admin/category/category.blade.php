@extends('layouts.admin_layouts.admin_layout')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="">Category
                <a href="{{route('addeditcategory')}}" class="btn btn-success float-right text-white"><i class="fas fa-plus"></i> Add Category</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="section" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Operatrion</th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $categories)
                    <tr>
                        <td>{{$categories->id}}</td>
                        <td>{{$categories->category_name}}</td>
                        <td>
                            @if($categories->status==1)
                                Active
                            @else
                                Not Active
                            @endif
                        </td>
                        <td>
                            @if($categories->status==1)
                            {{Form::open(['method'=>'post','action'=>['CategoryController@updatecategory',$categories]])}}
                                {{Form::hidden('status',0)}} 
                                {{Form::submit('Deactivate',['class'=>'btn btn-danger'])}}
                            {{Form::close()}}
                            @elseif($categories->status==0)
                            {{Form::open(['method'=>'post','action'=>['CategoryController@updatecategory',$categories]])}}
                                {{Form::hidden('status',1)}} 
                                {{Form::submit('Activate',['class'=>'btn btn-success'])}}
                            {{Form::close()}}
                            @endif
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <!--table footer will be here-->
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 </div> 



<!-- page script -->
<!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->

@endsection