@extends('layouts.app')
@section('content')

<x-navbar />

{{-- HERO --}}
<section id="hero" style="padding:2.5rem 0 3rem;background:#f5faf8;min-height:calc(100vh - 80px);display:flex;align-items:flex-start;">
    <div style="max-width:1200px;margin:0 auto;padding:0 2rem;width:100%;">
        <div class="hero-grid" style="display:grid;grid-template-columns:1fr;gap:3rem;align-items:center;">

            {{-- LEFT --}}
            <div class="hero-text" style="order:1;">
                {{-- Mobile photo --}}
                <div class="hero-mob-photo">
                    <div style="border-radius:2.5rem;overflow:hidden;aspect-ratio:4/5;max-width:280px;margin:0 auto 2rem;box-shadow:0 25px 50px rgba(13,148,136,0.2);position:relative;">
                        <div style="width:100%;height:100%;background:linear-gradient(135deg,#0d9488,#14b8a6,#0ea5e9);display:flex;align-items:center;justify-content:center;">
                            @if(!empty($settings['hero_image_path']))
                                <img src="{{ Storage::url($settings['hero_image_path']) }}" style="width:100%;height:100%;object-fit:cover;">
                            @else
                                <svg style="width:90px;height:90px;color:rgba(255,255,255,0.55);" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                            @endif
                        </div>
                        <div style="position:absolute;bottom:1rem;left:0;right:0;display:flex;flex-wrap:wrap;justify-content:center;gap:0.4rem;padding:0 0.75rem;">
                            @foreach(['Linux','Cisco','Laravel','Docker'] as $t)
                            <span style="background:rgba(255,255,255,0.9);color:#1e293b;font-weight:700;font-size:0.68rem;padding:0.3rem 0.75rem;border-radius:9999px;box-shadow:0 2px 6px rgba(0,0,0,0.1);">{{ $t }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Badge --}}
                <div style="display:inline-flex;align-items:center;gap:0.6rem;padding:0.45rem 1rem;border-radius:9999px;background:#fff;border:1.5px solid #e2e8f0;box-shadow:0 1px 6px rgba(0,0,0,0.06);margin-bottom:1.5rem;">
                    <span style="width:10px;height:10px;border-radius:50%;background:#10b981;display:inline-block;animation:blink 2s infinite;flex-shrink:0;"></span>
                    <span style="font-size:0.85rem;font-weight:600;color:#475569;">{{ __('Available for new opportunities') }}</span>
                </div>

                {{-- Name --}}
                <h1 style="font-family:'Manrope',sans-serif;font-size:clamp(2.2rem,5vw,3.75rem);font-weight:800;color:#0f172a;line-height:1.1;letter-spacing:-0.02em;margin:0 0 0.6rem;">{{ $settings['site_name'] ?? 'Yoga Aris Purwanto' }}</h1>

                {{-- Role --}}
                <h2 style="font-family:'Manrope',sans-serif;font-size:clamp(1.2rem,3vw,1.9rem);font-weight:700;color:#0d9488;margin:0 0 0.35rem;">{{ __($settings['site_role'] ?? 'IT Specialist') }}</h2>
                <p style="font-size:0.95rem;font-weight:500;color:#64748b;margin:0 0 1.5rem;">{{ __($settings['site_subrole'] ?? '') }}</p>

                {{-- Description --}}
                <p style="font-size:1.05rem;color:#475569;line-height:1.75;max-width:560px;margin:0 0 2rem;">
                    {{ __($settings['site_description'] ?? '') }}
                </p>

                {{-- CTAs --}}
                <div style="display:flex;flex-wrap:wrap;gap:0.85rem;margin-bottom:2.5rem;">
                    <a href="#portfolio" style="display:inline-flex;align-items:center;gap:0.5rem;background:#0d9488;color:#fff;font-weight:700;font-size:0.95rem;padding:0.85rem 1.75rem;border-radius:9999px;text-decoration:none;box-shadow:0 8px 20px rgba(13,148,136,0.35);transition:background 0.2s,transform 0.2s;" onmouseover="this.style.background='#0f766e';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#0d9488';this.style.transform='none'">
                        {{ __('View Projects') }}
                        <svg style="width:15px;height:15px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                    <a href="#" style="display:inline-flex;align-items:center;gap:0.5rem;background:#fff;color:#334155;font-weight:700;font-size:0.95rem;padding:0.85rem 1.75rem;border-radius:9999px;text-decoration:none;border:2px solid #e2e8f0;transition:border-color 0.2s,color 0.2s,transform 0.2s;" onmouseover="this.style.borderColor='#0d9488';this.style.color='#0d9488';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e2e8f0';this.style.color='#334155';this.style.transform='none'">
                        {{ __('Download CV') }}
                        <svg style="width:15px;height:15px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                    </a>
                </div>

                {{-- Stats --}}
                <div style="padding-top:1.75rem;border-top:1.5px solid #e2e8f0;display:grid;grid-template-columns:repeat(3,1fr);gap:0.85rem;max-width:480px;">
                    @foreach([($settings['years_experience'] ?? '8+')=>__('Years Experience'),($settings['projects_count'] ?? '50+')=>__('Projects Delivered'),($settings['client_satisfaction'] ?? '100%')=>__('Client Satisfaction')] as $n=>$l)
                    <div style="background:#fff;border:1.5px solid #d1fae5;border-radius:1rem;padding:1rem 0.85rem;box-shadow:0 1px 4px rgba(0,0,0,0.04);">
                        <div style="font-family:'Manrope',sans-serif;font-size:1.6rem;font-weight:800;color:#0d9488;line-height:1;">{{ $n }}</div>
                        <div style="font-size:0.78rem;font-weight:600;color:#64748b;margin-top:0.3rem;line-height:1.3;">{{ $l }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- RIGHT: Photo --}}
            <div class="hero-desk-photo" style="order:2;display:flex;justify-content:center;align-items:center;position:relative;">
                <div style="position:absolute;inset:-2rem;background:radial-gradient(ellipse at center,rgba(13,148,136,0.1) 0%,transparent 70%);border-radius:3rem;pointer-events:none;"></div>
                <div style="position:relative;width:100%;max-width:450px;aspect-ratio:4/5;border-radius:2.5rem;overflow:hidden;box-shadow:0 30px 60px -10px rgba(13,148,136,0.25),0 0 0 1.5px rgba(255,255,255,0.7);">
                    <div style="position:absolute;inset:0;background:linear-gradient(180deg,transparent 55%,rgba(15,23,42,0.55) 100%);z-index:1;pointer-events:none;"></div>
                    <div style="width:100%;height:100%;background:linear-gradient(135deg,#0d9488 0%,#14b8a6 45%,#0ea5e9 100%);transition:transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
                        @if(!empty($settings['hero_image_path']))
                            <img src="{{ Storage::url($settings['hero_image_path']) }}" style="width:100%;height:100%;object-fit:cover;object-position:center top;">
                        @else
                            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
                                <svg style="width:110px;height:110px;color:rgba(255,255,255,0.5);" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div style="position:absolute;bottom:1.5rem;left:0;right:0;display:flex;flex-wrap:wrap;justify-content:center;gap:0.5rem;padding:0 1rem;z-index:2;">
                        @foreach(['Linux','Cisco','Laravel','Docker'] as $t)
                        <span style="background:rgba(255,255,255,0.92);backdrop-filter:blur(8px);color:#1e293b;font-weight:700;font-size:0.71rem;padding:0.33rem 0.85rem;border-radius:9999px;box-shadow:0 2px 8px rgba(0,0,0,0.12);border:1px solid rgba(255,255,255,0.5);">{{ $t }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
@keyframes blink{0%,100%{opacity:1}50%{opacity:0.6;transform:scale(1.2)}}
@media(min-width:900px){
    .hero-grid{grid-template-columns:1fr 1fr!important;gap:4rem!important;}
    .hero-text{order:1!important;}
    .hero-desk-photo{order:2!important;display:flex!important;}
    .hero-mob-photo{display:none!important;}
}
@media(max-width:899px){
    .hero-desk-photo{display:none!important;}
    .hero-mob-photo{display:block!important;}
}
</style>

{{-- SKILLS --}}
<section id="skills" style="padding:4rem 0;background:#fff;position:relative;overflow:hidden;">
    {{-- subtle background accent --}}
    <div style="position:absolute;top:0;right:0;width:400px;height:400px;background:radial-gradient(circle,#0d94880a 0%,transparent 70%);pointer-events:none;"></div>
    
    <div style="max-width:1200px;margin:0 auto;padding:0 2rem;">
        <div style="text-align:center;max-width:700px;margin:0 auto 5rem;">
            <span style="font-size:0.85rem;font-weight:800;text-transform:uppercase;letter-spacing:0.1em;color:#0d9488;display:block;margin-bottom:0.75rem;">{{ __('Skills') }}</span>
            <h2 style="font-family:'Manrope',sans-serif;font-size:clamp(2.2rem,5vw,3.25rem);font-weight:800;color:#0f172a;line-height:1.1;margin-bottom:1.25rem;">{{ __('Core Competencies') }}</h2>
            <p style="color:#64748b;font-size:1.1rem;line-height:1.75;">{{ __('Skills') }} IT komprehensif yang memadukan manajemen infrastruktur yang kuat dengan inovasi perangkat lunak modern.</p>
        </div>
        
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(340px,1fr));gap:2.5rem;">
            @foreach($skills as $category => $items)
            @php $firstItem = $items->first(); @endphp
            <div class="card" style="padding:2.75rem;transition:all 0.4s ease;position:relative;" onmouseover="this.style.transform='translateY(-10px)';this.style.borderColor='{{ $firstItem->color }}40'" onmouseout="this.style.transform='none';this.style.borderColor='#f1f5f9'">
                <div style="width:64px;height:64px;border-radius:1.25rem;background:{{ $firstItem->color }}12;display:flex;align-items:center;justify-content:center;margin-bottom:2rem;">
                    <svg style="width:32px;height:32px;color:{{ $firstItem->color }};" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $firstItem->icon_path }}"/></svg>
                </div>
                <h3 style="font-family:'Manrope',sans-serif;font-size:1.5rem;font-weight:800;color:#0f172a;margin-bottom:1.5rem;">{{ __($category) }}</h3>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:1rem;">
                    @foreach($items as $item)
                    <li style="display:flex;align-items:center;gap:0.75rem;color:#475569;font-size:1rem;font-weight:500;">
                        <span style="width:8px;height:8px;border-radius:50%;background:{{ $item->color }};flex-shrink:0;"></span>
                        {{ __($item->name) }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- EXPERIENCE --}}
