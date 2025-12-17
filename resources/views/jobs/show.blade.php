<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Lowongan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                @forelse($jobs as $job)
                    <h1 class="text-2xl font-bold mb-4">{{ $job->title }}</h1>
                    <p class="text-gray-700 mb-2"><strong>Perusahaan:</strong> {{ $job->company }}</p>
                    <p class="text-gray-700 mb-2"><strong>Lokasi:</strong> {{ $job->location }}</p>
                    <p class="text-gray-700 mb-2"><strong>Gaji:</strong> {{ $job->salary }}</p>
                    @if($job->logo)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $job->logo) }}"
                                alt="Logo {{ $job->company }}"
                                class="h-24 w-24 rounded object-cover" />
                        </div>
                    @endif
                    <div class="mb-4">  
                        <h2 class="text-xl font-semibold mb-2">Deskripsi Pekerjaan</h2>
                        <p class="text-gray-700 whitespace-pre-line">{{ $job->description }}</p>
                    
                        <a href="{{ route('jobs.index') }}"
                            class="inline-flex items-center rounded-md bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow transition hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                            Kembali ke Daftar Lowongan
                        </a>
                    </div>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-sm text-gray-500">
                            Belum ada lowongan yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
