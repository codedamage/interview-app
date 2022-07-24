<?php

namespace App\Http\Controllers;
use App\Mail\QuestionsMail;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use MagicLink\Actions\LoginAction;
use MagicLink\MagicLink;

class MailController extends Controller
{
    public function sendMail(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'question'=>'required',
            'email'=>'required|email'
        ]);
        $email = $data['email'];
        $search = $data['question'];

        // Search in the title and body columns from the posts table
        $question = Question::query()
            ->where('question', 'LIKE', "%{$search}%")
            ->first();
        $urlToAutoLogin =  MagicLink::create(new LoginAction(Auth::user()))->url;
        $body = [
            'user' => Auth::user()->email,
            'question'=>$data['question'],
            'login_link' => $urlToAutoLogin,
            'answer'=> $question->answer,
        ];

        Mail::to($email)->send(new QuestionsMail($body));
        return back()->with('status','Mail sent successfully');
    }
}
