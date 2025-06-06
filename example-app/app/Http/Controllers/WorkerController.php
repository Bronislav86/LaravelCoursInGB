<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Worker;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\WorkerForm;

class WorkerController extends Controller
{
    public function show($id = null)
    {
        return View('workers', ['worker' => $id ? Worker::where('id', $id)->first() : null]);
    }

    public function showForm(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(WorkerForm::class, [
            'method' => 'POST',
            'url' => route('formBuilder_store_worker')
        ]);
        return View('showFormWorkerForm', compact('form'));
    }

    public function create()
    {
        return view('workers', ['worker' => null]); // Пустая форма
    }

    public function store(Request $request)
    {
        $worker = new Worker($request->all());
        $worker->department = serialize($request->input('department'));

        $worker->save();

        return Redirect::route('show_worker', ['id' => $worker->id]);
    }
}
