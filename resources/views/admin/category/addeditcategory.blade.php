@extends('layouts.admin_layouts.admin_layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        
            @if($errors->any())
            <div class="alert alert-danger ">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>  
            @endif

        
        <form name="categoryform" id="categoryform" action="{{route('addeditcategory')}}" method="post" enctype="multipart/form-data" >
        @csrf
            <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                    <label>Select Category Level</label>
                    <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                        <option value="1">Volvo</option>
                        <option value="2">Saab</option>
                        <option value="3">Mercedes</option>
                        <option value="4">Audi</option>
                    </select>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                <div class="form-group">
                <label>Select Section</label>
                    <select name="section_id" id="section_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Select</option>
                        @foreach($allsections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                    <label for="categoryimage">Category Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="categoryimage" id="categoryimage">
                            <label for="categoryimage" class="custom-file-label">Select Category Image</label>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="category_discount">Category Discount</label>
                        <input type="text" class="form-control" name="category_discount" id="category_discount" placeholder="Category Discount">
                    </div>
                    <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Category Description"></textarea>                </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="url">Category URL</label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Enter Category URL">
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea class="form-control" name="meta_title" id="meta_title" rows="3" placeholder="Enter Meta Title"></textarea>                </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="3" placeholder="Enter Meta Description"></textarea>                
                        </div>
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label for="meta_keyword">Meta Keywords</label>
                            <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="3" placeholder="Enter Meta Keyword"></textarea>                </div>
                        </div>
                    </div>
                </div>              
                </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection