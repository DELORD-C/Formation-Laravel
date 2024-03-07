@extends('base')

@section('title') User List @endsection

@section('body')
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
@endsection
