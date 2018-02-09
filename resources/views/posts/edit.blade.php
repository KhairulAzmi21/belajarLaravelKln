@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                {{-- Used for mitigate CSRF attack --}}
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title" value="{{ old('title', $post->title) }}" autofocus>
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
                    <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" value="{{ old('description', $post->description) }}">
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
                    <textarea name="content" class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" rows="8">{{ old('content', $post->content) }}</textarea>
                    @if ($errors->has('content'))
                        <span class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Update Post</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script type="text/javascript">
    new SimpleMDE({
        element: document.getElementById("content")
    });
</script>
@endsection
