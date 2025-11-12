<x-guest-layout>
    <section class="mx-auto max-w-screen-xl px-6 md:px-8 py-10">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight">Portfolio Proyek</h1>
                <p class="mt-2 text-gray-600">Beberapa proyek konstruksi yang telah kami selesaikan.</p>
            </div>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-gray-800">
                <!-- home icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10.5L12 3l9 7.5M4.5 9.75V21h5.25v-6h4.5v6H19.5V9.75"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </section>

    @php
        $projects = [
            ['name'=>'Gedung A','desc'=>'Proyek konstruksi gedung A selesai tepat waktu','img'=>'https://via.placeholder.com/800x600','tag'=>'Komersial','year'=>'2024'],
            ['name'=>'Gedung B','desc'=>'Proyek konstruksi gedung B dengan kualitas tinggi','img'=>'https://via.placeholder.com/800x600','tag'=>'Perkantoran','year'=>'2023'],
            ['name'=>'Gedung C','desc'=>'Proyek konstruksi gedung C selesai dengan efisiensi','img'=>'https://via.placeholder.com/800x600','tag'=>'Publik','year'=>'2025'],
        ];
    @endphp

    <section class="mx-auto max-w-screen-xl px-6 md:px-8 pb-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $p)
                <article class="group overflow-hidden rounded-2xl border bg-white shadow-sm transition hover:shadow-md">
                    <div class="relative overflow-hidden">
                        <div class="aspect-[4/3] w-full">
                            <img src="{{ $p['img'] }}" alt="Foto {{ $p['name'] }}" loading="lazy" class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.03]" />
                        </div>
                        <div class="absolute left-3 top-3 flex items-center gap-2">
                            <span class="rounded-full bg-black/60 px-3 py-1 text-xs font-medium text-white">{{ $p['tag'] }}</span>
                            <span class="rounded-full bg-white/80 px-3 py-1 text-xs font-semibold text-gray-800">{{ $p['year'] }}</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold tracking-tight">{{ $p['name'] }}</h3>
                        <p class="mt-2 text-sm text-gray-600">{{ $p['desc'] }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="#" class="text-sm font-medium text-teal-700 hover:underline">Lihat detail →</a>
                            <button type="button" class="rounded-lg border px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-50">Simpan</button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-guest-layout>
