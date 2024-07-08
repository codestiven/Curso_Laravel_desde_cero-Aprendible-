<x-app-layout>
    <x-slot name="header">

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12 flex justify-center">
                    <form action="" method="post" class="flex flex-col space-y-4 w-1/2">
                        @csrf
                        <textarea name="message" id="" class="border p-2 rounded"> {{ old('message') }} </textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <x-primary-button class="self-end">Chirp</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>