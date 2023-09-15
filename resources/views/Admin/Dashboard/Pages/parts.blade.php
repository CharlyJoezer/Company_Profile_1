@extends('Admin.Dashboard.templates.template')
@section('content')
    
    <div class="container_parts">
        <div class="navigation_pages">Dashboard > Parts</div>
        <div class="title">Data Parts</div>
        @if (session()->has('success'))
            <div class="message_success">
                {{ session('success') }}
            </div>
        @elseif (session()->has('failed'))
            <div class="message_failed">
                {{ session('failed') }}
            </div>
        @endif
        <div class="wrapper_list_action">
            <a class="create_action" href="parts/tambah-data">
                <img src="/assets/icons/plus.png" alt="">
                <span>Tambah Parts</span>
            </a>

            <div class="wrapper_search_input">
                <input class="search_input" type="text" placeholder="Cari Nama Parts" value="{{$prev_search}}">
                <img class="button_search_input" src="/assets/icons/search.png" >
            </div>
        </div>
        
        <div class="wrapper_table_parts">
            <table class="table_parts">
                <thead>
                    <th>Gambar Part</th>
                    <th>Nama Part</th>
                    <th>Setting</th>
                </thead>
                <tbody>
                    @foreach ($parts as $i)
                    <tr>
                        <td class="image_parts">
                            <img src="/image/parts/{{ $i->gambar_parts }}" alt="">
                        </td>
                        <td class="name_parts">{{ $i->nama_parts }}</td>
                        <td class="setting_parts">
                            <div class="list_action" data="{{json_encode($i)}}"">
                                <img class="edit_action" src="/assets/icons/edit.png" onclick="editPage('{{$i->slug}}')">
                                <img class="delete_action" data="{{$i->slug}}" src="/assets/icons/trash.png">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="see_more">
            <a @if($parts->previousPageUrl())
                 href="{{$parts->previousPageUrl()}}"
                 style="color:#0f7cd0;font-weight:bold;"
               @endif class="prev-parts" style="color:#ccc;"
            >&laquo;</a>
                <span class="current-page"> {{ $parts->currentPage() }} </span>
            <a @if($parts->nextPageUrl())
                href="{{$parts->nextPageUrl()}}"
                style="color:#0f7cd0;font-weight:bold;"
                @endif class="next-parts" style="color:#ccc;"
            >&raquo;</a>
        </div>
        <div class="see_more_range">Menampilkan Halaman {{$parts->currentPage()}} dari {{$parts->lastPage()}} </div>

        <div class="wrapper_modal_delete">
            <div class="modal_delete">
                <div class="modal_header">Hapus Data Parts ? </div>
                <form class="modal_form" action="/admin/dashboard/parts" method="POST" >
                    @csrf
                    @method('DELETE')
                    <input class="input_slug" type="hidden" name="slug" value="">
                    <button class="modal_cancel" type="button">Batalkan</button>
                    <button class="modal_submit" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/Admin/parts.js"></script>

@endsection