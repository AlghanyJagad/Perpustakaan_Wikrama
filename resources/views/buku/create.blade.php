@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.default')

@section('content')

<form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Buku baru</h4>
                      
                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="judul" class="col-md-4 control-label">Judul</label>
                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('isbn') ? ' has-error' : '' }}">
                            <label for="isbn" class="col-md-4 control-label">ISBN</label>
                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" required>
                                @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kode_buku') ? ' has-error' : '' }}">
                            <label for="kode_buku" class="col-md-4 control-label">Kode Buku</label>
                            <div class="col-md-6">
                                <input id="kode_buku" type="text" class="form-control" name="kode_buku" value="{{ old('kode_buku') }}" required>
                                @if ($errors->has('kode_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_panggil') ? ' has-error' : '' }}">
                            <label for="no_panggil" class="col-md-4 control-label">No Panggil</label>
                            <div class="col-md-6">
                                <input id="no_panggil" type="text" class="form-control" name="no_panggil" value="{{ old('no_panggil') }}" required>
                                @if ($errors->has('no_panggil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_panggil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pengarang') ? ' has-error' : '' }}">
                            <label for="pengarang" class="col-md-4 control-label">Pengarang</label>
                            <div class="col-md-6">
                                <input id="pengarang" type="text" class="form-control" name="pengarang" value="{{ old('pengarang') }}" required>
                                @if ($errors->has('pengarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengarang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('edisi') ? ' has-error' : '' }}">
                            <label for="edisi" class="col-md-4 control-label">Edisi</label>
                            <div class="col-md-6">
                                <input id="edisi" type="text" class="form-control" name="edisi" value="{{ old('edisi') }}" required>
                                @if ($errors->has('edisi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('edisi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('penerbit') ? ' has-error' : '' }}">
                            <label for="penerbit" class="col-md-4 control-label">Penerbit</label>
                            <div class="col-md-6">
                                <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ old('penerbit') }}" required>
                                @if ($errors->has('penerbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kota_terbit') ? ' has-error' : '' }}">
                            <label for="kota_terbit" class="col-md-4 control-label">Kota Terbit</label>
                            <div class="col-md-6">
                                <input id="kota_terbit" type="text" class="form-control" name="kota_terbit" value="{{ old('kota_terbit') }}" required>
                                @if ($errors->has('kota_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kota_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                            <label for="tahun_terbit" class="col-md-4 control-label">Tahun Terbit</label>
                            <div class="col-md-6">
                                <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kolasi') ? ' has-error' : '' }}">
                            <label for="kolasi" class="col-md-4 control-label">Kolasi</label>
                            <div class="col-md-6">
                                <input id="kolasi" type="text" class="form-control" name="kolasi" value="{{ old('kolasi') }}" required>
                                @if ($errors->has('kolasi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kolasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('sumber_buku') ? ' has-error' : '' }}">
                            <label for="sumber_buku" class="col-md-4 control-label">Sumber Buku</label>
                            <div class="col-md-6">
                                <input id="sumber_buku" type="text" class="form-control" name="sumber_buku" value="{{ old('sumber_buku') }}" required>
                                @if ($errors->has('sumber_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sumber_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                            <label for="jumlah_buku" class="col-md-4 control-label">Jumlah Buku</label>
                            <div class="col-md-6">
                                <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ old('jumlah_buku') }}" required>
                                @if ($errors->has('jumlah_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                            <label for="lokasi" class="col-md-4 control-label">lokasi</label>
                            <div class="col-md-6">
                            <select class="form-control" name="lokasi" required="">
                                <option value=""></option>
                                <option value="SMK Wikrama Bogor">SMK Wikrama Bogor</option>
                                <option value="SMK Wikrama Garut">SMK Wikrama Garut</option>
                                <option value="SMK Wikrama Palembang">SMK Wikrama Palembang</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kata_kunci') ? ' has-error' : '' }}">
                            <label for="kata_kunci" class="col-md-4 control-label">Kata Kunci</label>
                            <div class="col-md-6">
                                <input id="kata_kunci" type="text" class="form-control" name="kata_kunci" value="{{ old('kata_kunci') }}" required>
                                @if ($errors->has('kata_kunci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kata_kunci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ringkasan') ? ' has-error' : '' }}">
                            <label for="ringkasan" class="col-md-4 control-label">Ringkasan</label>
                            <div class="col-md-12">
                                <textarea id="ringkasan" class="form-control" name="ringkasan" value="{{ old('ringkasan') }}"></textarea>
                                @if ($errors->has('ringkasan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ringkasan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('daftar_isi') ? ' has-error' : '' }}">
                            <label for="daftar_isi" class="col-md-4 control-label">Daftar Isi</label>
                            <div class="col-md-12">
                                <textarea id="daftar_isi" class="form-control" name="daftar_isi" value="{{ old('daftar_isi') }}"></textarea>
                                @if ($errors->has('daftar_isi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('daftar_isi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status_pinjam') ? ' has-error' : '' }}">
                            <label for="status_pinjam" class="col-md-4 control-label">Status Pinjam</label>
                            <div class="col-md-6">
                            <select class="form-control" name="status_pinjam" required="">
                                <option value=""></option>
                                <option value="boleh">Boleh</option>
                                <option value="tidak">Tidak</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Cover</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kondisi') ? ' has-error' : '' }}">
                            <label for="kondisi" class="col-md-4 control-label">Kondisi</label>
                            <div class="col-md-6">
                            <select class="form-control" name="kondisi" required="">
                                <option value=""></option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tingkat_kelas') ? ' has-error' : '' }}">
                            <label for="tingkat_kelas" class="col-md-4 control-label">Tingkat Kelas</label>
                            <div class="col-md-6">
                            <select class="form-control" name="tingkat_kelas" required="">
                                <option value=""></option>
                                <option value="XII">XII</option>
                                <option value="XI">XI</option>
                                <option value="X">X</option>
                                <option value="Umum">Umum</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                            <label for="kategori" class="col-md-4 control-label">Kategori</label>
                            <div class="col-md-6">
                                <input id="kategori" type="text" class="form-control" name="kategori" value="{{ old('kategori') }}" required>
                                @if ($errors->has('kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kategori') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('harga_buku') ? ' has-error' : '' }}">
                            <label for="harga_buku" class="col-md-4 control-label">Harga Buku</label>
                            <div class="col-md-6">
                                <input id="harga_buku" type="text" class="form-control" name="harga_buku" value="{{ old('harga_buku') }}" required>
                                @if ($errors->has('harga_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('harga_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file_buku" class="col-md-4 control-label">File Buku</label>
                            <div class="col-md-6">
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="file_buku">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('buku.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection