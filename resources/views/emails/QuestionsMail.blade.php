@component('mail::message')
    <h2>Hello {{$body['user']}},</h2>
    <p>You requested answer for question {!! strip_tags($body['question']) !!}, and here is answer:</p>

    <p>{!! strip_tags($body['answer']) !!}</p>

    <p>Login to site, and continue your glissade to your next great job and learn more about the Laravel framework.</p>
    @component('mail::button', ['url' => $body['login_link']])
        Log in
    @endcomponent

    Happy coding!<br>

    Thanks,<br>
    {{ config('app.name') }}<br>
    codedamage.
@endcomponent
