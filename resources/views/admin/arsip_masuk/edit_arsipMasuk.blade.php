@extends('layout.index')
@section('title', 'Edit Arsip Dokumen Masuk')
@section('content')

<div class="main-content side-content pt-0">

    <div class="main-container container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header text-center" style="margin-bottom: 20px;">
                <div>
                    <h2 class="main-content-label tx-24 mg-b-5" style="color: darkslateblue; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">
                        <i class="fas fa-edit" style="margin-right: 10px; font-size: 28px;"></i>
                        Edit Dokumen
                    </h2>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-header">
                    Dokumen Masuk
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <form action="/admin/arsip_masuk/update/{{ $arsip_masuk->id }}" method="POST" enctype="multipart/form-data">
                                {{-- enctype wajib seperti itu untuk mengupload file  --}}
                            @csrf
                            @method('PUT')
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger text-center">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif --}}

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-15">
                                            <div class="form-group">
                                                <label class="tx-medium">Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar"
                                                    value="{{ old('tanggal_masuk')??$arsip_masuk->tanggal_masuk }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="namaDinas" class="tx-medium">Dinas</label>
                                                <select id="namaDinas" name="dinas_id" class="form-control">
                                                    <!-- Option list remains unchanged -->
                                                    <option value="" selected>Pilih</option>
                                                        @foreach ($instansi as $data)
                                                            <option value="{{$data->id}}" {{ old('instansi_id', $arsip_masuk->instansi_id) == $data->id ? 'selected' : '' }}>{{$data->nama_instansi}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="tx-medium">Pengirim</label>
                                                <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" value="{{ old('pengirim')??$arsip_masuk->pengirim }}" >
                                            </div>
                                            <div class="form-group">
                                                <label class="tx-medium">Penerima</label>
                                                <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" value="{{ old('penerima')??$arsip_masuk->penerima }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="tx-medium">Nama Dokumen</label>
                                                <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" value="{{ old('nama_dokumen')??$arsip_masuk->nama_dokumen }}" required>
                                            </div>
                                            <div class=" form-group">
                                                <label>Kategori Dokumen:</label>
                                                    @foreach ($kategori as $data)
                                                        <div>
                                                            <input type="radio" id="pilihan{{$data->id}}" name="kategori_id"
                                                                value="{{$data->id}}" {{ (old('dokumen_kategori_id', $arsip_masuk->dokumen_kategori_id) == $data->id) ? 'checked' : '' }}>
                                                            <label for="pilihan{{$data->id}}">{{$data->nama_kategori}}</label>
                                                        </div>
                                                    @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label class="tx-medium">Lampiran Dokumen</label>
                                                <input type="file" name="file_dokumen" id="file_dokumen" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="tx-medium">Keterangan</label>
                                                <textarea name="keterangan" rows="3"
                                                    class="form-control">{{ old('keterangan') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-6" style="margin-top: 30px">
                            <div class="pdf-viewer-container">
                                <iframe id="pdf-viewer" src="{{ asset('/laraview/#../storage/'.$arsip_masuk->lampiran) }}" width="100%" height="700px" style="border: none;"
                                    allowfullscreen webkitallowfullscreen></iframe>
                            </div>
                        </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection
