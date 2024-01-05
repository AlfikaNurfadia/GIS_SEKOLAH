@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
        </div>
        <form action="/sekolah/update/{{ $sekolah->id_sekolah }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input name="nama_sekolah" value="{{ $sekolah->nama_sekolah }}" class="form-control" placeholder="sekolah">
                                <div class="text-danger">
                                    @error('nama_sekolah')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NPSN Sekolah</label>
                                <input name="npsn_sekolah" value="{{ $sekolah->npsn_sekolah }}" class="form-control" placeholder="NPSN Sekolah">
                                <div class="text-danger">
                                    @error('npsn_sekolah')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control">
                                    <option value="{{ $sekolah->id_kategori }}">{{ $sekolah->nama_kategori }}</option>
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id_kategori }}">{{ $data->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('id_kategori')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="{{ $sekolah->status }}">{{ $sekolah->status }}</option>
                                    <option value="Negeri">Negeri</option>
                                    <option value="Swasta">Swasta</option>
                                </select>
                                <div class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="id_kecamatan" class="form-control" aria-placeholder="Pilih Kecamatan" >
                                    <option value="{{ $sekolah->id_kecamatan }}">{{ $sekolah->kecamatan }}</option>
                                    @foreach ($kecamatan as $data)
                                        <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('id_kecamatan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>
                                    Logo Sekolah
                                </label>
                                    <input type="file" name="icon" class="form-control" accept="image/png">
                                <div class="text-danger">
                                    @error('icon')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Akreditasi</label>
                                <input name="akreditasi" value="{{ $sekolah->akreditasi }}" class="form-control" placeholder="Akreditasi">
                                <div class="text-danger">
                                    @error('akreditasi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Rombongan Belajar</label>
                                <input name="rombel" value="{{ $sekolah->rombel }}" class="form-control" placeholder="Rombongan Belajar">
                                <div class="text-danger">
                                    @error('rombel')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi_sekolah" class="form-control" rows="5" placeholder="Deskripsi Sekolah">{{ $sekolah->deskripsi_sekolah }}</textarea>
                                <div class="text-danger">
                                    @error('deskripsi_sekolah')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Visi</label>
                                <textarea name="visi" class="form-control" rows="5" placeholder="Visi">{{ $sekolah->visi }}</textarea>
                                <div class="text-danger">
                                    @error('visi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Misi</label>
                                <textarea name="misi" class="form-control" rows="5" placeholder="Misi">{{ $sekolah->misi }}</textarea>
                                <div class="text-danger">
                                    @error('misi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <textarea name="jurusan" class="form-control" rows="5" placeholder="Jurusan">{{ $sekolah->jurusan }}</textarea>
                                <div class="text-danger">
                                    @error('jurusan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input name="alamat" value="{{ $sekolah->alamat }}" class="form-control" placeholder="Alamat Sekolah">
                                <div class="text-danger">
                                    @error('alamat')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Posisi</label>
                                <input name="posisi" value="{{ $sekolah->posisi }}" id="posisi" class="form-control" placeholder="Posisi Sekolah">
                                <div class="text-danger">
                                    @error('posisi')7ujm,
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-ms-12">
                        <label>Map</label>
                        <div id="map" style="width: 100%; height: 300px;"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/sekolah" class="btn btn-warning float-right">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var peta = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});

    var map = L.map('map', {
		center: [{{ $sekolah->posisi }}],
		zoom: 17,
		layers: [peta],
	});

    
    var baseMaps = {
		"Peta" : peta,
	};

    L.control.layers(baseMaps).addTo(map);

    // Mengambil titik kordibat
    var curLocation = [{{ $sekolah->posisi }}];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable : 'true',
    });
    map.addLayer(marker);

    // mengambil kordinat saat marker di drag & drop
    marker.on('dragend',function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable : 'true'
        }).bindPopup(position).update();
        $("#posisi").val(position.lat + "," + position.lng).keyup();
    })

    // mengambil kordinat saat map di klik
    var posisi = document.querySelector("[name=posisi]"); 
    map.on('click', function(event) {
        var lat = event.latlng.lat;
        var lng = event.latlng.lng;

        if(!marker)
        {
            marker = L.marker(event.latlng).addTo(map);
        } else {
            marker.setLatLng(event.latlng);
        }
        posisi.value = lat + "," + lng;
    });


</script>
@endsection