<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class TestDataGroupBy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Test:data-groupBy';

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
    //Запрос значений с группировкой по столбцу и считаем их количество
//     $employees = DB::connection('second_mysql')->table('employees')->
//                 groupBy('first_name')->
//                 select('first_name', DB::raw('count(1) as employee_total'))->
//                 get();
//
//     foreach ($employees as $employee)
//     {
//         echo $employee->first_name . ' ' . $employee->employee_total . PHP_EOL;
//     };
//         return Command::SUCCESS;
//     }

//Запрос только уникальных значений (узнаем какие имена сотрудников кообще есть)
//     $employees = Employee::distinct()->
//                     get('first_name');
//
//         foreach ($employees as $employee)
//         {
//             echo $employee->first_name . PHP_EOL;
//         };
//             return Command::SUCCESS;
//         }

//Отсортируем выведенные результаты

    $employees = Employee::distinct()->
                    orderBy('first_name')->
                    get('first_name');

    foreach ($employees as $employee)
    {
        echo $employee->first_name . PHP_EOL;
    };
        return Command::SUCCESS;
    }
}
