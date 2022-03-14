@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Banners</div>

                    <div class="card-body">
{{--                        <a href="{{ route('casino.create') }}"--}}
{{--                            class="btn btn-primary">Add</a>--}}
{{--                        <br /><br />--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>URL</th>
                                <th>Picture</th>
                                <th style="width: 130px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($bannersData as $banner)
                                <tr>
                                    <td>{{ $banner->url}}</td>
                                    <td>
                                        @if ($banner->picture)
                                        <img src="{{asset('uploads/banners') . '/' . $banner->picture}}" class="if-image" width="100px">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('banners.edit', $banner->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No .</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{$bannersData->links()}}
                </div>

            </div>

        </div>
    </div>
@endsection
