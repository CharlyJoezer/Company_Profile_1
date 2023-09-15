@extends('Admin.Dashboard.templates.template')
@section('content')
    <div class="container_gallery">
        <div class="navigation_pages">Dashboard > Gallery</div>
        <div class="title">Gallery</div>
        @if (session()->has('success'))
            <div class="message_success">
                {{ session('success') }}
            </div>
        @elseif (session()->has('failed'))
            <div class="message_failed">
                {{ session('failed') }}
            </div>
        @endif
        <div class="list_input_image">
            <form action="/admin/dashboard/gallery" method="post" enctype="multipart/form-data" class="form_input">
                @csrf
                @method('PATCH')
                <img class="preview_image" src="/image/gallery/{{$gallery[0]['gambar']}}" />
                <input class="input_image" type="file" name="gallery_image1">
                @error('gallery_image1')
                    <div class="invalid_request">
                        {{$message}}
                    </div>
                @enderror
            </form>
            <form action="/admin/dashboard/gallery" method="post" enctype="multipart/form-data" class="form_input">
                @csrf
                @method('PATCH')
                <img class="preview_image" src="/image/gallery/{{$gallery[1]['gambar']}}" />
                <input class="input_image" type="file" name="gallery_image2">
                @error('gallery_image2')
                    <div class="invalid_request">
                        {{$message}}
                    </div>
                @enderror
            </form>
            <form action="/admin/dashboard/gallery" method="post" enctype="multipart/form-data" class="form_input">
                @csrf
                @method('PATCH')
                <img class="preview_image" src="/image/gallery/{{$gallery[2]['gambar']}}" />
                <input class="input_image" type="file" name="gallery_image3">
                @error('gallery_image3')
                    <div class="invalid_request">
                        {{$message}}
                    </div>
                @enderror
            </form>
            <form action="/admin/dashboard/gallery" method="post" enctype="multipart/form-data" class="form_input">
                @csrf
                @method('PATCH')
                <img class="preview_image" src="/image/gallery/{{$gallery[3]['gambar']}}" />
                <input class="input_image" type="file" name="gallery_image4">
                @error('gallery_image4')
                    <div class="invalid_request">
                        {{$message}}
                    </div>
                @enderror
            </form>
            <form action="/admin/dashboard/gallery" method="post" enctype="multipart/form-data" class="form_input">
                @csrf
                @method('PATCH')
                <img class="preview_image" src="/image/gallery/{{$gallery[4]['gambar']}}" />
                <input class="input_image" type="file" name="gallery_image5">
                @error('gallery_image5')
                    <div class="invalid_request">
                        {{$message}}
                    </div>
                @enderror
            </form>
            <form action="/admin/dashboard/gallery" method="post" enctype="multipart/form-data" class="form_input">
                @csrf
                @method('PATCH')
                <img class="preview_image" src="/image/gallery/{{$gallery[5]['gambar']}}" />
                <input class="input_image" type="file" name="gallery_image6">
                @error('gallery_image6')
                    <div class="invalid_request">
                        {{$message}}
                    </div>
                @enderror
            </form>
        </div>

        <div class="cover_freeze"></div>
    </div>
    <script src="/js/admin/gallery.js"></script>
@endsection