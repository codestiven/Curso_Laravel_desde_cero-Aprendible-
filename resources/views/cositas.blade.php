<x-app-layout>
    <x-slot name="header">
       
    </x-slot>

    <div class="py-12">
        <form action="" method="post">
        @csrf
        <textarea name="message" id=""></textarea>
        <x-primary-button> chirp</x-primary-button>
        </form>
    </div>
</x-app-layout>