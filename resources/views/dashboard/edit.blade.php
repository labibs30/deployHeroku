@extends('dashboard.layouts.main')

@section('container')
<div class="border-bottom mb-3">
    <h1 class="mb-4">{{$title}}</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/detail/{{$product->id}}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="p_name" class="form-label">Name</label>
            <input type="text" class="form-control @error('p_name') is-invalid @enderror" id="p_name" name="p_name" required autofocus value="{{old('p_name', $product->p_name)}}">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            @error('p_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{old('slug', $product->slug)}}">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="p_price" class="form-label">Harga</label>
            <input type="text" class="form-control @error('p_price') is-invalid @enderror" id="p_price" name="p_price" require value="{{old('p_price', $product->p_price)}}">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            @error('p_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Stok</label>
            <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" required value="{{old('quantity', $product->quantity)}}">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            @error('quantity')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label><br>
            <input type="hidden" name="oldImage" value="{{$product->image}}">
            @if($product->image)
            <img src="{{asset('storage/'.$product->image)}}" class="img-preview img-fluid mb-3 col-sm-5">
            @else
            <img src="" class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="p_description" class="form-label">Description</label>
            @error('p_description')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="p_description" type="hidden" name="p_description" value="{{old('p_description', $product->p_description)}}">
            <trix-editor input="p_description"></trix-editor>

        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
<script>
    const title = document.querySelector('#p_name');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/crud/checkSlug?p_name=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection