<?php $__env->startSection('content'); ?>

<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo e(URL::to('companies')); ?>">Company Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="<?php echo e(URL::to('companies')); ?>">View All Companies</a></li>
        <li><a href="<?php echo e(URL::to('companies/create')); ?>">Create a Company</a></li>
        <li><a href="<?php echo e(URL::to(app()->getLocale(),'home')); ?>">Back To Dashboard</a></li>

    </ul>
</nav>

<h1>Create a Company</h1>
<form method="post" action="<?php echo e(URL::to('companies')); ?>"  enctype="multipart/form-data">
<?php echo csrf_field(); ?>


<div class="row">
<div class="col-sm-6 form-group">
 <label>Logo <span style="color: red">*</span></label>
 <input type="file" class="form-control" name="logo"  value="<?php echo e(old('logo')); ?>">
 <b style="color: red"><?php echo e($errors->first('logo')); ?></b>

</div>
<div class="col-sm-6 form-group">
 <label>Name <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
 <b style="color: red"><?php echo e($errors->first('name')); ?></b>
</div>

</div> 

<div class="row">
<div class="col-sm-6 form-group">
 <label>Email <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="email"  value="<?php echo e(old('email')); ?>" placeholder="abc@gmail.com">
  <b style="color: red"><?php echo e($errors->first('email')); ?></b>
</div>
</div> 

<div class="row">
    <div class="col-sm-6">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>