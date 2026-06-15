<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3"href="{{ route('dokter.index') }}">Kembali</a>

    <ul class="list-group">
        @foreach ($dokters as $dokter)
            <li class="list-group-item">

                {{ $loop->iteration }}.
                {{ $dokter->nama_dokter }} --
                {{ $dokter->spesialis }} --
                {{ $dokter->no_telepon }} --
                {{ $dokter->poli->nama_poli }} --
                {{ $dokter->tanggal }}

                <form action="{{ route('dokter.restore', $dokter->id) }}" method="POST" class="d-inline">

                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-warning btn-sm"
                        onclick="return confirm('Anda yakin ingin mengembalikan data?')">
                        Restore
                    </button>
                </form>
                <form action="{{ route('dokter.forceDelete', $dokter) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Data akan dihapus permanen. Lanjutkan?')">
                        Force Delete
                    </button>
                </form>

            </li>
        @endforeach
    </ul>

</x-app>
