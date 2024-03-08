@extends('base')

@section('title') User List @endsection

@section('body')
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Actions</th>
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
                @if(Auth::user()->id !== $user->id)
                    <td>
                        <a class="btn btn-primary" href="{{ route('user.admin', $user->id) }}">
                            @if($user->isAdmin())
                                Revoke
                            @else
                                Grant
                            @endif
                        </a>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection
