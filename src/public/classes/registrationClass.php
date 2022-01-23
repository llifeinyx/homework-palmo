<?php
namespace RegistrationClass;

include "baseClass.php";
include "interfaces.php";

use BaseClass\FormTreatment as FormTreatment;
use interfaces\RegistrationInterface as RegistrationInterface;

class RegistrationValidation extends FormTreatment implements RegistrationInterface
{
    public $userData = false;
    public function __construct($postArray, $filesArray)
    {
        parent::__construct($postArray);
        if (isset($filesArray['avatar'])){
            $this->formPost['avatar'] = $filesArray['avatar'];
        }
    }

    public function loginValidation()
    {
        if(!$this->strim($this->formPost['login'])
            || strlen($this->strim($this->formPost['login'])) < 5){
            $this->validation = false;
        }
    }
    public function emailValidation()
    {
        if (!$this->formPost['email'] ||
            !filter_var($this->formPost['email'], FILTER_VALIDATE_EMAIL)){
            $this->validation = false;
        }
    }
    public function passwordValidation()
    {
        $strArray = str_split($this->formPost['password']);
        $hasNumber = false;
        $hasBigChar = false;
        foreach ($strArray as $char){
            if (ctype_digit($char)){
                $hasNumber = true;
            }
            if (!ctype_digit($char) && $char === mb_strtoupper($char)){
                $hasBigChar = true;
            }
        }
        if (!$this->formPost['password'] || !($hasNumber && $hasBigChar)){
            $this->validation = false;
        }
    }
    public function confirmPasswordValidation()
    {
        if (!$this->formPost['confirm-password'] ||
            $this->formPost['password'] !== $this->formPost['confirm-password']){
            $this->validation = false;
        }
    }
    public function avatarValidation()
    {
        if (isset($this->formPost['avatar'])){
            $file = $this->formPost['avatar'];
            if (!(pathinfo($file['name'], PATHINFO_EXTENSION) === 'jpg' ||
                pathinfo($file['name'], PATHINFO_EXTENSION) === 'jpeg' ||
                pathinfo($file['name'], PATHINFO_EXTENSION) === 'png')){
                $this->validation = false;
            }
        } else {
            $this->validation = false;
        }
    }
    public function validationProcess()
    {
        $this->loginValidation();
        $this->emailValidation();
        $this->passwordValidation();
        $this->confirmPasswordValidation();
        $this->avatarValidation();
        if ($this->validation === false){
            if (!isset($_COOKIE['registration-error'])){
                setcookie('registration-error', 'Ошибка при регистрации');
            }
            header('Location: registration.php');
        } else {
            setcookie('registration-error', '', time() - 3600);
            $this->userData = $this->formPost;
            $tmpPath = $this->formPost['avatar']['tmp_name'];
            $fileName = $this->formPost['avatar']['name'];
            $newPath = dirname(__FILE__, 2) . '/uploads/' . $fileName;
            move_uploaded_file($tmpPath, $newPath);
        }
    }
}