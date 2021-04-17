@extends('layouts.app',['title'=>'Profile - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        @if (session('status'))
            <div class="bg-green-500 p-3 rounded-md shadow-sm mt-3">
                @if (session('status')=='profile-information-updated')
                Profile has been updated.
                @endif
                @if (session('status')=='password-updated')
                Password has been updated.
                @endif
                @if (session('status')=='two-factor-authentication-disabled')
                Two factor authentication disabled.
                @endif
                @if (session('status')=='two-factor-authentication-enabled')
                Two factor authentication enabled.
                @endif
                @if (session('status')=='recovery-codes-generated')
                Recovery codes generated.
                @endif
            </div>
        @endif
    </div>
</main>
    
@endsection