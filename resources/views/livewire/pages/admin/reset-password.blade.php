<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state('token')->locked();

state([
    'email' => fn () => request()->string('email')->value(),
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'token' => ['required'],
    'email' => ['required', 'string', 'email'],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$resetPassword = function () {
    $this->validate();

    // Here we will attempt to reset the user's password. If it is successful we
    // will update the password on an actual user model and persist it to the
    // database. Otherwise we will parse the error and return the response.
    $status = Password::broker('admins')->reset(
        $this->only('email', 'password', 'password_confirmation', 'token'),
        function ($user) {
            $user->forceFill([
                'password' => Hash::make($this->password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        }
    );

    // If the password was successfully reset, we will redirect the user back to
    // the application's home authenticated view. If there is an error we can
    // redirect them back to where they came from with their error message.
    if ($status != Password::PASSWORD_RESET) {
        $this->addError('email', __($status));

        return;
    }

    Session::flash('status', __($status));

    $this->redirectRoute('admin.login', navigate: true);
};

?>

{{-- <div>
    <form wire:submit="resetPassword">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="mt-1 block w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="mt-1 block w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}

<div
    class="bg-linear-180 mx-auto max-w-lg rounded-xl from-zinc-50 to-zinc-100 p-8 shadow outline outline-zinc-100 dark:from-zinc-800 dark:to-zinc-900 dark:outline-zinc-900">
    <div class="text-center lg:text-balance">
        <div class="inline-block mb-1 w-fit">
            <img src="/favicon.webp" class="object-contain" alt="">
        </div>
        <h1 class="text-xl font-semibold tracking-tight text-zinc-900 md:text-2xl lg:text-3xl dark:text-white">
            {{ __("Set your new password") }}
        </h1>
        <p class="mt-4 text-balance text-base text-zinc-500 dark:text-zinc-400">
            {{ __('Welcome back, we lost you for a sec. Let us set you up with a new password. Try something you wont forget so easlily but strong nonetheless') }}
        </p>
    </div>
    <form wire:submit="resetPassword" class="mt-10 space-y-4">
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
        <!-- Password -->
        <div class="w-full">
            <div class="mb-1 flex items-baseline justify-between">
                <label for="password" class="text-sm font-medium text-zinc-500">{{ __('Password') }}</label>
            </div>
            <div class="relative z-0 focus-within:z-10" x-data="{ value: '', showPassword: false }">
                <input placeholder="••••••••" required wire:model="password" id="password" x-model="value"
                    x-bind:type="showPassword ? 'text' : 'password'"
                    class="block h-10 w-full rounded-md border border-transparent bg-white px-4 py-2 align-middle text-sm leading-tight text-zinc-500 placeholder-zinc-400 shadow-sm ring-1 ring-zinc-200 transition duration-300 ease-in-out focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 dark:bg-zinc-800 dark:text-zinc-100 dark:placeholder-zinc-400 dark:ring-zinc-700 dark:focus:border-zinc-600 dark:focus:ring-blue-500"
                    aria-required="true" />
                <div class="absolute inset-y-0 right-0 flex items-center gap-2 pr-3">
                    <button type="button" @click="showPassword = !showPassword"
                        class="text-zinc-500 focus:outline-none dark:text-zinc-300" tabindex="-1"
                        aria-label="Toggle password visibility">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler-external-link size-4" x-show="!showPassword">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                            </path>
                        </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler-external-link size-4" x-show="showPassword">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"></path>
                            <path
                                d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87">
                            </path>
                            <path d="M3 3l18 18"></path>
                        </svg></button><button x-show="value" type="button" @click="value = ''"
                        class="text-zinc-400 hover:text-zinc-600 focus:outline-none dark:text-zinc-400 dark:hover:text-zinc-300"
                        aria-label="Clear input">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler-wave-x size-4 text-zinc-500 dark:text-zinc-300">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm password -->
        <div class="w-full">
            <div class="mb-1 flex items-baseline justify-between">
                <label for="password" class="text-sm font-medium text-zinc-500">{{ __('Password') }}</label>
            </div>
            <div class="relative z-0 focus-within:z-10" x-data="{ value: '', showPassword: false }">
                <input placeholder="••••••••" required wire:model="password_confirmation" id="password_confirmation" x-model="value"
                    x-bind:type="showPassword ? 'text' : 'password'"
                    class="block h-10 w-full rounded-md border border-transparent bg-white px-4 py-2 align-middle text-sm leading-tight text-zinc-500 placeholder-zinc-400 shadow-sm ring-1 ring-zinc-200 transition duration-300 ease-in-out focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 dark:bg-zinc-800 dark:text-zinc-100 dark:placeholder-zinc-400 dark:ring-zinc-700 dark:focus:border-zinc-600 dark:focus:ring-blue-500"
                    aria-required="true" />
                <div class="absolute inset-y-0 right-0 flex items-center gap-2 pr-3">
                    <button type="button" @click="showPassword = !showPassword"
                        class="text-zinc-500 focus:outline-none dark:text-zinc-300" tabindex="-1"
                        aria-label="Toggle password visibility">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler-external-link size-4" x-show="!showPassword">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                            </path>
                        </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler-external-link size-4" x-show="showPassword">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"></path>
                            <path
                                d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87">
                            </path>
                            <path d="M3 3l18 18"></path>
                        </svg></button><button x-show="value" type="button" @click="value = ''"
                        class="text-zinc-400 hover:text-zinc-600 focus:outline-none dark:text-zinc-400 dark:hover:text-zinc-300"
                        aria-label="Clear input">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler-wave-x size-4 text-zinc-500 dark:text-zinc-300">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        {{-- <div class="flex items-center">
            <input type="checkbox" id="login-remember" name="login-remember"
                class="size-4 rounded border-zinc-300 text-blue-600 shadow focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" />
            <label for="login-remember" class="ml-2 text-sm font-medium text-zinc-500">
                {{ __('Remember me for 30 days') }}
            </label>
        </div> --}}
        <button
            class="relative flex h-10 w-full select-none items-center justify-center rounded-md bg-zinc-900 px-5 text-center text-sm font-medium text-white outline outline-zinc-900 transition-colors duration-200 ease-in-out hover:bg-zinc-950 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-950 dark:bg-zinc-100 dark:text-zinc-900 dark:outline-zinc-100 dark:hover:bg-zinc-200 dark:focus-visible:outline-zinc-200">
            {{ __('Reset password') }}
        </button>
    </form>
</div>