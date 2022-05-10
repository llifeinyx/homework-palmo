<?php

namespace App\Repositories;

use App\Facades\FileHelperFacade;
use App\Http\Requests\FormsRequest;
use App\Models\Form;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FormRepository
{
    private function query()
    {
        return Form::query();
    }

    public function index()
    {
        return $this->query()->get();
    }

    public function destroy($id)
    {
        //find this form
        $form = $this->query()->find($id);

        //detach images
        $form->images()->detach($form->images);

        //delete images
        foreach ($form->images as $image){
            $image->delete();
        }

        //delete form
        $form->delete();
    }

    public function store(FormsRequest $request, $images)
    {
        $data = $request->except('_token', '_method', 'inputFiles');
        $form = $this->query()->create([
           'name' => $data['inputName'],
            'description' => $data['inputDescription'],
            'user_id' => Auth::id(),
        ]);

        $form->images()->attach(Image::find($images));
    }
}
