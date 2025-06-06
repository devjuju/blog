<?php

namespace App\Forms;

use App\Validators\ValidatorContact;

class FormContact
{

    public object $data;


    public function __construct(object $data)
    {
        $this->data = $data;
    }


    public function validate(): array|bool
    {

        $validator = new ValidatorContact($this->data);
        $result = $validator->checkData();
        print_r($result);


        foreach ($result as $key => $value) {
            if ($value === true) {
                unset($result[$key]);
            }
        }


        return $result;
    }
}
