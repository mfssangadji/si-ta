
<?php $__env->startSection('title', 'Sesi Bimbingan TA'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
	      <div class="x_title">
			<i>Sesi Bimbingan TA <?php echo e($bimbingan->mahasiswa->nama_lengkap); ?></i>
			<a href="<?php echo e(url('bimbingan-dosen/'.Request::segment(2).'/create')); ?>" class="btn btn-success btn-sm" style="float: right;">Buat Sesi</a>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
				<tr><th colspan='100'>JUDUL: <?php echo e($bimbingan->judul_ta); ?></th></tr>
	            <tr>
	              <th>No</th>
	              <th>Sesi Konsultasi</th>
	              <th>Status</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
				<?php $__currentLoopData = $sesi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sesi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($loop->iteration); ?></td>
						<td><a href="<?php echo e(url('bimbingan-dosen/'.Request::segment(2).'/'.$sesi->id.'/konsultasi')); ?>"><?php echo e($sesi->sesi_konsultasi); ?></a></td>
						<?php if($sesi->status == 0): ?>
							<td><span class="badge badge-warning">Sedang berlangsung</span></td>
						<?php else: ?>
							<td><span class="badge badge-success">Selesai</span></td>
						<?php endif; ?>
						<td>
							  <a href="<?php echo e(url('bimbingan-dosen/'.$sesi->bimbingan_id.'/'.$sesi->id.'/edit')); ?>" title="ubah"><i class="fa fa-edit"></i></a>
							  <form method="post" action="<?php echo e(url('bimbingan-dosen/'.$sesi->bimbingan_id.'/'.$sesi->id)); ?>" style="display:inline;">
            					<?php echo method_field('DELETE'); ?>
            					<?php echo csrf_field(); ?>
            				<button type="submit" class="" style="background-color: transparent; border:none; color: red" onclick="return confirm('Apakan anda yakin?')" style="border: none;"><i class="fa fa-remove"></i></button>
            				</form>
			            </td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/bimbingan/dosen/sesi/index.blade.php ENDPATH**/ ?>