@extends('Layout.Dashboard')

@section('dashboard-content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Contacts</h1>
        <a href="{{ route('contacts.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Contact</a>
    </div>
    <x-contactstable :data="$data" />
@endsection
