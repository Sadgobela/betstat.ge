@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">P2P {{$_GET['cat']}}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Casino Name</th>
                                <th>User Name</th>
                                <th>Winning amount</th>
                                <th>Winning Coefficient </th>
                                <th>Date</th>
                                <th style="width: 60px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($p2pData as $p2p)
                                <tr>
                                    <td>{{ $p2p->casino}}</td>
                                    <td>{{ $p2p->userName}}</td>
                                    <td>{{ $p2p->amount}}</td>
                                    <td>{{ $p2p->coefficient}}</td>
                                    <td>{{ $p2p->date}}</td>
                                    <td>
                                        <a href="{{ route('p2p.edit', $p2p->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No tenants.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{$p2pData->links()}}
                </div>

            </div>

        </div>
    </div>
@endsection
