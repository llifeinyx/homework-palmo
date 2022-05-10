<?php

namespace App\Http\Middleware;

use App\Models\Form;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserForms
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    //verification amount forms (must be <5)
    public function checkAmountForms(Request $request)
    {
        if ($this->user->form->count() >= 5){
            return redirect()->route('forms.index');
        }
        return false;
    }

    public function handle(Request $request, Closure $next, $role)
    {
        $form_id = $request->form;

        if ($role === 'store'){

            $result = $this->checkAmountForms($request);

            if ($result){
                return $result;
            }
        }

        if ($role === 'destroy' || $role === 'edit' || $role === 'update'){

            $form = $this->user->form->find($form_id);

            if (!isset($form)){
                return redirect()->route('forms.index');
            }

            if ($role === 'update'){

            }
        }




        return $next($request);
    }
}
