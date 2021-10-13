@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
            <a href="{{route('products.create')}}" class="btn btn-success">Create Product</a>
          </div>
        </div>
      </div>
    </section>

    
    <section class="content">

    <div class="card">  
      <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Barcode</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $productlist)
            <tr>
                <td>{{$productlist->id}}</td>
                <td>{{$productlist->name}}</td>
                <td><img src="../images/{{$productlist->image}}" class="img-fluid" alt="" width="100" height="100"></td>
                <td>{{$productlist->barcode}}</td>
                <td>{{$productlist->price}}</td>
                <td>{{$productlist->created_at}}</td>
                <td>{{$productlist->updated_at}}</td>
                <td>
                    <a href="{{route('editproduct',$productlist)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="{{route('products.show',$productlist)}}" class="btn btn-info"><i class="fas fa-eye-slash"></i></a>
                    <a href="/admin/deleteproduct/{{$productlist->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{$list->render()}}
    </div>
    </section>
  </div>
@endsection
  

