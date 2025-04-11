<?php

namespace Core;

abstract class Model
{
    protected $fillable = [];

    public $table;

    protected $values = [];
    public $errors = [];
    protected $rules = [];

    protected $ruleslist = ['min','max','required'];
    protected $messages = [
        'min' => 'Length of this field has to be longer',
        'max' => 'Length of this field has to be shorter',
        'required' => 'This field is empty!'
        ];


    public function autoload() {
        foreach ($this->fillable as $value ) {
            if (!isset($_POST[$value])) {
                $this->values[$value] = '';
            }
            else {
                $this->values[$value] = $_POST[$value];
            }
        }
    }

    public function validatefield($rules,$field,$value) {
        foreach ($rules as $key => $rule) {
            if(!$this->{$key}($value,$rule)) {
                $this->errors[$field][$key] = $this->messages[$key];
            }
        }
    }

    public function validate() {
        foreach ($this->values as $key => $value) {
            if (isset($this->rules[$key])) {
                $this->validatefield($this->rules[$key],$key,$value);
            }
        }
    }

    public function min($value,$rule) {
        return mb_strlen($value) >= $rule;
    }

    public function required($value,$rule) {
        return !empty($value);

    }

    public function max($value,$rule) {
        return mb_strlen($value) <= $rule;
    }

    public function checkerrors() {
        return !empty($this->errors);
    }

    public function getmerge() {
        return array_merge([ 'values' => $this->values],['errors' => $this->errors]);
    }

    public function get() {
        return $this->values;
    }

    public function equal($field1,$field2) {
        return password_verify($field2,$field1);
    }

}