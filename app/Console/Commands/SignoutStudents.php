<?php

namespace App\Console\Commands;

use App\KioskLogs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SignoutStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'librarydb:signoutall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sign out all students currently in the library.';

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
        $result = DB::table('library_students')->get();

        foreach($result as $student){
            $log_instance = new KioskLogs();
            $log_instance->Number = $student->Number;
            $log_instance->Last = $student->Last;
            $log_instance->First = $student->First;
            $log_instance->Gender = $student->Gender;
            $log_instance->type = "out";
            $log_instance->automated = true;
            $log_instance->save();
            DB::table('library_students')->where('id', '=', $student->id)->delete();

        }
    }
}
