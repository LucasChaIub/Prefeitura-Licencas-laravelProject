<x-guest-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
                 src="{{ asset('images/login-office.jpeg') }}"
                 alt="Office"/>
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">

                <x-auth-validation-errors :errors="$errors"/>

                <form method="POST" action="{{ route('login') }}">
                @csrf

                    <!-- Input[ype="email"] -->
                    <div class="mt-4">
                        <x-label :value="__('Email')"/>
                        <x-input type="email"
                                 id="email"
                                 name="email"
                                 value="{{ old('email') }}"
                                 class="block w-full"
                                 required
                                 autofocus/>
                    </div>

                    <!-- Input[ype="password"] -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')"/>
                        <x-input type="password"
                                 id="password"
                                 name="password"
                                 class="block w-full"/>
                    </div>

                    <div class="flex mt-6 text-md">
                        <label class="flex items-center dark:text-gray-400">
                            <input type="checkbox"
                                   name="remember"
                                   class="text-yellow-300 form-checkbox focus:border-yellow-300 focus:outline-none focus:shadow-outline-yellow">
                            <span class="ml-2">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mt-4 text-lg">
                        <x-button class="block w-full">
                            <strong>{{ __('Entrar') }}</strong>
                        </x-button>
                    </div>
                </form>

                <hr class="my-8"/>

                @if (Route::has('password.request'))
                    <p class="mt-4">
                        <a class="text-sm font-medium text-primary-600 hover:underline"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
