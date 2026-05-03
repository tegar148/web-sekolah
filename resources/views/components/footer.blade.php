@php
    $footerSetting = \App\Models\SiteSection::where('page', 'global')->where('section_key', 'footer')->first();
    $title = $footerSetting->title ?? 'SMK Negeri 1 MAESAN';
    $subtitle = $footerSetting->subtitle ?? 'Lembaga pendidikan vokasional terpadu yang berorientasi pada masa depan, menggabungkan pendidikan vokasi dengan kebutuhan kekinian di industri.';
    $contact = [];
    if ($footerSetting && $footerSetting->content) {
        $contact = json_decode($footerSetting->content, true);
        if (!is_array($contact)) {
            $contact = [];
        }
    }
    $address = $contact['address'] ?? 'Jl. Pendidikan Blok No.1, Kab. Bondowoso, Jawa Timur.';
    $phone = $contact['phone'] ?? '+62 (823) 5600 0100';
    $email = $contact['email'] ?? 'info@smkn1maesan.sch.id';
    $facebook = $contact['facebook'] ?? '#';
    $instagram = $contact['instagram'] ?? '#';
    $youtube = $contact['youtube'] ?? '#';

    $nav1_title = $contact['nav1_title'] ?? 'NAVIGASI';
    $nav1_links = $contact['nav1_links'] ?? [
        ['label' => 'Tentang Kami', 'url' => route('sejarah')],
        ['label' => 'Kurikulum', 'url' => route('jurusan.tkj')],
        ['label' => 'Fasilitas', 'url' => route('fasilitas')],
        ['label' => 'Kemitraan', 'url' => route('bkk.profile')],
    ];
    $nav1_links = array_filter($nav1_links, fn($link) => !empty($link['label']));

    $nav2_title = $contact['nav2_title'] ?? 'PROGRAM';
    $nav2_links = $contact['nav2_links'] ?? [
        ['label' => 'Digital Team', 'url' => route('jurusan.tkj')],
        ['label' => 'Advanced AI Lab', 'url' => route('jurusan.tkj')],
        ['label' => 'Agri-Industry', 'url' => route('jurusan.ruminansia')],
        ['label' => 'Business Hub', 'url' => route('bkk.lowongan')],
    ];
    $nav2_links = array_filter($nav2_links, fn($link) => !empty($link['label']));
    
    // Use footer custom image if available, else fallback to topbar image
    $image = $footerSetting->image ?? null;
    if (!$image) {
        $topbar = \App\Models\SiteSection::where('page', 'global')->where('section_key', 'topbar')->first();
        $image = $topbar->image ?? null;
    }
@endphp
<footer class="bg-white pt-24 pb-10 border-t border-gray-100 mt-auto">
    <div class="max-w-6xl mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
        <div class="col-span-1 md:col-span-4 pr-8">
            <div class="flex items-center gap-3 mb-6">
                @if($image)
                <div class="h-8 w-8 flex flex-col justify-center items-center">
                    <img src="{{ Storage::url($image) }}" alt="Logo" class="w-full h-full object-contain">
                </div>
                @else
                <div class="h-8 w-8 bg-green-600 rounded-sm flex flex-col justify-center items-center font-bold text-white shadow-sm border border-green-700">
                    <span class="text-sm">M</span>
                </div>
                @endif
                <div>
                    <h1 class="text-sm font-bold text-gray-900 leading-tight">{{ $title }}</h1>
                </div>
            </div>
            <p class="text-xs text-gray-500 leading-relaxed font-light pr-4">{{ $subtitle }}</p>
            <div class="flex space-x-3 mt-8">
                @if($facebook && $facebook !== '#')
                <a href="{{ $facebook }}" target="_blank" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-600 transition">
                     <span class="sr-only">Facebook</span>
                     <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                </a>
                @endif
                @if($instagram && $instagram !== '#')
                <a href="{{ $instagram }}" target="_blank" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-600 transition">
                     <span class="sr-only">Instagram</span>
                     <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                @endif
                @if($youtube && $youtube !== '#')
                <a href="{{ $youtube }}" target="_blank" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:border-blue-600 transition">
                     <span class="sr-only">YouTube</span>
                     <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                </a>
                @endif
            </div>
        </div>

        <div class="col-span-1 md:col-span-2">
             <h4 class="font-bold text-gray-900 mb-6 text-[10px] tracking-widest uppercase">{{ $nav1_title }}</h4>
             <ul class="space-y-4 text-xs text-gray-500">
                 @foreach($nav1_links as $link)
                 <li><a href="{{ url($link['url']) }}" class="hover:text-blue-600 transition">{{ $link['label'] }}</a></li>
                 @endforeach
             </ul>
        </div>
        
        <div class="col-span-1 md:col-span-2">
             <h4 class="font-bold text-gray-900 mb-6 text-[10px] tracking-widest uppercase">{{ $nav2_title }}</h4>
             <ul class="space-y-4 text-xs text-gray-500">
                 @foreach($nav2_links as $link)
                 <li><a href="{{ url($link['url']) }}" class="hover:text-blue-600 transition">{{ $link['label'] }}</a></li>
                 @endforeach
             </ul>
        </div>

        <div class="col-span-1 md:col-span-4">
             <h4 class="font-bold text-gray-900 mb-6 text-[10px] tracking-widest uppercase">HUBUNGI KAMI</h4>
             <ul class="space-y-4 text-xs text-gray-500">
                 <li class="flex gap-3">
                     <span class="text-blue-600 mt-0.5 shrink-0">
                         <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                     </span>
                     <span>{{ $address }}</span>
                 </li>
                 <li class="flex gap-3">
                     <span class="text-blue-600 mt-0.5 shrink-0">
                         <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                     </span>
                     <span>{{ $phone }}</span>
                 </li>
                 <li class="flex gap-3">
                     <span class="text-blue-600 mt-0.5 shrink-0">
                         <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                     </span>
                     <span>{{ $email }}</span>
                 </li>
             </ul>
        </div>
    </div>
    
    <div class="max-w-6xl mx-auto px-6 md:px-12 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center text-[10px] text-gray-400">
        <p>© {{ date('Y') }} SMK Negeri 1 Maesan. Dikembangkan oleh Tim IT SMK.</p>
        <div class="space-x-6 mt-4 md:mt-0 font-medium">
            <a href="#" class="hover:text-gray-600 transition">PRIVACY POLICY</a>
            <a href="#" class="hover:text-gray-600 transition">TERMS OF SERVICE</a>
        </div>
    </div>
</footer>
