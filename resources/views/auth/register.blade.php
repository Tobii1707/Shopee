<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Shopee Style</title>
    <!-- Liên kết file CSS để tạo giao diện, sử dụng Laravel helper `secure_asset()` để đảm bảo tải file CSS qua HTTPS -->
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
        <h2>Register</h2>
        <!-- Form đăng ký, gửi dữ liệu đến route 'register' bằng phương thức POST -->
        <form action="{{ route('register') }}" method="POST">
            <!-- Token bảo vệ chống CSRF -->
            @csrf

            <!-- Trường nhập Name -->
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                <!-- Hiển thị lỗi nếu có -->
                @error('name')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trường nhập Email -->
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                <!-- Hiển thị lỗi nếu có -->
                @error('email')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trường nhập Password -->
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <!-- Hiển thị lỗi nếu có -->
                @error('password')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trường xác nhận Password -->
            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <!-- Nút submit -->
            <button type="submit">Register</button>
        </form>
    </main>

    <!-- Phần chân trang -->
    <footer class="footer">
        <p>&copy; 2025 Shopee Clone - All rights reserved</p>
    </footer>
</body>
</html>
