
<?php $__env->startSection('title', 'Bimbingan TA'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Bimbingan TA</i></small></h2>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Mahasiswa</th>
	              <th>Judul TA</th>
	              <th>Semester</th>
	              <th>Fakultas</th>
	              <th>Masa Bimbingan</th>
	            </tr>
	          </thead>
	          <tbody>
            	<?php $__currentLoopData = $bimbingan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bimbingan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		<tr>
            			<td><?php echo e($loop->iteration); ?></td>
						<td><a href="<?php echo e(url('bimbingan-dosen/'.$bimbingan->id.'/')); ?>"><?php echo e($bimbingan->mahasiswa->nama_lengkap); ?></a></td>
						<td><?php echo e($bimbingan->judul_ta); ?></td>
						<td><?php echo e($bimbingan->semester); ?></td>
						<td><?php echo e($bimbingan->fakultas); ?></td>
						<td><?php echo e($bimbingan->tanggal_mulai); ?> sd <?php echo e($bimbingan->tanggal_akhir); ?></td>
						<!-- <?php if($bimbingan->status == 0): ?>
							<td><span class='badge badge-warning'>Sedang berlangsung</span></td>
						<?php else: ?>
						
						<?php endif; ?> -->
            		</tr>
            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/bimbingan/dosen/index.blade.php ENDPATH**/ ?>