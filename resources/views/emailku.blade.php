<div class="card">
	<div class="card-header">
<h3>This is a , {{ $data['status'] }} Tasks</h3>
	</div>
	<div class="card-body">
		<div class="container mt-auto">		
			This Email Sended from : {{$data['from']}}</br>
			this is the contents of the task created by {{$data['from']}} : 
			<strong><p>{{ $data['kegiatan'] }}</p></strong>
		</div>
	</div>
</div>




