@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inventory List</h1>

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('inventory.create') }}" class="btn btn-primary">Add New Item</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td> <!-- Updated to match the model field -->
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
