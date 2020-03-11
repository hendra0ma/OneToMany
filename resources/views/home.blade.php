@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/home"class="btn btn-secondary mb-4">Process Task</a>
    <a href="/home/custom"class="btn btn-secondary mb-4">Custom Task</a>
    <section id="section2">
        <div class="row">
            <div class="col-md-4">
                 <a href="#exampleModalNewTask" class="text-dark"data-toggle="modal">Start Task <i class="fas fa-plus-square"></i></a>
                @foreach($start as $mulai)
                <div class="card border-dark mb-2">
                    <div class="card-header">
                       <i class="text-dark mb-1"> {{$mulai->status}}</i>
                        <a href="#modalku{{$mulai->id}}"data-toggle="modal"class="btn btn-outline-dark float-right">Send To Email</a>
                    </div>
                    <div class="card-body">
                        {{$mulai->kegiatan}}
                        <br/><a href="/home/deleteTask/{{$mulai->id}}"class="text-danger"><i class="fas fa-trash"></i></a>
                        <a href="/home/updateToProcess/{{$mulai->id}}"class="btn btn-secondary mb-1">Start</a></br>                        
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4">
                 <div class="text-primary"> Process Task</div>
                @foreach($process as $mulai)
                <div class="card border-primary  mb-2">
                    <div class="card-header">
                        {{$mulai->status}}
                               <a href="#modalku{{$mulai->id}}"data-toggle="modal"class="btn btn-outline-dark float-right">Send To Email</a>
                    </div>
                    <div class="card-body">
                        {{$mulai->kegiatan}}
                        <br/><a href="/home/deleteTask/{{$mulai->id}}"class="text-danger"><i class="fas fa-trash"></i></a>
                        <a href="/home/updateToFinish/{{$mulai->id}}"class="btn btn-success">Finish</a>
                          
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4">
                 <div class="text-success"> Finish Task</div>
                @foreach($finish as $mulai)
                <div class="card border-success  mb-2">
                    <div class="card-header">
                        <i class="text-dark mb-1"> {{$mulai->status}}</i>
                        <a href="#modalku{{$mulai->id}}"data-toggle="modal"class="btn btn-outline-dark float-right">Send To Email</a>
                    </div>
                    <div class="card-body">
                        {{$mulai->kegiatan}}
                        <br/><a href="/home/deleteTask/{{$mulai->id}}"class="text-danger"><i class="fas fa-trash"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>



   @foreach($forEmail as $mulai)
<div class="modal fade" id="modalku{{$mulai->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send To Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
          <form action="home/kirimemail/"class="form-group">
                          {{csrf_field()}}
              status : 
              <input type="text" name="status"value="{{$mulai->status}}"class="form-control"readonly>
              Activity : 
              <input type="text" name="kegiatan"value="{{$mulai->kegiatan}}"class="form-control"readonly>
              Email:
              <input type="email" name="email"placeholder="Enter email to be sent"class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="send it"class="btn btn-outline-dark">
          </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<div class="modal fade" id="exampleModalNewTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/newTaskProcess"method="post"class="form-group"id="formTask">
        {{csrf_field()}}
          <div class="modal-body">
            Your Task : 
                <input type="text"required="required" name="taskName"class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"id="submit5">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"src="{{asset('js/style.js')}}"></script>
@endsection
<!-- Modal -->
