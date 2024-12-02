<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Admin Dashboard</title>

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
                <a href="<?php echo e(route('admin.schedule')); ?>" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                    INSTRUCTORS
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('admin.schedule')); ?>" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                    COURSES
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('admin.schedule')); ?>" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" style="margin-bottom : 10px">
                    USERS
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
        <h1 class="text-2xl mb-4">Asmin Dashboard</h1>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Enrolled Students Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-2xl font-bold mb-4">
                        Total Enrolled Students
                    </div>
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400">
                        <?php echo e($enrolledStudents); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\User\OneDrive\Desktop\ewan\Enrollment_sys\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>