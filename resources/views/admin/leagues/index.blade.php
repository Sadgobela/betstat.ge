@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Leagues</div>
                    <div class="card-body">
                        <a href="{{ route('leagues.create') }}"
                            class="btn btn-primary">Add Leagues</a>
                        <br /><br />
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Image</th>
                                <th>Active</th>
                                <th style="width: 130px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($leagues as $league)
                                <tr>
                                    <td>{{ $league->id }}</td>
                                    <td>{{ $league->name }}</td>
                                    <td>{{ $league->type }}</td>
                                    <td>
                                        @if ($league->image)
                                            <img src="{{asset('uploads/leagues') . '/' . $league->image}}" class="if-image" width="100px">
                                        @endif
                                    </td>
                                    <td>
                                        <input type="checkbox" data-id="{{$league->id}}" class="toggle_active" @if($league->active) checked @endif>
                                    </td>
                                    <td>
                                        <a href="{{ route('leagues.edit', $league->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('leagues.destroy', $league->id) }}"
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

                    {{$leagues->links()}}
                </div>

            </div>

        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".toggle_active").change(function (e) {
            let val = this.checked ? 1 : 0;
            let id = $(this).data('id');
            $.ajax({
                url: "{{route('leagues.toggle-active')}}",
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
