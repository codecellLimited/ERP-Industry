<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('app_contents')
        ->insert([
            'section'       =>  'why_choose_us_text',
            'data'          =>  'Provide your best loan services and our experience staff help you. Less document and fast approve process of passages. Also we are providing credit card facility to per day interest credit card lorem Ipsum available, but the majority have suffered.',
            'data_in_bangla'=>  'আপনার সেরা ঋণ পরিষেবা প্রদান করুন এবং আমাদের অভিজ্ঞ কর্মীরা আপনাকে সাহায্য করুন। কম নথি এবং প্যাসেজ দ্রুত অনুমোদন প্রক্রিয়া. এছাড়াও আমরা ক্রেডিট কার্ড সুবিধা দিচ্ছি প্রতিদিন সুদের ক্রেডিট কার্ড লোরেম ইপসাম উপলব্ধ, কিন্তু সংখ্যাগরিষ্ঠ ক্ষতিগ্রস্ত হয়েছে.',
            'created_at'    =>  now(),
        ]);
    }
}
