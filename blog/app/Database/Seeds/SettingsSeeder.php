<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['key' => 'short_description', 'value' => 'আন্তর্জাতিক কৃষ্ণভাবনামৃত সংঘ (ইসকন), বাংলাদেশের অন্যতম বার্তা প্রদানকারী প্রতিষ্ঠান হিসেবে সমগ্র বাংলাদেশ ব্যাপী মাসিক হরেকৃষ্ণ সমাচার সুনামের সাথে ২০০৮ থেকে বাংলাদেশের একটি রেজিস্টার্ড সংবাদ সংস্থা হিসেবে কাজ করে আসছে।', 'group' => 'description', 'type' => 'textarea'],
            ['key' => 'main_menu', 'value' => 'সংবাদ,নগরাদি গ্রাম,প্রবন্ধ,প্রতিবেদন,শ্রীল প্রভুপাদ,পঞ্জিকা', 'group' => 'menu', 'type' => 'csv'],
            ['key' => 'top_menu', 'value' => 'Advertise,About,Ekadasi,Write for Us,E-paper', 'group' => 'menu', 'type' => 'csv'],
            ['key' => 'featured_post', 'value' => 19, 'group' => 'posts', 'type' => 'number'],
            ['key' => 'popular_posts', 'value' => "15,17,20,24", 'group' => 'posts', 'type' => 'csv'],
            ['key' => 'recent_posts_show', 'value' => 3, 'group' => 'posts', 'type' => 'number'],
            ['key' => 'page_top_ad', 'value' => true, 'group' => 'advertisement', 'type' => 'boolean'],
            ['key' => 'page_bottom_ad', 'value' => true, 'group' => 'advertisement', 'type' => 'boolean'],
            ['key' => 'page_side_ad', 'value' => true, 'group' => 'advertisement', 'type' => 'boolean'],
            ['key' => 'home_top_ad', 'value' => true, 'group' => 'advertisement', 'type' => 'boolean'],
            ['key' => 'home_bottom_ad', 'value' => true, 'group' => 'advertisement', 'type' => 'boolean'],
            ['key' => 'ticker_subject', 'value' => 'আজকের তিথি', 'group' => 'notice'],
            ['key' => 'ticker', 'value' => 'আজ শ্রীল প্রভুপাদের আবির্ভাব তিথি', 'group' => 'notice'],
            ['key' => 'ticker_date', 'value' => true, 'group' => 'notice', 'type' => 'boolean'],
            ['key' => 'show_ticker', 'value' => true, 'group' => 'notice', 'type' => 'boolean'],
            ['key' => 'notice_top', 'value' => '<marquee><a href="#">আজ শ্রীল প্রভুপাদের আবির্ভাব তিথি</a></marquee>', 'group' => 'notice', 'type' => 'html'],
            ['key' => 'notice_bottom', 'value' => true, 'group' => 'notice', 'type' => 'boolean'],
            ['key' => 'facebook_url', 'value' => 'https://www.facebook.com/hksamacar', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => 'https://www.youtube.com/@harekrishnasamacar5650', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/hksamcar', 'group' => 'social'],
            ['key' => 'custom_url', 'value' => '', 'group' => 'social'],
        ];
        foreach ($data as $value) {
            $this->db->table('settings')->insert($value);
        }
        // $this->db->table('settings')->insertBatch($data);
    }
}
