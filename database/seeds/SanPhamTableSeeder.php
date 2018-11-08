<?php

use Illuminate\Database\Seeder;

class SanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $types = ["Hoa Hồng","Hoa Lan","Tulip","Hoa Hướng Dương"];

        sort($types);
        
        $today = new Carbon ('2018-11-08 18:30:00');

        for($i = 1; $i <= count($types); $i++){
            array_push($list,[
                'sp_ma' => $i,
                'sp_ten' => $types[$i-1],
                'sp_taoMoi' =>$today->format('Y-m-d H:i:s'),
                'sp_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('sanpham')->insert($list);
    }
}
