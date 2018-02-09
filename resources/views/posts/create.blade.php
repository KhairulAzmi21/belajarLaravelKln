@extends('layouts.app')

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form action="{{ route('posts.store') }}" method="POST">
                {{-- Used for mitigate CSRF attack --}}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title" value="{{ old('title') }}" autofocus>
                    <small class="form-text text-muted">
                        Tajuk kepada post
                    </small>
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" value="{{ old('description') }}">
                    <small class="form-text text-muted">
                        Penerangan post
                    </small>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" rows="8">{{ old('content') }}</textarea>
                    @if ($errors->has('content'))
                        <span class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Publish Post</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-info">Cancel</a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script type="text/javascript">
    $('#content').summernote({
        tabsize: 4,
        height: 500,
        popover: {
            image: [],
            link: [],
            air: []
       }
    });
</script>
@endsection
