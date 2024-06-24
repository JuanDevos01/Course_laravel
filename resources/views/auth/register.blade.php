<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="/register">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-4">
                        <x-form-label for="name">Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name='name' id="name" placeholder="juan" required />
                        </div>
                    </div>


                    {{-- <div class="sm:col-span-4">
                        <x-form-label for="last_name">Last name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name='last_name' id="last_name" placeholder="pablo" required />
                        </div>
                    </div> --}}


                        <div class="sm:col-span-4">
                            <x-form-label for="email">Email</x-form-label>
                            <div class="mt-2">
                                <x-form-input name='email' id="email"  required />
                            </div>
                        </div>

                            <div class="sm:col-span-4">
                                <x-form-label for="password">password</x-form-label>
                                <div class="mt-2">
                                    <x-form-input name='password' id="password"  type='password' required />
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <x-form-label for="password_confirmation">Confirm password</x-form-label>
                                <div class="mt-2">
                                    <x-form-input name='password_confirmation' id="password_confirmation"  type='password' required />
                                </div>
                            </div>

                        
                        
                        
                    
                <div class="mt-10">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 italic">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                </div>

                @endif
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>


</x-layout>
