@section('title')
Data Posts - Belajar Livewire 3 di SantriKoding.com
@endsection

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- flash message -->
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <!-- end flash message -->

            <a href="/create" wire:navigate class="btn btn-md btn-success rounded shadow-sm border-0 mb-3">ADD NEW POST</a>
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col" style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $item)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/posts/'.$item->gambar) }}" class="rounded" style="width: 150px">
                                </td>
                                <td>{{ $item->judul }}</td>
                                <td>{!! $item->isi !!}</td>
                                <td class="text-center">
                                    <a href="/edit/{{ $item->id }}" wire:navigate class="btn btn-sm btn-primary">EDIT</a>
                                    <button wire:click="destroy({{ $item->id }})" class="btn btn-sm btn-danger">DELETE</button>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data item belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $posts->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>