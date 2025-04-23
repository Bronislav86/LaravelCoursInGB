<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;

class TestDataOrderBy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Test:data-orderby';

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
//         $employees = Employee::orderBy('age', 'DESC')->get();
//
//         foreach ($employees as $employee)
//         {
//             echo $employee->id . ' ' . $employee->first_name . ' ' . $employee->age . PHP_EOL;
//         };

        //Ограничим вывод данных 2-мя строками

//         $employees = Employee::orderBy('age', 'DESC')->limit(2)->get();
//         foreach ($employees as $employee)
//         {
//             echo $employee->id . ' ' . $employee->first_name . ' ' . $employee->age . PHP_EOL;
//         };

        //Сделаем смещение

        $employees = Employee::orderBy('age', 'DESC')->skip(2)->limit(2)->get();
        foreach ($employees as $employee)
        {
            echo $employee->id . ' ' . $employee->first_name . ' ' . $employee->age . PHP_EOL;
        };
        return Command::SUCCESS;
    }
}
