
<?php $__env->startSection('title', 'Tambah Mahasiswa'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Tambah <small><i>Mahasiswa</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="<?php echo e(route('mahasiswa')); ?>" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo csrf_field(); ?>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="npm" name="npm" placeholder="NPM" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="password" id="password" placeholder="password" name="password" required="required" class="form-control ">
						</div>
					</div>
					
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="no_telp" name="no_telp" placeholder="No. Telp" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="file" id="foto" name="foto" required="required">
						</div>
					</div>

					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 offset-md-12">
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
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/mahasiswa/create.blade.php ENDPATH**/ ?>