@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">News</div>

                    <div class="card-body">
                        <a href="{{ route('news.create') }}"
                            class="btn btn-primary">Add News</a>
                        <br /><br />
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Text</th>
                                <th>Slider</th>
                                <th>Main</th>
                                <th style="width: 130px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($newsData as $news)
                                <tr>
                                    <td>{{ $news->title }}</td>
                                    <td>
                                        @if ($news->picture)
                                            <img src="{{asset('uploads/news') . '/' . $news->picture}}" class="if-image" width="100px">
                                        @endif
                                    </td>
                                    <td>{{ $news->created_at }}</td>
                                    <td>{{ $news->category }}</td>
                                    <td>{{substr(strip_tags(str_replace("&nbsp;", " ", $news->text)), 0, 400)}}...</td>
                                    <td>
                                    <input type="checkbox" data-id="{{$news->id}}" class="check-slider" @if($news->slider) checked @endif>
                                    </td>
                                    <td>
                                        <input type="checkbox" data-id="{{$news->id}}" class="check-main" @if($news->main) checked @endif>
                                    </td>
                                    <td>
                                        <a href="{{ route('news.edit', $news->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('news.destroy', $news->id) }}"
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

                    {{$newsData->links()}}
                </div>

            </div>

        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".check-slider").change(function (e) {
            let val = this.checked ? 1 : null;
            let id = $(this).data('id');
            $.ajax({
                url: "{{route('makeSlider')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {id: id, value: val},
                success: function (data) {
                }
            });
        });
        $(".check-main").change(function (e) {
            let val = this.checked ? 1 : null;
            let id = $(this).data('id');
            $.ajax({
                url: "{{route('makeMain')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {id: id, value: val},
                success: function (data) {
                }
            });
        });
    });
</script>
@endsection
