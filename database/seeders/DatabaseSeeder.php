<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

   public function run(): void
{
    foreach (Status::TITLES as $title) {
        Status::firstOrCreate(['title' => $title]);
    }
 
    // role не входит в $fillable (защита от mass assignment), поэтому forceFill
    User::firstOrNew(['login' => 'administrator'])->forceFill([
        'lastname' => 'Администратор',
        'firstname' => 'MedLine',
        'tel' => '+70000000000',
        'email' => 'admin@medline.local',
        'password' => 'administrator', // хешируется cast'ом 'hashed'
        'role' => 'admin',
        'email_verified_at' => now(),
    ])->save();
    
}
}