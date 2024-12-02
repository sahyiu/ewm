


<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Edit Schedule</h1>

        <form method="POST" action="<?php echo e(route('admin.schedule.update', $schedule->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>  <!-- This tells Laravel to treat this as a PUT request -->
    
    <div>
        <label for="CourseID">Course ID</label>
        <input type="text" name="CourseID" id="CourseID" value="<?php echo e($schedule->CourseID); ?>" required>
    </div>
    <div>
        <label for="InstructorID">Instructor ID</label>
        <input type="text" name="InstructorID" id="InstructorID" value="<?php echo e($schedule->InstructorID); ?>" required>
    </div>
    <div>
        <label for="Day">Day</label>
        <input type="text" name="Day" id="Day" value="<?php echo e($schedule->Day); ?>" required>
    </div>
    <div>
        <label for="Time">Start Time</label>
        <input type="time" name="Time" id="Time" value="<?php echo e($schedule->Time); ?>" required>
    </div>
    <div>
        <label for="Time_end">End Time</label>
        <input type="time" name="Time_end" id="Time_end" value="<?php echo e($schedule->Time_end); ?>" required>
    </div>
    <button type="submit">Update Schedule</button>
</form>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\ewan\Enrollment_sys\resources\views/admin/schedule/edit.blade.php ENDPATH**/ ?>