<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Models\User;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Resume;
use App\Http\Controllers\UploadFile;
use Mail;
use View;

class ResponseController extends Controller
{
    public function sendFile($id, Guard $auth, Request $request)
    {
        $user = User::find($auth->user()->getAuthIdentifier());
        $uploadFile = UploadFile::upFile();

        if($uploadFile==null){
            $error = 'Необхiдний формат файлу: doc, docx, odt, rtf, txt, pdf розмiром до 2 мб.';
            return View::make('errors.uploadFileError', array(
                'error' => $error
            ));
        }
        Mail::send('emails.companyFile', ['user' => $user, 'file' =>$uploadFile], function ($message) use ($uploadFile, $id){
            $company = Company::find($id);
            $user = User::find($company->users_id);
            $to = $user->email;
            $message->to($to, $user->name)->subject('Резюме  '.$user->name);

            $message->attach($uploadFile);
        });
        File::delete($uploadFile);
        return redirect()->back();

    }
    public function sendResume($id, Guard $auth, Request $request)
    {
        $this->validate($request,[
            'resumeId' => 'required'
        ]);

        $user = User::find($auth->user()->getAuthIdentifier());
        $resume = Resume::find($id);
        Mail::send('emails.companyResume', ['user' => $user, 'resume' => $resume], function ($message) use($id){
            $company = Company::find($id);
            $user = User::find($company->users_id);
            $to = $user->email;
            $message->to($to, $user->name)->subject('Резюме  '.$user->name);
        });
        return redirect()->back();
    }
}
