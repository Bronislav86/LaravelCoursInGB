<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;

class TestDataSelect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Test:data-select';

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
//         Запросить все записи БД
//
//         $employees = Employee::all();
//         foreach ($employees as $employee)
//         {
//             echo $employee->first_name . ' ' . $employee->id . PHP_EOL;
//         };

            // Запрос по id через find()
//             $employees = Employee::find(2);
//             echo $employees['first_name'] . ' ' . $employees['id'] . PHP_EOL;

            // Более сложный запрос по параметрам через where()

//             $employees = Employee::where('first_name', '=', 'John')->orwhere('age', '>', '27')->get();
//             foreach ($employees as $employee)
//             {
//                 echo $employee->first_name . ' ' . $employee->id . ' ' . $employee->age . PHP_EOL;
//             };

            // Запросим все тоже самое, только найдем лишь первое вхождение
            $employees = Employee::where('first_name', '=', 'John')->orwhere('age', '>', '27')->first();
            echo $employees->first_name . ' ' . $employees->id . ' ' . $employees->age . PHP_EOL;


        return Command::SUCCESS;
    }
}
