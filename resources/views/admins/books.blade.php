@extends('layout.view')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="container">
        <button type="button" class="btn btn-sm btn-primary" onclick="location.href='{{ route('books.create') }}'">Create New Book</button>
        <div class="row justify-content-center mt-2">
            <div class="col-md-20">
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
                                    <th>Action</th>
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
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary btn-edit" data-bs-toggle="modal"
                                                data-bs-target="#editBookModal">
                                                Edit
                                            </button>
                                            <form action="{{ route('books.destroy', $book->id_buku) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBookModalLabel">Edit Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editBookForm" action="" method="POST">
                            @csrf
                            @foreach ($books as $book)
                                <div class="form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" name="judul" class="form-control" value="{{ $book->judul }}"
                                        required>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Genre</label>
                                    <select name="id_genre" class="form-control" required>
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id_genre }}">{{ $genre->nama_genre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Author</label>
                                    <input type="text" name="pengarang" class="form-control"
                                        value="{{ $book->pengarang }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Description</label>
                                    <textarea name="deskripsi" class="form-control" rows="3">{{ $book->deskripsi }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Publication Year</label>
                                    <input type="number" name="tahun_terbit" class="form-control"
                                        value="{{ $book->tahun_terbit }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Book Image</label>
                                    <input type="file" name="gambar_url" class="form-control" required>
                                </div>
                            @endforeach
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
