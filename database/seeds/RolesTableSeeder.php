<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            ['name' => 'Phát triển ứng dụng  web', 'code' => 'INT3306'],
            ['name' => 'Thực hành hệ điều hành mạng', 'code' => 'INT3301'],
            ['name' => 'Quản trị mạng', 'code' => 'INT3310'],
            ['name' => 'Kho dữ liệu', 'code' => 'INT3306'],
            ['name' => 'Các hệ thống thương mại điện tử', 'code' => 'INT3506'],
            ['name' => 'Đồ họa máy tính', 'code' => 'INT3403'],
            ['name' => 'Thu thập và phân tích yêu cầu', 'code' => 'INT3109'],
            ['name' => 'Phát triển ứng dụng di động', 'code' => 'INT3120'],
            ['name' => 'Kiến trúc hướng dịch vụ', 'code' => 'INT3505']
        ]);
        DB::table('criteria')->insert([
            [ 'id' => 1, 'name' => 'Giảng Các trang thiết bị tại giảng đường đáp ứng nhu cầu giảng dạy và học tập đường có đáp ứng yêu cầu của môn học', 'type' => 'Cơ sở vật chất'],
            ['id' => 2, 'name' => 'Các trang thiết bị tại giảng đường đáp ứng nhu cầu giảng dạy và học tập', 'type' => 'Cơ sở vật chất'],

            [ 'id' => 3, 'name' => 'Bạn được hỗ trợ kịp thời trong quá trình học này', 'type' => 'Môn học'],
            [ 'id' => 4, 'name' => 'Mục tiêu của môn học nêu rõ kiến thức và kĩ năng cần đạt được', 'type' => 'Môn học'],
            [ 'id' => 5, 'name' => 'Thời lượng của môn học được phân bố hợp lý cho các hình thức học tập', 'type' => 'Môn học'],
            ['id' => 6, 'name' => 'Các tài liệu phục vụ môn học được cập nhập', 'type' => 'Môn học'],
            [ 'id' => 7, 'name' => 'Môn học góp phần tran bị kiến thức, kỹ năng nghề nghiệp cho bạn', 'type' => 'Môn học'],

            [ 'id' => 8, 'name' => 'Giảng viên thực hiện đầy đủ nội dung và thời lượng của môn học theo kế hoạch', 'type' => 'Hoạt động dạy hoc của giảng viên'],
            [ 'id' => 9, 'name' => 'Giảng viên hướng dẫn bạn phương pháp học tập khi bắt đầu môn học', 'type' => 'Hoạt động dạy hoc của giảng viên'],
            [ 'id' => 10, 'name' => 'Phương pháp giảng dạy của giảng viên giúp bạn phát triển tư duy', 'type' => 'Hoạt động dạy hoc của giảng viên'],
            [ 'id' => 11, 'name' => 'Giảng viên tạo cơ hội để bạn chủ động tham gia vào quá trình học tập', 'type' => 'Hoạt động dạy hoc của giảng viên'],

            [ 'id' => 12, 'name' => 'Giảng viên giúp bạn phát triển kỹ năng làm việc độc lập', 'type' => 'Hoạt động dạy hoc của giảng viên'],
            [ 'id' => 13, 'name' => 'Giảng viên rèn luyện cho bạn phương pháp liên giữa hệ các vấn đề trong môn học và thực tiễn', 'type' => 'Hoạt động dạy hoc của giảng viên'],
            [ 'id' => 14, 'name' => 'Giảng viên sử dụng hiệu quả phương tiện dạy học', 'type' => 'Hoạt động dạy hoc của giảng viên'],
            [ 'id' => 15, 'name' => 'Giảng viên quan tâm giáo dục tư cách, phẩm chất nghề nghiệp của người học', 'type' => 'Hoạt động dạy hoc của giảng viên'],
            
            [ 'id' => 16, 'name' => 'Bạn hiểu những vấn đề được truyền tải trên lớp', 'type' => 'Hoạt động học tập của sinh viên'],
            [ 'id' => 17, 'name' => 'Kết quả học tập của người học được đánh giá bằng nhiều hình thức phú hợp với tính chất và đặc thù môn học', 'type' => 'Hoạt động học tập của sinh viên'],
            [ 'id' => 18, 'name' => 'Nội dung kiểm tra đánh giá tổng hợp được các kỹ năng mà người học phải đjat theo yêu cầu', 'type' => 'Hoạt động học tập của sinh viên'],
            [ 'id' => 19, 'name' => 'Thông tin phản hồi từ kiểm tra đánh giá giúp bạn cả thiện được kết quả học tập', 'type' => 'Hoạt động học tập của sinh viên'],

        ]);
        DB::table('semesters')->insert([
            ["id" =>"1" , "name" => "Kì I"],
            ["id" =>"2" , "name" => "Kì II"],
            ["id" =>"3" , "name" => "Kì Hè"],
        ]);

        DB::table('roles')->delete();
        DB::table('roles')->insert([
            ['id' => '0', 'name' => 'admin'],
            ['id' => '1', 'name' => 'sinhvien'],
            ['id' => '2', 'name' => 'giaovien'],
        ]);
    }
}
