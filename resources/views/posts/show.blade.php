@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>{{ $post->title }}</h1>

            <article>
                {!! $post->content !!}
            </article>

        </div>
    </div>
</div>
@endsection
