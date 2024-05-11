<?php

namespace App\Http\Controllers;

use App\Forms\EmployeeForm;
use Kris\LaravelFormBuilder\FormBuilder;

class FormBuilderTestController extends Controller
{
    public function show(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(EmployeeForm::class, [
            'method' => 'POST',
            'url' => route('build.post')
        ]);

        return view('builder', compact('form'));
    }
}
