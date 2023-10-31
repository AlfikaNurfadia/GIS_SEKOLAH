@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Data {{ $title }}</h3>

        <div class="card-tools">
          <a href="/kecamatan/add" type="button" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Kecamatan</th>
                    <th width="50px">Warna</th>
                    <th width="100px">Action</th>
                </tr> 
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($kecamatan as $data)
                <tr>
                    <td >{{ $no++ }}</td>
                    <td>{{ $data->kecamatan }}</td>
                    <td style="background-color: {{ $data->warna }}"></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

<!-- Page specific script -->
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