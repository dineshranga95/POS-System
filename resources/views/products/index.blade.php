@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
    @include('partials.alert.success')    
    @include('partials.alert.error')
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
    <section class="css">
        <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}} ">
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
                <th>Status</th>
                <th>Price</th>
                <th>Quantity</th>
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
                <td>
                    <span class="right badge badge-{{$productlist->status ? 'success':'danger'}}">{{$productlist->status ? 'Active':'Inactive'}}</span>
                </td>
                <td>{{$productlist->price}}</td>
                <td>{{$productlist->quantity}}</td>
                <td>{{$productlist->created_at}}</td>
                <td>{{$productlist->updated_at}}</td>
                <td>
                    <a href="{{route('editproduct',$productlist)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="{{route('products.show',$productlist)}}" class="btn btn-info"><i class="fas fa-eye-slash"></i></a>
                    <button class="btn btn-danger btn-delete" data-url="{{route('products.destroy',$productlist->id)}}"><i class="fas fa-trash"></i></button>
                   
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
<section class="js">
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){            
            $(document).on('click','.btn-delete',function(){
                
                $this=$(this);
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete this product? ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'),{_method: 'DELETE',_token: '{{csrf_token()}}'}, function(res){
                            $this.closest('tr').fadeOut(500, function(){
                                $(this).remove();
                            })
                        })
                    } 
            })
        })
    })
    </script>
</section>
