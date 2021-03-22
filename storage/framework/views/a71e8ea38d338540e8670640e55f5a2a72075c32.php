

<?php $__env->startSection('title', 'order List'); ?>
<?php $__env->startSection('content-header', 'Order List'); ?>
<?php $__env->startSection('content-actions'); ?>
<a href="<?php echo e(route('cart.index')); ?>" class="btn btn-primary">POS</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->total()); ?></td>
                    <td><?php echo e($order->created_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('orders.show', $order->id)); ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    </td>                  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>    
        </table>
        <?php echo e($orders->render()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CK nurse\resources\views/orders/index.blade.php ENDPATH**/ ?>