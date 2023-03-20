<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            
            ['id' => 1, 'shortcode' => 'AG', 'name' => 'An Giang',],
            ['id' => 2, 'shortcode' => 'VT', 'name' => 'Bà Rịa – Vũng Tàu',],
            ['id' => 3, 'shortcode' => 'BG', 'name' => 'Bắc Giang',],
            ['id' => 4, 'shortcode' => 'BK', 'name' => 'Bắc Kạn',],
            ['id' => 5, 'shortcode' => 'BL', 'name' => 'Bạc Liêu',],
            ['id' => 6, 'shortcode' => 'BN', 'name' => 'Bắc Ninh',],
            ['id' => 7, 'shortcode' => 'BT', 'name' => 'Bến Tre',],
            ['id' => 8, 'shortcode' => 'BĐ', 'name' => 'Bình Định',],
            ['id' => 9, 'shortcode' => 'BD', 'name' => 'Bình Dương',],
            ['id' => 10, 'shortcode' => 'BP', 'name' => 'Bình Phước',],
            ['id' => 11, 'shortcode' => 'BT', 'name' => 'Bình Thuận',],
            ['id' => 12, 'shortcode' => 'CM', 'name' => 'Cà Mau',],
            ['id' => 13, 'shortcode' => 'CT', 'name' => 'Cần Thơ',],
            ['id' => 14, 'shortcode' => 'CB', 'name' => 'Cao Bằng',],
            ['id' => 15, 'shortcode' => 'ĐN', 'name' => 'Đà Nẵng',],
            ['id' => 16, 'shortcode' => 'ĐL', 'name' => 'Đắk Lắk',],
            ['id' => 17, 'shortcode' => 'ĐN', 'name' => 'Đắk Nông',],
            ['id' => 18, 'shortcode' => 'ĐB', 'name' => 'Điện Biên',],
            ['id' => 19, 'shortcode' => 'ĐN', 'name' => 'Đồng Nai',],
            ['id' => 20, 'shortcode' => 'ĐT', 'name' => 'Đồng Tháp',],
            ['id' => 21, 'shortcode' => 'GL', 'name' => 'Gia Lai',],
            ['id' => 22, 'shortcode' => 'HG', 'name' => 'Hà Giang',],
            ['id' => 23, 'shortcode' => 'HN', 'name' => 'Hà Nam',],
            ['id' => 24, 'shortcode' => 'HN', 'name' => 'Hà Nội',],
            ['id' => 25, 'shortcode' => 'HT', 'name' => 'Hà Tĩnh',],
            ['id' => 26, 'shortcode' => 'HD', 'name' => 'Hải Dương',],
            ['id' => 27, 'shortcode' => 'HP', 'name' => 'Hải Phòng',],
            ['id' => 28, 'shortcode' => 'HG', 'name' => 'Hậu Giang',],
            ['id' => 29, 'shortcode' => 'HB', 'name' => 'Hòa Bình',],
            ['id' => 30, 'shortcode' => 'HY', 'name' => 'Hưng Yên',],
            ['id' => 31, 'shortcode' => 'KH', 'name' => 'Khánh Hòa',],
            ['id' => 32, 'shortcode' => 'KG', 'name' => 'Kiên Giang',],
            ['id' => 33, 'shortcode' => 'KT', 'name' => 'Kon Tum',],
            ['id' => 34, 'shortcode' => 'LC', 'name' => 'Lai Châu',],
            ['id' => 35, 'shortcode' => 'LĐ', 'name' => 'Lâm Đồng',],
            ['id' => 36, 'shortcode' => 'LS', 'name' => 'Lạng Sơn',],
            ['id' => 37, 'shortcode' => 'LC', 'name' => 'Lào Cai',],
            ['id' => 38, 'shortcode' => 'LA', 'name' => 'Long An',],
            ['id' => 39, 'shortcode' => 'NĐ', 'name' => 'Nam Định',],
            ['id' => 40, 'shortcode' => 'NA', 'name' => 'Nghệ An',],
            ['id' => 41, 'shortcode' => 'NB', 'name' => 'Ninh Bình',],
            ['id' => 42, 'shortcode' => 'NT', 'name' => 'Ninh Thuận',],
            ['id' => 43, 'shortcode' => 'PT', 'name' => 'Phú Thọ',],
            ['id' => 44, 'shortcode' => 'PY', 'name' => 'Phú Yên',],
            ['id' => 45, 'shortcode' => 'QB', 'name' => 'Quảng Bình',],
            ['id' => 46, 'shortcode' => 'QN', 'name' => 'Quảng Nam',],
            ['id' => 47, 'shortcode' => 'QN', 'name' => 'Quảng Ngãi',],
            ['id' => 48, 'shortcode' => 'QN', 'name' => 'Quảng Ninh',],
            ['id' => 49, 'shortcode' => 'QT', 'name' => 'Quảng Trị',],
            ['id' => 50, 'shortcode' => 'ST', 'name' => 'Sóc Trăng',],
            ['id' => 51, 'shortcode' => 'SL', 'name' => 'Sơn La',],
            ['id' => 52, 'shortcode' => 'TN', 'name' => 'Tây Ninh',],
            ['id' => 53, 'shortcode' => 'TB', 'name' => 'Thái Bình',],
            ['id' => 54, 'shortcode' => 'TN', 'name' => 'Thái Nguyên',],
            ['id' => 55, 'shortcode' => 'TH', 'name' => 'Thanh Hóa',],
            ['id' => 56, 'shortcode' => 'TTH', 'name' => 'Thừa Thiên Huế',],
            ['id' => 57, 'shortcode' => 'TG', 'name' => 'Tiền Giang',],
            ['id' => 58, 'shortcode' => 'TPHCM', 'name' => 'TP Hồ Chí Minh',],
            ['id' => 59, 'shortcode' => 'TV', 'name' => 'Trà Vinh',],
            ['id' => 60, 'shortcode' => 'TQ', 'name' => 'Tuyên Quang',],
            ['id' => 61, 'shortcode' => 'VL', 'name' => 'Vĩnh Long',],
            ['id' => 62, 'shortcode' => 'VP', 'name' => 'Vĩnh Phúc',],
            ['id' => 63, 'shortcode' => 'YB', 'name' => 'Yên Bái',],
            

        ];

        Country::insert($countries);
    }
}
