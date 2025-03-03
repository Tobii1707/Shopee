# E-Commerce Website

## Giới thiệu
Đây là một trang web bán hàng trực tuyến được xây dựng bằng Laravel. Hệ thống cho phép người dùng đăng ký, đăng nhập, thêm sản phẩm vào giỏ hàng và xóa sản phẩm khỏi giỏ hàng.

## Chức năng chính
- Đăng ký và đăng nhập người dùng.
- Hiển thị danh sách sản phẩm.
- Thêm sản phẩm vào giỏ hàng.
- Xóa sản phẩm khỏi giỏ hàng.
- Quản lý phiên đăng nhập của người dùng.

## Luồng hoạt động của hệ thống
Hệ thống hoạt động theo sơ đồ sau:

1. Người dùng có thể đăng ký nếu chưa có tài khoản.
2. Sau khi đăng ký, người dùng đăng nhập vào hệ thống.
3. Tại trang chủ, người dùng có thể:
   - Xem danh sách sản phẩm.
   - Thêm sản phẩm vào giỏ hàng.
4. Trong giỏ hàng, người dùng có thể:
   - Xem danh sách sản phẩm đã thêm.
   - Xóa sản phẩm khỏi giỏ hàng.

![c:\Users\7520\Downloads\z6366837531365_2d8d2f8c06c6bca289411b4ad0fab36c.jpg](z6366837531365_2d8d2f8c06c6bca289411b4ad0fab36c.jpg)

## Cấu trúc cơ sở dữ liệu
Hệ thống sử dụng các bảng chính sau:

### Bảng `users`
- Lưu thông tin tài khoản người dùng.
- Trường chính: `id`, `name`, `email`, `password`, `created_at`, `updated_at`.

### Bảng `products`
- Lưu thông tin sản phẩm.
- Trường chính: `id`, `name`, `description`, `price`, `quantity`, `image`, `created_at`, `updated_at`.

### Bảng `cart_items`
- Lưu các sản phẩm được thêm vào giỏ hàng của từng người dùng.
- Trường chính: `id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`.

### Bảng `sessions`
- Quản lý phiên đăng nhập của người dùng.
- Trường chính: `id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`.

![User Flow](image.png)

## Hướng dẫn cài đặt
### Clone repository:
```bash
git clone <repository-url>
cd <project-folder>
```

### Cài đặt các dependency:
```bash
composer install
```

### Cấu hình môi trường:
1. Tạo file `.env` từ `.env.example`.
2. Cấu hình kết nối cơ sở dữ liệu trong file `.env`.

### Chạy migration để tạo bảng trong database:
```bash
php artisan migrate
```

### Khởi động ứng dụng:
```bash
php artisan serve
```

## Công nghệ sử dụng
- **Backend**: Laravel
- **Database**: MySQL
- **Frontend**: Blade template engine (có thể nâng cấp lên Vue.js hoặc React)

## Tác giả
Hà Nam Khánh - 22010149



