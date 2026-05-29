@extends('Layouts.Admin')
@section('title', 'Create Member')

@section('content')
    <div>
        <h1 class="text-2xl mb-10">Tambah Member</h1>
    </div>
    <form action="{{ route('member.store') }}" method="POST">
        @csrf
        <x-form.input label="Fullname" name="fullname" />
        <x-form.input label="Email" name="email" />
        <x-form.input label="Phone Number" name="phone" />
        <x-form.button btnName="Submit" type="Submit" />
    </form>
@endsection
