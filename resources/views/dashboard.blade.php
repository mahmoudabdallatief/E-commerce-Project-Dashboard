@extends('layout')
@section('title','Dashboard')


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

 <br>
 <br>
<div class="container text-center  pt-1">
    <div class="row ">
    <div class="col-12 " >
    <h2 class="text-start p-1 "  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">Dashboard</h2>
<h3 class="text-start h ">HELLO <span class="sess" style="  color:chocolate;  text-transform:capitalize"> 
{{$admins->username}}
</span>
</h3>
<br>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-3  ">
        <div class="card dash h-100">
            <br>
            <i class="fa-solid fa-cart-shopping   fa-2x"></i>
        <br>
        
							<p>{{ $orders_count }}</p>
							<p>Orders</p>
        </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
        <div class="card dash  h-100">
        <br>
        <i class="fa-solid fa-comment fa-2x"></i>
        <br>
							<p>{{ $comments_count }}</p>
							<p>Comments</p>
        </div>
        
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
        <div class="card dash  h-100">
        <br>
        <i class="fa-solid fa-user fa-2x"></i>
        <br>
							<p>{{ $users_count }}</p>
							<p>Users</p>
        </div>
       
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
        <div class="card dash  h-100">
        <br>
        
        <i class="fa-brands fa-product-hunt fa-2x"></i>
        <br>
							<p>{{ $products_count }}</p>
							<p>Products</p>
        </div>
  
        </div>
    </div>
</div>
</main>


@endsection