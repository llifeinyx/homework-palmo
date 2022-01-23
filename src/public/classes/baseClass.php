<?php

namespace BaseClass;

abstract class FormTreatment
{
    public $validation = true;
    protected $formPost = [];
    protected $formType;
    public function __construct($postArray)
    {
        if ($postArray['send-form'] === 'Зарегистрироваться'){
            $this->formType = 'registration';
        }
        if ($postArray['send-form'] === 'Авторизироваться'){
            $this->formType = 'authorization';
        }
        foreach ($postArray as $key => $item){
            $this->formPost[$key] = $this->strim($item);
        }
    }
    public function strim($str)
    {
        return htmlspecialchars(trim($str));
    }
    abstract public function validationProcess();
}