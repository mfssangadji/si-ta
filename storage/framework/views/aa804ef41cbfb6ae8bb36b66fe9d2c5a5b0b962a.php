
<?php $__env->startSection('title', 'Sesi Bimbingan TA'); ?>
<?php $__env->startSection('content'); ?>
	    <div class="x_panel">
		<div class="bs-example" data-example-id="simple-jumbotron">
			<div class="jumbotron" style="padding:15px;">
				<h3>Bimbingan:</h3>
				<p><?php echo e($sesi->sesi_konsultasi); ?></p>
			</div>
		</div>
		<ul class="list-unstyled timeline">
			<?php $__currentLoopData = $konsultasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($k->msg_status == 2): ?>
					<li>
						<div class="block">
						<div class="tags">
							<a href="" class="badge badge-info">
							<span><?php echo e($k->sesi->bimbingan->mahasiswa->nama_lengkap); ?></span>
							</a>
						</div>
						<div class="block_content">
							
							<div class="byline">
							<span><?php echo e($k->created_at->diffForHumans()); ?></span> oleh <a><?php echo e($k->sesi->bimbingan->mahasiswa->nama_lengkap); ?></a>
							</div>
							<p class="excerpt">
								<?php echo e($k->deskripsi); ?> <br>
								<?php if($k->lampiran != ""): ?>
								<span class='badge badge-danger'>
								<a target="_blank" href="<?php echo e(url('bimbingan-mahasiswa/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/dosen/'.Request::segment(6).'/konsultasi/'.$k->id)); ?>" style='color:#FFF'>Download Lampiran</a>
								</span>
								<?php endif; ?>
							</p>
						</div>
						</div>
					</li>
				<?php elseif($k->msg_status == 1): ?>
					<li>
						<div class="block">
						<div class="tags">
							<a href="" class="badge badge-warning">
							<span><?php echo e($k->sesi->bimbingan->dosen->nama_lengkap); ?></span>
							</a>
						</div>
						<div class="block_content">
							
							<div class="byline">
							<span><?php echo e($k->created_at->diffForHumans()); ?></span> oleh <a><?php echo e($k->sesi->bimbingan->dosen->nama_lengkap); ?></a>
							</div>
							<p class="excerpt">
								<?php echo e($k->deskripsi); ?> <br>
								<?php if($k->lampiran != ""): ?>
								<span class='badge badge-danger'>
								<a target="_blank" href="<?php echo e(url('bimbingan-mahasiswa/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/dosen/'.Request::segment(6).'/konsultasi/'.$k->id)); ?>" style='color:#FFF'>Download Lampiran</a>
								</span>
								<?php endif; ?>
							</p>
						</div>
						</div>
					</li>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
		<?php if($sesi->status == 0): ?>
			<form id="demo-form2" method="post" action="<?php echo e(url('bimbingan-mahasiswa/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4).'/dosen/'.Request::segment(6).'/konsultasi')); ?>" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
				<?php echo csrf_field(); ?>

				<div class="item form-group">
					<div class="col-md-12 col-sm-12 ">
						<textarea name="deskripsi" id="" required='required' class="form-control"></textarea>
					</div>
				</div>
				<div class="item form-group">
					<div class="col-md-12 col-sm-12 ">
						<input type="file" name="lampiran[]" multiple class="">
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="item form-group">
					<div class="col-md-12 col-sm-12 offset-md-12">
						<button type="submit" class="btn btn-success btn-sm">Kirim Pesan</button>
						<button class="btn btn-primary btn-sm" onclick="self.history.back()" type="reset">Batal</button>
					</div>
				</div>
			</form>
		<?php else: ?>
			<form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left">
				<button class="btn btn-info btn-sm" onclick="self.history.back()" type="button" style="width:100%">Sesi Konsultasi ini sudah selesai, tekan untuk kembali</button>	
			</form>
		<?php endif; ?>
		
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/bimbingan/mahasiswa/sesi/konsultasi/index.blade.php ENDPATH**/ ?>