<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-danger mb-3" href="{{ route('poli.create') }}" role="button">
        Create
    </a>

    <form action="" class="col-md-5">
        <div class="row">
            <div> <input type="text" name="keyword" class="form-control" placeholder="Cari Poli"
                    value="{{ request('keyword') }}">
            </div>

            <div class="col-md-5">
                <button class="btn btn-primary">
                    Search
                </button>
            </div>

        </div>
    </form>


    <ul class="list-group">
        @foreach ($polis as $poli)
            <li class="list-group-item">
                {{ $polis->firstItem() + $loop->index }}.
                {{ $poli->kode_poli }} --
                {{ $poli->nama_poli }} --
                {{ $poli->lokasi }}

                <a href="{{ route('poli.show', $poli) }}" class="btn btn-info btn-sm">
                    Detail
                </a>

                <a href="{{ route('poli.edit', $poli) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('poli.destroy', $poli) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')">
                        Delete
                    </button>
                </form>

            </li>
        @endforeach
    </ul>

    <div class="mt-3">
        {{ $polis->links() }}
    </div>
</x-app>
