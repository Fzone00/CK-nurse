@extends('layouts.admin')

@section('title', 'Edit Product')
@section('content-header', 'Edit Product')

@section('content')
<div class=" card">
    <div class="card-body">
        <form action="{{ route('products.update', $product)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
                <div class="from-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is=invalid @enderror" id="name" placeholder="Name" value="{{ old('name', $product->name) }}">
                    @error('name')
                    <span class="invslid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            
                    <div class="from-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is=invalid @enderror" id="description" placeholder="description" >{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <span class="invslid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                        <div class="from-group">
                            <label for="image">image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            @error('image')
                            <span class="invslid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                            <div class="from-group">
                                <label for="barcode">barcode</label>
                                <input type="text" name="barcode" class="form-control @error('barcode') is=invalid @enderror" id="barcode" placeholder="barcode" value="{{ old('barcode', $product->barcode) }}">
                                @error('barcode')
                                <span class="invslid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                                <div class="from-group">
                                    <label for="price">price</label>
                                    <input type="text" name="price" class="form-control @error('price') is=invalid @enderror" id="price" placeholder="price" value="{{ old('price',  $product->price) }}">
                                    @error('price')
                                    <span class="invslid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                    <div class="from-group">
                                        <label for="status">status</label>
                                        <select name="status" class="form-control @error('status') is=invalid @enderror" id="status" >
                                            <option value="1" {{old('status', $product->status) === 1 ? 'selected' : ''}}>Actiive</option>
                                            <option value="0" {{old('status', $product->status) === 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="invslid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
        
                                    <button class="btn btn-primary" type="submit">Update</button>
        </form>    
    </div>
</div>
                        
@endsection

@section('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
 <script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>
@endsection