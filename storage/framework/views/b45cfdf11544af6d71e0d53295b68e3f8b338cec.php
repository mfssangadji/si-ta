
<?php $__env->startSection('title', 'Ubah Sesi Konsultasi Bimbingan TA'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
			<div class="x_title">
				<i>Ubah Sesi Konsultasi</i>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<center>
					<i>Ubah Sesi Bimbingan Konsultasi</i>
					<p>
						<?php echo e($bimbingan->judul_ta); ?> <br>
						Oleh: <strong><?php echo e($bimbingan->mahasiswa->nama_lengkap); ?></strong>
					</p>
				</center>
				<form id="demo-form2" method="post" action="<?php echo e(url('bimbingan-dosen/'.$bimbingan->id.'/'.$sesi->id)); ?>" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo csrf_field(); ?>
					<?php echo method_field('PATCH'); ?>
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="sesi_konsultasi" value="<?php echo e($sesi->sesi_konsultasi); ?>" placeholder="Sesi Konsultasi" name="sesi_konsultasi" required="required" class="form-control ">
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
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/bimbingan/dosen/sesi/edit.blade.php ENDPATH**/ ?>