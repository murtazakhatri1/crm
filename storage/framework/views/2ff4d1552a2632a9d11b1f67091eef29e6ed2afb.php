<?php $__env->startSection('content'); ?>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo e(URL::to('employees')); ?>">Employees Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="<?php echo e(URL::to('employees')); ?>">View All Employees</a></li>
        <li><a href="<?php echo e(URL::to('employees/create')); ?>">Create a Employees</a>
         <li><a href="<?php echo e(URL::to(app()->getLocale(),'home')); ?>">Back To Dashboard</a></li>
    </ul>
</nav>

<h1>All the Employees</h1>

<!-- will be used to show any messages -->
<?php if(Session::has('message')): ?>
    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Company Name</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $all_employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($value->id); ?></td>
            <td><?php echo e($value->FindCompany->name??"NA"); ?></td>
            <td><?php echo e($value->first_name); ?></td>
            <td><?php echo e($value->last_name); ?></td>
            <td><?php echo e($value->email); ?></td>
            <td><?php echo e($value->phone); ?></td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="<?php echo e(URL::to('employees/' . $value->id)); ?>">Show this Employee</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="<?php echo e(URL::to('employees/' . $value->id . '/edit')); ?>">Edit this Employee</a>

                 <br><br>
                <form action="<?php echo e(action('EmployeeController@destroy',$value->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-small btn-danger" type="submit">Delete this Employee</button>   
                </form>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="text-right">
    <?php echo e($all_employees->links()); ?>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>