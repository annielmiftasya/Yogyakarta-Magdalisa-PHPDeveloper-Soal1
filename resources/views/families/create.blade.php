@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Family Member</h1>
    <form action="{{ route('families.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="parent_id">Parent</label>
            <select class="form-control" id="parent_id" name="parent_id" required>
                <option value="">-- Select Parent --</option>
                @foreach ($families as $family)
                    <option value="{{ $family->id }}">{{ $family->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
