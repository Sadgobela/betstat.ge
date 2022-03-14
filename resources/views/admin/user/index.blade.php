@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Poll</th>
                                <th>Role</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data['users'] as $user)
                                <tr>
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>
                                        @if($user->poll)
                                            {{ $data['poll'][$user->poll]}}
                                            @endif
                                    </td>
                                    <td>
                                        @if($user->role_id == 2)
                                            Administrator
                                        @else
                                            User
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No tenants.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{$data['users']->links()}}
                </div>

            </div>

        </div>
    </div>
@endsection
