<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{url('images/34583214-logo-admin-icon-administrator-illustration-of-a-man-in-a-jacket-and-shirt-ties-jacket-and-shirt-.webp')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
 
  <script src="{{url('js/sweetalert2.all.min.js')}}"></script>
  <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
   
   
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  <title>@yield('title')</title>
</head>
<body>

<nav
             id="main-navbar"
             class="navbar navbar-expand-lg navbar-light fixed-top shadow"
             >
          <!-- Container wrapper -->
          <div class="container-fluid">
            <!-- Toggle button -->
            <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
              <i class="fas fa-bars"></i>
            </button>
      
            <!-- Brand -->
            <a class="navbar-brand" href="">
            <img src="{{url('images/34583214-logo-admin-icon-administrator-illustration-of-a-man-in-a-jacket-and-shirt-ties-jacket-and-shirt-.webp')}}" alt="" width="70" height="70">
            </a>

      <div class="d-flex  ">
      <div class=" d-block ms-1 mt-3  " style ="background-color: chocolate !important;">
      <a href="{{route('messages.index')}}" class="notification">
  <span>
    <i class="fa-solid fa-earth-asia fa-fw"></i>
</span>



  <span class="badge bg-danger message text-white ">
  
  <span class="w-100" id="u">
{{  DB::table('message')->where('view', '=', 0)->count() }}
</span>

  </span>

</a>
                </div>
                
            <ul class=" d-block  mt-3 mx-0">
           

          <li class="   ">
                <a   
                 href="{{route('logout')}}"
                 class="list-group-item list-group-item-action  "
                 >
                 <i class="fa-solid fa-arrow-right-from-bracket "></i>
                 <span class="me-2">Log out</span></a
                >
                </li>
            
                
          </ul>
      </div>
            
          </div>
         
          <!-- Container wrapper -->
        </nav>

        <nav
             id="sidebarMenu"
             class="collapse d-lg-block sidebar collapse" style=
             >
          <div class="position-sticky wow  mx-auto">
            <ul class="list-group list-group-flush mx-0" id="myDIV">
            
                <li class="   mb-2 "> <a   
                 href="{{route('dashboard')}}"
                 class="list-group-item list-group-item-action  {{ request()->routeIs('dashboard')? 'active' : '' }}  "
                 aria-current="true"
                 >
                 <i class="fa-solid fa-gauge-high fa-fw me-3"></i>
                 <span>Dashboard</span>
              </a></li>
                <li class="   mb-2 ">
                <a 
                 href="{{route('products.index')}}"
                 class="list-group-item list-group-item-action  {{ request()->routeIs('products.index') || request()->routeIs('products.create')||request()->routeIs('products.edit')? 'active' : '' }}  "
                 >
                 <i class="fa-brands fa-product-hunt fa-fw me-3"></i>
                 <span>All Products</span>
              </a>
                </li>
                
                <li  class="   mb-2 ">
                <a 
                 href="{{route('brands.index')}}"
                 class="list-group-item list-group-item-action {{ request()->routeIs('brands.index') || request()->routeIs('brands.create')||request()->routeIs('brands.edit')? 'active' : '' }}"
                 >
                 <i class="fa-brands fa-bandcamp  fa-fw me-3"></i>
                 <span>All Brands</span>
              </a>
                </li>
               
                <li  class="   mb-2 " >
                <a 
                 href="{{route('cats.index')}}"
                 class="list-group-item list-group-item-action {{ request()->routeIs('cats.index') || request()->routeIs('cats.create')||request()->routeIs('cats.edit')? 'active' : '' }}"
                 >
                 <i class="fa-solid fa-list fa-fw me-3"></i>
                 <span>All Category</span>
              </a>
                </li>

                <li  class="   mb-2 " >
                <a 
                 href="{{route('admins.index')}}"
                 class="list-group-item list-group-item-action {{ request()->routeIs('admins.index') || request()->routeIs('admins.edit')? 'active' : '' }}"
                 >
                 <i class="fa-solid fa-lock fa-fw me-3"></i>
                 <span>Admins</span>
              </a>
                </li>
                <li  class="   mb-2 " >
                <a 
                 href="{{route('messages.index')}}"
                 class="list-group-item list-group-item-action {{ request()->routeIs('messages.index')? 'active' : '' }}"
                 >
                 <i class="fa-regular fa-message fa-fw me-3"></i>
                 <span>Messages</span>
              </a>
                </li>
                <li  class="   mb-2 " >
                <a 
                 href="{{route('comments.index')}}"
                 class="list-group-item list-group-item-action {{ request()->routeIs('comments.index')? 'active' : '' }}"
                 >
                 <i class="fa-solid fa-comment fa-fw me-3"></i>
                 <span>Comments</span>
              </a>
                </li>
                <li  class="   mb-2 " >
                <a 
                 href="{{route('orders')}}"
                 class="list-group-item list-group-item-action {{ request()->routeIs('orders')? 'active' : '' }}"
                 >
                 <i class="fa-solid fa-cart-shopping   fa-fw me-3"></i>
                 <span>Orders</span>
              </a>
                </li>
              </ul>
          </div>
        </nav>
        <main style="margin-top: 58px">
@yield('content')
</main>

    <script src="{{url('js/jquery-3.6.1.min.js')}}"></script>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js "></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    <script src="{{url('js/bootstrap.bundle.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
</body>
</html>