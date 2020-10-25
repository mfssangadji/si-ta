
<?php $__env->startSection('title', 'SI-TA'); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-title">
        

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>INFORMASI <small>Bimbingan Tugas Akhir</small></h2>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="col-md-8 col-lg-8 col-sm-7">
                <!-- blockquote -->
                <blockquote>
                  <h4><?php echo e($informasi->judul); ?></h4>
                  <p><?php echo $informasi->deskripsi; ?></p>
                </blockquote>
              </div>
              <div class="col-md-4 col-lg-4 col-sm-5">
                <h1>STMIK</h1>
                <h2>Tidore Mandiri</h2>
                <h3>Bimbingan Tugas Akhir</h3>
                <h1>Wisuda</h1>
                <h5>Sukses....</h5>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webpanel.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\scripty\si-ta\resources\views/webpanel/dashboard.blade.php ENDPATH**/ ?>