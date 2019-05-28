<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->delete();

        $groups = factory(App\Group::class, 20)->create();
    }
}
