<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;

class TestDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:test_insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//     Внесение записи
//         for ($i=0; $i<=5; $i++) {
//         $employee = new Employee();
//         $employee->first_name = 'John';
//         $employee->save();
//         }

// Редактирование
//         $employee = Employee::where('id', 5)->first();
//         $employee->first_name = 'Joseph';
//         $employee->save();
//
//         return Command::SUCCESS;
//     }

// Удаление
        Employee::where('id', 6)->delete();

        return Command::SUCCESS;
    }
}
