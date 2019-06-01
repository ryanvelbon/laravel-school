<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(ClassroomsTableSeeder::class);
        $this->call(TutorsTableSeeder::class);
        $this->call(SubjectLevelsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(GroupStudentTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        // $this->call(AssignmentsTableSeeder::class);
        $this->call(ReportTypesTableSeeder::class);

        Model::reguard();
    }
}
