
<?php $__env->startSection('title', 'Ubah Bimbingan TA'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
			<div class="x_title">
				<h2>Form Ubah <small><i>Bimbingan TA</i></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" method="post" action="<?php echo e(route('bimbingan').'/'.$bimbingan->id); ?>" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
          			<?php echo method_field('PATCH'); ?>
					<?php echo csrf_field(); ?>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<label>Mahasiswa</label>
							<select class="form-control select2" multiple="multiple" id="mahasiswa_id" name="mahasiswa_id" data-placeholder="">
								<?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($bimbingan->mahasiswa_id == $mahasiswa->id): ?>
										<option value="<?php echo e($mahasiswa->id); ?>" selected>(NPM: <?php echo e($mahasiswa->npm); ?>) <?php echo e($mahasiswa->nama_lengkap); ?></option>
									<?php else: ?>
										<option value="<?php echo e($mahasiswa->id); ?>">(NPM: <?php echo e($mahasiswa->npm); ?>) <?php echo e($mahasiswa->nama_lengkap); ?></option>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<label>Pembimbing I</label>
							<select class="form-control select2" multiple="multiple" id="dosen_id1" name="dosen_id[]" data-placeholder="">
								<?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dosen1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($dosen1->id == $db[$bimbingan->mahasiswa_id]["dosen"][0]["id"]): ?>
										<option value="<?php echo e($dosen1->id); ?>" selected>(NIP: <?php echo e($dosen1->nip); ?>) <?php echo e($dosen1->nama_lengkap); ?></option>
									<?php else: ?>
										<option value="<?php echo e($dosen1->id); ?>">(NIP: <?php echo e($dosen1->nip); ?>) <?php echo e($dosen1->nama_lengkap); ?></option>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<label>Pembimbing II</label>
							<select class="form-control select2" multiple="multiple" id="dosen_id2" name="dosen_id[]" data-placeholder="">
								<?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dosen2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($dosen2->id == $db[$bimbingan->mahasiswa_id]["dosen"][1]["id"]): ?>
										<option value="<?php echo e($dosen2->id); ?>" selected>(NIP: <?php echo e($dosen2->nip); ?>) <?php echo e($dosen2->nama_lengkap); ?></option>
									<?php else: ?>
										<option value="<?php echo e($dosen2->id); ?>">(NIP: <?php echo e($dosen2->nip); ?>) <?php echo e($dosen2->nama_lengkap); ?></option>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="judul_ta" placeholder="Judul TA" value="<?php echo e($bimbingan->judul_ta); ?>" name="judul_ta" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="semester" placeholder="Semester" value="<?php echo e($bimbingan->semester); ?>" name="semester" required="required" class="form-control ">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input type="text" id="fakultas" value="<?php echo e($bimbingan->fakultas); ?>" placeholder="Fakultas" name="fakultas" required="required" class="form-control ">
						</div>
					</div>
					
					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input id="birthday" name="tanggal_mulai" value="<?php echo e($bimbingan->tanggal_mulai); ?>" class="date-picker form-control" placeholder="Tanggal Mulai" type="text" required="required" type="text" onfocus="this.type='date'" onclick="this.type='date'" onmouseout="timeFunctionLong(this)">
						</div>
					</div>

					<div class="item form-group">
						<div class="col-md-12 col-sm-12 ">
							<input id="birthday2" name="tanggal_akhir" value="<?php echo e($bimbingan->tanggal_akhir); ?>" class="date-picker form-control" placeholder="Tanggal Akhir" type="text" required="required" type="text" onfocus="this.type='date'" onclick="this.type='date'" onmouseout="timeFunctionLong(this)">
						</div>
					</div>

					<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
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
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/bimbingan/edit.blade.php ENDPATH**/ ?>