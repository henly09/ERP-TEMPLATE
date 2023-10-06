<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6"  enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex space-x-4">
            <div class="w-1/2">
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
            </div>

            <div class="w-1/2 flex flex-col items-center justify-center">
                    <div class="relative h-40 w-40 bg-white overflow-hidden">
                        <div class="relative rounded-circle h-40 w-40 bg-white border-2 overflow-hidden">
                        @if($user->prof_pic)
                            <img src="{{ asset('storage/profile_pictures/' . $user->prof_pic) }}" alt="Profile Picture" class="object-cover w-full h-full">
                        @else
                            <img src="{{ asset('images/dummyuser.png') }}" alt="Default Profile Picture" class="object-cover w-full h-full">
                        @endif
                            </div>
                                <label class="absolute bottom-0 right-0 p-1 bg-gray-900 text-gray-100 rounded-circle cursor-pointer hover:bg-gray-800 transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <input id="prof_pic" name="prof_pic" type="file" class="hidden" accept="image/*">
                                </label>
                    </div>
                <x-input-error class="mt-2" :messages="$errors->get('prof_pic')" />
            </div>

        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    <script>
        const input = document.getElementById('prof_pic');
        const image = document.querySelector('.rounded-circle img');

        input.addEventListener('change', () => {
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = () => {
            image.src = reader.result;
        };

        reader.readAsDataURL(file);
        });
    </script>
</section>
