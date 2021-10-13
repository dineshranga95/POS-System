@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
    
    <section class="col-md-6">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update Product</h3>
        </div>
        <!-- /.card-header -->
        
        <!-- form start -->
        <form action="{{route('products.update',$product)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" id="name" name="name" placeholder="Enter Product Name"class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$product->name) }}" autocomplete="name" autofocus>
              
              @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <input type="text" id="description" name="description" placeholder="Enter Product Name"class="form-control @error('description') is-invalid @enderror" name="name" value="{{ old('description',$product->description) }}" autocomplete="description" autofocus>
              
              @error('description')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Barcode</label>
              <input type="text" id="barcode" name="barcode" placeholder="Enter Product Barcode" class="form-control @error('barcode') is-invalid @enderror" name="barcode" value="{{ old('barcode',$product->barcode) }}" autocomplete="barcode" autofocus>
              @error('barcode')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input type="text" id="price" name="price" placeholder="Enter Product Price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price',$product->price) }}"  autocomplete="price" autofocus>
                @error('price')
              <span class="invalid-feedback" role="alert" >
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select name="status" id="status"  class="form-control @error('status') is-invalid @enderror" name="status">
                  <option value="1" {{old('status',$product->status)===1 ? 'selected':""}}>Active</option>
                  <option value="0" {{old('status',$product->status)===0 ? 'selected':""}}>Inactive</option>
                </select>
                @error('status')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              </div>
            <div class="form-group">
              <label for="image">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" value="{{ old('image',$product->image) }}" id="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                
              </div>
              @error('image')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input @error('checkbox') is-invalid @enderror" id="exampleCheck1" name="checkbox">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
              @error('checkbox')
              <span class="invalid-feedback" role="alert">
                  <strong>Please, tick after checking details</strong>
              </span>
              @enderror
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection
  

