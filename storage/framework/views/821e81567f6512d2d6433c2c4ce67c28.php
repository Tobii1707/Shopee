<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List - Shopee Style</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
<header class="header">
    <div class="logo">
        <a href="/">Shopee</a>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Search for products...">
        <button>Search</button>
    </div>

    <!-- Biểu tượng giỏ hàng -->
    <div class="cart-icon">
    <a href="<?php echo e(route('cart.index')); ?>">
        🛒
        <!-- Hiển thị số lượng sản phẩm trong giỏ hàng nếu người dùng đã đăng nhập -->
        <span class="cart-count">
            <?php if(auth()->guard()->check()): ?>
                <?php echo e(Auth::user()->cartItems->sum('quantity')); ?>

            <?php else: ?>
                0
            <?php endif; ?>
        </span>
    </a>
</div>


    <!-- Biểu tượng người dùng và đăng xuất -->
    <div class="user-icon">
        <?php if(auth()->guard()->check()): ?>
            <!-- Hiển thị tên người dùng và nút đăng xuất -->
            <span><?php echo e(Auth::user()->name); ?></span>
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="logout-button">Logout</button>
            </form>
        <?php else: ?>
            <!-- Nếu chưa đăng nhập, hiển thị icon người dùng -->
            <a href="<?php echo e(route('login')); ?>">
                👤
            </a>
        <?php endif; ?>
    </div>
</header>

<main class="main-content">
    <aside class="sidebar">
        <h3>Categories</h3>
        <ul>
            <li><a href="#">Electronics</a></li>
            <li><a href="#">Clothing</a></li>
            <li><a href="#">Beauty</a></li>
            <li><a href="#">Home Appliances</a></li>
        </ul>
    </aside>

    <section class="product-list">
        <h2>Featured Products</h2>

        <div class="product-cards">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-card">
                    <img src="<?php echo e(asset('images/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>">
                    <h3><?php echo e($product->name); ?></h3>
                    <p class="price">$<?php echo e($product->price); ?></p>

                    <!-- Form để thêm sản phẩm vào giỏ hàng và chọn số lượng -->
                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" class="add-to-cart-button">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</main>

<footer class="footer">
    <p>&copy; 2025 Shopee Clone - All rights reserved</p>
</footer>
</body>
</html>
<?php /**PATH C:\Users\Admin\Desktop\New folder\New\resources\views/products/index.blade.php ENDPATH**/ ?>