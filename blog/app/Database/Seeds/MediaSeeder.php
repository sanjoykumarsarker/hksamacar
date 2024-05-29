<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run()
    {
        // for ($i=1; $i < 17; $i++) {
        //     $data = [
        //         'user_id' => 1,
        //         'name' => "Sports_$i.jpg",
        //         'alt' => 'Happy New Year',
        //         'location' => 'images/sports'
        //     ];
        //     $this->db->table('media')->insert($data);
        // }
        for ($i = 1; $i < 9; $i++) {
            $data = [
                'user_id' => 1,
                'name' => "February-2020-$i.jpg",
                'alt' => 'hksamacar February-2020',
                'location' => 'uploads/paper',
                'group' => 1302
            ];
            $this->db->table('media')->insert($data);
        }
    }
}
