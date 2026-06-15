<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-warning mb-3" href="{{ route('dokter.index') }}">
        Kembali
    </a>

    <ul class="list-group">
        @foreach ($dokters as $dokter)
            <li class="list-group-item">

                {{ $loop->iteration }}.

                {{ $dokter->nama_dokter }} --
                {{ $dokter->spesialis }} --
                {{ $dokter->no_telepon }} --
                {{ $dokter->poli->nama_poli }} --
                {{ $dokter->tanggal }}

            </li>
        @endforeach
    </ul>

</x-app>
