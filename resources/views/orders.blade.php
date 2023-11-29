@extends('layout')
@section('title','Orders')
@section('content')
<br>
<br>
<div class="container">
  <div class="row">
 
    <div class="col-12 ">
@if(session('log')!=3)
<h2 class="text-start p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">All Orders</h2>

    
    <br>
<table class=" tab  table mt-3"  style="width:100%" id= "example" >
        <thead>
            <tr>
        <th>id</th>
        <th>billing_name</th>
        <th>billing_zip</th>
        <th>shipping_zip</th>
        <th>total</th>
        <th>created_at</th>
       </tr>
        </thead>  
        <tbody align='left'>            
        @foreach($orders as $order)
     <tr>
    <td>{{$order->id}}</td> 
     <td>{{$order->billing_name}}</td> 
     <td>{{$order->billing_zip}}</td> 
     <td>{{$order->shipping_zip}}</td> 
     <td>{{$order->total}}</td> 
     <td>{{$order->created_at}}</td> 
     </tr>
     @endforeach
     </tbody>
     </table>
     @else
   <h2 class="p-1 text-center" style ="color:chocolate;">You are not Allow to Access on This Table</h2>
   @endif
   </div>
        </div>
      
      </div>
@endsection