
<?php $__env->startSection('title', 'Profil Saya'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
			<div class="x_title">
				<h2>Profil Saya</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="<?php echo e(route('profil')); ?>" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo csrf_field(); ?>

					<?php if(Auth::guard('dosen')->check()): ?>
						<div class="item form-group">
							<div class="col-md-12 col-sm-12 ">
								<input type="text" id="nip" name="nip" value="<?php echo e($user->nip); ?>" placeholder="NIP" required="required" class="form-control ">
							</div>
						</div>
					<?php elseif(Auth::guard('mahasiswa')->check()): ?>
						<div class="item form-group">
							<div class="col-md-12 col-sm-12 ">
								<input type="text" id="npm" name="npm" value="<?php echo e($user->npm); ?>" placeholder="NPM" required="required" class="form-control ">
							</div>
						</div>
					<?php endif; ?>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="password" placeholder="Password (Kosongkan jika tidak diganti)" id="password" name="password" class="form-control ">
						</div>
					</div>
					
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="nama_lengkap" value="<?php echo e($user->nama_lengkap); ?>" name="nama_lengkap" placeholder="Nama Lengkap" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="no_telp" name="no_telp" value="<?php echo e($user->no_telp); ?>" placeholder="No. Telp" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="file" id="foto" name="foto">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<img src="uploads/<?php echo e($user->foto); ?>" style="width:300px;" alt="">
						</div>
					</div>

					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 offset-md-12">
							<button type="submit" class="btn btn-success btn-sm">Ubah Profil</button>
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
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/profil/create.blade.php ENDPATH**/ ?>