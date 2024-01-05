@extends('layouts.frontend')
@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">

        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>{{ session('pesan') }}</h5>
        </div>
        @endif
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="text-align:center" width="10px">No</th>
                    <th style="text-align:center">NPSN</th>
                    <th style="text-align:center">Sekolah</th>
                    <th style="text-align:center">Akreditasi</th>
                    <th style="text-align:center">Status</th>
                    <th style="text-align:center">Kecamatan</th>
                    <th style="text-align:center">Logo</th>
                    <th style="text-align:center" width="100px">Action</th>
                </tr> 
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($sekolah as $data)
                <tr>
                    <td style="text-align:center">{{ $no++ }}</td>
                    <td>{{ $data->npsn_sekolah }}</td>
                    <td>{{ $data->nama_sekolah }}</td>
                    <td style="text-align:center">{{ $data->akreditasi }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->kecamatan }}</td>
                    <td><img src="{{ asset('icon') }}/{{ $data->icon }}" alt="" width="70px"></td>
                    <td style="text-align:center">
                        <a href="/detailsekolah/{{ $data->id_sekolah }}" class="btn btn-primary btn-sm btn-default">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

  @foreach ($sekolah as $data)
  <div class="modal modal-danger fade" id="delete{{ $data->id_sekolah }}">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">{{ $data->nama_sekolah }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
          <a href="/sekolah/delete/{{ $data->id_sekolah }}" type="button" class="btn btn-outline-light">Iya</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  @endforeach

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endsection