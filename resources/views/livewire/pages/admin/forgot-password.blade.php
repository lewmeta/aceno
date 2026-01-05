<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state(['email' => '']);

rules(['email' => ['required', 'string', 'email']]);

$sendPasswordResetLink = function () {
    $this->validate();

    // We will send the password reset link to this user. Once we have attempted
    // to send the link, we will examine the response then see the message we
    // need to show to the user. Finally, we'll send out a proper response.
    $status = Password::broker('admins')->sendResetLink($this->only('email'), function ($user, $token) {
        $notification = new ResetPassword($token);
        $notification->createUrlUsing(function () use ($user, $token) {
            return route('admin.password.reset', ['token' => $token, 'email' => $user->getEmailForPasswordReset()]);
        });

        $user->notify($notification);
    });

    if ($status != Password::RESET_LINK_SENT) {
        $this->addError('email', __($status));

        return;
    }

    $this->reset('email');

    Session::flash('status', __($status));
};

?>

{{-- <div>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="mt-1 block w-full" type="email" name="email" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}

<div
    class="bg-linear-180 mx-auto max-w-md rounded-xl from-zinc-50 to-zinc-100 p-8 shadow outline outline-zinc-100 dark:from-zinc-800 dark:to-zinc-900 dark:outline-zinc-900">
    <div class="text-center lg:text-balance">
        <div class="inline-block mb-1 w-fit">
            <img src="/favicon.webp" class="object-contain" alt="">
        </div>
        <h1 class="text-xl font-semibold tracking-tight text-zinc-900 md:text-2xl lg:text-3xl dark:text-white">
            {{ __("Let's reset your password") }}
        </h1>
        <p class="mt-4 text-balance text-base text-zinc-500 dark:text-zinc-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link!') }}
        </p>
    </div>
    
    <form wire:submit="sendPasswordResetLink" class="mt-10 space-y-4">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- Email address -->
        <div class="w-full">
            <div class="mb-1 flex items-baseline justify-between">
                <label for="email" class="text-sm font-medium text-zinc-500">{{ __('Email Address') }}</label>
            </div>
            <div class="relative z-0 focus-within:z-10">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler-arrow-mail size-4 text-zinc-500 dark:text-zinc-300">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                        </path>
                        <path d="M3 7l9 6l9 -6"></path>
                    </svg>
                </div>
                <input placeholder="you@example.com" id="email" name="email" type="email"
                    wire:model="email"
                    class="block h-10 w-full rounded-md border border-transparent bg-white px-4 py-2 pl-10 align-middle text-sm leading-tight text-zinc-500 placeholder-zinc-400 shadow-sm ring-1 ring-zinc-200 transition duration-300 ease-in-out focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 dark:bg-zinc-800 dark:text-zinc-100 dark:placeholder-zinc-400 dark:ring-zinc-700 dark:focus:border-zinc-600 dark:focus:ring-blue-500"
                    inputmode="email" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit button -->
        <button
            class="relative flex h-10 w-full select-none items-center justify-center rounded-md bg-zinc-900 px-5 text-center text-sm font-medium text-white outline outline-zinc-900 transition-colors duration-200 ease-in-out hover:bg-zinc-950 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-950 dark:bg-zinc-100 dark:text-zinc-900 dark:outline-zinc-100 dark:hover:bg-zinc-200 dark:focus-visible:outline-zinc-200">
            {{ __('Reset password') }}
        </button>
    </form>
    <div class="flex items-center lg:justify-between lg:flex-row flex-col space-y-1">
        <!-- Sign up -->
        <p class="mt-4 text-xs font-medium text-zinc-500 dark:text-zinc-400">
            {{ __("Remember you password?") }}
            <a href="{{ route('admin.login') }}" wire:navigate
                class="font-medium text-blue-500 hover:text-zinc-500 dark:text-blue-400 dark:hover:text-zinc-300">
                {{ __('Sign in ') }}
            </a>
        </p>
    </div>
</div>
