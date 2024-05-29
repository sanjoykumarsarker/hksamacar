<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        $names = [
            'About Us', 'Contact', 'Advertise', 'Write for Us'
        ];
        foreach ($names as $name) {
            $data = [
                'title' => $name,
                'user_id' => 1,
                'slug' => str_replace(' ', '-', strtolower($name)),
                'body' => '<p><strong>আমরা তপস্যা করবার যোগ্য নই।</strong> এমনকি এ কলিযুগে অষ্টকালীয় লীলা-স্মরণ করবারও যোগ্য নই। বাস্তবে এটি আমাদের ধারণারও বাইরে। দম্ভবশত আমরা জল্পনা-কল্পনা করতে পারি, কিন্তু শ্রীল বিশ্বনাথ চক্রবর্তী ঠাকুর &lsquo;রাগবর্ত্ম-চন্দ্রিকা&rsquo;য় বলেছেন,</p>
                <blockquote><span style="color:red;"><strong>&ldquo;</strong></span>এমনকি রাগানুগা-সাধনভক্তির অন্যতম অঙ্গ &lsquo;স্মরণ&rsquo; শ্রীকৃষ্ণ-নাম-সঙ্কীর্তন (সংকীর্তন মানে হলো সমবেতভাবে কীর্তন) ব্যতিরেকে অসম্ভব।<span style="color:red;"><strong>&rdquo;</strong></span></blockquote>
                <p>কলিযুগের যুগধর্ম হরিনাম-সঙ্কীর্তনের সাথে সমন্বয় সাধন ছাড়া ভক্তিযোগের কোনো অঙ্গই সাধন করা সম্ভব নয়। এজন্যই আচার্যগণ বারবার হরিনাম সংকীর্তন করার ওপর জোর দিয়েছেন।</p>
                <p><strong><span style="color:#ff00fe">দৈন্যতা</span></strong> মানে হলো এটি উপলব্ধি করা যে, এই কলিযুগে আমরা কোনো কিছুর যোগ্য নই। আমরা কর্মযোগের যোগ্য নই, জ্ঞান, অষ্টাঙ্গযোগ, ধ্যান করার যোগ্য নই। আমরা প্রচুর পরিমাণ ঘি দিয়ে বড় বড় যজ্ঞ করার, ঐশ্বর্যপূর্ণ শ্রীবিগ্রহ অর্চন করার যোগ্য নই।</p>',
            ];
            $this->db->table('pages')->insert($data);
        }
    }
}
