<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full  @error('name') invisible peer-invalid:visible @enderror" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                  @if ($errors->has('name'))
                        <span class="">
                            <strong class="text-red-500">{{ $errors->first('name') }}</strong>
                        </span>
                       @endif
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                 @if ($errors->has('email'))
                        <span class="">
                            <strong class="text-red-500">{{ $errors->first('email') }}</strong>
                        </span>
                       @endif
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('phone') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="number" name="phone" 
                :value="old('phone')" required />
                   @if ($errors->has('phone'))
                        <span class="">
                            <strong class="text-red-500">{{ $errors->first('phone') }}</strong>
                        </span>
                       @endif
            </div>

            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('address') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"  required/>
                   @if ($errors->has('address'))
                        <span class="">
                            <strong class="text-red-500">{{ $errors->first('address') }}</strong>
                        </span>
                       @endif
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"  autocomplete="new-password" required/>
                @if ($errors->has('password'))
                        <span class="">
                            <strong class="text-red-500">{{ $errors->first('password') }}</strong>
                        </span>
                       @endif
            </div>


            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"  autocomplete="new-password"  required/>
                  @if ($errors->has('password_confirmation'))
                        <span class="">
                            <strong class="text-red-500">{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                       @endif
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
