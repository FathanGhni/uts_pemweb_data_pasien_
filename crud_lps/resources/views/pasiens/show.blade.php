@extends('main')
@section('section')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ trans ('panel.site_title') }}</h3>
                        <hr/>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">NAMA</label>
                            <p>{{ $pasien->nama }}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">UMUR</label>
                            <p>{{ $pasien->umur }}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">JENIS_KELAMIN</label>
                            <p>{{ App\Models\Pasienn::JENIS_KELAMIN[$pasien->jenis_kelamin] ?? 'TIDAK DI KETAHUI' }}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">DIAGNOSA</label>
                            <p>{{ $pasien->diagnosa }}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">WAKTU KEDATANGAN</label>
                            <p>{{ $pasien->waktu_kedatangan }}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">LAMA KUNJUNGAN</label>
                            <p>{{ $pasien->lama_kunjungan }}</p>
                        </div>

                        <a href="{{ route('pasiens.index') }}" class="btn btn-md btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection