@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 my-5">
    <h1 class="text-2xl font-bold mb-4">Daftar Laptop</h1>

    {{-- Tombol tambah laptop --}}
    <div class="mb-4">
        <a href="{{ route('laptops.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Laptop
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('status'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('status') }}
        </div>
    @endif

    {{-- Tabel daftar laptop --}}
    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Merek</th>
                    <th class="px-4 py-2 border">Model</th>
                    <th class="px-4 py-2 border">CPU</th>
                    <th class="px-4 py-2 border">RAM</th>
                    <th class="px-4 py-2 border">Storage</th>
                    <th class="px-4 py-2 border">Harga</th>
                    <th class="px-4 py-2 border">Stok</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laptops as $index => $laptop)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $laptop->brand->name ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $laptop->model }}</td>
                        <td class="px-4 py-2 border">{{ $laptop->cpu }}</td>
                        <td class="px-4 py-2 border">{{ $laptop->ram_gb }} GB</td>
                        <td class="px-4 py-2 border">{{ $laptop->storage_gb }} GB {{ $laptop->storage_type }}</td>
                        <td class="px-4 py-2 border">Rp {{ number_format($laptop->price,0,',','.') }}</td>
                        <td class="px-4 py-2 border">{{ $laptop->stock ?? '-' }}</td>
                        <td class="px-4 py-2 border flex gap-2">
                            <a href="{{ route('laptops.edit', $laptop->id) }}" 
                               class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('laptops.destroy', $laptop->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">Belum ada data laptop</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $laptops->links() }}
    </div>
</div>
@endsection
