@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Casino</div>

                    <div class="card-body">
                        <a href="{{ route('casino.create') }}"
                            class="btn btn-primary">Add</a>
                        <br /><br />
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>RTP</th>
                                <th>Category</th>
                                <th>Text</th>
                                <th>Picture</th>
                                <th>PLAY at casino URLS</th>
                                <th style="width: 130px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($casinoData as $casino)
                                <tr>
                                    <td>{{ $casino->title}}</td>
                                    <td>{{ $casino->rtp}}</td>
                                    <td>{{ $casino->category}}</td>
                                    <td>{{substr(strip_tags(str_replace("&nbsp;", " ", $casino->text)), 0, 100)}}...</td>
                                    <td>
                                        @if ($casino->picture)
                                        <img src="{{asset('uploads/casino') . '/' . $casino->picture}}" class="if-image" width="100px">
                                        @endif
                                    </td>
                                    <td>{{ $casino->url}}</td>
                                    <td>
                                        <a href="{{ route('casino.edit', $casino->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('casino.destroy', $casino->id) }}"
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

                    {{$casinoData->links()}}
                </div>

            </div>

        </div>
    </div>
@endsection
