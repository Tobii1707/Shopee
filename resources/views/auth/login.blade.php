<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Shopee Style</title>
    <!-- Nhúng file CSS vào trang, sử dụng Laravel helper `secure_asset()` để đảm bảo file CSS được tải qua HTTPS -->
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
</head>
<body>
    <!-- Phần tiêu đề trang -->
    <header class="header">
        <div class="logo">
            <!-- Logo Shopee, khi nhấp vào sẽ trở về trang chủ -->
            <a href="/">Shopee</a>
        </div>
    </header>

    <!-- Phần nội dung chính -->
    <main class="auth-form">
        <h2>Login</h2>
        <!-- Biểu mẫu đăng nhập, gửi dữ liệu đến route 'login' bằng phương thức POST -->
        <form action="{{ route('login') }}" method="POST">
            <!-- Token bảo vệ chống CSRF -->
            @csrf

            <!-- Trường nhập Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                <!-- Hiển thị lỗi nếu có -->
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Trường nhập Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <!-- Hiển thị lỗi nếu có -->
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nút submit -->
            <button type="submit">Login</button>
        </form>

        <!-- Liên kết đến trang đăng ký tài khoản -->
        <div class="link">
            <p>Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>
        </div>
    </main>

    <!-- Phần chân trang -->
    <footer class="footer">
        <p>&copy; 2025 Shopee Clone - All rights reserved</p>
    </footer>
</body>
</html>
