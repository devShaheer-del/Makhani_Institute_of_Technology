@component('mail::message')
# Hello, {{ $user->name }}

Your account has been created successfully. 🎉  

Here are your details:

- **Personal ID:** {{ $user->Personal_ID }}
- **Name:** {{ $user->name }}
- **Email:** {{ $user->email }}

@component('mail::button', ['url' => url('/verify/'.$user->Personal_ID)])
Verify My Account
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
<span>Regards Makhani Institute of Technology</span>
@endcomponent
