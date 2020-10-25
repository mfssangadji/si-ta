
<?php $__env->startSection('title', 'Sesi Bimbingan TA'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
	      <div class="x_title">
	    	<i>Sesi Bimbingan TA <?php echo e($no_pembimbing); ?></i>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
				<tr><th colspan='100'><?php echo e($dosen->nama_lengkap); ?> (<?php echo e($no_pembimbing); ?>)</th></tr>
	            <tr>
	              <th>No</th>
	              <th>Sesi Konsultasi</th>
	              <th>Status</th>
	            </tr>
	          </thead>
	          <tbody>
            	<?php $__currentLoopData = $sesi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sesi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($loop->iteration); ?></td>
						<td><a href="<?php echo e(url('bimbingan-mahasiswa/'.Request::segment(2).'/'.$no.'/'.$sesi->dosen_id.'/dosen/'.$sesi->id.'/konsultasi')); ?>"><?php echo e($sesi->sesi_konsultasi); ?></a></td>
						<?php if($sesi->status == 0): ?>
							<td><span class="badge badge-warning">Sedang berlangsung</span></td>
						<?php else: ?>
							<td><span class="badge badge-success">Selesai</span></td>
						<?php endif; ?>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/bimbingan/mahasiswa/sesi/index.blade.php ENDPATH**/ ?>