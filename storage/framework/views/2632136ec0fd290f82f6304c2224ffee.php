<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Release Student Number</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
  <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-2xl mb-4">Menu</h2>
            <ul>
                <!-- ADMIN SIDE BAR ITEMS -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-admin-dashboard')): ?>
                <li>
                    <a href="<?php echo e(route('admin.releaseStudentNo')); ?>" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                        RELEASE STUDENT No. RANGE
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('admin.schedule')); ?>" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                        SCHEDULE STUDENT
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('admin.billings')); ?>" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                        BILLINGS
                    </a>
                </li>

                <?php endif; ?>
        </div>
                    <!-- Main Content -->
                    <div class="flex-1">
            <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><main>
            <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Release Student Numbers</h1>

        <!-- Display Success Message -->
        <?php if(session('success')): ?>
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Display Errors -->
        <?php if($errors->any()): ?>
            <div class="bg-red-500 text-white p-4 mb-4 rounded">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Form for releasing student numbers -->
        <form method="POST" action="<?php echo e(route('admin.releaseStudentNo')); ?>">
            <?php echo csrf_field(); ?> <!-- CSRF token for security -->
            <div class="mb-4">
                <label for="start_student_no" class="block text-sm font-medium text-gray-700">Start Student Number</label>
                <input type="number" name="start_student_no" id="start_student_no" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="end_student_no" class="block text-sm font-medium text-gray-700">End Student Number</label>
                <input type="number" name="end_student_no" id="end_student_no" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Release Numbers
            </button>
        </form>

        <!-- Table for displaying enrollments -->
        <div class="mt-8">
            <h2 class="text-2xl mb-4">Enrolled Students</h2>

            <table class="table-auto border-collapse w-full text-left">
    <thead>
        <tr class="bg-transparent">
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">ID</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Student ID</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Last Name</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">First Name</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Course</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Year Level</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Semester</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Enrollment Date</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $enrollees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($enrollment->id); ?></td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($enrollment->StudentID ?? 'N/A'); ?></td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($enrollment->LastName); ?></td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($enrollment->FirstName); ?></td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($enrollment->Course); ?></td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($enrollment->YearLevel); ?></td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($enrollment->Semester); ?></td>
                <td class="p-4 align-middle border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e(\Carbon\Carbon::parse($enrollment->EnrollmentDate)->format('Y-m-d')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="11" class="border border-gray-400 px-4 py-2 text-center">No enrollments found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

        </div>
    </div>
            </main>
            </div>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>
      

            <!-- Page Content -->
            
        
</body>

<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

</html>
<?php /**PATH C:\Users\User\OneDrive\Desktop\ewan\Enrollment_sys\resources\views/admin/releaseStudentNo.blade.php ENDPATH**/ ?>