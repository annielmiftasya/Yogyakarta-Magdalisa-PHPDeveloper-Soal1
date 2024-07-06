@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Family Member</h1>
    <form action="{{ route('families.update', $family->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $family->nama) }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki" {{ $family->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $family->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="parent_id">Parent</label>
            <select class="form-control" id="parent_id" name="parent_id" required>
                <option value="">-- Select Parent --</option>
                @foreach ($families as $fam)
                    <option value="{{ $fam->id }}" {{ $family->parent_id === $fam->id ? 'selected' : '' }}>
                        {{ $fam->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