<section id="experience" style="padding:4rem 0;background:#F8FAFC;" x-data="{ 
    showExp: false, 
    activeExp: {title:'', company:'', period:'', desc:'', details: []},
    openExp(title, company, period, desc, details) {
        this.activeExp = {title, company, period, desc, details};
        this.showExp = true;
    }
}" x-init="$watch('showExp', value => { document.body.style.overflow = value ? 'hidden' : 'auto'; })">
    <div style="max-width:860px;margin:0 auto;padding:0 2rem;">
        <div style="margin-bottom:3.5rem;">
            <h2 style="font-family:'Manrope',sans-serif;font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#0f172a;margin:0 0 0.6rem;">{{ __('Career Journey') }}</h2>
            <p style="color:#64748b;font-size:1.05rem;line-height:1.7;">{{ __('A timeline of my professional experience in IT infrastructure, technical support, and system development.') }}</p>
        </div>

        {{-- Timeline --}}
        <div style="position:relative;">
            {{-- Vertical line --}}
            <div style="position:absolute;left:23px;top:1.5rem;bottom:0;width:2px;background:#bcc9c6;z-index:0;"></div>

            <div style="display:flex;flex-direction:column;gap:2rem;">

                @foreach($experiences as $exp)
                <div style="position:relative;padding-left:4rem;">
                    <div style="position:absolute;left:16px;top:1.5rem;width:16px;height:16px;border-radius:50%;background:{{ $exp->dot_color }};border:4px solid #F8FAFC;box-shadow:0 0 0 2px {{ $exp->dot_color }};z-index:1;"></div>
                    <div class="card" 
                        style="padding:1.5rem 1.75rem;cursor:pointer;transition:all 0.3s ease;" 
                        onmouseover="this.style.borderColor='#0d9488';this.style.transform='translateX(5px)'" 
                        onmouseout="this.style.borderColor='#f1f5f9';this.style.transform='none'"
                        @click="openExp('{{ __($exp->title) }}', '{{ $exp->company }}', '{{ __($exp->period) }}', '{{ __($exp->description) }}', {!! json_encode(array_map(function($r) { return __($r); }, $exp->responsibilities ?? [])) !!})">
                        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-start;gap:0.75rem;margin-bottom:0.6rem;">
                            <div>
                                @if($exp->is_leadership)
                                <div style="display:flex;align-items:center;flex-wrap:wrap;gap:0.6rem;margin-bottom:0.25rem;">
                                    <h3 style="font-family:'Manrope',sans-serif;font-size:1.35rem;font-weight:700;color:#0f172a;margin:0;">{{ __($exp->title) }}</h3>
                                    <span style="font-size:0.65rem;font-weight:800;text-transform:uppercase;letter-spacing:0.08em;color:#fff;background:#7f1d1d;padding:0.2rem 0.55rem;border-radius:4px;">{{ __('Leadership') }}</span>
                                </div>
                                @else
                                <h3 style="font-family:'Manrope',sans-serif;font-size:1.35rem;font-weight:700;color:#0f172a;margin:0 0 0.25rem;">{{ __($exp->title) }}</h3>
                                @endif
                                <p style="font-size:0.95rem;font-weight:600;color:#0d9488;margin:0;">{{ $exp->company }}</p>
                            </div>
                            @if($exp->is_current)
                            <span style="font-size:0.78rem;font-weight:700;color:#fff;background:#0d9488;padding:0.3rem 0.9rem;border-radius:9999px;white-space:nowrap;align-self:flex-start;">{{ __($exp->period) }}</span>
                            @else
                            <span style="font-size:0.78rem;font-weight:700;color:#475569;background:#eaefed;padding:0.3rem 0.9rem;border-radius:9999px;white-space:nowrap;border:1px solid #bcc9c6;">{{ __($exp->period) }}</span>
                            @endif
                        </div>
                        <p style="color:#64748b;line-height:1.7;font-size:0.93rem;margin:0;">{{ __($exp->description) }}</p>
                        <div style="margin-top:1rem;font-size:0.75rem;font-weight:800;color:#0d9488;text-transform:uppercase;letter-spacing:0.05em;display:flex;align-items:center;gap:0.4rem;">
                            {{ __('Click for details') }} <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    {{-- Detail Modal --}}
    <template x-teleport="body">
        <div x-show="showExp" x-cloak class="fixed inset-0 flex items-center justify-center p-4 sm:p-6" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 99999;">
            {{-- Backdrop --}}
            <div x-show="showExp" 
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" 
                @click="showExp = false" 
                class="absolute inset-0 bg-slate-900/40 backdrop-blur-md" style="z-index: -1;"></div>
            
            {{-- Modal Content --}}
            <div x-show="showExp" 
                x-transition:enter="ease-out duration-400" x-transition:enter-start="opacity-0 scale-95 translate-y-8" x-transition:enter-end="opacity-100 scale-100 translate-y-0" 
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 translate-y-4" 
                class="relative bg-white rounded-[2.5rem] w-full max-w-2xl shadow-2xl flex flex-col max-h-[90vh] mx-auto my-auto">
                
                {{-- Removed Top Bar for a cleaner look --}}
                <div class="p-8 sm:p-10 overflow-y-auto relative z-10 custom-scrollbar flex-1">
                    <div class="flex justify-between items-start gap-4 mb-6">
                        <div>
                            <h3 class="font-black text-slate-900 text-2xl sm:text-3xl tracking-tight leading-tight uppercase" x-text="activeExp.title"></h3>
                            <p class="text-primary-600 font-bold text-lg mt-1" x-text="activeExp.company"></p>
                        </div>
                        <button @click="showExp = false" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-50 text-slate-400 hover:bg-rose-50 hover:text-rose-500 transition-all flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    {{-- Date Badge --}}
                    <div style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.85rem; background-color:#f8fafc; border-radius:0.75rem; margin-bottom:2rem; width:max-content; border:1px solid #e2e8f0;">
                        <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-xs font-bold text-slate-600 uppercase tracking-widest mt-0.5 whitespace-nowrap" x-text="activeExp.period"></span>
                    </div>

                {{-- Description --}}
                <p class="text-slate-500 font-medium leading-relaxed mb-8 text-lg" x-text="activeExp.desc"></p>

                {{-- Responsibilities --}}
                <div class="mb-4">
                    <h4 class="text-[0.7rem] font-black text-primary-600 uppercase tracking-widest mb-5 flex items-center gap-3">
                        <span class="w-6 h-px bg-primary-200"></span>
                        {{ __('Key Responsibilities') }}
                    </h4>
                    <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:1rem;">
                        <template x-for="item in activeExp.details" :key="item">
                            <li style="display:flex; align-items:flex-start; gap:1rem;">
                                <div style="width:24px; height:24px; border-radius:50%; background-color:#f0fdfa; border:1px solid #ccfbf1; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:2px;">
                                    <svg style="width:12px; height:12px; color:#0d9488;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <span style="font-size:0.95rem; font-weight:700; color:#334155; line-height:1.6;" x-text="item"></span>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
    </template>
