@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Promo</div>

                    <div class="card-body">
                        <a href="{{ route('promo.create') }}"
                            class="btn btn-primary">Add</a>
                        <br /><br />
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Bet Company</th>
                                <th>Category</th>
                                <th>Rating</th>
                                <th>Text</th>
                                <th>Logo</th>
                                <th style="width: 130px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($promoData as $promo)
                                <tr>
                                    <td>{{ $promo->title}}</td>
                                    <td>{{ $promo->category1}}</td>
                                    <td>{{ $promo->category2}}</td>
                                    <td>{{ $promo->rating}}</td>
                                    <td>{{ $promo->text}}</td>
                                    <td>
                                        @if ($promo->logo)
                                        <img src="{{asset('uploads/promo/logos') . '/' . $promo->logo}}" class="if-image" width="100px">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('promo.edit', $promo->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('promo.destroy', $promo->id) }}"
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

                    {{$promoData->links()}}
                </div>

            </div>

        </div>
    </div>
@endsection
