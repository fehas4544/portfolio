@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Add Education</h1>
    <form action="{{ route('admin.education.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="institution" class="block text-gray-700">Institution</label>
            <input type="text" name="institution" id="institution" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="degree" class="block text-gray-700">Degree</label>
            <input type="text" name="degree" id="degree" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="duration" class="block text-gray-700">Duration</label>
            <input type="text" name="duration" id="duration" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
