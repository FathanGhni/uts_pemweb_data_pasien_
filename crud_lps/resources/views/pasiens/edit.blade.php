@extends('main')
@section('section')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="editForm" action="{{ route('pasiens.update', $pasien->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAMA PASIEN</label>
                                <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien" value="{{ old('nama_pasien', $pasien->nama_pasien) }}" placeholder="Masukkan Nama Pasien">
                            
                                <!-- error message untuk nama_pasien -->
                                @error('nama_pasien')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">UMUR</label>
                                <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ old('umur', $pasien->umur) }}" placeholder="Masukkan Umur">
                            
                                <!-- error message untuk umur -->
                                @error('umur')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">JENIS KELAMIN</label>
                                <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="{{ old('jenis_kelamin', $pasien->jenis_kelamin) }}" placeholder="Masukkan Jenis Kelamin">
                            
                                <!-- error message untuk jenis_kelamin -->
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DIAGNOSA</label>
                                <textarea class="form-control @error('diagnosa') is-invalid @enderror" name="diagnosa" rows="5" placeholder="Masukkan Diagnosa Pasien">{{ old('diagnosa', $pasien->diagnosa) }}</textarea>
                            
                                <!-- error message untuk diagnosa -->
                                @error('diagnosa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">WAKTU KEDATANGAN</label>
                                <input type="datetime-local" class="form-control @error('waktu_kedatangan') is-invalid @enderror" name="waktu_kedatangan" value="{{ old('waktu_kedatangan', $pasien->waktu_kedatangan ? date('Y-m-d\TH:i', strtotime($pasien->waktu_kedatangan)) : '') }}" placeholder="Masukkan Waktu Kedatangan">
                            
                                <!-- error message untuk waktu_kedatangan -->
                                @error('waktu_kedatangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">LAMA KUNJUNGAN</label>
                                <input type="text" class="form-control @error('lama_kunjungan') is-invalid @enderror" name="lama_kunjungan" value="{{ old('lama_kunjungan', $pasien->lama_kunjungan) }}" placeholder="Masukkan Lama Kunjungan">
                            
                                <!-- error message untuk lama_kunjungan -->
                                @error('lama_kunjungan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        CKEDITOR.replace('diagnosa');
        
        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = this;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
@endsection
