<?php
namespace AuthorizationClass;

include "baseClass.php";
include "interfaces.php";

use BaseClass\FormTreatment as FormTreatment;
use Interfaces\AuthorizationInterface as AuthorizationInterface;

class AuthorizationValidation extends FormTreatment implements AuthorizationInterface
{
    public $rememberCheck = false;
    public $userKey;
    protected $sessionArray;
    public function __construct($postArray, $sessionArray)
    {
        parent::__construct($postArray);
        $this->sessionArray = $sessionArray['users'];
    }

    public function loginAndPasswordValidation()
    {
        $this->validation = false;
        foreach ($this->sessionArray as $key => $user){
            //echo $user['login'] . "<br>";
            //echo $user['password'] . "<br>";
            if ($user['login'] === $this->formPost['login'] &&
                $user['password'] === $this->formPost['password']){
                $this->userKey = $key;
                $this->validation = true;
            }
        }
    }
    public function validationProcess()
    {
        $this->loginAndPasswordValidation();
        if ($this->validation === false){
            if (!isset($_COOKIE['authorization-error'])){
                setcookie('authorization-error', 'Ошибка при авторизации');
            }
            header('Location: authorization.php');
        } else {
            setcookie('authorization-error', '', time() - 3600);
            if (isset($this->formPost['remember-me']) && $this->formPost['remember-me'] === 'true'){
                $this->rememberCheck = true;
            }
        }
    }
}