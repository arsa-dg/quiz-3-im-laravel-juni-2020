@extends("layouts.master")

@section("content")
<!-- header -->
<div>
    <a href="/artikel" class="btn btn-secondary"><< Kembali ke daftar artikel </a>
</div>

<div class="card mt-2">
  <div class="card-body">
    <form action="/artikel/{{$artikel->id}}" method="POST">
      @csrf
      @method("PUT")
      <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" class="form-control" value="{{$artikel->judul}}" name="judul" placeholder="Enter Judul" id="judul">
      </div>
      <div class="form-group">
        <label for="isi">Isi:</label>
        <input type="text" class="form-control" value="{{$artikel->isi}}" name="isi" placeholder="Enter Isi" id="isi">
      </div>
      <div class="form-group">
        <label for="tag">Tag(pakai ","(koma) sebagai separator ex: Hewan, Tumbuhan, Makanan):</label>
        <input type="text" class="form-control" value="{{$artikel->tag}}" name="tag" placeholder="Enter tag" id="tag">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection