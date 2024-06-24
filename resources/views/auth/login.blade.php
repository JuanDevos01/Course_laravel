<x-layout>
    <x-slot:heading>
        Log in
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                

                


                        <div class="sm:col-span-4">
                            <x-form-label for="email">Email</x-form-label>
                            <div class="mt-2">
                                <x-form-input name='email' id="email" :value="old('email')"  required />
                            </div>
                        </div>

                            <div class="sm:col-span-4">
                                <x-form-label for="password">password</x-form-label>
                                <div class="mt-2">
                                    <x-form-input name='password' id="password"  type='password' required />
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
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>
        </div>
    </form>


</x-layout>
