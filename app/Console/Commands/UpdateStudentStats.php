<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\Group;
use App\Level; // temp just for testing
use App\SubjectLevel; // temp 
use App\Subject; // temp 

class UpdateStudentStats extends Command
{
    protected $signature = 'rvb:update:student-stats';

    protected $description = 'Update the computable fields of "group_student" pivot table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // perform a JOIN so that there will be 
        $gr_st_records = DB::table('group_student')->get();

        $ass_st_records = DB::table('assignment_student')
                ->join('assignments', 'assignment_student.assignment_id', '=', 'assignments.id')
                ->select('assignment_student.student_id', 'assignment_student.submitted', 'assignment_student.mark', 'assignments.marks_available', 'assignments.subject_id', 'assignments.level_id')
                ->get();

        foreach ($gr_st_records as $gr_st_record) {

            $student_id = $gr_st_record->student_id;
            $group_id = $gr_st_record->group_id;
            $group = Group::find($group_id);
            $subject_id = $group->subject_id;
            $level_id = $group->level_id;

            $relevant_records = $ass_st_records->where('student_id', $student_id)
                                                ->where('subject_id', $subject_id)
                                                ->where('level_id', $level_id)
                                                ->where('submitted', 1)
                                                ->all();

            $total_marks_attained = 0;
            $total_marks_attainable = 0;

            foreach ($relevant_records as $x) {
                $total_marks_attained += $x->mark;
                $total_marks_attainable += $x->marks_available;
            }

            if($relevant_records){

                // Update average mark (percentage)
                $average_mark_as_percentage = (int) (($total_marks_attained/$total_marks_attainable)*100);

                DB::table('group_student')
                    ->where('group_id', $group_id)
                    ->where('student_id', $student_id)
                    ->update(['average_mark' => $average_mark_as_percentage]);



                echo "Student #" . $student_id . 
                     " completed " . sizeof($relevant_records) . " " .
                     Subject::find($subject_id)->title .
                     " assignments and obtained " . $total_marks_attained . 
                     " marks from " . $total_marks_attainable .
                     ". Student's overall mark : " . $average_mark_as_percentage .
                     "%"
                     . "\n";

             }

        }

        echo "Students stats successfully updated. See 'group_student' table.";

    }
}
