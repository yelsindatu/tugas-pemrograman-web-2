<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('dokter.update', $dokter) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Poli</label>
            <select name="poli_id" class="form-control @error('poli_id') is-invalid @enderror">
                <option value="">Pilih Poli</option>

                @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}" @selected(old('poli_id', $dokter->poli_id) == $poli->id)>
                        {{ $poli->nama_poli }}
                    </option>
                @endforeach
            </select>

            @error('poli_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control @error('nama_dokter') is-invalid @enderror"
                value="{{ old('nama_dokter', $dokter->nama_dokter) }}">

            @error('nama_dokter')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Spesialis</label>
            <input type="text" name="spesialis" class="form-control @error('spesialis') is-invalid @enderror"
                value="{{ old('spesialis', $dokter->spesialis) }}">

            @error('spesialis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror"
                value="{{ old('no_telepon', $dokter->no_telepon) }}">

            @error('no_telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control"
                value="{{ old('tanggal', date('Y-m-d', strtotime($dokter->tanggal))) }}">

            @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>

            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                value="{{ old('tanggal', $dokter->tanggal) }}">

            @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <a href="{{ route('dokter.index') }}" class="btn btn-warning">
            Cancel
        </a>

        <button type="submit" class="btn btn-primary">
            Submit vggubhinj
        </button>
    </form>
</x-app>
