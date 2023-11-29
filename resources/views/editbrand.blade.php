
 @extends('layout')
@section('title','Brands')
@section('content')
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-12 ">
<h2 class="text-start p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">Edit Your Brand</h2>
 <form action="{{route('brands.update',$brands->id)}}" method="post"class="">
 @csrf
 @method("PUT")
<br>
<input type="text" name="name" placeholder="brand" class="form-control @error('name') is-invalid @enderror" value="{{$brands->brand}}">
@error('name')
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