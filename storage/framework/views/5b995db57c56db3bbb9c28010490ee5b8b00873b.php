<script type="text/javascript">

</script>
<?php $__env->startSection('content'); ?>

<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo e(URL::to('employees')); ?>">Employee Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="<?php echo e(URL::to('employees')); ?>">View All Employees</a></li>
        <li><a href="<?php echo e(URL::to('employees/create')); ?>">Create a Employee</a></li>
         <li><a href="<?php echo e(URL::to(app()->getLocale(),'home')); ?>">Back To Dashboard</a></li>
    </ul>
</nav>

<h1>Create a Employee</h1>
<form method="post" action="<?php echo e(URL::to('employees')); ?>">
<?php echo csrf_field(); ?>
<div class="row">
<div class="col-sm-6 form-group">
 <label>Company <span style="color: red">*</span></label>
<select class="form-control company" name="company_id"> 
    <option value="" disabled="true" selected="">Please Select Company</option>
   <?php $__currentLoopData = $all_companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($value->id); ?>" <?php echo e(old('company_id') == $value->id ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</select>
 <b style="color: red"><?php echo e($errors->first('company_id')); ?></b>

</div>

<div class="col-sm-6 form-group">
 <label>First Name <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="first_name"  value="<?php echo e(old('first_name')); ?>">
  <b style="color: red"><?php echo e($errors->first('first_name')); ?></b>

</div>
</div>  

<div class="row">
<div class="col-sm-6 form-group">
 <label>Last Name <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="last_name"  value="<?php echo e(old('last_name')); ?>">
   <b style="color: red"><?php echo e($errors->first('last_name')); ?></b>

</div>
<div class="col-sm-6 form-group">
 <label>Email <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="abc@gmail.com">
    <b style="color: red"><?php echo e($errors->first('email')); ?></b>

</div>

</div> 

<div class="row">
<div class="col-sm-6 form-group">
 <label>Phone <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="phone" maxlength="12" placeholder="03xx-xxxxxxx" value="<?php echo e(old('phone')); ?>">
     <b style="color: red"><?php echo e($errors->first('phone')); ?></b>

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