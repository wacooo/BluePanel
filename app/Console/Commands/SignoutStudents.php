<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SignoutStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kiosk:signoutstudents {kiosk}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sign out all students at the specified kiosk.';

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
        $kioskid = $this->argument('kiosk');
        $kiosk = \App\Kiosk::findOrFail($kioskid);

        foreach ($kiosk->students as $student) {
            $kiosk->logs()->attach($student->id, ['type' => '[AUTOMATED] Sign Out']);
            //$kiosk->logs()->attach($student->id, ['type' => '[AUTOMATED] End Of Period']);
            $kiosk->students()->detach($student->id);
        }
        $this->info('All students signed out :)');
    }
}
