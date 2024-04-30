<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestDataSelect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:data-select';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $employees = Employee::all();
//        foreach($employees as $employee) {
//            echo $employee->first_name . ' ' . $employee->age . PHP_EOL;
//        }
//
//        $employee = Employee::find(2);
//        echo $employee['first_name'] . ' ' . $employee['age'] . PHP_EOL;

//        $employees = Employee::where('first_name', '=', 'John')
//            ->where('age', '>', '27')
//            ->orWhere('age', '<', '27')
//            ->first();
//            ->get();
//
//        echo $employees['first_name'] . ' ' . $employees['age'] . PHP_EOL;

//        foreach($employees as $employee) {
//            echo $employee->first_name . ' ' . $employee->age . PHP_EOL;
//        }

//        // ASC or DESC, offset() or skip(), limit() or take()
//        $employees = Employee::orderBy('age', 'DESC')
//            ->offset(2)
//            ->limit(2)
//            ->get();
//
//        foreach($employees as $employee) {
//            echo $employee->first_name . ' ' . $employee->age . PHP_EOL;
//        }

//        $employees = DB::table('employees')
//            ->groupBy('first_name')
//            ->select('first_name', DB::raw('count(1) as employee_total'))
//            ->get();
//
//        foreach($employees as $employee) {
//            echo $employee->first_name . ' ' . $employee->employee_total . PHP_EOL;
//        }
//
//        $employees = Employee::distinct()
//            ->orderBy('first_name')
//            ->get(['first_name']);
//
//        foreach($employees as $employee) {
//            echo $employee->first_name . PHP_EOL;
//        }
    }
}
