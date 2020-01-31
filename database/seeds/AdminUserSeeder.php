<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table((new User)->getTable())->insert([
		    'name' => 'Admin',
		    'email' => env('INITIAL_ADMIN_EMAIL', 'admin@admin.admin'), // ENV var or one of the controlled email addresses
		    'password' => Hash::make(env('INITIAL_ADMIN_PASSWORD', 'approvaladmin')), // ENV var of default password
		    'is_admin' => true,
	    ]);
    }
}
