<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class WorkerForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text')
            ->add('last_name', 'text')
            ->add('personal_data_agreement', 'checkbox');
    }
}
