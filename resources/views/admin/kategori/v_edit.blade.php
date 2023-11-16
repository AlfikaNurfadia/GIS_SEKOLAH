@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
        </div>
        <form action="/kategori/update/{{ $kategori->id_kategori }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>kategori</label>
                                <input name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control" placeholder="kategori">
                                <div class="text-danger">
                                    @error('kategori')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/kategori" class="btn btn-warning float-right">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection