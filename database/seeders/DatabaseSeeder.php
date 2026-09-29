<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\about;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@terabyte.test'],
            ['name' => 'ISP Admin', 'password' => Hash::make('password')]
        );

        $packages = [
            ['name' => '8 Mbps', 'speed' => '8 Mbps', 'price' => 1200],
            ['name' => '10 Mbps', 'speed' => '10 Mbps', 'price' => 1400],
            ['name' => '12 Mbps', 'speed' => '12 Mbps', 'price' => 1600],
            ['name' => '15 Mbps', 'speed' => '15 Mbps', 'price' => 1800],
            ['name' => '16 Mbps', 'speed' => '16 Mbps', 'price' => 2000],
            ['name' => '24 Mbps', 'speed' => '24 Mbps', 'price' => 2500],
        ];

        foreach ($packages as $i => $p) {
            Package::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($p['name'])],
                $p + [
                    'billing_period' => 'month',
                    'short_description' => 'Reliable high-speed internet for home and business.',
                    'features' => ['Unlimited usage', '24/7 support', 'Fast installation'],
                    'sort_order' => $i
                ]
            );
        }

        Setting::setValue('site_name', 'Terabyte ISP');
        Setting::setValue('site_name_title', 'IT Network');
        Setting::setValue('phone', ' 0300-0000000');
        Setting::setValue('whatsapp', '923000000000');
        Setting::setValue('email', 'info@example.com');
        Setting::setValue('address', 'Lahore, Punjab, Pakistan');
        Setting::setValue('hero_title', 'Fast, Reliable Internet');
        Setting::setValue('hero_subtitle', 'Affordable broadband packages for home and business.');
        Setting::setValue('hero_site_name', 'Terabyte Speed');
        Setting::setValue('hero_Distraction', 'Stream, game, and work without limits. Symmetric speeds, low ping, and local support teams — built for Pakistan’s connected future.');

        $testimonials = [
            [
                'id' => 1,
                'name' => 'Ali Raza',
                'designation' => 'Home User',
                'message' => 'Fast installation and reliable internet service. Highly recommended!',
                'rating' => 5,
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'id' => 2,
                'name' => 'Ahmed Khan',
                'designation' => 'Business Owner',
                'message' => 'Excellent speed and very professional installation service.',
                'rating' => 5,
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'id' => 3,
                'name' => 'Muhammad Usman',
                'designation' => 'Home User',
                'message' => 'Internet speed is stable and customer support is very helpful.',
                'rating' => 5,
                'sort_order' => 3,
                'status' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['id' => $testimonial['id']],
                $testimonial
            );
        }


        About::create([
            'question' => 'About Terabyte IT Network',
            'answer' => 'Connecting homes and businesses with dependable fiber broadband.',
        ]);

        About::create([
            'question' => 'Our Mission',
            'answer' => 'We believe everyone deserves internet that just works — fast downloads, fair policies, and support that answers when you call. Terabyte IT Network invests in fiber infrastructure and local teams so you get a stable connection for work, education, and entertainment.',
        ]);

        About::create([
            'question' => 'Our Services',
            'answer' => 'From residential starter plans to business-grade lines, we scale with you while keeping pricing transparent and service personal.',
        ]);

        About::create([
            'question' => 'Why Fiber?',
            'answer' => 'Symmetric speeds for uploads and cloud backup; lower latency than most wireless alternatives; excellent performance for 4K streaming and smart devices; and professional installation by trained technicians.',
        ]);
    }
}
