@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Portofolio</h1>
    <form action="{{ route('musician.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $portfolio->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control">{{ $portfolio->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="media">Media</label>
            <input type="file" name="media" class="form-control">
            <small>Biarkan kosong jika tidak ingin mengubah media.</small>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
