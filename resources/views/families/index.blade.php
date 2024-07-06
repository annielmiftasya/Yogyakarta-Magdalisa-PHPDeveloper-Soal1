@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Family Tree</h1>
    <a href="{{ route('families.create') }}" class="btn btn-primary">Add Family Member</a>
    <div id="familyTree"></div>
    <hr>
    <div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($families as $family)
            <tr>
                <td>{{ $family->nama }}</td>
                <td>{{ $family->jenis_kelamin }}</td>
                <td>{{ $family->parent ? $family->parent->nama : '-' }}</td>
                <td>
                    @if ($family->parent_id !== null)
                        <a href="{{ route('families.edit', $family->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('families.destroy', $family->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
