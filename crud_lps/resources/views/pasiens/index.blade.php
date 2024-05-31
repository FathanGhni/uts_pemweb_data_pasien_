@extends('main')

@section('section')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">{{ trans('panel.site_title') }}</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('pasiens.create') }}" class="btn btn-md btn-custom btn-success mb-3">ADD PASIEN</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">NAMA PASIEN</th>
                                <th scope="col">UMUR</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col">DIAGNOSA</th>
                                <th scope="col">WAKTU KEDATANGAN</th>
                                <th scope="col">LAMA KUNJUNGAN</th>
                                <th scope="col" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasiens as $pasien)
                                <tr>
                                    <td>{{ $pasien->nama_pasien }}</td>
                                    <td>{{ $pasien->umur }}</td>
                                    <td>{{ $pasien->jenis_kelamin }}</td>
                                    <td>{!! $pasien->diagnosa !!}</td>
                                    <td>{{ $pasien->waktu_kedatangan }}</td>
                                    <td>{{ $pasien->lama_kunjungan }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pasiens.destroy', $pasien->id) }}" method="POST">
                                            <a href="{{ route('pasiens.edit', $pasien->id) }}" class="btn btn-sm btn-custom btn-primary">EDIT</a>
                                            <a href="{{ route('pasiens.show', $pasien->id) }}" class="btn btn-sm btn-custom btn-dark">SHOW</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-custom btn-danger">HAPUS</button>
                                        </form>
                                    </td>
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

@section('scripts')
@parent
    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
@endsection
