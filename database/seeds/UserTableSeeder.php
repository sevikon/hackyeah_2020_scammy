<?php

use App\Models\User;
use App\Services\Common\StaticArray;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($k = 0; $k < 20; $k++) {
            /** @var User $user */
            factory(User::class)->create();
        }
    }
}
