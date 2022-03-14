@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Slider</div>

                    <div class="card-body">
                        <a href="{{ route('slider.create') }}"
                            class="btn btn-primary">Add Slider</a>
                        <br /><br />
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>text 1</th>
                                <th>text 2</th>
                                <th>text 3</th>
                                <th>text 4</th>
                                <th>Image</th>
                                <th style="width: 130px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($sliderData as $slider)
                                <tr>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->input1 }}</td>
                                    <td>{{ $slider->input2 }}</td>
                                    <td>{{ $slider->input3 }}</td>
                                    <td>{{ $slider->input4 }}</td>
                                    <td>
                                        @if ($slider->image)
                                            <img src="{{asset('uploads/slider') . '/' . $slider->image}}" class="if-image" width="100px">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('slider.edit', $slider->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('slider.destroy', $slider->id) }}"
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
                                    <td colspan="4">No Sliders.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{$sliderData->links()}}
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
