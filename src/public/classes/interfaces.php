<?php

namespace Interfaces;

interface RegistrationInterface
{
    public function loginValidation();
    public function emailValidation();
    public function passwordValidation();
    public function confirmPasswordValidation();
    public function avatarValidation();
}

interface AuthorizationInterface
{
    public function loginAndPasswordValidation();
}