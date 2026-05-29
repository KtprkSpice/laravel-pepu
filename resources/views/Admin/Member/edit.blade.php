@extends('Layouts.Admin')
@section('title', 'Edit Member')

@section('content')
    <div>
        <h1 class="text-2xl mb-10">Edit Member</h1>
    </div>
    <form action="{{ route('member.update', $member->id) }}" method="POST">
        @method('PUT')
        @csrf
        <x-form.input label="Fullname" name="fullname" value="{{ old('fullname', $member->fullname) }}" />
        <x-form.input label="Email" name="email" value="{{ old('email', $member->email) }}" />
        <x-form.input label="Phone Number" name="phone" value="{{ old('phone', $member->phone) }}" />
        <div class="flex flex-col w-2xs p-2 gap-4 mb-6">
            <label for="status">Status</label>
            <select name="status" id="status" class="outline-0 border border-black p-2">
                @foreach (['active', 'inactive'] as $status)
                    <option value="{{ $status }}" {{ old('status', $member->status) == $status ? 'selected' : '' }}>
                        {{ ucwords($status) }}</option>
                @endforeach
            </select>
        </div>
        <x-form.button btnName="Submit" type="Submit" />
    </form>
@endsection
