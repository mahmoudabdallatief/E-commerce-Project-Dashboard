@extends('layout')
@section('title','Category')
@section('content')
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-12 ">
<h2 class="text-start p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">Edit Your Category</h2>
 <form action="{{route('cats.update',$cats->id)}}" method="post"class="">
 @csrf
 @method("PUT")
<br>
<input type="text" name="name" placeholder="category" class="form-control @error('name') is-invalid @enderror" value="{{$cats->cat}}">
@error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
    <br>
            <input type="text" name="parent" placeholder="parent" class="form-control @error('parent') is-invalid @enderror" value="{{$cats->parent}}">
@error('parent')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    <br>
    <br>
    <button type="submit" class="btn  login">Edit</button>
 </form>
 </div>
</div>
</div>
@endsection