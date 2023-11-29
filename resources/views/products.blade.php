@extends('layout')
@section('title','Products')


@section('content')
@if(session('success'))
    <input type="hidden" class = "hidden" value="3">
@endif
@if(session('success-edit'))
    <input type="hidden" class = "hidden" value="1">
@endif
@if(session('success-delete'))
    <input type="hidden" class = "hidden" value="2">
@endif
<div class="container">
  <div class="row">
    <div class="col-12 ">
    
<br>
<br>
    <h2 class="text-start p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">All Products</h2>
    @if(session('log')!=3)
<div class="text-start ">
<a href="{{route('products.create')}}">
<button class="login   mt-2 btn">Add-New Product</button>
</a>
</div>
@endif
<br>

    <table class=" tab table mt-3"  style="width:100%;" id="example" >
        <thead>
            <tr>
        <th>id</th>
        <th>name</th>
        <th>price</th>
        <th>offer</th>
        <th>count</th>
        <th>brand</th>
        <th>category</th>
        <th>description</th>
        <th>date</th>
        <th>cover</th>
        
    
  @if (session('log') != 3)
    
    <th>Controls</th>
    
@endif

       
</tr>
<tbody>
@php
    $id = 1;
    
@endphp

    @foreach ($products as $product)
    <tr>
    <td>{{$id++}}</td>
        <td>{{ $product->name }}</td>
        <td> {{ $product->price }}</td>
        <td> {{ $product->offer }}</td>
        <td> {{ $product->count }}</td>
        
        <td>
        {{ $product->Brand->brand }}
        </td>
 
     <td>{{ $product->category->cat }}</td>
     <td> {{ strip_tags($product->des) }}</td>
        <td>
        @if ($product->date == '1972-06-10 02:24:00')
    {{ '0000-00-00 00:00:00' }}
@else
    {{ $product->date }}
@endif</td>
    
        <td>
        @foreach (explode(',', $product->cover) as $image)
            <img src="{{ asset('images/' . $image) }}" alt="Product Image" width='50'height='50' class='rounded-circle'>
        @endforeach
        </td>
        
    @if (session('log') != 3)
   
    <td>
        <a href="{{route('products.edit',$product->id)}}"class="text-decoration-none text-light"><button type="button" class="btn btn-success"><i class="fa-regular fa-keyboard"></i></button></a>
        <button type="button" class="btn btn-danger my-0" data-bs-toggle="modal" data-bs-target="#examplemodel{{$product->id}}">
    <i class="fa-solid fa-trash"></i>
      </button>
       </td>
   
@endif

       
       <div class="modal fade" id='examplemodel{{$product->id}}' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title " id="exampleModalLabel">Are Yoy Sure You Want To Delete?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-start">
                {{$product->name}}
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form action="{{ route('products.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"class="btn btn-danger">DELETE</button>
</form>
            </div>
          </div>
        </div>
        
      </div>
    </tr>

@endforeach
</tbody>
</table>
  </div>
</div>
</div>


@endsection