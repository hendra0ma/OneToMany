@extends('layouts.app')
@section('content')
	<div class="container">
	<section id="section1"class="mb-3">
    <div class="row mb-4">
        <?php $i = 1; ?>
          @if($message = Session::get('message'))
          <div class="alert alert-warning">
            <p> <strong>{{ $message }}</strong> </p>
            <p> <form action="returncard/{{Session::get('name')}}">
              <input type="hidden" name="return"value="">
              <input type="submit" value="yes"class="btn btn-outline-dark">
              <button type="button" class="btn btn-outline-danger" data-dismiss="alert">No</button>
            </form>
            </p>
          </div>  
          @endif

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
                <a href="#"data-toggle="modal"data-target="#exampleModal{{$item->id}}"class="btn btn-secondary">New Task&nbsp;<i class="fas fa-plus-square"></i></a>
                      </td>
                      <td>
                        
                        <?php if (App\Task::where('column_id',$item->id)->get() == '[]'): ?>
                          <a href="/home/delete/{{$item->id}}" class=" btn btn-danger"><i class="fas fa-trash"></i ></a>  
                        <?php endif ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="card-body">
                	<?php $a = 1;?>
                  <table class="table-hover"width="100%">
                    @foreach($item->tasks as $itemku)
                    <tbody>
                      <tr>
                        <td>  <li>{{$itemku->title}}  </li>
                        <td colspan="4" class="text-dark">                          
                            {{$itemku->start}}  
                        </td>
                      </tr>
                        <tr>
                        
                          <td class="text-dark">
                           
                          </td>
                            <td class="text-dark">
                              <button data-toggle="modal"data-target="#modalSend{{$itemku->id}}" class="btn btn-outline-dark">Send Email</button> 
                           <a href="/home/deleteCustomTask/{{$itemku->id}}"class="btn btn-outline-danger"><i class="fas fa-backspace"></i></a>&nbsp;
                            <a href="#modalChange{{$itemku->id}}"data-toggle="modal"class="btn btn-dark"> <i class="fas fa-exchange-alt"></i></a>
                          </td>
                          
                        </tr>
                    </tbody>


                    @endforeach
                    
                  </table>
                </div>
            </div>
        </div>
    @endforeach
         <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <a href="#modalNew"data-toggle="modal" data-target="#exampleModal"class="btn btn-dark"> New Card <i class="fas fa-plus-square"></i>  </a>
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


      <div class="modal fade bd-example-modal-sm" id="modalSend{{$itemku->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            {{$itemku->kegiatan}}
          </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
            <form action="/sendEmail"method="post"class="form-group">
            <div class="modal-body"> 
              insert Email : 
                {{csrf_field()}}
                <input type="hidden" name="task"value="{{$itemku->title}}">
                <input type="email" name="sendTo"class="form-control mb-1">
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

<script type="text/javascript">
  $(document).ready(function () {
    $('#formOrder').hide()
    $('#buttonOrder').click(function () {
      $('#formOrder').toggle('slow')
    })
  })




</script>
@endsection