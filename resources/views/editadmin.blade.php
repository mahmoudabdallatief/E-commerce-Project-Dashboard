
@extends('layout')
@section('title','Admins')
@section('content')
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-12 ">
<h2 class="text-start p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">Edit the privileges of {{$admins->priv->name}} </h2>

 <form action="{{route('admins.update',$admins->id)}}" method="post"class="">
 @csrf
 @method("PUT")
<br>
<select name="pri"  id=""class="form-control @error('pri') is-invalid @enderror">
<br>
<br>
    @foreach($privs as $priv)
    <option value="{{$priv->id_priv}}" {{ $admins->pri == $priv->id_priv ? 'selected' : ''}} >  {{$priv->name}} </option>
   
@endforeach
        </select>
        @error('pri')
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