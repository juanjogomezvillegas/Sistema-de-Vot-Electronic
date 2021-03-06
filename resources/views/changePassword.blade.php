@extends('layouts.app')

@section('content')
    <div class="mt-6 p-6">
        <h1 class="title has-text-centered mb-3">Change Password</h1>
        @if(session()->exists('messageChangePassword'))
            <article class="message is-success">
                <div class="message-body">
                    {{ session()->get('messageChangePassword') }}
                </div>
            </article>
        @endif
        @if(session()->exists('messageChangePasswordError'))
            <article class="message is-danger">
                <div class="message-body">
                    {{ session()->get('messageChangePasswordError') }}
                </div>
            </article>
        @endif
        <form action="/change-password/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="field ">
                <label class="label m-2">New Password</label>
                <div class="control has-icons-left has-icons-right">
                    <input name="newpassword" class="input is-dark" type="password" placeholder="*********">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>
            <div class="field ">
                <label class="label m-2">New Password Verify</label>
                <div class="control has-icons-left has-icons-right">
                    <input name="newpasswordverify" class="input is-dark" type="password" placeholder="*********">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="button is-fullwidth is-black mt-5">Change Password <i class="fas fa-lock ml-2"></i></button>
        </form>
    </div>
@endsection