</section>

{{-- PORTFOLIO --}}
<section id="portfolio" style="padding:4rem 0;background:#fff;position:relative;">
    <div style="max-width:1200px;margin:0 auto;padding:0 2rem;">
        <div style="text-align:center;max-width:700px;margin:0 auto 5rem;">
            <span style="font-size:0.85rem;font-weight:800;text-transform:uppercase;letter-spacing:0.1em;color:#0d9488;display:block;margin-bottom:0.75rem;">Karya Pilihan</span>
            <h2 style="font-family:'Manrope',sans-serif;font-size:clamp(2.2rem,5vw,3.25rem);font-weight:800;color:#0f172a;line-height:1.1;margin-bottom:1.25rem;">Proyek Unggulan</h2>
            <p style="color:#64748b;font-size:1.1rem;line-height:1.75;">Kumpulan solusi IT kompleks, dari pengaturan infrastruktur yang kuat hingga sistem perangkat lunak khusus.</p>
        </div>
        
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(360px,1fr));gap:3rem;">
            @foreach($projects as $p)
            <div class="card" style="transition:all 0.4s ease;" onmouseover="this.style.transform='translateY(-10px)';this.style.boxShadow='0 25px 50px -12px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 1px 4px 0 rgba(0,0,0,0.05)'">
                <div style="height:220px;background:{{ $p->gradient }};display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;">
                    <div style="position:absolute;inset:0;background:rgba(255,255,255,0.05);backdrop-filter:blur(2px);"></div>
                    <svg style="width:80px;height:80px;color:rgba(255,255,255,0.7);z-index:1;" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z"/></svg>
                </div>
                <div style="padding:2.25rem;">
                    <div style="display:flex;flex-wrap:wrap;gap:0.6rem;margin-bottom:1.25rem;">
                        @foreach($p->tags ?? [] as $tag)
                        <span style="font-size:0.75rem;font-weight:700;color:#0d9488;background:#f0fdfa;border:1px solid #99f6e4;padding:0.3rem 0.85rem;border-radius:9999px;">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <h3 style="font-family:'Manrope',sans-serif;font-size:1.4rem;font-weight:800;color:#0f172a;margin-bottom:0.75rem;">{{ __($p->name) }}</h3>
                    <p style="font-size:1rem;color:#64748b;line-height:1.7;margin-bottom:1.75rem;">{{ __($p->description) }}</p>
                    <a href="{{ $p->url ?? '#' }}" style="font-weight:700;color:#0d9488;font-size:1rem;display:inline-flex;align-items:center;gap:0.5rem;text-decoration:none;transition:gap 0.2s;" onmouseover="this.style.gap='0.75rem'" onmouseout="this.style.gap='0.5rem'">
                        {{ __('View Details') }}
                        <svg style="width:18px;height:18px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CONTACT --}}
