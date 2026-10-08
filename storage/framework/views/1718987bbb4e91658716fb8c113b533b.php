

<?php $__env->startSection('content'); ?>

<style>
    /* Dark Blue Theme Colors */
    :root {
        --dark-blue-primary: #0a1929;
        --dark-blue-secondary: #1e3a6f;
        --dark-blue-accent: #3b82f6;
        --dark-blue-light: #4fc3f7;
        --dark-blue-glow: rgba(59, 130, 246, 0.4);
        --dark-blue-surface: #132f4c;
        --dark-blue-success: #00b09b;
        --dark-blue-danger: #ff6b6b;
    }

    /* Page Background Animation */
    body {
        background: linear-gradient(135deg, #0a1929 0%, #1a3650 50%, #0a1929 100%);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
        min-height: 100vh;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Card Entrance Animation */
    .card {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
        animation: cardEntrance 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        background: linear-gradient(145deg, #102a41, #0b1c2f);
        border: 1px solid var(--dark-blue-accent);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        overflow: hidden;
        position: relative;
    }

    @keyframes cardEntrance {
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Glowing Border Effect */
    .card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, 
            var(--dark-blue-accent), 
            var(--dark-blue-light), 
            var(--dark-blue-accent));
        border-radius: 12px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.5s ease;
        animation: borderGlow 3s linear infinite;
    }

    .card:hover::before {
        opacity: 0.5;
    }

    @keyframes borderGlow {
        0%, 100% { filter: blur(5px); }
        50% { filter: blur(10px); }
    }

    /* Card Header Styling */
    .card-header {
        background: linear-gradient(135deg, var(--dark-blue-secondary), var(--dark-blue-primary));
        border-bottom: 2px solid var(--dark-blue-accent);
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .card-header h3 {
        color: white;
        text-shadow: 0 0 10px var(--dark-blue-glow);
        animation: headerPulse 3s ease-in-out infinite;
        position: relative;
        z-index: 1;
    }

    @keyframes headerPulse {
        0%, 100% { text-shadow: 0 0 10px var(--dark-blue-glow); }
        50% { text-shadow: 0 0 20px var(--dark-blue-light), 0 0 30px var(--dark-blue-accent); }
    }

    /* Floating Particles Effect */
    .card-header::before {
        content: '⚡';
        position: absolute;
        top: -20px;
        right: -20px;
        font-size: 100px;
        opacity: 0.1;
        transform: rotate(15deg);
        animation: floatParticle 6s linear infinite;
    }

    .card-header::after {
        content: '●';
        position: absolute;
        bottom: -30px;
        left: -30px;
        font-size: 150px;
        opacity: 0.1;
        animation: floatParticle 8s linear infinite reverse;
    }

    @keyframes floatParticle {
        0% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(180deg) scale(1.2); }
        100% { transform: rotate(360deg) scale(1); }
    }

    /* Success message animation */
    .alert-success {
        background: linear-gradient(135deg, #00b09b, #96c93d) !important;
        border: none;
        color: white;
        animation: slideDown 0.5s ease-out, glowPulse 2s infinite;
        box-shadow: 0 0 20px rgba(0, 176, 155, 0.5);
    }

    @keyframes glowPulse {
        0%, 100% { box-shadow: 0 0 20px rgba(0, 176, 155, 0.5); }
        50% { box-shadow: 0 0 30px rgba(0, 176, 155, 0.8); }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Table Styling with Dark Theme */
    .table {
        color: #e0e0e0;
        border-collapse: separate;
        border-spacing: 0 8px;
        margin: 0;
    }

    .table thead th {
        background: linear-gradient(135deg, var(--dark-blue-secondary), var(--dark-blue-primary));
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        border: none;
        padding: 15px;
        position: relative;
        overflow: hidden;
    }

    /* Shimmer Effect on Table Headers */
    .table thead th::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -60%;
        width: 20%;
        height: 200%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255, 255, 255, 0.2), 
            transparent);
        transform: rotate(25deg);
        animation: headerShimmer 3s infinite;
    }

    @keyframes headerShimmer {
        0% { left: -60%; }
        100% { left: 160%; }
    }

    /* Table Row Animations */
    .table tbody tr {
        background: linear-gradient(135deg, #1a3450, #0f2740);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        opacity: 0;
        animation: rowEntrance 0.5s ease-out forwards;
    }

    @keyframes rowEntrance {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Staggered Row Animation */
    .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .table tbody tr:nth-child(5) { animation-delay: 0.5s; }
    .table tbody tr:nth-child(6) { animation-delay: 0.6s; }
    .table tbody tr:nth-child(7) { animation-delay: 0.7s; }
    .table tbody tr:nth-child(8) { animation-delay: 0.8s; }
    .table tbody tr:nth-child(9) { animation-delay: 0.9s; }
    .table tbody tr:nth-child(10) { animation-delay: 1s; }

    .table tbody tr:hover {
        transform: scale(1.02) translateY(-2px);
        background: linear-gradient(135deg, #1e3f60, #143652);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    }

    .table td {
        padding: 15px;
        border: none;
        color: #e0e0e0;
        position: relative;
    }

    /* ID Column Special Effect */
    .table td:first-child {
        font-weight: bold;
        color: var(--dark-blue-light);
        text-shadow: 0 0 5px var(--dark-blue-glow);
        animation: countUp 0.5s ease-out;
    }

    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Action Buttons Styling */
    .btn-primary, .btn-danger {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
        padding: 8px 15px;
        margin: 0 3px;
        border-radius: 20px;
        font-weight: 500;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--dark-blue-accent), var(--dark-blue-light));
    }

    .btn-danger {
        background: linear-gradient(135deg, #ff6b6b, #ee5253);
    }

    /* Button Ripple Effect */
    .btn-primary::before, .btn-danger::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-primary:hover::before, .btn-danger:hover::before {
        width: 150px;
        height: 150px;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px var(--dark-blue-glow);
    }

    .btn-danger:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(255, 107, 107, 0.5);
    }

    /* Edit Button Icon Animation */
    .btn-primary {
        position: relative;
        padding-left: 35px;
    }

    .btn-primary::after {
        content: '✎';
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        transition: transform 0.3s ease;
    }

    .btn-primary:hover::after {
        transform: translateY(-50%) rotate(90deg);
    }

    /* Delete Button Icon Animation */
    .btn-danger {
        position: relative;
        padding-left: 35px;
    }

    .btn-danger::after {
        content: '🗑';
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        transition: transform 0.3s ease;
    }

    .btn-danger:hover::after {
        transform: translateY(-50%) scale(1.2);
    }

    /* Back Button Styling */
    .btn-warning {
        background: linear-gradient(135deg, var(--dark-blue-secondary), var(--dark-blue-primary));
        border: 2px solid var(--dark-blue-accent);
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 12px 30px;
        border-radius: 30px;
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .btn-warning::before {
        content: '←';
        position: absolute;
        left: -30px;
        transition: left 0.3s ease;
        font-size: 20px;
    }

    .btn-warning:hover {
        transform: translateX(-5px);
        padding-left: 45px;
        background: linear-gradient(135deg, var(--dark-blue-accent), var(--dark-blue-light));
        border-color: white;
        box-shadow: 0 10px 25px var(--dark-blue-glow);
    }

    .btn-warning:hover::before {
        left: 20px;
    }

    /* Ripple Effect on Back Button */
    .btn-warning::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-warning:active::after {
        width: 300px;
        height: 300px;
    }

    /* Table Container Animation */
    .table-responsive {
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }

    /* Cosmic Background Effect */
    .card-body {
        position: relative;
        overflow: hidden;
    }

    .card-body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(79, 195, 247, 0.1) 0%, transparent 50%);
        pointer-events: none;
        animation: cosmicMove 20s ease-in-out infinite;
    }

    @keyframes cosmicMove {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }

    /* Delete Confirmation Dialog Styling */
    .btn-danger[onclick] {
        cursor: pointer;
    }

    /* Empty State Animation */
    .table tbody:empty::before {
        content: '📋 No tasks available for editing';
        display: block;
        text-align: center;
        padding: 40px;
        color: var(--dark-blue-light);
        font-size: 1.2rem;
        animation: emptyPulse 2s infinite;
    }

    @keyframes emptyPulse {
        0%, 100% { opacity: 0.7; }
        50% { opacity: 1; }
    }

    /* Scrollbar Styling */
    .table-responsive::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: var(--dark-blue-primary);
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--dark-blue-accent), var(--dark-blue-light));
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, var(--dark-blue-light), var(--dark-blue-accent));
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .table td, .table th {
            padding: 10px;
            font-size: 0.9rem;
        }
        
        .btn-primary, .btn-danger {
            padding: 6px 12px;
            font-size: 0.8rem;
            margin: 2px;
        }
        
        .btn-primary {
            padding-left: 28px;
        }
        
        .btn-primary::after {
            left: 8px;
            font-size: 14px;
        }
        
        .btn-danger {
            padding-left: 28px;
        }
        
        .btn-danger::after {
            left: 8px;
            font-size: 14px;
        }
        
        .btn-warning {
            padding: 10px 25px;
            font-size: 0.9rem;
        }
    }

    /* Hover effect for table cells */
    .table td:hover {
        color: white;
        transition: color 0.3s ease;
    }

    /* Animation for action buttons container */
    .table td:last-child {
        white-space: nowrap;
    }
