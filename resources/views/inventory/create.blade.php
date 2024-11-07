@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Inventory Item</h1>

    <!-- Display validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf

        <!-- Product Name Field -->
        <div class="form-group">
            <label for="product_name">Name:</label>
            <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" required>
            @error('product_name') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Category Field -->
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" class="form-control" name="category" value="{{ old('category') }}" required>
            @error('category') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Quantity Field -->
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" required>
            @error('quantity') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Price Field -->
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" step="0.01" value="{{ old('price') }}" required>
            @error('price') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Add Item</button>
    </form>
</div>
@endsection
