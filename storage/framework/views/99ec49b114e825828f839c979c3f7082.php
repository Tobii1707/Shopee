<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Shopee Style</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/cart-style.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="cart-content">
        <h2>Your Cart</h2>
        
        <?php
            // Lấy tất cả sản phẩm trong giỏ của người dùng đã đăng nhập
            $cartItems = Auth::user()->cartItems;
        ?>

        <?php if(count($cartItems) > 0): ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e(asset('images/'.$item->product->image)); ?>" alt="<?php echo e($item->product->name); ?>"></td>
                            <td><?php echo e($item->product->name); ?></td>
                            <td>$<?php echo e($item->product->price); ?></td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td>$<?php echo e($item->product->price * $item->quantity); ?></td>
                            <td>
                                <form action="<?php echo e(route('cart.remove', $item->product_id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="remove-button">
                                        <i class="fas fa-trash-alt"></i> Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="cart-total">
                <p>Total: $<?php echo e($cartItems->sum(fn($item) => $item->product->price * $item->quantity)); ?></p>
            </div>

            <div class="back-button">
                <a href="<?php echo e(route('products.index')); ?>" class="back-btn">Back to Shopping</a>
            </div>

            <div class="checkout-button">
                <a href="#" class="checkout-btn">Proceed to Checkout</a>
            </div>

        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Admin\Desktop\New folder\New\resources\views/cart/index.blade.php ENDPATH**/ ?>