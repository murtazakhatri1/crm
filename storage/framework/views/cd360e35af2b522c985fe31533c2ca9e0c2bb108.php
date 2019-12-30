<?php $__env->startSection('content'); ?>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo e(URL::to('companies')); ?>">Companies Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="<?php echo e(URL::to('companies')); ?>">View All Companies</a></li>
        <li><a href="<?php echo e(URL::to('companies/create')); ?>">Create a Companies</a>
        <li><a href="<?php echo e(URL::to(app()->getLocale(),'home')); ?>">Back To Dashboard</a></li>
    </ul>
</nav>

<h1>All the Companies</h1>

<!-- will be used to show any messages -->
<?php if(Session::has('message')): ?>
    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Logo</td>
            <td>Name</td>
            <td>Email</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $all_companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
             <td><?php echo e($value->id); ?></td>
            <td><img  height="60px" src="<?php echo e(asset('/storage/logo/'.$value->logo)); ?>" alt=""> </td>
            <td><?php echo e($value->name); ?></td>
            <td><?php echo e($value->email); ?></td>
            <td>
                <a class="btn btn-small btn-success" href="<?php echo e(URL::to('companies/' . $value->id)); ?>">Show this Company</a>
                <a class="btn btn-small btn-info" href="<?php echo e(URL::to('companies/' . $value->id . '/edit')); ?>">Edit this Company</a>   
                <br><br>
                <form action="<?php echo e(action('CompanyController@destroy',$value->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-small btn-danger" type="submit">Delete this Company</button>   
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="text-right">
    <?php echo e($all_companies->links()); ?>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>