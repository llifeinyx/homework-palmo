<?php


namespace App\Services;

use App\Facades\FileHelperFacade;
use App\Http\Requests\FormsRequest;
use App\Models\Image;
use App\Repositories\FormRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FormService
{
    private $repository;

    public function __construct(FormRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function destroy($id){
        $this->repository->destroy($id);
    }

    public function userForms(){
        $user = User::find(Auth::id());
        return $user->form;
    }

    public function store(FormsRequest $request)
    {
        $files = $request['inputFiles'];
        $images = [];
        foreach ($files as $file){
            $path = FileHelperFacade::saveFile($file, 'avatars');
            $image = Image::create([
                'path' => $path,
            ]);
            array_push($images, $image->id);
        }
        $this->repository->store($request,$images); // сохранили запись в БД
    }
}
