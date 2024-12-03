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
                <a href="<?php echo e(route('admin.releaseStudentNo')); ?>" class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
                    RELEASE STUDENT No. RANGE</a>
            </li>
            <li class="mb-4">
                <a href="<?php echo e(route('admin.schedule')); ?>" class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
                    SCHEDULE</a>
            </li>
            <li class="mb-4">
                <a href="<?php echo e(route('admin.instructor')); ?>" class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
                    INSTRUCTORS</a>
            </li>
            <li class="mb-4">
                <a href="<?php echo e(route('admin.instructor')); ?>" class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
                    COURSES</a>
            </li>
            <li class="mb-4">
                <a href="<?php echo e(route('admin.instructor')); ?>" class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
                    USERS</a>
            </li>
            <li class="mb-4">
                <a href="<?php echo e(route('admin.billings')); ?>" class="block w-full text-center bg-transparent border-2 border-black-900 text-white px-4 py-3 rounded-md hover:bg-gray-100 hover:border-gray-700">
                    BILLINGS</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 mx-auto mt-10 px-6 bg-white shadow-lg rounded-lg max-w-3xl">
        <div class="mb-4">
            <!-- Back Button -->
            <a href="<?php echo e(url()->previous()); ?>" class="inline-block text-blue-500 hover:text-blue-700 mb-4">
                ← Back to Previous Page
            </a>
        </div>

        <h2 class="text-2xl font-bold mb-5">Edit Schedule</h2>
        <?php if(session('success')): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-5">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.schedule.update', $schedule->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label for="CourseID" class="block text-gray-700">Course ID</label>
                <input type="text" name="CourseID" id="CourseID" class="w-full p-2 border rounded" value="<?php echo e($schedule->CourseID); ?>" required>
                <?php $__errorArgs = ['CourseID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="InstructorID" class="block text-gray-700">Instructor ID</label>
                <input type="text" name="InstructorID" id="InstructorID" class="w-full p-2 border rounded" value="<?php echo e($schedule->InstructorID); ?>" required>
                <?php $__errorArgs = ['InstructorID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="StudentID" class="block text-gray-700">Student ID</label>
                <input type="text" name="StudentID" id="StudentID" class="w-full p-2 border rounded" value="<?php echo e($schedule->StudentID); ?>" required>
                <?php $__errorArgs = ['StudentID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="YearLevel" class="block text-gray-700">Year Level</label>
                <input type="text" name="YearLevel" id="YearLevel" class="w-full p-2 border rounded" value="<?php echo e($schedule->YearLevel); ?>" required>
                <?php $__errorArgs = ['YearLevel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="Section" class="block text-gray-700">Section</label>
                <input type="text" name="Section" id="Section" class="w-full p-2 border rounded" value="<?php echo e($schedule->Section); ?>" required>
                <?php $__errorArgs = ['Section'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="Day" class="block text-gray-700">Day</label>
                <input type="text" name="Day" id="Day" class="w-full p-2 border rounded" value="<?php echo e($schedule->Day); ?>" required>
                <?php $__errorArgs = ['Day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="Time" class="block text-gray-700">Start Time</label>
                <input type="time" name="Time" id="Time" class="w-full p-2 border rounded" value="<?php echo e($schedule->Time); ?>" required>
                <?php $__errorArgs = ['Time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="Time_end" class="block text-gray-700">End Time</label>
                <input type="time" name="Time_end" id="Time_end" class="w-full p-2 border rounded" value="<?php echo e($schedule->Time_end); ?>" required>
                <?php $__errorArgs = ['Time_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                Update Schedule
            </button>
        </form>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\User\OneDrive\Desktop\ewan\Enrollment_sys\resources\views/admin/schedule/edit.blade.php ENDPATH**/ ?>