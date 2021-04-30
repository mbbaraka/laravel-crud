@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form action="{{ route('post-create') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Blog Title" aria-describedby="helpId">
                  @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description') }}</textarea>
                  @error('description')
                    <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
                  <br>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-7">
            <h2 class="text-center">Posts Displayed here</h2>
            @foreach ($posts as $post)
                <div class="card p-2 mb-1">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ Str::limit($post->description, 100, '...') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
