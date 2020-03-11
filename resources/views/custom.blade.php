@extends('layouts.app')
@section('content')
	<div class="container">
	<section id="section1"class="mb-3">
    <a href="/home"class="btn btn-secondary mb-4">Process Task</a>
    <a href="/home/custom"class="btn btn-secondary mb-4">Custom Task</a>
        
    
    <div class="row">
        <?php $i = 1; ?>
    @foreach($custom as $item)

        <div class="col-md-4">
            <div class="card mb-3 shadow-sm">

                <div class="card-header">
                  <table width="100%">
                    <tr>
                      <td>
                        
                {{$i++}}.&nbsp;{{$item->status}} 
                      </td>
                      <td>
                        
                <a href="#"data-toggle="modal"data-target="#exampleModal{{$item->id}}"class="text-dark"><i class="fas fa-plus-square"></i></a>
                      </td>
                      <td>
                <a href="/home/delete/{{$item->id}}" class=" text-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                
                  </table>
                

                </div>
                <div class="card-body">
                	<?php $a = 1;?>
                  <table class="table table-hover">
                    @foreach($item->tasks as $itemku)
                    <tr>
                      <td>
                        
                            {{$a++}}
                      </td>
                      <td>
                        
                            {{$itemku->kegiatan}}  
                      </td>
                      <td>
                        
                    				<a href="#modalChange{{$itemku->id}}"data-toggle="modal"class="text-dark float-right"> <i class="fas fa-exchange-alt"></i></a>  						
                      </td>
                      <td>
                        <a href="/home/deleteCustomTask/{{$itemku->id}}"style="color: #e34d4d"><i class="fas fa-backspace"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    
                  </table>
                </div>
            </div>
        </div>
    @endforeach
         <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <a href="#modalNew"data-toggle="modal" data-target="#exampleModal"class="text-dark"><b> New Card</b> <i class="fas fa-plus-square"></i>  </a>
                    </div>
                </div>
         </div>
         <hr>
    </div>
    </section>
		
	</div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/newCard"method="post"class="form-group">
        {{csrf_field()}}
          <div class="modal-body">
            Card Name : 
                <input type="text"required="required" name="cardName"class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- modal new Task -->
@foreach ($custom as $item)
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/newTask/{{$item->id}}"method="post"class="form-group">
        {{csrf_field()}}
          <div class="modal-body">
            Your Task : 
                <textarea required="required" name="taskName"class="form-control"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endforeach
	@foreach($custom as $myItem)
	@foreach($myItem->tasks as $itemku)
<div class="modal fade bd-example-modal-sm" id="modalChange{{$itemku->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        {{$itemku->kegiatan}}
      </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <form class="form-group"action="/home/change/{{$itemku->id}}"method="POST">
        <div class="modal-body"> 
          Move to :
        	{{csrf_field()}}
				<select name="change"class="form-control">
					@foreach($custom as $myItem)
     				<option value="{{$myItem->id}}">{{$myItem->status}}</option>
     				@endforeach
    			</select>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endforeach


@endsection