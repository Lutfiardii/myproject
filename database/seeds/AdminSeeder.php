<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [ // Perubahan pada variabel ini
            [
                'name' => 'Lutfi',
                'email' => 'lutfiardi@gmail.com',
                'password' => Hash::make('11223344'),
                'no_telp' => '085710850239',
                'alamat' => 'kedawung',
                'tipe' => 'superAdmin'
            ],
        ];
        Admin::insert($admins);
    }
}
