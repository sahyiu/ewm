<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

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
            <!-- User Profile Section -->
    <div class="flex flex-col items-center mb-6">
        <!-- User Profile Picture -->
        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-700 mb-3">
            <img 
                src="<?php echo e(Auth::user()->profile_photo_url ?? asset('images/default-profile.png')); ?>" 
                alt="Profile Picture" 
                class="w-full h-full object-cover"
            >
        </div>
        <!-- User Name -->
        <div class="text-center">
            <h3 class="text-lg font-bold"><?php echo e(Auth::user()->name ?? 'Guest'); ?></h3>
            <p class="text-sm text-gray-400"><?php echo e(Auth::user()->email ?? ''); ?></p>
        </div>
    </div>
        <h2 class="text-2xl mb-4">Menu</h2>
        <ul>
        <li class="mb-4">
        <a href="<?php echo e(route('admin.releaseStudentNo')); ?>" 
           class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
            RELEASE STUDENT No. RANGE</a></li>
    <li class="mb-4">
        <a href="<?php echo e(route('admin.schedule')); ?>" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        SCHEDULE</a></li>
    <li class="mb-4">
        <a href="<?php echo e(route('admin.instructor')); ?>" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        INSTRUCTORS</a></li>
    <li class="mb-4">
        <a href="<?php echo e(route('admin.instructor')); ?>" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        COURSES</a></li>
    <li class="mb-4">
        <a href="<?php echo e(route('admin.instructor')); ?>" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        USERS</a></li>
    <li class="mb-4">
        <a href="<?php echo e(route('admin.billings')); ?>" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        BILLINGS</a></li>
            </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6 border border-gray-300 p-4">
        <h1 class="text-4xl font-semibold mb-4">Instructors</h1>

        <!-- Search Bar -->
        <form method="GET" action="<?php echo e(route('admin.schedule')); ?>" class="mb-6"> <!-- Add margin-bottom -->
            <input type="text" name="search" placeholder="Search by name or ID" value="<?php echo e(request('search')); ?>">
            <button type="submit">Search</button>
        </form>

        <a href="<?php echo e(route('admin.instructor.new')); ?>">
            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow mb-4 flex items-center justify-center">
                <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                <span class="relative text-black group-hover:text-white">Add New Instructor</span>
            </button>
        </a>

   <!-- Instructors Table -->
<table>
    <thead>
        <tr class="bg-transparent">
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">ID</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">First Name</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Last Name</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Email</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Contact Number</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="p-4 align-middle w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($instructor->id); ?></td>
                <td class="p-4 align-middle w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($instructor->FirstName); ?></td>
                <td class="p-4 align-middle w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($instructor->LastName); ?></td>
                <td class="p-4 align-middle w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($instructor->Email); ?></td>
                <td class="p-4 align-middle w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($instructor->ContactNumber); ?></td>
                <td class="p-4 align-middle w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">
                    <a href="<?php echo e(route('admin.instructor.edit', $instructor->id)); ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="p-4 align-middle w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10 text-center text-sm text-gray-500">No instructors found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html><?php /**PATH C:\Users\User\OneDrive\Desktop\ewan\Enrollment_sys\resources\views/admin/instructor.blade.php ENDPATH**/ ?>