<section id="contact" style="padding:4rem 0;background:linear-gradient(135deg,#0f766e,#0d9488 50%,#0ea5e9);">
    <div style="max-width:680px;margin:0 auto;padding:0 2rem;text-align:center;">
        <span style="font-size:0.78rem;font-weight:800;letter-spacing:0.12em;text-transform:uppercase;color:#99f6e4;display:block;margin-bottom:0.5rem;">{{ __('Let\'s Connect') }}</span>
        <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:900;color:#fff;line-height:1.1;margin-bottom:1.25rem;">Punya Proyek dalam Pikiran?</h2>
        <p style="color:#99f6e4;font-size:1.05rem;line-height:1.7;margin-bottom:2.5rem;">Baik itu infrastruktur, pengembangan perangkat lunak, atau rekayasa jaringan — Saya ingin membantu Anda menyelesaikannya.</p>
        <div style="display:flex;flex-wrap:wrap;gap:1rem;justify-content:center;">
            <a href="mailto:{{ $settings['contact_email'] ?? 'yoga@example.com' }}" style="background:#fff;color:#0d9488;padding:0.9rem 1.9rem;border-radius:9999px;font-weight:800;font-size:0.95rem;text-decoration:none;display:inline-flex;align-items:center;gap:0.55rem;box-shadow:0 10px 30px rgba(0,0,0,0.15);transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
                <svg style="width:18px;height:18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                {{ __('Send Email') }}
            </a>
            <a href="{{ $settings['linkedin_url'] ?? 'https://linkedin.com' }}" target="_blank" style="background:rgba(255,255,255,0.15);color:#fff;padding:0.9rem 1.9rem;border-radius:9999px;font-weight:800;font-size:0.95rem;text-decoration:none;border:2px solid rgba(255,255,255,0.4);display:inline-flex;align-items:center;gap:0.55rem;transition:background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                <svg style="width:18px;height:18px;" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                LinkedIn
            </a>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer style="background:#f8fafc;padding:3rem 0;border-top:1px solid #e2e8f0;">
    <div style="max-width:1200px;margin:0 auto;padding:0 2rem;display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:2rem;">
        {{-- Brand --}}
        <div style="font-family:'Manrope',sans-serif;font-size:1.25rem;font-weight:800;color:#0d9488;">
            {{ $settings['site_name'] ?? 'Yoga Aris Purwanto' }}
        </div>

        {{-- Nav --}}
        <nav style="display:flex;gap:1.5rem;align-items:center;">
            <a href="#hero" style="color:#64748b;text-decoration:none;font-weight:600;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#64748b'">{{ __('Home') }}</a>
            <a href="#skills" style="color:#64748b;text-decoration:none;font-weight:600;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#64748b'">{{ __('Skills') }}</a>
            <a href="#experience" style="color:#64748b;text-decoration:none;font-weight:600;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#64748b'">{{ __('Experience') }}</a>
            <a href="#portfolio" style="color:#64748b;text-decoration:none;font-weight:600;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#64748b'">{{ __('Portfolio') }}</a>
            <a href="#contact" style="color:#64748b;text-decoration:none;font-weight:600;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#64748b'">{{ __('Contact') }}</a>
        </nav>

        {{-- Copyright --}}
        <div style="color:#64748b;font-size:0.9rem;font-weight:500;">
            &copy; {{ date('Y') }} Yoga Aris Purwanto. Hak cipta dilindungi undang-undang.
        </div>
    </div>
</footer>

@endsection
