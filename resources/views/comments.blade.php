@extends('layout')
@section('title','Comments')


@section('content')
@if(session('success-delete'))
    <input type="hidden" class = "hidden" value="2">
@endif
<br>
<br>
<div class="container">
  <div class="row">
 
    <div class="col-12 ">
@if(session('log')!=3)
<h2 class="text-start p-1"  style="  color:chocolate; border-bottom:1px solid aqua; width:fit-content;">All Comments</h2>

    
    <br>
<table class=" tab  table mt-3"  style="width:100%" id= "example" >
        <thead>
            <tr>
        <th>id</th>
        <th>comment</th>
        
        <th>controls</th>
        
       </tr>
        </thead>  
        <tbody align='left' class="live"> 
        @php
    $id = 1;
    
@endphp

          
        @foreach($comments as $comment)
     <tr><td>{{$id++}}</td> 


    
    <td>{{$comment->comment}}</td>
     
        
    <td>
    <button type="button" class="btn btn-danger my-0" data-bs-toggle="modal" data-bs-target="#examplemodel{{$comment->id}}">
    <i class="fa-solid fa-trash"></i>
      </button>
    <!-- Modal -->
    </td>
    </tr>
    <div class="modal fade" id='examplemodel{{$comment->id }}' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Are Yoy Sure You Want To Delete?</h5>
            </div>
            <div class="modal-body">
                <p class="text-start">
                {{$comment->comment}}
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form action="{{ route('comments.destroy', $comment->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"class="btn btn-danger">DELETE</button>
</form>
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
  