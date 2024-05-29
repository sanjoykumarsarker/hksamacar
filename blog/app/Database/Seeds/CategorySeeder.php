<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = ['একাদশী', 'উৎসব', 'প্রবচন', 'ডাউনলোড', 'নগরাদি গ্রাম', 'প্রতিবেদন', 'অনুষ্ঠান', 'মায়াপুর', 'বৃন্দাবন', 'সংকীর্তন'];
        foreach ($data as  $value) {
            $this->db->table('categories')->insert(['name' => $value]);
        }
    }
}
