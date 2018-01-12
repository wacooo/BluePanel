<?php

namespace App\Console\Commands;

use App\Student;
use Illuminate\Console\Command;

class ImportStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'studentdb:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the students csv into the MySQL database';

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
        //Define flag to ignore first row of markbook contents because markbook sucks and is outdated
        $flag = true;
        if (($handle = fopen(env('STUDENT_IMPORT_FILE'), 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                if ($flag) {
                    $flag = false;
                    continue;
                }
                Student::updateOrCreate([
                        'id'=>utf8_encode($data[3])
                    ]
                    , [
                        'last' => utf8_encode($data[0]),
                        'first' => utf8_encode($data[1]),
                        'gender' => utf8_encode($data[2]),
                    ]
                );
            }
            fclose($handle);
            $this->info('Student database imported successfully! :D');
        }
    }
}