</style>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header">
                <h3 class="text-center">
                    <i class="fas fa-edit me-2"></i>Edit Task
                    <i class="fas fa-tasks ms-2"></i>
                </h3>
            </div>

            <div class="card-body shadow">

                <?php if(session('message')): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag me-1"></i>ID</th>
                                <th><i class="fas fa-pencil-alt me-1"></i>Task Name</th>
                                <th><i class="fas fa-calendar-alt me-1"></i>Date</th>
                                <th><i class="fas fa-clock me-1"></i>Time</th>
                                <th><i class="fas fa-cogs me-1"></i>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>#<?php echo e(str_pad($task->id, 3, '0', STR_PAD_LEFT)); ?></td>
                                <td><?php echo e($task->task_name); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($task->task_date)->format('M d, Y')); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($task->task_time)->format('h:i A')); ?></td>

                                <td>
                                    <a href="/updateTask/<?php echo e($task->id); ?>" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>

                                    <a href="/deleteTask/<?php echo e($task->id); ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('⚠️ Are you sure you want to delete this task? This action cannot be undone.')">
                                        Delete
                                    </a>
                                </td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    <div class="empty-state">
                                        <i class="fas fa-clipboard-list fa-3x mb-3" style="color: var(--dark-blue-light);"></i>
                                        <h4 style="color: white;">No Tasks Found</h4>
                                        <p style="color: #a0a0a0;">There are no tasks available for editing.</p>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>

                <div class="text-center">
                    <a href="/home" class="btn btn-warning mt-3">
                        <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel_project\myApp\resources\views/myTask/editmyTask.blade.php ENDPATH**/ ?>