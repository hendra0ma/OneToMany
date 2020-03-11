<?php $__env->startSection('content'); ?>

	<script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
	<div class="container">
		<div class="card">
			
			
		</div>
		<script type="text/javascript">
		$(document).ready(function () {
				$.getJSON('<?php echo e(url("home/tampil")); ?>',function (result,state) {
					var data = result
					var collection = []
					for (var i = 0; i < data.length; i++) {
						$('.card').append(data[i].status)+$('.container').append(data[i].kegiatan)
					}
					
				})
			})
		</script>
	</div>

	



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\OneToMany\resources\views/halamanajax.blade.php ENDPATH**/ ?>