<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.guest');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
};

?>

{{-- <div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="mt-1 block w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="mt-1 block w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 block">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
            @if (Route::has('password.request'))
                <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}

<div class="w-full flex">
    <div class="flex items-center justify-center w-full lg:w-1/2">
        <div class="w-full max-w-md p-8 py-24 lg:py-32">
            <div>
                <a href="{{ route('home') }}">
                    <span class="sr-only">{{ __('Back to home') }}</span>
                    <img src="/favicon.webp" alt="">
                    {{-- <svg class="h-12 text-zinc-900 dark:text-white" aria-hidden="true" viewBox="0 0 2895 2895"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1936.72 1316.69V1677.28L1700.54 1540.97V1452.99L1537.73 1359.06L1461.65 1315.07V1042.46L1536.29 1085.55L1773.92 1222.76L1936.72 1316.69Z"
                            stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M988.017 1041.56V1315.79L913.191 1359.06L753.454 1451.19V1537.55L516.003 1674.75V1314.16L675.746 1221.85L911.752 1085.55L988.017 1041.56Z"
                            stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M2408.73 1044.08L2096.46 1224.38L1936.72 1316.69L1773.92 1222.75L1536.29 1085.55L1461.65 1042.46L1621.57 950.15L1696.21 907.06L1933.65 769.856L2408.73 1044.08Z"
                            fill="#17181B" stroke="#17181B" stroke-width="18.0294" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M1696.23 632.653L1383.96 812.947L1224.03 905.257L1061.23 811.324L748.96 631.03L1221.15 358.425L1696.23 632.653Z"
                            fill="#17181B" stroke="#17181B" stroke-width="18.0294" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M988.023 1041.56L911.761 1085.55L675.754 1221.85L516.012 1314.16L353.21 1220.05L40.9387 1039.76L512.947 767.333L748.954 903.635L825.218 947.627L988.023 1041.56Z"
                            fill="#17181B" stroke="#17181B" stroke-width="18.0294" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M2408.73 1044.08V1404.67L1936.72 1677.28V1316.69L2096.46 1224.38L2408.73 1044.08Z"
                            stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M1700.55 1452.99V1813.58L1228.54 2086.18V1725.59L1388.28 1633.28L1624.47 1496.98L1700.55 1452.99Z"
                            stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M1700.55 1452.99L1624.47 1496.98L1388.28 1633.28L1228.54 1725.59L1065.74 1631.48L828.288 1494.46L753.468 1451.19L913.207 1359.06L988.031 1315.79L1149.39 1222.75L1224.03 1179.66L1225.48 1178.76L1300.12 1221.85L1461.66 1315.07L1537.75 1359.06L1700.55 1452.99Z"
                            fill="#17181B" stroke="#17181B" stroke-width="18.0294" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M1228.54 1725.59V2086.18L753.468 1811.77V1451.19L828.288 1494.46L1065.74 1631.48L1228.54 1725.59Z"
                            stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path d="M516.012 1314.16V1674.75L40.9387 1400.34V1039.76L353.21 1220.05L516.012 1314.16Z"
                            stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M1696.22 632.651V907.059L1621.58 950.149L1461.66 1042.46V1128.64L1300.12 1221.85L1225.47 1178.76L1224.03 1179.66V905.256L1383.95 812.945L1696.22 632.651Z"
                            stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M1224.03 905.257V1179.66L1149.39 1222.75L988.03 1129.54V1041.56L825.225 947.626L748.96 903.634V631.029L1061.23 811.323L1224.03 905.257Z"
                            stroke="#17181B" stroke-width="18.0294" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg> --}}
                </a>
                <h1
                    class="text-2xl md:text-3xl lg:text-4xl mt-12 font-semibold tracking-tight text-zinc-900 dark:text-white">
                    {{ __('Sign in') }}
                </h1>
                <p class="text-base mt-4 text-zinc-500 dark:text-zinc-400 text-balance">
                    {{ __('Welcome back. You know the drill, email, password, maybe a tear or two.') }}
                </p>
            </div>
            <form class="mt-10 space-y-4">
                <div class="w-full">
                    <div class="flex justify-between items-baseline mb-1">
                        <label for="email"
                            class="font-medium text-zinc-500 text-sm">{{ __('Email Address') }}</label>
                    </div>
                    <div class="relative z-0 focus-within:z-10">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler-arrow-mail size-4 text-zinc-500 dark:text-zinc-300">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                </path>
                                <path d="M3 7l9 6l9 -6"></path>
                            </svg>
                        </div>
                        <input placeholder="you@example.com" id="email" name="email" type="email"
                            class="w-full block transition duration-300 ease-in-out leading-tight align-middle focus:z-10 pl-10 h-10 px-4 py-2 text-sm rounded-md bg-white border border-transparent text-zinc-500 ring-1 ring-zinc-200 placeholder-zinc-400 focus:border-blue-500 focus:ring-blue-100 focus:ring-2 focus:outline-none shadow-sm dark:bg-zinc-800 dark:text-zinc-100 dark:ring-zinc-700 dark:placeholder-zinc-400 dark:focus:border-zinc-600 dark:focus:ring-blue-500"
                            inputmode="email" />
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex justify-between items-baseline mb-1">
                        <label for="password" class="font-medium text-zinc-500 text-sm">{{ __('Password') }}</label>
                    </div>
                    <div class="relative z-0 focus-within:z-10" x-data="{ value: '', showPassword: false }">
                        <input placeholder="••••••••" required id="password" name="password" x-model="value"
                            x-bind:type="showPassword ? 'text' : 'password'"
                            class="w-full block transition duration-300 ease-in-out leading-tight align-middle focus:z-10 h-10 px-4 py-2 text-sm rounded-md bg-white border border-transparent text-zinc-500 ring-1 ring-zinc-200 placeholder-zinc-400 focus:border-blue-500 focus:ring-blue-100 focus:ring-2 focus:outline-none shadow-sm dark:bg-zinc-800 dark:text-zinc-100 dark:ring-zinc-700 dark:placeholder-zinc-400 dark:focus:border-zinc-600 dark:focus:ring-blue-500"
                            aria-required="true" />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 gap-2">
                            <button type="button" @click="showPassword = !showPassword"
                                class="text-zinc-500 dark:text-zinc-300 focus:outline-none" tabindex="-1"
                                aria-label="Toggle password visibility">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-external-link size-4"
                                    x-show="!showPassword">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                    </path>
                                </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler-external-link size-4"
                                    x-show="showPassword">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"></path>
                                    <path
                                        d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87">
                                    </path>
                                    <path d="M3 3l18 18"></path>
                                </svg></button><button x-show="value" type="button" @click="value = ''"
                                class="text-zinc-400 hover:text-zinc-600 dark:text-zinc-400 dark:hover:text-zinc-300 focus:outline-none"
                                aria-label="Clear input">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler-wave-x size-4 text-zinc-500 dark:text-zinc-300">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M18 6l-12 12"></path>
                                    <path d="M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="login-remember" name="login-remember"
                        class="rounded border-zinc-300 text-blue-600 focus:ring-blue-500 focus:ring-offset-2 focus:ring-2 shadow size-4" />
                    <label for="login-remember" class="ml-2 text-sm font-medium text-zinc-500">
                        {{ __('Remember me for 30 days') }}
                    </label>
                </div>
                <button
                    class="relative flex items-center text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md w-full text-white bg-zinc-900 outline outline-zinc-900 hover:bg-zinc-950 focus-visible:outline-zinc-950 dark:bg-zinc-100 dark:text-zinc-900 dark:outline-zinc-100 dark:hover:bg-zinc-200 dark:focus-visible:outline-zinc-200 h-10 px-5 text-sm">
                    {{ __('Sign in with email') }}
                </button>
                <button
                    class="text-center font-medium transition-colors duration-200 ease-in-out select-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:z-10 justify-center rounded-md text-zinc-700 bg-white outline outline-zinc-200 hover:shadow-sm hover:bg-zinc-50 focus-visible:outline-zinc-900 dark:text-zinc-100 dark:bg-zinc-800 dark:outline-zinc-600 dark:hover:bg-zinc-700 dark:focus-visible:outline-zinc-400 h-10 px-5 text-sm gap-2.5 relative flex items-center w-full">
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
                    <span class="absolute w-2 h-2 bg-green-500 rounded-full right-3 top-1/2 -translate-y-1/2"></span>
                </button>
            </form>
            <p class="text-xs mt-4 font-medium text-zinc-500">
                {{ __("Dont' have an account?") }}
                <a href="{{ route('register') }}" class="font-medium text-blue-500 hover:text-zinc-500">
                    {{ __('Sign up') }}
                </a>
            </p>
        </div>
    </div>
    <div class="relative hidden lg:block lg:w-1/2">
        <img src="https://oxbowui.com/.netlify/images?url=_astro%2F1.D7dn6lqI.jpeg&w=1200&h=1200" alt="#_"
            aria-hidden="true" loading="lazy" decoding="async" fetchpriority="auto" width="1200" height="1200"
            class="object-cover object-left w-full h-full bg-zinc-50 grayscale" />
        <div
            class="absolute p-8 shadow bg-linear-180 outline outline-zinc-100 dark:outline-zinc-800 from-zinc-50 to-zinc-100 dark:from-zinc-800 dark:to-zinc-900 rounded-xl bottom-20 left-10 right-10">
            <div class="relative flex flex-col gap-2">
                <h3 class="text-base font-medium text-zinc-900 dark:text-white">
                    {{ __('"I’ve seen enough UI kits to last a lifetime. Oxbow’s the first one that
                                didn’t make me roll my eyes."') }}
                </h3>
                <div class="flex items-center mt-2 gap-4">
                    <img src="https://oxbowui.com/.netlify/images?url=_astro%2Favatar1.B8NE3-c_.jpeg&w=1000&h=1000"
                        alt="#_" aria-hidden="true" loading="lazy" decoding="async" fetchpriority="auto"
                        width="1000" height="1000" class="object-cover object-top rounded-full size-10" />
                    <div>
                        <p class="text-base font-semibold text-zinc-900 dark:text-white">
                            {{ __('Johan Snällström') }}
                        </p>
                        <p class="text-xs text-zinc-500">{{ __('Software Engineer') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
