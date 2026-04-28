@php
    $sambutan = \App\Models\SiteSection::where('page', 'welcome')->where('section_key', 'sambutan')->first();
@endphp

<section class="py-16 md:py-24 px-6 md:px-12 bg-white flex flex-col md:flex-row gap-12 items-center md:items-start max-w-6xl mx-auto">
    <!-- Image -->
    <div class="w-full md:w-[350px] shrink-0">
        <div class="aspect-[3/4] bg-gray-100 p-2 rounded-sm border hover:shadow-lg transition-shadow duration-300">
            @if($sambutan && $sambutan->image)
                <img src="{{ Storage::url($sambutan->image) }}" alt="Kepala Sekolah" class="w-full h-full object-cover">
            @else
                <img src="/images/kepala-sekolah.jpg" onerror="this.src='https://placehold.co/350x450/e9ecef/495057?text=Foto+Kepala+Sekolah'" alt="Kepala Sekolah" class="w-full h-full object-cover">
            @endif
        </div>
    </div>
    
    <!-- Text -->
    <div class="w-full md:w-2/3 mt-6 md:mt-0">
        <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">{{ $sambutan->subtitle ?? 'LINGKUNGAN YANG MENDUKUNG' }}</h4>
        <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-8 pb-4">
            {{ $sambutan->title ?? 'Sambutan Kepala Sekolah' }}
        </h2>
        
        <div class="space-y-4 text-gray-600 text-sm leading-relaxed italic border-l-[3px] border-gray-200 pl-6">
            @if($sambutan && $sambutan->content)
                {!! nl2br(e($sambutan->content)) !!}
            @else
                <p>"Selamat datang di website SMK Negeri 1 Maesan. Sebagai sekolah dengan slogan 'Kreatif & Berkarakter', kami berkomitmen untuk menghasilkan pendidikan vokasi yang unggul, berkarakter, dan selaras dengan perkembangan teknologi."</p>
                <p>"SMK Negeri 1 Maesan saat ini membuka tiga kompetensi keahlian, yaitu Agribisnis Ternak Ruminansia, Agribisnis Ternak Unggas, dan Teknik Komputer dan Jaringan (TKJ). Ketiga jurusan ini dirancang untuk membekali peserta didik agar memiliki keterampilan praktis, jiwa inovatif, serta kesiapan bersaing di dunia kerja maupun dunia usaha."</p>
                <p>"Melalui pembelajaran berbasis proyek, teaching factory, dan kemitraan dunia industri, kami terus berupaya memberikan pengalaman belajar terbaik bagi seluruh peserta didik."</p>
                <p>"Kami berharap website ini dapat menjadi media informasi, inspirasi, serta ruang kolaborasi bagi seluruh warga sekolah, orang tua, dan masyarakat.<br><br>Terima kasih."</p>
            @endif
        </div>
        
        <div class="mt-10">
            <p class="text-gray-900 text-base font-bold">Suhartini</p>
            <p class="text-[10px] text-blue-600 mt-1 uppercase tracking-widest font-bold">KEPALA SEKOLAH SMK NEGERI 1 MAESAN</p>
        </div>
    </div>
</section>
