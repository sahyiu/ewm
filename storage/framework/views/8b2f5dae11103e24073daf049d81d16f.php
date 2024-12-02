<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?> - Edit Instructor</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4">
            <div class="flex flex-col items-center mb-6">
                <!-- Profile Picture -->
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-700 mb-3">
                    <img 
                        src="<?php echo e(Auth::user()->profile_photo_url ?? asset('images/default-profile.png')); ?>" 
                        alt="Profile Picture" 
                        class="w-full h-full object-cover"
                    >
                </div>
                <!-- User Info -->
                <div class="text-center">
                    <h3 class="text-lg font-bold"><?php echo e(Auth::user()->name ?? 'Guest'); ?></h3>
                    <p class="text-sm text-gray-400"><?php echo e(Auth::user()->email ?? ''); ?></p>
                </div>
            </div>
            <!-- Menu -->
            <nav>
                <h2 class="text-2xl mb-4">Menu</h2>
                <ul class="space-y-2">
    <li class="mb-4">
        <a href="<?php echo e(route('admin.releaseStudentNo')); ?>" 
           class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
            RELEASE STUDENT No. RANGE</a></li>
    <li class="mb-4">
        <a href="<?php echo e(route('admin.schedule')); ?>" 
        class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
        SCHEDULE STUDENT</a></li>
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

            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 mx-auto mt-10 px-6 bg-white shadow-lg rounded-lg max-w-3xl">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="<?php echo e(url()->previous()); ?>" class="inline-block text-blue-500 hover:text-blue-700">
                    ← Back to Previous Page
                </a>
            </div>

            <!-- Header -->
            <header class="mb-6">
                <h1 class="text-2xl font-bold">Edit Instructor</h1>
            </header>

            <!-- Success Message -->
            <?php if(session('success')): ?>
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Form -->
            <form method="POST" action="<?php echo e(route('admin.instructor.update', $instructor->id)); ?>" class="space-y-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div>
                    <label for="FirstName" class="block text-gray-700 font-medium">First Name</label>
                    <input 
                        type="text" 
                        name="FirstName" 
                        value="<?php echo e($instructor->FirstName); ?>" 
                        placeholder="Enter First Name" 
                        required 
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300"
                    >
                </div>

                <div>
                    <label for="LastName" class="block text-gray-700 font-medium">Last Name</label>
                    <input 
                        type="text" 
                        name="LastName" 
                        value="<?php echo e($instructor->LastName); ?>" 
                        placeholder="Enter Last Name" 
                        required 
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300"
                    >
                </div>

                <div>
                    <label for="Email" class="block text-gray-700 font-medium">Email</label>
                    <input 
                        type="email" 
                        name="Email" 
                        value="<?php echo e($instructor->Email); ?>" 
                        placeholder="Enter Email Address" 
                        required 
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300"
                    >
                </div>

                <div>
                    <label for="ContactNumber" class="block text-gray-700 font-medium">Contact Number</label>
                    <input 
                        type="text" 
                        name="ContactNumber" 
                        value="<?php echo e($instructor->ContactNumber); ?>" 
                        placeholder="Enter Contact Number" 
                        required 
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300"
                    >
                </div>

                <div>
                    <button 
                        type="submit" 
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition"
                    >
                        Update Instructor
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\Users\User\OneDrive\Desktop\ewan\Enrollment_sys\resources\views/admin/instructor/edit.blade.php ENDPATH**/ ?>