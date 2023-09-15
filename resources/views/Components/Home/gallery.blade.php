<div class="container_gallery" id="gallery">
    <link rel="stylesheet" href="/css/gallery.css">
    <div class="container_gallery_title"
         data-aos="fade-up"
         data-aos-anchor-placement="top-bottom"
         data-aos-duration="500">Gallery</div>

    <div class="content_gallery">
        <div class="list_gallery">
            @foreach ($gallery as $i)
                <div class="box_photo" data-aos="flip-up"
                    data-aos-anchor-placement="top-bottom"
                    data-aos-duration="1000">
                    <img src="/image/gallery/{{$i->gambar}}" alt="abt solutin gallery">
                </div>
            @endforeach
        </div>
    </div>
</div>
<script src="/js/gallery.js"></script>