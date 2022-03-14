@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Poker</div>

                    <div class="card-body">
                        <a href="{{ route('poker.create') }}"
                            class="btn btn-primary">Add Poker Tounament</a>
                        <br /><br />
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Casino</th>
                                <th>Starting Date</th>
                                <th>Tournament Name</th>
                                <th>Buy-in Amount</th>
                                <th>Prize Pool</th>
                                <th style="width: 130px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($pokerData as $poker)
                                <tr>
                                    <td>{{ $poker->casino}}</td>
                                    <td>{{ $poker->date}}</td>
                                    <td>{{ $poker->tournament}}</td>
                                    <td>{{ $poker->amount}}</td>
                                    <td>{{ $poker->prize}}</td>
                                    <td>
                                        <a href="{{ route('poker.edit', $poker->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('poker.destroy', $poker->id) }}"
                                              method="POST" style="display: inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="btn btn-sm btn-danger">Delete</button>
                                        </form>
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

                    {{$pokerData->links()}}
                </div>

            </div>

        </div>
    </div>
@endsection
