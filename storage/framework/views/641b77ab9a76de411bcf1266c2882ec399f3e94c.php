
<?php $__env->startSection('title', 'Ubah Dosen'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Ubah <small><i>Dosen</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="<?php echo e(route('dosen').'/'.$dosen->id); ?>" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
          			<?php echo method_field('PATCH'); ?>
					<?php echo csrf_field(); ?>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="nip" name="nip" placeholder="NIP" value="<?php echo e($dosen->nip); ?>" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="password" id="password" placeholder="Password (kosongkan jika tidak diganti)" name="password" class="form-control ">
						</div>
					</div>
					
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo e($dosen->nama_lengkap); ?>" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="no_telp" value="<?php echo e($dosen->no_telp); ?>" placeholder="No. Telp" name="no_telp" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="file" id="foto" name="foto">
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
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/dosen/edit.blade.php ENDPATH**/ ?>