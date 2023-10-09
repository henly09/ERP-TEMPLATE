<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create System User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-bold pt-4 pb-2 px-4">Create System User</h1>
                <h6 class="font-italic px-4"> Fill up this form for the new user....</h6>
                <div class="flex justify-center py-5">
                <form class="w-full max-w-5xl" action="{{ route('systemUsers.createSave') }}" method="POST">
                @csrf
                <div class="flex justify-center">
                    <div class="flex -mx-3 mb-6 flex-grow">
                        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" name="name" type="text" placeholder="John Doe" required>
                        </div>
                    </div>
                    <div class="flex -mx-3 mb-6 flex-grow">
                        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                            Email
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="email" name="email" type="text" placeholder="JohnDoe@gmail.com" required>
                        </div>
                    </div>
                    </div>
                    <div class="flex justify-center">
                    <div class="flex flex-grow -mx-3 mb-6">
                        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="password"  name="password" type="password" required>
                        </div>
                    </div>
                    <div class="flex flex-grow -mx-3 mb-6">
                        <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password_confirmation">
                            Confirm Password
                        </label>
                        <input type="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-5 pb-11">
                        <div class="w-full md:w-1/2 px-1 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="role">
                            Role
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="role" name="role" required>
                            <option value="">Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"> </div>
                        </div>
                        </div>
                        <div class="w-full md:w-1/2 px-1 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email_verified_at">
                                Email Verified
                            </label>
                            <input type="date" id="email_verified_at" name="email_verified_at" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="birthdatepicker" data-date-format="yyyy-mm-dd" data-provide="datepicker" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="flex justify-center mt-11">
                        <button
                            onclick="window.history.back()"
                            type="button"
                            class="flex-wrap px-10 py-4 bg-red-500 hover:bg-red-600 text-white font-medium uppercase rounded-3xl shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-400 mr-2"
                        >
                        <i class="fa-solid fa-xmark mr-2"></i>Cancel
                        </button>
                        <button
                            type="submit"
                            class="flex-wrap px-10 py-4 bg-green-500 hover:bg-green-600 text-white font-medium uppercase rounded-3xl shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-400 ml-2"
                        >
                        <i class="fa-solid fa-circle-check mr-2"></i>Submit
                        </button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>