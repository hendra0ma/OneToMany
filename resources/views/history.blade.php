@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead class="thead-secondary">
					<tr><th colspan="4"class="text-center">Custom Tasks</th></tr>
					<tr>
						<th>number</th>
						<th>activity</th>
						<th>created at</th>
						<th><a href="/deleteAll"class="btn btn-danger">Delete All&nbsp;<i class="fas fa-trash"></i></a></th>
							
					</tr>
				</thead>
				<?php $i = 1; ?>
				@foreach($history as $item)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$item->title}}</td>
					<td>{{$item->created_at}}</td>
					<td><a class="btn btn-danger" href="/deleteHistory/{{$item->id}}"><i class="fas fa-trash"></i></a></td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>







@endsection