@extends("layouts.master")

@section("content")
<!-- header -->
<div>
    <a href="/artikel/create" class="btn btn-secondary">Buat Artikel >></a>
</div>

<div class="card mt-2">
  <div class="card-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Slug</th>
            <th>Tag</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
@foreach($artikel as $key => $artikel)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$artikel -> judul}}</td>
            <td>{{$artikel -> isi}}</td>
            <td>{{$artikel -> slug}}</td>
            <td>
            <?php
            $tag = explode("," , $artikel -> tag);
            ?>
            @foreach($tag as $tagseparated)
                <a href="#" class="btn btn-success">{{$tagseparated}}<a>
            @endforeach
            </td>
            <td>
                <a href="/artikel/{{$artikel->id}}" class="btn btn-info">Show</a>
                <a href="/artikel/{{$artikel->id}}/edit" class="btn btn-success">Edit</a>
                <form action="/artikel/{{$artikel->id}}" method="POST" style="display: inline">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
@endforeach
    </tbody>
    </table>
  </div>
</div>
@endsection

@push('scripts')
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Memasangkan script sweet alert',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    </script>
@endpush