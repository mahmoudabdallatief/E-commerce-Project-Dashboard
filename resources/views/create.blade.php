@extends('layout')
@section('title','Products')


@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 ">
    
<br>
<br>
<h2 class="text-start   p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">Add New Product</h2>

<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" class="">
@csrf
<br>

    <input type="text" name="name" placeholder="name" class="form-control  @error('name') is-invalid @enderror"value="{{ old('name') }}">
    @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    <br>
    <br>
   
    <input type="text"  name="price" placeholder="price" class="form-control  @error('price') is-invalid @enderror" value="{{ old('price') }}">
    @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    <br>
    <br>
   
    <input type="text"  name="offer" placeholder="offer" class="form-control  @error('offer') is-invalid @enderror" value="{{ old('offer') }}">
    @error('offer')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    <br>
    <br>
   
    <input type="text"  name="count" placeholder="count" class="form-control  @error('count') is-invalid @enderror" value="{{ old('count') }}">
    @error('count')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    <br>
    <br>
   
    <label for="" class="form-label" style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;"> Enter the image of product </label> <Span class="text-danger">( jpg or jpeg or png or gif  )</Span>
    <br>
    <br>
    <input type="file" name="image[]" multiple class="form-control @error('image.*') is-invalid @enderror">
    @foreach ($errors->get('image.*') as $fileErrors)
        @foreach ($fileErrors as $error)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $error }}</strong>
            </span>
        @endforeach
@endforeach

    <br>
    <br>
    
  
    <select name="category" id="" class="form-control   @error('category') is-invalid @enderror">
    <option selected disabled>category</option>
    @foreach($categories as $category)
    <option value="{{$category->id}}"{{ old('category') == $category->id ? 'selected' : ''}} >  {{$category->cat}} </option>
   
@endforeach
        </select>
        @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
<br>
<br>

<select name="brand"  id=""class="form-control @error('brand') is-invalid @enderror">
    <option selected disabled>brand</option>
    @foreach($brands as $brand)
    <option value="{{$brand->id}}" {{ old('brand') == $brand->id ? 'selected' : ''}} >  {{ $brand->brand }} </option>
   
@endforeach
        </select>
        @error('brand')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    <br>
    <br>
  
    <label for="" class="form-label" style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;"> Enter the describtion of product </label>
<br>
<br>
<textarea style="width: 100%;height: 400px;" name="describtion"  class="form-control @error('describtion') is-invalid @enderror">{{ old('describtion') }}</textarea>
@error('describtion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
<br>
<br>

<label for="" class="form-label" style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;"> Enter the count down date of product </label> <Span class="text-success">(optional)</Span>
<br>
<br>
<input type="datetime-local"  class="form-control" name="date">
<br>
<br>
<button type="submit" class="btn mb-2 login">Add</button>
 </form>  

<br>

    
  </div>
</div>
</div>


@endsection