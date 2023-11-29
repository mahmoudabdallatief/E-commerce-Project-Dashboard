<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{url('images/34583214-logo-admin-icon-administrator-illustration-of-a-man-in-a-jacket-and-shirt-ties-jacket-and-shirt-.webp')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
 
  <script src="{{url('js/sweetalert2.all.min.js')}}"></script>
  <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
   
   
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  <title>Login</title>
</head>
<body>
<br>
 <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12 col-sm-12 border border-1 shadow rounded-3">
            <div class="mt-3 pb-2 border-bottom" style="color:chocolate;">Login</div>
            <form role="form" action="{{ route('login') }}" method="post">
                @csrf
                <br>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="username" name="username">
                </div>
                <br>
                <div class="input-group">
                    <input type="password" class="form-control pass" placeholder="password" name="password">
                    <span class="input-group-text eye-icon"><i class="fa-sharp fa-solid fa-eye"></i></span>
               </div>
                <br>
                @if(session('error'))
                <div class="alert alert-danger p-2">{{ session('error') }}</div>
                @endif
                <button class="btn login text-start mb-3" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
    <script src="{{url('js/jquery-3.6.1.min.js')}}"></script>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js "></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    <script src="{{url('js/bootstrap.bundle.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
</body>
</html>