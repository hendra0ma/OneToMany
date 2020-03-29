<?php $__env->startSection('content'); ?>

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
				<?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($i++); ?></td>
					<td><?php echo e($item->title); ?></td>
					<td><?php echo e($item->created_at); ?></td>
					<td><a class="btn btn-danger" href="/deleteHistory/<?php echo e($item->id); ?>"><i class="fas fa-trash"></i></a></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</div>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\OneToMany\resources\views/history.blade.php ENDPATH**/ ?>