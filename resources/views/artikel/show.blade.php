@extends("layouts.master")

@section("content")
<div>
    <a href="/artikel" class="btn btn-secondary"><< Kembali ke daftar artikel </a>
</div>

<div class="card mt-2">
  <div class="card-body">
    <h4>judul: {{$artikel->judul}}<h4>
    <h6>slug: {{$artikel->slug}}</h6>
    <p>{{$artikel->isi}}</p>
    <!-- blom bener nih -->
    <p>
        <?php
        $tag = explode("," , $artikel -> tag);
        ?>
        @foreach($tag as $tagseparated)
            <a href="#" class="btn btn-success">{{$tagseparated}}<a>
        @endforeach
    </p>
  </div>
</div>
@endsection