
# Website đặt lịch làm đẹp trực tuyến (Maii)
## Lưu Mai Tuyết - 22010226

### 1. Mô tả đề tài

Xây dựng một trang web để quản lý lịch hẹn làm đẹp trực tuyến. Website cung cấp trải nghiệm thân thiện và tiện lợi cho người dùng trong việc đặt lịch làm đẹp, xem thông tin dịch vụ, giá cả, và thời gian có sẵn. Khách hàng có thể dễ dàng chọn dịch vụ và thanh toán trực tuyến. Đồng thời, hệ thống cũng hỗ trợ quản lý lịch hẹn, thông báo nhắc nhở, và báo cáo cho phía quản lý.

### 2. Các chức năng chính

#### Dành cho khách hàng

##### Tìm kiếm và xem thông tin dịch vụ:

Cung cấp danh sách dịch vụ (làm tóc, làm móng, chăm sóc da, làm móng) kèm theo mô tả, giá cả, và hình ảnh minh họa.

##### Đặt lịch trực tuyến:

Chọn dịch vụ, thời gian có sẵn.

#### Dành cho quản lý

##### Quản lý dịch vụ:

Thêm, sửa, xóa các dịch vụ kèm thông tin chi tiết. Đặt mức giá khác nhau cho từng dịch vụ.

##### Quản lý lịch hẹn:

Xem, cập nhật lịch hẹn của khách hàng theo ngày, tuần, tháng. Xử lý các yêu cầu đặt, hủy lịch hoặc thay đổi giờ hẹn.

##### Thống kê báo cáo:

Báo cáo doanh thu, số lượng khách hàng theo ngày, tuần, tháng.

### 3. Phân tích và thiết kế phần mềm

#### 3.1. Class Diagram
![Class Diagram](https://i.imgur.com/RnCyeMv.png)

#### 3.2. Sequence Diagram
![Sequence Diagram](https://i.imgur.com/QdUbAX7.png)

#### 3.3. Use-Case
![Use-case](https://i.imgur.com/oKPdhPY.png)

### 4. Hướng dẫn cài đặt
#### 4.1. Clone dự án về máy
https://github.com/maituyet04/Manage-beauty-appointments

cd booking

#### 4.2. Cài đặt các thư viện phụ thuộc
Đảm bảo bạn đã cài Composer, sau đó chạy:

composer install

npm install
#### 4.3. Thiết lập biến môi trường
cp .env.example .env

php artisan key:generate
#### 4.4. Cấu hình cơ sở dữ liệu
Chỉnh sửa file .env để khớp với cấu hình cơ sở dữ liệu trên máy của bạn.

Sau đó chạy Migration và Seed. Tạo các bảng trong cơ sở dữ liệu:

php artisan migrate --seed
#### 4.5. Chạy ứng dụng
Khởi động server bằng lệnh:

php artisan serve

Mở trình duyệt và truy cập vào địa chỉ:

http://127.0.0.1:8000

### 5. Giao diện
#### 5.1. Admin
##### Đăng ký/đăng nhập
![Đăng ký/đăng nhập](https://i.imgur.com/ao03l9Q.png)
##### Trang danh mục
![Trang danh mục](https://i.imgur.com/bBobwNz.png)
##### Trang dịch vụ
![Trang dịch vụ](https://i.imgur.com/HAA1Md2.png)
##### Trang home
![Trang home](https://i.imgur.com/jDi22Gy.png)

### 6. Hạn chế
- Chưa hoàn thiện chức năng booking cho khách hàng
- Chưa hoàn thiện chức năng quản lý lịch hẹn và tạo báo cáo cho admin
- Chưa hoàn thiện giao diện.




