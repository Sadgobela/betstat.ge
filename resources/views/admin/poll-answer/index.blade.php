@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Poll Answers</div>
                    <div class="card-body">
                        <a href="{{ route('poll-answers.create') }}"
                            class="btn btn-primary">Add Poll</a>
                        <br /><br />
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Question</th>
                                <th>Answers</th>
                                <th style="width: 130px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($poll as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ object_get($item,'pollQuestion.question') }}</td>
                                    <td>{{ $item->answer }}</td>

                                    <td>
                                        <a href="{{ route('poll-answers.edit', $item->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('poll-answers.destroy', $item->id) }}"
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

                    {{$poll->links()}}
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
                url: "{{route('poll.toggle-active')}}",
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
