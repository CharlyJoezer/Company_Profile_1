@extends('Admin.Dashboard.templates.template')
@section('content')
    
<div class="container_parts">
    <div class="navigation_pages">Dashboard > Parts > Tambah Data</div>
    <div class="title">Tambah Data Parts</div>
    <div class="wrapper_form">
        <form action="/admin/dashboard/parts" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form_input">
                <div class="label_input">Nama Parts</div>
                <input type="text" name="name" class="@error('name') input_invalid @enderror" required value="{{old('name')}}">
                @error('name')
                <div class="invalid_request">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form_input">
                <div class="label_input">Gambar Parts</div>
                <img class="preview_image" />
                <input  type="file" accept="image/jpg, image/jpeg, image/png" name="image" class="input_image @error('image') input_invalid @enderror" required value="{{old('image')}}">
                @error('image')
                <div class="invalid_request">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="submit_form">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
    <script src="/js/Admin/tambah-parts.js"></script>
</div>

@endsection