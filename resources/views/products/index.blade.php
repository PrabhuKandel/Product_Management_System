
  @extends('layouts.app')
  @section('main')
  <div class="container ">
    <div class="text-right">
      <a href="products/create" class="btn btn-dark mt-2 ">New Product</a>
    </div>
    @if($products->isEmpty())
    <div class="border text-primary  pt-2 text-center ">
    <p class="font-weight-bold display-5">Product not added </p>
    </div>
    @else
      <table class="table table-hover mt-2">
        <thead>
          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
           <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
          $startSN = ($products->currentPage() - 1) * $products->perPage() + 1;
          @endphp
         @foreach($products as $product )
          <tr>
            <td>{{ $startSN++}}</td>
            <td><a href="products/{{$product->id}}/show" class="text-dark"> {{$product->name }} </a></td>
            <td>{{$product->price}}</td>
            <td>
              <img src="products/{{ $product->image}}" class="rounded-circle" width="50" height="50">
             
            </td>
            <td>
              <a href="products/{{$product->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
              <form method="POST" action="products/{{$product->id}}/delete" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>

            </td>

          </tr>
          @endforeach 
        </tbody>


      </table>
      @endif

      {{ $products->links()}}
  </div>
  @endsection
