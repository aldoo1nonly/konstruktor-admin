<x-guest-layout>
    {{-- ======= HERO / HEADING ======= --}}
    <section class="mx-auto max-w-screen-xl px-6 md:px-8 pt-10 text-gray-100">
        <nav class="text-sm text-gray-400 mb-3" aria-label="Breadcrumb">
            <ol class="inline-flex items-center gap-2">
                <li><a href="{{ route('home') }}" class="hover:text-gray-200">Beranda</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-100 font-medium">Portfolio</li>
            </ol>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5">
            <div>
                <h1 class="text-3xl md:text-4xl font-semibold tracking-tight text-white">Portfolio Proyek</h1>
                <p class="mt-2 text-gray-400 max-w-2xl">
                    Kompilasi proyek terpilih yang menonjolkan kualitas konstruksi, ketepatan waktu, dan perhatian pada detail.
                    Gunakan filter untuk menyaring sesuai kebutuhan Anda.
                </p>
            </div>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-teal-500 transition">
                Konsultasi Gratis →
            </a>
        </div>
    </section>

    @php
        $projects = [
            ['name'=>'Gedung A','desc'=>'Selesai tepat waktu, fokus efisiensi biaya.','img'=>'https://picsum.photos/seed/ga/800/600','tag'=>'Komersial','year'=>2024,'area'=>'3.200 m²','duration'=>'8 bln'],
            ['name'=>'Gedung B','desc'=>'Kualitas tinggi, standar keamanan terbaru.','img'=>'https://picsum.photos/seed/gb/800/600','tag'=>'Perkantoran','year'=>2023,'area'=>'5.100 m²','duration'=>'10 bln'],
            ['name'=>'Gedung C','desc'=>'Eksekusi efisien dengan koordinasi multi-vendor.','img'=>'https://picsum.photos/seed/gc/800/600','tag'=>'Publik','year'=>2025,'area'=>'4.000 m²','duration'=>'7 bln'],
        ];
        $tags = collect($projects)->pluck('tag')->unique()->values();
        $years = collect($projects)->pluck('year')->unique()->sortDesc()->values();
    @endphp

    {{-- ======= KPI / RINGKASAN ======= --}}
    <section class="mx-auto max-w-screen-xl px-6 md:px-8 mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl border border-white/10 bg-gray-900/70 p-4 shadow-sm">
            <div class="text-xs uppercase text-gray-400">Total Proyek</div>
            <div class="mt-1 text-2xl font-semibold text-white">{{ count($projects) }}</div>
            <div class="mt-1 text-xs text-gray-500">Portofolio aktif & selesai</div>
        </div>
        <div class="rounded-xl border border-white/10 bg-gray-900/70 p-4 shadow-sm">
            <div class="text-xs uppercase text-gray-400">Kategori</div>
            <div class="mt-1 text-2xl font-semibold text-white">{{ $tags->count() }}</div>
            <div class="mt-1 text-xs text-gray-500">Komersial, Perkantoran, Publik</div>
        </div>
        <div class="rounded-xl border border-white/10 bg-gray-900/70 p-4 shadow-sm">
            <div class="text-xs uppercase text-gray-400">Tahun Terbaru</div>
            <div class="mt-1 text-2xl font-semibold text-white">{{ $years->first() }}</div>
            <div class="mt-1 text-xs text-gray-500">Diurutkan dari terbaru</div>
        </div>
    </section>

    {{-- ======= TOOLBAR FILTER ======= --}}
    <section class="mx-auto max-w-screen-xl px-6 md:px-8 mt-8">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-3 rounded-xl border border-white/10 bg-gray-900/60 p-4 shadow-sm">
            <div class="flex flex-wrap items-center gap-3">
                <input id="q" type="search" placeholder="Cari proyek atau deskripsi…"
                       class="w-64 rounded-lg border border-white/10 bg-gray-900/40 text-gray-200 placeholder-gray-500 px-3 py-2 text-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                <select id="f-tag" class="rounded-lg border border-white/10 bg-gray-900/40 text-gray-200 px-3 py-2 text-sm">
                    <option value="">Semua Kategori</option>
                    @foreach($tags as $t)
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endforeach
                </select>
                <select id="f-year" class="rounded-lg border border-white/10 bg-gray-900/40 text-gray-200 px-3 py-2 text-sm">
                    <option value="">Semua Tahun</option>
                    @foreach($years as $y)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-2">
                <label for="sort" class="text-sm text-gray-400">Urutkan:</label>
                <select id="sort" class="rounded-lg border border-white/10 bg-gray-900/40 text-gray-200 px-3 py-2 text-sm">
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="az">A → Z</option>
                </select>
            </div>
        </div>
    </section>

    {{-- ======= GRID KONTEN ======= --}}
    <section class="mx-auto max-w-screen-xl px-6 md:px-8 py-10 text-gray-100">
        <div id="grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $p)
                <article class="card overflow-hidden rounded-2xl border border-white/10 bg-gray-900/70 shadow-sm transition hover:bg-gray-800/80"
                         data-name="{{ Str::slug($p['name'],' ') }}"
                         data-desc="{{ Str::slug($p['desc'],' ') }}"
                         data-tag="{{ $p['tag'] }}"
                         data-year="{{ $p['year'] }}">
                    <div class="relative">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ $p['img'] }}" alt="Foto {{ $p['name'] }}"
                                 class="h-full w-full object-cover transition duration-300 hover:scale-105" loading="lazy">
                        </div>
                        <div class="absolute left-3 top-3 flex items-center gap-2">
                            <span class="rounded-full bg-black/70 px-3 py-1 text-xs text-white">{{ $p['tag'] }}</span>
                            <span class="rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-gray-800">{{ $p['year'] }}</span>
                        </div>
                    </div>

                    <div class="p-5">
                        <h3 class="title text-lg font-semibold text-white">{{ $p['name'] }}</h3>
                        <p class="desc mt-2 text-sm text-gray-400">{{ $p['desc'] }}</p>

                        <div class="mt-4 grid grid-cols-2 gap-3 text-xs">
                            <div class="rounded-lg border border-white/10 bg-gray-800/70 px-3 py-2">
                                <div class="text-gray-400">Luas Lantai</div>
                                <div class="font-semibold text-white">{{ $p['area'] }}</div>
                            </div>
                            <div class="rounded-lg border border-white/10 bg-gray-800/70 px-3 py-2">
                                <div class="text-gray-400">Durasi</div>
                                <div class="font-semibold text-white">{{ $p['duration'] }}</div>
                            </div>
                        </div>

                        <div class="mt-5 flex items-center justify-between">
                            <a href="#" class="text-sm font-medium text-teal-400 hover:underline">Lihat studi kasus →</a>
                            <a href="{{ route('contact') }}" class="text-sm rounded-lg border border-white/10 px-3 py-1.5 text-gray-200 hover:bg-gray-800/70">Tanya detail</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div id="empty" class="hidden text-center text-gray-400 mt-10">
            Tidak ada proyek yang cocok dengan filter. Coba ganti kata kunci atau kategori.
        </div>
    </section>

    {{-- ======= JS FILTER / SORT ======= --}}
    <script>
        const q = document.getElementById('q');
        const fTag = document.getElementById('f-tag');
        const fYear = document.getElementById('f-year');
        const sortSel = document.getElementById('sort');
        const grid = document.getElementById('grid');
        const cards = Array.from(grid.querySelectorAll('.card'));
        const empty = document.getElementById('empty');

        function render(list){
            grid.innerHTML = '';
            list.forEach(el => grid.appendChild(el));
            empty.classList.toggle('hidden', list.length !== 0);
        }

        function apply(){
            const query = (q.value || '').toLowerCase().trim();
            const tag = fTag.value;
            const year = fYear.value;

            let filtered = cards.filter(c => {
                const name = c.dataset.name.toLowerCase();
                const desc = c.dataset.desc.toLowerCase();
                const okQ = !query || name.includes(query) || desc.includes(query);
                const okT = !tag || c.dataset.tag === tag;
                const okY = !year || c.dataset.year === year;
                return okQ && okT && okY;
            });

            const by = sortSel.value;
            filtered.sort((a,b)=>{
                if(by==='newest')  return (+b.dataset.year) - (+a.dataset.year);
                if(by==='oldest')  return (+a.dataset.year) - (+b.dataset.year);
                if(by==='az')      return a.querySelector('.title').textContent.localeCompare(b.querySelector('.title').textContent);
                return 0;
            });

            render(filtered);
        }

        [q, fTag, fYear, sortSel].forEach(el => el.addEventListener('input', apply));
        apply();
    </script>
</x-guest-layout>
