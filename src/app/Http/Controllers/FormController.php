<?php

namespace App\Http\Controllers;

use App\Facades\FileHelperFacade;
use App\Http\Requests\FormsRequest;
use App\Models\Form;
use App\Models\Image;
use App\Services\FileHelperService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Services\FormService;

class FormController extends Controller
{
    private $service;

    public function __construct(FormService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $forms = $this->service->userForms();
        return view('forms.index', ['forms' => $forms]);
    }


    public function store(FormsRequest $request)
    {
        $this->service->store($request);

        return redirect()->route('forms.index');
    }

    public function edit($id)
    {
        $form = $this->service->index()->find($id);

        return view('forms.edit', ['form' => $form]);
    }

    public function update(FormsRequest $request, $id)
    {
        $this->service->update($request, $id);

        return redirect()->route('forms.edit', ['form' => $id]);
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('forms.index');
    }
}
