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
        <h2 class="text-2xl mb-4">Menu</h2>
        <ul>
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
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6 border border-gray-300 p-4">
        <h1 class="text-2xl font-semibold mb-4">Student Schedule</h1>

        <!-- Success Message -->
        <?php if(session('success')): ?>
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Schedule Search Form -->
        <form method="GET" action="<?php echo e(route('admin.schedule')); ?>" class="mb-4">
            <input type="text" name="search" id="search" value="<?php echo e(request('search')); ?>" class="mb-4 px-4 py-2 border border-gray-300 rounded-md w-full" placeholder="Search for a student...">
        </form>

        <!-- New Schedule Form -->
        <form method="POST" action="<?php echo e(route('admin.schedule.store')); ?>" class="mb-4">
            <?php echo csrf_field(); ?>
            <h1 class="text-2xl mb-4">Create Schedule</h1>
            <div class="grid grid-cols-2 gap-4">
                
                <div>
                    <label for="CourseID" class="block">Course ID</label>
                    <input type="text" name="CourseID" id="CourseID" required class="border p-2 w-full">
                </div>
                <div>
                    <label for="InstructorID" class="block">Instructor ID</label>
                    <input type="text" name="InstructorID" id="InstructorID" required class="border p-2 w-full">
                </div>
                <div>
                    <label for="Day" class="block">Day</label>
                    <select name="Day" id="Day" required class="border p-2 w-full">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                </div>
                <div>
                    <label for="Time" class="block">Start Time</label>
                    <input type="time" name="Time" id="Time" required class="border p-2 w-full">
                </div>
                <div>
                    <label for="Time_end" class="block">End Time</label>
                    <input type="time" name="Time_end" id="Time_end" required class="border p-2 w-full">
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 mt-4 rounded">Add Schedule</button>
        </form>

        <!-- Schedule Table -->
        <table class="table-auto border-collapse w-full text-left border border-gray-300">
    <thead>
        <tr class="bg-transparent">
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Student ID</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Schedule ID</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Last Name</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">First Name</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Year Level</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Section</th>
            <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 cursor-pointer pl-5 pr-4 pt-2 text-start border-zinc-800">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($schedule->StudentID); ?></td>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($schedule->ScheduleID); ?></td>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($schedule->LastName); ?></td>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($schedule->FirstName); ?></td>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($schedule->YearLevel); ?></td>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10"><?php echo e($schedule->Section); ?></td>
                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10">
                    <a href="<?php echo e(route('admin.schedule.edit', $schedule->ScheduleID)); ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7" class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-max border-b-[1px] py-5 pl-5 pr-4 border-white/10 text-center text-sm text-gray-500">No schedules found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


    </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\User\OneDrive\Desktop\ewan\Enrollment_sys\resources\views/admin/schedule.blade.php ENDPATH**/ ?>