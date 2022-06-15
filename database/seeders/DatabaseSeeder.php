<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use PhpParser\Node\Expr\List_;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(1)->create();
        $user = User::factory()->create([
            'name'=> 'John Doe',
            'email'=> 'john@example.com'
        ]);
        Listing::factory(9)->create([
            'user_id'=> $user->id
        ]);
       

        
    }
}
