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
					</tr>
				</thead>
				<?php $i = 1; ?>
				@foreach($history as $item)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$item->kegiatan}}</td>
					<td>{{$item->created_at}}</td>
					<td></td>
				</tr>
				@endforeach
				<thead class="thead-secondary">
				<tr><th colspan="4"class="text-center">Process Tasks</th></tr>
				<tr>
					<th>number</th>
					<th>activity</th>
					<th>created at</th>
					<th>updated at</th>
				</tr>
				</thead>
				<?php $a = 1; ?>
				@foreach($process as $item)
				<tr>
					<td>{{$a++}}</td>
					<td>{{$item->kegiatan}}</td>
					<td>{{$item->created_at}}</td>
					<td>{{$item->updated_at}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>







@endsection