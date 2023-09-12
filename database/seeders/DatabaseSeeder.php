<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //\App\Models\User::factory(10)->create();

        //user seed

        \App\Models\User::factory()->create([
            'fname' => 'admin',
            'lname' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 4,
            'phone' => '(51)98659-3952',
            'password' => Hash::make('admin@123')
        ]);

        \App\Models\User::factory()->create([
            'fname' => 'Lucas',
            'lname' => 'Cezar',
            'email' => 'czartrentin@gmail.com',
            'role' => 1,
            'phone' => '(51)98659-3952',
            'password' => Hash::make('admin@123')
        ]);

        \App\Models\User::factory()->create([
            'fname' => 'Manoel',
            'lname' => 'Gomes',
            'email' => 'manoelgomes@gmail.com',
            'role' => 1,
            'phone' => '(51)98659-3952',
            'password' => Hash::make('admin@123')
        ]);

        \App\Models\User::factory()->create([
            'fname' => 'Roger',
            'lname' => 'Walts',
            'email' => 'asr@gmail.com',
            'role' => 1,
            'phone' => '(51)98659-3952',
            'password' => Hash::make('admin@123')
        ]);

        // contact seed

        \App\Models\Contact::factory()->create([
            'name' => 'John Doe',
            'contact' => '123456789',
            'email' => 'john.doe@example.com',
            'public' => true,
            'user_id' => rand(1, 4),
        ]);

        \App\Models\Contact::factory()->create([
            'name' => 'Jane Smith',
            'contact' => '987654321',
            'email' => 'jane.smith@example.com',
            'public' => false,
            'user_id' => rand(1, 4),
        ]);

        \App\Models\Contact::factory()->create([
            'name' => 'Alice Johnson',
            'contact' => '555555555',
            'email' => 'alice.johnson@example.com',
            'public' => true,
            'user_id' => rand(1, 4),
        ]);

        \App\Models\Contact::factory()->create([
            'name' => 'Bob Brown',
            'contact' => '777777777',
            'email' => 'bob.brown@example.com',
            'public' => false,
            'user_id' => rand(1, 4),
        ]);

        \App\Models\Contact::factory()->create([
            'name' => 'Mary Davis',
            'contact' => '444444444',
            'email' => 'mary.davis@example.com',
            'public' => true,
            'user_id' => rand(1, 4),
        ]);

        \App\Models\Contact::factory()->create([
            'name' => 'David Wilson',
            'contact' => '111111111',
            'email' => 'david.wilson@example.com',
            'public' => false,
            'user_id' => rand(1, 4),
        ]);

        \App\Models\Contact::factory()->create([
            'name' => 'Emily Lee',
            'contact' => '222222222',
            'email' => 'emily.lee@example.com',
            'public' => true,
            'user_id' => rand(1, 4),
        ]);

        \App\Models\Contact::factory()->create([
            'name' => 'James Martinez',
            'contact' => '999999999',
            'email' => 'james.martinez@example.com',
            'public' => false,
            'user_id' => rand(1, 4),
        ]);

        \App\Models\Contact::factory()->create([
            'name' => 'Linda Anderson',
            'contact' => '333333333',
            'email' => 'linda.anderson@example.com',
            'public' => true,
            'user_id' => rand(1, 4),
        ]);

        \App\Models\Contact::factory()->create([
            'name' => 'Michael Smith',
            'contact' => '666666666',
            'email' => 'michael.smith@example.com',
            'public' => false,
            'user_id' => rand(1, 4),
        ]);

        // run on terminal: php artisan db:seed --force
    }
}
