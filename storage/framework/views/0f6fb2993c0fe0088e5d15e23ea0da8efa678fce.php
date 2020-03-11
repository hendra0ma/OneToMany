<div class="card">
	<div class="card-header">
<h3>This is a , <?php echo e($data['status']); ?> Tasks</h3>
	</div>
	<div class="card-body">
		<div class="container mt-auto">		
			This Email Sended from : <?php echo e($data['from']); ?></br>
			this is the contents of the task created by <?php echo e($data['from']); ?> : 
			<strong><p><?php echo e($data['kegiatan']); ?></p></strong>
		</div>
	</div>
</div>




<?php /**PATH D:\xampp\htdocs\OneToMany\resources\views/emailku.blade.php ENDPATH**/ ?>