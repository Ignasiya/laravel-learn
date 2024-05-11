<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WorkerController extends Controller
{
    public function index(int $id = null): View|Application|Factory
    {
        return view('worker',
            [
                'worker' => $id ? Worker::where('id', $id)->first() : null
            ]);
    }

    public function store(Request $request)
    {
        # Первый вариант
        $worker = new Worker($request->all());
//
//        $worker->first_name = $request->input('first_name');
//        $worker->last_name = $request->input('last_name');
//        $worker->department = $request->input('department');

        $worker->department = serialize($request->input('department'));

        $worker->save();

        return Redirect::route('worker.show', ['id' => $worker->id]);
    }
}
