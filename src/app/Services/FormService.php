<?php


namespace App\Services;

use App\Facades\FileHelperFacade;
use App\Http\Requests\FormsRequest;
use App\Jobs\FormNotificationJob;
use App\Models\Image;
use App\Repositories\FormRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FormService
{
    private $repository;

    public function __construct(FormRepository $repository)
    {
        $this->repository = $repository;
    }

    private function fileTreatment($files)
    {
        $images = [];
        foreach ($files as $file){
            $path = FileHelperFacade::saveFile($file, 'avatars');
            $image = Image::create([
                'path' => $path,
            ]);
            array_push($images, $image->id);
        }
        return $images;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
    }

    public function userForms()
    {
        $user = User::find(Auth::id());
        return $user->form;
    }

    public function update(FormsRequest $request, $id)
    {
        $images = null;

        $files = $request['inputFiles'];
        if (isset($files)){
            $images = $this->fileTreatment($files);
        }
        $this->repository->update($request, $id, $images);
    }

    public function store(FormsRequest $request)
    {
        $files = $request['inputFiles'];

        $images = $this->fileTreatment($files);

        $this->repository->store($request,$images); // сохранили запись в БД

//        Mail::send('emails.form', [], function ($message) {
//            $message->to('sabaka@gmail.com', 'user')->subject('Smart form create!');
//            $message->from('palmo.example@gmail.com', 'palmo');
//        });

        $user = Auth::user();

        $dispatchInfo = [
            'username' => $user->name,
            'email' => $user->email
        ];

        FormNotificationJob::dispatch($dispatchInfo);
    }
}
