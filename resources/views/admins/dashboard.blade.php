@extends('layout.view')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Book</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Genre</th>
                                    <th>Author</th>
                                    <th>Publication Year</th>
                                    <th>Description</th>
                                    <th>Book Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->judul }}</td>
                                        <td>{{ $book->genre->nama_genre ?? 'No Genre' }}</td>
                                        <td>{{ $book->pengarang }}</td>
                                        <td>{{ $book->tahun_terbit }}</td>
                                        <td>{{ $book->deskripsi ?? 'No description available' }}</td>
                                        <td><img src="{{ $book->gambar_url }}" alt="Book Image" class="img-fluid"
                                                style="max-height: 100px; object-fit: cover;"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
