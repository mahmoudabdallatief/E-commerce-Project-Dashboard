@extends('layout')
@section('title','Brands')


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
@if(session('error'))
    <input type="hidden" class = "hidden" value="4">
@endif

<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-12 ">
    <h2 class="text-start p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">All Brands</h2>
    @if(session('log')!=3)
    <div class="text-start ">
    <a href="{{route('brands.create')}}">
    <button class="login   mt-2 btn">Add-New Brand</button>
</a>
    </div>
    @endif
    <br>
<table class=" tab table  mt-3 "  style="width:100%" id="example">
        <thead>
            <tr>
        <th>id</th>
        <th>brand</th>
        
        @if(session('log')!=3)
        <th>controls</th>
       @endif
       </tr>
        </thead>
        <tbody align='left'>
        @php
    $id = 1;
    
@endphp
            @foreach($brands as $brand)
            <tr>
        <td>{{$id++}}</td>
        <td> {{ $brand->brand }}</td>        
       @if(session('log')!=3)
   <td> <a href="{{ route('brands.edit', $brand->id)}}" class="text-decoration-none text-light"> <button type="button" class="btn btn-success"><i class="fa-regular fa-keyboard"></i></button></a>
    <button type="button" class="btn btn-danger my-0" data-bs-toggle="modal" data-bs-target="#examplemodel{{ $brand->id }}">
    <i class="fa-solid fa-trash"></i>
      </button>
    </td>
    @endif
    </tr>
         <div class="modal fade" id='examplemodel{{$brand->id }}' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Are Yoy Sure You Want To Delete?</h5>
            </div>
            <div class="modal-body">
                <p class="text-start">
                {{ $brand->brand }}
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form action="{{ route('brands.destroy', $brand->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"class="btn btn-danger">DELETE</button>
</form>
            </div>
          </div>
        </div>
        
      </div>
        
   @endforeach
     </tbody>
   </table>
<br>
<br>
    
  </div>
</div>
</div>


@endsection