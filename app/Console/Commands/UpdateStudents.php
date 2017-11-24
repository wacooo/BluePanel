<?php

namespace App\Console\Commands;

use App\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'studentdb:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate and import the student database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::statement("SET foreign_key_checks=0");
        Student::truncate();
        DB::statement("SET foreign_key_checks=1");
        //Define flag to ignore first row of markbook contents because markbook sucks and is outdated
        $flag = true;
        if (($handle = fopen(env("STUDENT_IMPORT_FILE"), 'r')) !== FALSE) {

            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if ($flag) {
                    $flag = false;
                    continue;
                }
                $student = new Student();
                $student->last = utf8_encode($data [0]);
                $student->first = utf8_encode($data [1]);
                $student->gender = utf8_encode($data [2]);
                $student->id = utf8_encode($data [3]);

                $student->save();
            }
            fclose($handle);
            $this->info('Student database updated successfully! :)');

        }
    }
}
