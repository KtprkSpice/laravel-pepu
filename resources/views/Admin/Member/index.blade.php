@extends('Layouts.Admin')
@section('title', 'Member')

@section('content')
    <div class=" mb-10">
        <h1 class="text-2xl mb-10">Data Member</h1>
        <a href="{{ route('member.create') }}" class="bg-blue-500 px-5 py-2 rounded-lg text-white hover:bg-blue-700">Tambah
            Member</a>
    </div>
    <div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ ucwords($member->fullname) }}</td>
                        <td>{{ ucwords($member->email) }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>
                            <div class="flex gap-2 items-center justify-center ">
                                <a href="{{ route('member.edit', $member->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-700 p-2 text-white rounded-lg">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('member.destroy', $member->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 p-2 text-white rounded-lg cursor-pointer">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
