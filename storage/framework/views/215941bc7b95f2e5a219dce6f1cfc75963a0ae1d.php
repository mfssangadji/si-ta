
<?php $__env->startSection('title', 'Administrator'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Data<small><i>Administrator</i></small></h2>
	        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success btn-sm" style="float: right;">Tambah Baru</a>
	        <div class="clearfix"></div>
	      </div>
	          <div class="row">
	              <div class="col-sm-12">
	                <div class="card-box table-responsive">
	        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Nama</th>
	              <th>Email</th>
	              <th>Proses</th>
	            </tr>
	          </thead>
	          <tbody>
            	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		<tr>
            			<td><?php echo e($loop->iteration); ?></td>
						<td><?php echo e($user->name); ?></td>
						<td><?php echo e($user->email); ?></td>
	            		<td>
			              	<a href="<?php echo e(route('users').'/'.$user->id.'/edit'); ?>" title="ubah"><i class="fa fa-edit"></i></a><form method="post" action="<?php echo e(route('users').'/'.$user->id); ?>" style="display:inline;">
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
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/users/index.blade.php ENDPATH**/ ?>