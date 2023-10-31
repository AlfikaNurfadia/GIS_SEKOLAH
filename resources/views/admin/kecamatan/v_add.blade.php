@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
        </div>
        <form action="/kecamatan/insert" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input name="kecamatan" class="form-control" placeholder="Kecamatan">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Warna</label>
                            <div class="input-group my-colorpicker2" placeholder="Warna">
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-square"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>GeoJSON</label>
                            <textarea name="geojson" rows="7" class="form-control" placeholder="GeoJSON"></textarea>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <button type="submit" class="btn btn-warning float-right">Cancel</button>
            </div>
        </form>
    </div>
</div>
    
<!-- bootstrap color picker -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script>
    //color picker with addon
    $('.my-colorpicker2').colorpicker();

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
</script>

@endsection

