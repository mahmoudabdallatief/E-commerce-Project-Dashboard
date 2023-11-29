@extends('layout')
@section('title','Messages')


@section('content')
<br>
<br>
<div class="container">
  <div class="row">
 
    <div class="col-12 ">
@if(session('log')!=3)
<h2 class="text-start p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">All Messages</h2>

    
    <br>
<table class=" tab  table mt-3"  style="width:100%" id= "example" >
        <thead>
            <tr>
        <th>id</th>
        <th>name</th>
        <th>phone</th>
        <th>e-mail</th>
        <th>view</th>
        <th>date</th>
        <th>controls</th>
       </tr>
        </thead>  
        <tbody align='left' class="live">  
        @php
    $id = 1;
    
@endphp           
        @foreach($messages as $message)
     <tr><td>{{$id++}}</td> 
     <td>{{$message->name}}</td> 
     <td>{{$message->number}}</td> 
     <td>{{$message->email}}</td> 
     
     <td id ="m{{$message->id}}">
     @if($message->view==0)
{{'unread'}}
@else
{{'read'}}
@endif
     </td>
    <td id ="z{{$message->id}}">{{$message->date}}</td>
    
        
    <td>
    <button type="button" class="btn btn-warning my-0" data-bs-toggle="modal" data-bs-target="#examplemodel{{$message->id}}">
    <i class="fa-solid fa-comments-dollar text-light"></i>
      </button>
    <!-- Modal -->
    </td>
    </tr>
    <div class="modal fade" id='examplemodel{{$message->id }}' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Are Yoy Sure You Want To Delete?</h5>
            </div>
            <div class="modal-body">
                <p class="text-start">
                {{$message->message}}
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-del btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="hidden" value ="{{$message->id}}" name ="delid" class ="delid">
            </div>
          </div>
        </div>
        
      </div>
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