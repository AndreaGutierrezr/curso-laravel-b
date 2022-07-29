<div id="preloader">
    <div id="logostatus">
        <img src="path/to/logo" alt="Logotipo">
    </div>
    <div id="status">&nbsp;</div>
</div>
<style>
   #preloader
  {
    position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: darkblueColor;
  /* change if the mask should have another color then white */
  z-index: 1031;
  }
/* makes sure it stays on top */
#status
 {
    width: 200px;
  height: 100px;
  position: absolute;
  left: 50%;
  /* centers the loading animation horizontally one the screen */
  top: 60%;
  /* centers the loading animation vertically one the screen */
  background-image: url(/assets/image/otro/1652912456.png);
  /* path to your loading animation */
  background-repeat: no-repeat;
  background-position: center;
  background-size contain
  margin: -100px 0 0 -100px;
/* is width and height divided by two */
 }
#logostatus
{
    width: 200px;
  height: 200px;
  position: absolute;
  left: 50%;
  /* centers the loading animation horizontally one the screen */
  top: 45%;
  margin: -100px 0 0 -100px;
  /* is width and height divided by two */
  img
    width 100%
}
</style>
<script>
    window.addEventListener('load', function(){
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(5000).fadeOut('slow'); // will fade out the white DIV that covers the website.
        //$('body').delay(350).css({'overflow':'visible'});
    }, false);
</script>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
