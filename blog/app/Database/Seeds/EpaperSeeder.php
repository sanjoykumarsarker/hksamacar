<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EpaperSeeder extends Seeder
{
    public function run()
    {
        $papers = ["জানুয়ারি-২০২২", "ফেব্রুয়ারি-২০২২", "মার্চ-২০২২", "এপ্রিল-২০২২", "মে-২০২২", "জুন-২০২২", "জুলাই-২০২২", "আগষ্ট-২০২২", "সেপ্টেম্বর-২০২২", "অক্টোবর-২০২২", "নভেম্বর-২০২২", "ডিসেম্বর-২০২২", "জানুয়ারি-২০২৩", "ফেব্রুয়ারি-২০২৩"];
        $data = [
            'user_id' => 1,
            'name' => "February-2020.pdf",
            'alt' => 'February-2022 Hksamacar PDF',
            'location' => 'uploads/pdf',
            'type' => 'pdf',
            'group' => ''
        ];
        $this->db->table('media')->insert($data);

        $issue_no = 1300;
        foreach ($papers as $key => $paper) {
            $issue_no = $key === 12 ? 1401 : $issue_no += 1;
            $data = [
                'issue' => $paper,
                'media_id' => 17,
                'issue_no' => $issue_no,
                'body' => '<p><strong>আমরা তপস্যা করবার যোগ্য নই।</strong> এমনকি এ কলিযুগে অষ্টকালীয় লীলা-স্মরণ করবারও যোগ্য নই। বাস্তবে এটি আমাদের ধারণারও বাইরে। দম্ভবশত আমরা জল্পনা-কল্পনা করতে পারি, কিন্তু শ্রীল বিশ্বনাথ চক্রবর্তী ঠাকুর &lsquo;রাগবর্ত্ম-চন্দ্রিকা&rsquo;য় বলেছেন,</p>
                <blockquote><span style="color:red;"><strong>&ldquo;</strong></span>এমনকি রাগানুগা-সাধনভক্তির অন্যতম অঙ্গ &lsquo;স্মরণ&rsquo; শ্রীকৃষ্ণ-নাম-সঙ্কীর্তন (সংকীর্তন মানে হলো সমবেতভাবে কীর্তন) ব্যতিরেকে অসম্ভব।<span style="color:red;"><strong>&rdquo;</strong></span></blockquote>
                <p>কলিযুগের যুগধর্ম হরিনাম-সঙ্কীর্তনের সাথে সমন্বয় সাধন ছাড়া ভক্তিযোগের কোনো অঙ্গই সাধন করা সম্ভব নয়। এজন্যই আচার্যগণ বারবার হরিনাম সংকীর্তন করার ওপর জোর দিয়েছেন।</p>
                <p><strong><span style="color:#ff00fe">দৈন্যতা</span></strong> মানে হলো এটি উপলব্ধি করা যে, এই কলিযুগে আমরা কোনো কিছুর যোগ্য নই। আমরা কর্মযোগের যোগ্য নই, জ্ঞান, অষ্টাঙ্গযোগ, ধ্যান করার যোগ্য নই। আমরা প্রচুর পরিমাণ ঘি দিয়ে বড় বড় যজ্ঞ করার, ঐশ্বর্যপূর্ণ শ্রীবিগ্রহ অর্চন করার যোগ্য নই।</p>',
            ];
            $this->db->table('epapers')->insert($data);
        }
    }
}
