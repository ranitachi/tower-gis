<?php $__env->startSection('content'); ?>
<div class="main-content">
        <div class="main-content-inner">
          <div class="page-content" style="padding: 0px !important;">
            <div class="ace-settings-container" id="ace-settings-container">
              <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-align-justify bigger-130"></i>
              </div>

              <div class="ace-settings-box clearfix" id="ace-settings-box" style="min-height:450px;">
                <div class="pull-left width-100">
                  <div class="ace-settings-item">
                    <!-- <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" /> -->
                     <div class="row">
                      <label class="lbl col-xs-12" for="ace-settings-navbar">Vendor/Perusahaan</label>
                      <div class="col-sm-12">
                        <div class="">
                          <select name="vendor" id="vendor" onchange="setpetavendor(this.value)">
                          <option value="">-Pilih Vendor-</option>
                          <?php $__currentLoopData = $vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v->id); ?>__<?php echo e($v->nama_vendor); ?>"><?php echo e($v->nama_vendor); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="ace-settings-item">
                    <!-- <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" /> -->
                     <div class="row">
                      <label class="lbl col-xs-12" for="ace-settings-navbar">Operator</label>
                      <div class="col-sm-12">
                        <div class="" id="opr">
                          <select name="operator" id="operator">
                             <option value="">-Pilih Operator-</option>
                              <?php $__currentLoopData = $operator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->id); ?>__<?php echo e($v->nama_operator); ?>"><?php echo e($v->nama_operator); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                 
                  <div class="ace-settings-item">
                    <!-- <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" /> -->
                     <div class="row">
                      <label class="lbl col-xs-12" for="ace-settings-navbar">Site</label>
                      <div class="col-sm-12">
                        <div class="">
                          <select name="site" id="site" onchange="setpeta(this.value)">
                             <option value="">-Pilih Site-</option>
                              <?php $__currentLoopData = $site; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->id); ?>__<?php echo e($v->site_id); ?>__<?php echo e($v->operator_name); ?>__<?php echo e($v->lat_koord); ?>__<?php echo e($v->long_koord); ?>"><?php echo e($v->site_id); ?>-<?php echo e($v->operator_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                </div><!-- /.pull-left -->

               
              </div><!-- /.ace-settings-box -->
            </div>

            <div class="page-header">
              <h1>
                Map
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  
                </small>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div id="map_wrapper">
                  <div id="map_canvas" class="mapping"></div>
              </div>

                
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
<?php $__env->stopSection(); ?>

<style type="text/css">
  .ace-settings-box .ace-settings-item {
    max-height: 50px !important;margin-bottom: 35px !important;
  }
  #vendor_chosen,#operator_chosen,#site_chosen
  {
    width:100% !important;
  }
</style>
<?php echo $__env->make('front.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>