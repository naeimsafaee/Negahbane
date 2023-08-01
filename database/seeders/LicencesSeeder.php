<?php

namespace Database\Seeders;

use App\Models\Licence;
use Illuminate\Database\Seeder;

class LicencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $licences = [
            [
                'title' => 'نگهبان رایگان',
                'price' => '0',
                'state' => 'free',
                'sms' => '100',
                'email' => '100',
                'website' => '1',
                'image' => 'assets/icon/orange-logo.svg',
            ],
            [
                'title' => 'نگهبان سبز',
                'price' => '100000',
                'state' => 'buy',
                'sms' => '100',
                'email' => '100',
                'website' => '5',
                'image' => 'assets/icon/green-logo.svg',
            ],
            [
                'title' => 'نگهبان آبی',
                'price' => '200000',
                'state' => 'buy',
                'sms' => '200',
                'email' => '200',
                'website' => '10',
                'image' => 'assets/icon/blue-logo.svg',
            ],
            [
                'title' => 'نگهبان سازمانی',
                'price' => '0',
                'state' => 'call',
                'sms' => '100',
                'email' => '100',
                'website' => '50',
                'image' => 'assets/icon/red-logo%20.svg',
            ],
        ];
        foreach($licences as $licence)
        {
            Licence::query()->create([
                'title' => $licence['title'],
                'price' => $licence['price'],
                'state' => $licence['state'],
                'sms' => $licence['sms'],
                'email' => $licence['email'],
                'website' => $licence['website'],
                'image' => $licence['image']
            ]);
        }
    }
}
