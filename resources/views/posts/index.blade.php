@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="{{ route('posts.create') }}" class="btn btn-primary mt-3 mb-5">New Post</a>

            <table class="table">

                <thead>
                    <tr>
                        <th>Title</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>
                                <div class="float-right">
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Show</a>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('posts.destroy', $post) }}" data-title="{{ $post->title }}" class="btn btn-danger btn-sm delete-rekod">Delete</a>
                                    {{-- <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="2">Tiada data.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection

@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Adakah anda pasti?
                </div>
                <div class="modal-footer">
                    <form id="delete-form" action="" method="POST" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('.delete-rekod').on('click', function (event) {
            event.preventDefault();
            var button = $(this);
            var title  = button.data('title');
            var modal  = $('#exampleModal');
            modal.find('#exampleModalLabel').text("Tajuk Dibuang: "+title);
            var href   = button.attr('href');
            modal.find('#delete-form').attr('action', href)
            modal.modal('show');
        });
    });
</script>
@endsection
