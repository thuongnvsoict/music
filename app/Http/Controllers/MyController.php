<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    function curl_download($Url, $saveTo)
    {
        // Mở một file mới với đường dẫn và tên file là tham số $saveTo
        $fp = fopen ($saveTo, 'w+');
        // Bắt đầu CURl
        $ch = curl_init($Url);
        // Thiết lập giả lập trình duyệt
        // nghĩa là giả mạo đang gửi từ trình duyệt nào đó, ở đây tôi dùng Firefox
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
        // Thiết lập trả kết quả về chứ không print ra
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Thời gian timeout
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        // Lưu kết quả vào file vừa mở
        curl_setopt($ch, CURLOPT_FILE, $fp);
        // Thực hiện download file
        $result = curl_exec($ch);
        // Đóng CURL
        curl_close($ch);
        return $result;
    }
    public function getlink($id){
        $ch = curl_init("https://youtube7.download//mini.php?id=".$id);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10000);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);

        curl_close($ch);
        echo $output;
        //$decoded = json_decode($output);
        //var_export($decoded->response);
    }
}
