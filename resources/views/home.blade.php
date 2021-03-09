@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Transaksi</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$transaksi->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh transaksi
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Sedang Pinjam</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$transaksi->where('status', 'pinjam')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> sedang dipinjam
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-book text-success icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Buku</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$buku->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i> Total judul buku
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Anggota</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$anggota->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh anggota
                  </p>
                </div>
              </div>
            </div>
</div>
<div class="row" >
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Data Transaksi sedang pinjam
                      <div class="col-sm-4 mb-2 lg-4" style="float: right;">
                        <form action="/" method="post">
                          @csrf
                          <select class="form-control" name="sort" id="sort" onchange="this.form.submit()">
                            <option  value="">{{$sortby}}</option>
                            <option  value="tahunini">Kembali Tahun ini</option>
                            <option  value="bulanini">Kembali Bulan ini</option>
                            <option  value="hariini">Kembali Hari ini</option>
                          </select>
                        </form>
                      </div>
                    </h4>

                  <div class="table-responsive" style="margin-top: 10px;">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Kode
                          </th>
                          <th>
                            Buku
                          </th>
                          <th>
                            Peminjam
                          </th>
                          <th>
                            Tgl Pinjam
                          </th>
                          <th>
                            Tgl Harus Kembali
                          </th>
                          <th>
                            Status
                          </th>
                          @if(Auth::user()->level == 'admin')
                          <th>
                            Action
                          </th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                          <a href="{{route('transaksi.show', $data->id)}}"> 
                            {{$data->kode_transaksi}}
                          </a>
                          </td>
                          <td>
                          
                            {{$data->buku->judul}}
                          
                          </td>

                          <td>
                            {{$data->anggota->nama}}
                          </td>
                          <td>
                           {{date('d/m/y', strtotime($data->tgl_pinjam))}}
                          </td>
                          <td>
                            {{date('d/m/y', strtotime($data->tgl_kembali))}}
                          </td>
                          <td>
                          @if($data->status == 'pinjam')
                            <label class="badge badge-warning">Pinjam</label>
                          @else
                            <label class="badge badge-success">Kembali</label>
                          @endif
                          </td>
                          <td>
                            @if(Auth::user()->level == 'admin')
                            <div class="btn-group dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            @if($data->status == 'pinjam')
                            <form action="{{ route('transaksi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('put') }}
                              <button class="dropdown-item" onclick="return confirm('Anda yakin data ini sudah kembali?')"> Sudah Kembali
                              </button>
                            </form>
                            <form action="{{ route('transaksi.hilang', $data->id) }}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <button class="dropdown-item" onclick="return confirm('Anda yakin data ini hilang?')"> Hilang
                              </button>
                            </form>
                            <form action="{{ route('transaksi.rusak', $data->id) }}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <button class="dropdown-item" onclick="return confirm('Anda yakin data ini rusak?')"> Rusak
                              </button>
                            </form>
                            <form action="{{ route('transaksi.diganti', $data->id) }}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <button class="dropdown-item" onclick="return confirm('Anda yakin data ini diganti?')"> Diganti
                              </button>
                              <form action="{{ route('transaksi.destroy', $data->id) }}" class="pull-left"  method="post">
                              {{ csrf_field() }}
                              {{ method_field('delete') }}
                              <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                              </button>
                            </form>
                            </div>
                          </div>
                        @endif
                          </td>
                          @endif
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
