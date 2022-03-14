@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sport</div>

                    <div class="card-body">
                        <a href="{{ route('sport.create', ['type' => 'football']) }}"
                            class="btn btn-primary">Add Football</a>
                        <a href="{{ route('sport.create', ['type' => 'basketball']) }}"
                            class="btn btn-primary">Add Basketball</a>
                        <a href="{{ route('sport.create', ['type' => 'tennis']) }}"
                            class="btn btn-primary">Add Tennis</a>
                        <br /><br />
                        <div style="position: absolute;float: right;right: 15px;top: 70px;">
                            <form action="{{ route('importSport') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <input type="file" name="file">
                                <input type="submit"class="btn btn-primary">
                            </form>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Game ID</th>
                                <th>Game</th>
                                <th>Category</th>
                                <th>Home Team</th>
                                <th>Away Team</th>
                                <th>Date</th>
                                <th style="width: 130px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($sportData as $sport)
                                <tr>
                                    <td>{{ $sport->id}}</td>
                                    <td>{{ $sport->type}}</td>
                                    <td>{{ $sport->cat}}</td>
                                    <td>{{ $sport->home_team}}</td>
                                    <td>{{ $sport->away_team}}</td>
                                    <td>{{ $sport->date}}</td>
                                    <td>
                                        <a href="{{ route('sport.edit', $sport->id)}}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('sport.destroy', $sport->id) }}"
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

                    {{$sportData->links()}}
                </div>

            </div>

        </div>
    </div>
@endsection
