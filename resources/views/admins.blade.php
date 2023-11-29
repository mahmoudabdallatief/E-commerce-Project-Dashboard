@extends('layout')
@section('title','Admins')


@section('content')
@if(session('success-edit'))
    <input type="hidden" class = "hidden" value="1">
@endif
@if(session('success-delete'))
    <input type="hidden" class = "hidden" value="2">
@endif
<br>
<br>
<div class="container">
  <div class="row">
 
    <div class="col-12 ">
@if(session('log')!=3)
<h2 class="text-start p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">Admins</h2>
<div class="text-start ">
<button class="login   mt-2 btn " data-bs-toggle="modal" data-bs-target="#exampleModal">Add-New Admin</button>
    </div>
    
    <br>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add-new-Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="input-group">
        <input type="text" class="admin mb-2 form-control" name="admin" placeholder="username">
</div>
        <div class="input-group">
        <input type="password" class="password pass mb-2 form-control" name="password" placeholder="password">
        <span class="input-group-text h-auto eye-icon " style="height:38px !important "><i class="fa-sharp fa-solid fa-eye"></i></span>
        
      </div>
        <select name="priv" id="priv" class="mb-2 form-control">
          <option class="opt-dis" selected disabled>Choose The Type of Admin</option>
          @foreach($privs as $priv)
          <option value="{{$priv->id_priv}}">{{$priv->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn addadmin login" data-bs-dismiss="modal">Add</button>
      </div>
    </div>
  </div>
</div>
<table class=" tab  table mt-3"  style="width:100%" id= "example" >
        <thead class="hh">
            <tr>
            <th>id</th>
        <th>username</th>
        <th>class</th>
        <th>priv</th>
        <th>controls</th>
        
       </tr>
        </thead>  
        <tbody align='left' class="tt"> 
        @foreach($admins as $admin)
     <tr><td>{{$admin->id}}</td> 

     <td >{{$admin->username}}</td>
     <td >{{$admin->priv->name}}</td>
    <td >{{$admin->priv->priv}}</td>
     
        
    <td>
    <a href="{{ route('admins.edit', $admin->id)}}" class="text-decoration-none text-light"> <button type="button" class="btn btn-success"><i class="fa-regular fa-keyboard"></i></button></a>
    <button type="button" class="btn btn-danger my-0" data-bs-toggle="modal" data-bs-target="#examplemodel{{$admin->id}}">
    <i class="fa-solid fa-trash"></i>
      </button>
    <!-- Modal -->
    <div class="modal fade" id='examplemodel{{$admin->id }}' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-dark" id="exampleModalLabel">Are Yoy Sure You Want To Delete?</h5>
            </div>
            <div class="modal-body">
                <p class="text-start text-dark">
                {{$admin->username}}
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form action="{{ route('admins.destroy', $admin->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"class="btn btn-danger">DELETE</button>
</form>
            </div>
          </div>
        </div>
        
      </div>
    </td>
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
  