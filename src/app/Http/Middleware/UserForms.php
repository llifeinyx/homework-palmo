<?php

namespace App\Http\Middleware;

use App\Models\Form;
use App\Models\Image;
use Closure;
use Illuminate\Database\Eloquent\Collection;
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
    private function checkAmountForms(Request $request)
    {
        if ($this->user->form->count() >= 5){
            return redirect()->route('forms.index');
        }
        return false;
    }

    private function checkPrivacyImages(Request $request, $form)
    {
        $input = $request->input('image');

        $images = Collection::make();

        foreach ($this->user->form as $form){
            foreach ($form->images as $image){
                $images->push($image);
            }
        }

        //check privacy images
        if ($images->find($input)->count() !== count($input)){
            return redirect()->back();
        }

        $files = $request['inputFiles'];
        $form_files = $form->images;

        $count = $form_files->count() - count($request->input('image'));

        if ($count === 0 && $files === null)
        {
            return redirect()->back();
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

            if ($role === 'update' && $request->input('image') != NULL){
                $result = $this->checkPrivacyImages($request, $form);
                if ($result){
                    return $result;
                }
            }
        }


        return $next($request);
    }
}
