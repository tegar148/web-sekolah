@extends('admin.layouts.app')

@section('title', 'Fasilitas Manager')
@section('breadcrumb', 'Fasilitas')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Fasilitas Manager</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data fasilitas sekolah dan laboratorium.</p>
    </div>
    <a href="{{ route('admin.fasilitas.create') }}" class="bg-[#017A85] hover:bg-[#01656e] text-white font-bold text-sm px-6 py-3 rounded-xl shadow-lg shadow-teal-800/20 transition-all flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Fasilitas
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-[11px] uppercase tracking-widest text-gray-400 font-bold">
                    <th class="px-6 py-4">Fasilitas</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Detail Tambahan</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($fasilitas as $item)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-12 rounded-lg bg-gray-100 border border-gray-200 overflow-hidden shrink-0">
                                @if($item->image_path)
                                <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs font-medium">No Img</div>
                                @endif
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">{{ $item->title }}</p>
                                <p class="text-[11px] text-gray-500 mt-0.5 line-clamp-1 max-w-md">{{ Str::limit($item->description, 50) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-50 text-blue-600 text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-lg border border-blue-100">
                            {{ $item->category ?? 'UMUM' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        @if($item->detail_label && $item->detail_value)
                        <span class="text-xs font-semibold">{{ $item->detail_label }}</span> {{ $item->detail_value }}
                        @else
                        -
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.fasilitas.edit', $item) }}" class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center hover:bg-teal-100 transition">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.fasilitas.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100 transition">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            <p>Belum ada fasilitas yang ditambahkan.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($fasilitas->hasPages())
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
        {{ $fasilitas->links() }}
    </div>
    @endif
</div>
@endsection
