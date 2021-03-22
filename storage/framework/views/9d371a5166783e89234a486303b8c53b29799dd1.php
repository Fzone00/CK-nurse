

<?php $__env->startSection('title', 'Product List'); ?>  
<?php $__env->startSection('content-header', 'Product List'); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Barcode</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->image); ?></td>
                    <td><?php echo e($product->barcode); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->created_at); ?></td>
                    <td><?php echo e($product->updated_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>    
        </table>
        <?php echo e($products->render()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\C\resources\views/products/index.blade.php ENDPATH**/ ?>