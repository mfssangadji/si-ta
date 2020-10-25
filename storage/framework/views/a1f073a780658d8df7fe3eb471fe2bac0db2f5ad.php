
<?php $__env->startSection('title', 'Ubah Administrator'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Ubah <small><i>Administrator</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="<?php echo e(route('users').'/'.$users->id); ?>" data-parsley-validate class="form-horizontal form-label-left">
          <?php echo method_field('PATCH'); ?>
					<?php echo csrf_field(); ?>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="name" name="name" value="<?php echo e($users->name); ?>" placeholder="Nama Lengkap" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="email" id="email" name="email" placeholder="Email" value="<?php echo e($users->email); ?>" required="required" class="form-control ">
						</div>
					</div>

          <div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="password" id="password" name="password" placeholder="Password (kosongkan jika tidak diganti)" class="form-control ">
						</div>
					</div>

					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 offset-md-3">
							<button type="submit" class="btn btn-success btn-sm">Proses</button>
							<button class="btn btn-primary btn-sm" onclick="self.history.back()" type="reset">Batal</button>
						</div>
					</div>

				</form>
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $(function () {
    $('.select2').select2({
          theme: "classic",
          maximumSelectionLength: 1,
    })
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/users/edit.blade.php ENDPATH**/ ?>