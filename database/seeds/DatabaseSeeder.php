<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = [
//        'users',
//        'services', 'vouchers'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') !== 'production') {
            foreach ($this->toTruncate as $table) {
                DB::table($table)->truncate();
            }

            $this->call(UserTableSeeder::class);
            $this->call(ServiceTableSeeder::class);
            $this->call(VoucherTableSeeder::class);

        } else {
            print_r('With production env you cannot make seeds');
        }
    }
}
