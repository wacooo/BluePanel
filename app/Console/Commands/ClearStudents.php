<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Student;

class ClearStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'studentdb:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Empties the student database';

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
        $this->info('Student database cleared successfully!');
    }
}
