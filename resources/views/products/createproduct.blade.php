@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper d-flex justify-content-center">
    <div class="col-md-6">
        <section class="content">

            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create Products</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('products.store')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Barcode</label>
                      <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter Product Barcode">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Product Price">
                      </div>
                    <!--<div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>-->
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                  </div>
                  <!-- /.card-body -->
    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </section>
    </div>
    
  </div>
@endsection
  

