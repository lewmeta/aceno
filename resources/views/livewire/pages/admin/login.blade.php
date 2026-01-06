<?php

use App\Livewire\Admin\Actions\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.guest');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('admin.dashboard', absolute: false), navigate: true);
};

?>

{{-- <div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Admin Email')" />
            <x-text-input wire:model="form.email" id="email" class="mt-1 block w-full" type="email" name="email"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="mt-1 block w-full" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 block">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
            @if (Route::has('password.request'))
                <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    href="{{ route('admin.password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}

<div
    class="bg-linear-180 mx-auto max-w-md rounded-xl from-zinc-50 to-zinc-100 p-8 shadow outline outline-zinc-100 dark:from-zinc-800 dark:to-zinc-900 dark:outline-zinc-900">
    <div class="lg:text-balance text-center">
        <div class="mb-1 inline-block w-fit">
            <img src="/favicon.webp" class="object-contain" alt="">
        </div>
        <h1 class="text-xl font-semibold tracking-tight text-zinc-900 dark:text-white md:text-2xl lg:text-3xl">
            {{ __("Let's get you in to Aceno") }}
        </h1>
        <p class="text-balance mt-4 text-base text-zinc-500 dark:text-zinc-400">
            {{ __('Welcome back! Fire up that password muscle memory, just like the good old dial-up days.') }}
        </p>
    </div>
    <form wire:submit="login" class="mt-10 space-y-4">
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
                    wire:model="form.email"
                    class="block h-10 w-full rounded-md border border-transparent bg-white px-4 py-2 pl-10 align-middle text-sm leading-tight text-zinc-500 placeholder-zinc-400 shadow-sm ring-1 ring-zinc-200 transition duration-300 ease-in-out focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 dark:bg-zinc-800 dark:text-zinc-100 dark:placeholder-zinc-400 dark:ring-zinc-700 dark:focus:border-zinc-600 dark:focus:ring-blue-500"
                    inputmode="email" />
            </div>
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="w-full">
            <div class="mb-1 flex items-baseline justify-between">
                <label for="password" class="text-sm font-medium text-zinc-500">{{ __('Password') }}</label>
            </div>
            <div class="relative z-0 focus-within:z-10" x-data="{ value: '', showPassword: false }">
                <input placeholder="••••••••" required wire:model="form.password" id="password" x-model="value"
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
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>
        <div class="flex items-center">
            <input type="checkbox" id="login-remember" name="login-remember"
                class="size-4 rounded border-zinc-300 text-blue-600 shadow focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" />
            <label for="login-remember" class="ml-2 text-sm font-medium text-zinc-500">
                {{ __('Remember me for 30 days') }}
            </label>
        </div>
        <button
            class="relative flex h-10 w-full select-none items-center justify-center rounded-md bg-zinc-900 px-5 text-center text-sm font-medium text-white outline outline-zinc-900 transition-colors duration-200 ease-in-out hover:bg-zinc-950 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-950 dark:bg-zinc-100 dark:text-zinc-900 dark:outline-zinc-100 dark:hover:bg-zinc-200 dark:focus-visible:outline-zinc-200">
            {{ __('Sign in with email') }}
        </button>
        <button disabled
            class="relative flex h-10 w-full cursor-not-allowed select-none items-center justify-center gap-2.5 rounded-md bg-white px-5 text-center text-sm font-medium text-zinc-700 outline outline-zinc-200 transition-colors duration-200 ease-in-out hover:bg-zinc-50 hover:shadow-sm focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-900 dark:bg-zinc-800 dark:text-zinc-100 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400">
            <svg class="size-4" slot="left-icon" viewBox="0 0 256 262" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"
                    fill="#4285F4"></path>
                <path
                    d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"
                    fill="#34A853"></path>
                <path
                    d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"
                    fill="#FBBC05"></path>
                <path
                    d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"
                    fill="#EB4335"></path>
            </svg>
            {{ __('Sign in with Google') }}
        </button>
    </form>
    <div class="flex flex-col items-center space-y-1 lg:flex-row lg:justify-between">

        <!-- Forgot password -->
        @if (Route::has('password.request'))
            <p class="mt-4 text-xs font-medium text-zinc-500 dark:text-zinc-400">
                {{ __('Forgot password?') }}
                <a href="{{ route('admin.password.request') }}" wire:navigate
                    class="font-medium text-blue-500 hover:text-zinc-500 dark:text-blue-400 dark:hover:text-zinc-300">
                    {{ __('Reset') }}
                </a>
            </p>
        @endif

    </div>
</div>
