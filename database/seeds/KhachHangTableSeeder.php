<?php

use Illuminate\Database\Seeder;

class KhachHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $hoten = ["","Nguyen Van Dang","Nguyen Van Vi","Nguyen Hoang Thuc","Ngo Thanh Ngan",
                "Le Duy Khang"];
        sort($types);
        
        $user = ["Duyen","Dang","Vi","Thuc","Ngan","Khang"];
        sort($user);

        $matkhau;

        $kh1 = ['Nguyen Yen Duyen','Duyen','Duyen123',];
        
        array_push($list,[
            'kh_taiKhoan' => 'Duyen',
            'kh_matKhau' => 'Duyen123',
            'kh_hoTen' => 'Nguyen Yen Duyen',
            'kh_gioiTinh' => '2',
            'kh_taoMoi' =>$today->format('Y-m-d H:i:s'),
            'kh_capNhat' => $today->format('Y-m-d H:i:s')
        ]);

        array_push($list,[
            'l_ma' => $i,
            'l_ten' => $types[$i-1],
            'l_taoMoi' =>$today->format('Y-m-d H:i:s'),
            'l_capNhat' => $today->format('Y-m-d H:i:s')
        ]);

        array_push($list,[
            'l_ma' => $i,
            'l_ten' => $types[$i-1],
            'l_taoMoi' =>$today->format('Y-m-d H:i:s'),
            'l_capNhat' => $today->format('Y-m-d H:i:s')
        ]);
        
        $today = new Carbon ('2018-11-01 18:30:00');

        for($i = 1; $i <= count($types); $i++){
            array_push($list,[
                'l_ma' => $i,
                'l_ten' => $types[$i-1],
                'l_taoMoi' =>$today->format('Y-m-d H:i:s'),
                'l_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('khachhang')->insert($list);
    }
}
