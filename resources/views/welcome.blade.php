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
                            <svg style="width:90px;height:90px;color:rgba(255,255,255,0.55);" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
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
                    <span style="font-size:0.85rem;font-weight:600;color:#475569;">Available for new opportunities</span>
                </div>

                {{-- Name --}}
                <h1 style="font-family:'Manrope',sans-serif;font-size:clamp(2.2rem,5vw,3.75rem);font-weight:800;color:#0f172a;line-height:1.1;letter-spacing:-0.02em;margin:0 0 0.6rem;">Yoga Aris Purwanto</h1>

                {{-- Role --}}
                <h2 style="font-family:'Manrope',sans-serif;font-size:clamp(1.2rem,3vw,1.9rem);font-weight:700;color:#0d9488;margin:0 0 0.35rem;">IT Specialist</h2>
                <p style="font-size:0.95rem;font-weight:500;color:#64748b;margin:0 0 1.5rem;">(Infrastructure, Network, &amp; Software Development)</p>

                {{-- Description --}}
                <p style="font-size:1.05rem;color:#475569;line-height:1.75;max-width:560px;margin:0 0 2rem;">
                    Bridging Infrastructure and Innovation. With extensive experience spanning hardware management, network architecture, and modern software engineering, I build robust, scalable technical foundations that drive business success.
                </p>

                {{-- CTAs --}}
                <div style="display:flex;flex-wrap:wrap;gap:0.85rem;margin-bottom:2.5rem;">
                    <a href="#portfolio" style="display:inline-flex;align-items:center;gap:0.5rem;background:#0d9488;color:#fff;font-weight:700;font-size:0.95rem;padding:0.85rem 1.75rem;border-radius:9999px;text-decoration:none;box-shadow:0 8px 20px rgba(13,148,136,0.35);transition:background 0.2s,transform 0.2s;" onmouseover="this.style.background='#0f766e';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#0d9488';this.style.transform='none'">
                        View Projects
                        <svg style="width:15px;height:15px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                    <a href="#" style="display:inline-flex;align-items:center;gap:0.5rem;background:#fff;color:#334155;font-weight:700;font-size:0.95rem;padding:0.85rem 1.75rem;border-radius:9999px;text-decoration:none;border:2px solid #e2e8f0;transition:border-color 0.2s,color 0.2s,transform 0.2s;" onmouseover="this.style.borderColor='#0d9488';this.style.color='#0d9488';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e2e8f0';this.style.color='#334155';this.style.transform='none'">
                        Download CV
                        <svg style="width:15px;height:15px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                    </a>
                </div>

                {{-- Stats --}}
                <div style="padding-top:1.75rem;border-top:1.5px solid #e2e8f0;display:grid;grid-template-columns:repeat(3,1fr);gap:0.85rem;max-width:480px;">
                    @foreach(['8+'=>'Years Experience','50+'=>'Projects Delivered','100%'=>'Client Satisfaction'] as $n=>$l)
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
                <div style="position:relative;width:100%;max-width:390px;aspect-ratio:4/5;border-radius:2.5rem;overflow:hidden;box-shadow:0 30px 60px -10px rgba(13,148,136,0.25),0 0 0 1.5px rgba(255,255,255,0.7);">
                    <div style="position:absolute;inset:0;background:linear-gradient(180deg,transparent 55%,rgba(15,23,42,0.55) 100%);z-index:1;pointer-events:none;"></div>
                    <div style="width:100%;height:100%;background:linear-gradient(135deg,#0d9488 0%,#14b8a6 45%,#0ea5e9 100%);display:flex;align-items:center;justify-content:center;transition:transform 0.6s;" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
                        <svg style="width:110px;height:110px;color:rgba(255,255,255,0.5);" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
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
    .hero-grid{grid-template-columns:7fr 5fr!important;}
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
            <span style="font-size:0.85rem;font-weight:800;text-transform:uppercase;letter-spacing:0.1em;color:#0d9488;display:block;margin-bottom:0.75rem;">Expertise</span>
            <h2 style="font-family:'Manrope',sans-serif;font-size:clamp(2.2rem,5vw,3.25rem);font-weight:800;color:#0f172a;line-height:1.1;margin-bottom:1.25rem;">Core Competencies</h2>
            <p style="color:#64748b;font-size:1.1rem;line-height:1.75;">Comprehensive IT expertise blending robust infrastructure management with modern software innovation.</p>
        </div>
        
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(340px,1fr));gap:2.5rem;">
            @foreach([
                [
                    'title' => 'IT Service & Hardware',
                    'color' => '#0d9488',
                    'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                    'items' => ['Preventive & Corrective Maintenance', 'Hardware Troubleshooting & Repair', 'System Performance Upgrade', 'Data Recovery & Backup', 'OS & Software Deployment']
                ],
                [
                    'title' => 'Software Development',
                    'color' => '#6366f1',
                    'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                    'items' => ['Laravel MVC & RESTful API', 'Tailwind CSS & Modern UI', 'Livewire & Alpine.js', 'Database Architecture', 'Automation & CI/CD Pipelines']
                ],
                [
                    'title' => 'Infrastructure & Network',
                    'color' => '#0ea5e9',
                    'icon' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                    'items' => ['Mikrotik Routing & Firewall', 'Advanced Bandwidth Management', 'CCTV System & Remote Monitoring', 'Windows Server & AD', 'Virtualization (Hyper-V)']
                ]
            ] as $s)
            <div class="card" style="padding:2.75rem;transition:all 0.4s ease;position:relative;" onmouseover="this.style.transform='translateY(-10px)';this.style.borderColor='{{ $s['color'] }}40'" onmouseout="this.style.transform='none';this.style.borderColor='#f1f5f9'">
                <div style="width:64px;height:64px;border-radius:1.25rem;background:{{ $s['color'] }}12;display:flex;align-items:center;justify-content:center;margin-bottom:2rem;">
                    <svg style="width:32px;height:32px;color:{{ $s['color'] }};" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}"/></svg>
                </div>
                <h3 style="font-family:'Manrope',sans-serif;font-size:1.5rem;font-weight:800;color:#0f172a;margin-bottom:1.5rem;">{{ $s['title'] }}</h3>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:1rem;">
                    @foreach($s['items'] as $item)
                    <li style="display:flex;align-items:center;gap:0.75rem;color:#475569;font-size:1rem;font-weight:500;">
                        <span style="width:8px;height:8px;border-radius:50%;background:{{ $s['color'] }};flex-shrink:0;"></span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- EXPERIENCE --}}
<section id="experience" style="padding:4rem 0;background:#F8FAFC;">
    <div style="max-width:860px;margin:0 auto;padding:0 2rem;">
        <div style="margin-bottom:3.5rem;">
            <h2 style="font-family:'Manrope',sans-serif;font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#0f172a;margin:0 0 0.6rem;">Career Journey</h2>
            <p style="color:#64748b;font-size:1.05rem;line-height:1.7;">A timeline of my professional experience in IT infrastructure, support, and development.</p>
        </div>

        {{-- Timeline --}}
        <div style="position:relative;">
            {{-- Vertical line --}}
            <div style="position:absolute;left:23px;top:1.5rem;bottom:0;width:2px;background:#bcc9c6;z-index:0;"></div>

            <div style="display:flex;flex-direction:column;gap:2rem;">

                {{-- 1. Freelancer (current - yellow dot) --}}
                <div style="position:relative;padding-left:4rem;">
                    <div style="position:absolute;left:16px;top:1.5rem;width:16px;height:16px;border-radius:50%;background:#e9c349;border:4px solid #F8FAFC;box-shadow:0 0 0 2px #e9c349;z-index:1;"></div>
                    <div class="card" style="padding:1.5rem 1.75rem;">
                        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-start;gap:0.75rem;margin-bottom:0.6rem;">
                            <div>
                                <h3 style="font-family:'Manrope',sans-serif;font-size:1.35rem;font-weight:700;color:#0f172a;margin:0 0 0.25rem;">Freelancer</h3>
                                <p style="font-size:0.95rem;font-weight:600;color:#0d9488;margin:0;">Independent Consultant</p>
                            </div>
                            <span style="font-size:0.78rem;font-weight:700;color:#fff;background:#0d9488;padding:0.3rem 0.9rem;border-radius:9999px;white-space:nowrap;align-self:flex-start;">2023 – Present</span>
                        </div>
                        <p style="color:#64748b;line-height:1.7;font-size:0.93rem;margin:0;">Providing specialized IT infrastructure solutions and independent technical consulting for various clients.</p>
                    </div>
                </div>

                {{-- 2. Staff IT - PNM --}}
                <div style="position:relative;padding-left:4rem;">
                    <div style="position:absolute;left:16px;top:1.5rem;width:16px;height:16px;border-radius:50%;background:#0d9488;border:4px solid #F8FAFC;box-shadow:0 0 0 2px #0d9488;z-index:1;"></div>
                    <div class="card" style="padding:1.5rem 1.75rem;">
                        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-start;gap:0.75rem;margin-bottom:0.6rem;">
                            <div>
                                <h3 style="font-family:'Manrope',sans-serif;font-size:1.35rem;font-weight:700;color:#0f172a;margin:0 0 0.25rem;">Staff IT</h3>
                                <p style="font-size:0.95rem;font-weight:600;color:#0d9488;margin:0;">PNM</p>
                            </div>
                            <span style="font-size:0.78rem;font-weight:700;color:#475569;background:#eaefed;padding:0.3rem 0.9rem;border-radius:9999px;white-space:nowrap;border:1px solid #bcc9c6;">2022</span>
                        </div>
                        <p style="color:#64748b;line-height:1.7;font-size:0.93rem;margin:0;">Managed daily IT operations, supported corporate infrastructure, and ensured system reliability for internal stakeholders.</p>
                    </div>
                </div>

                {{-- 3. Staff IT - All Stay Hotel --}}
                <div style="position:relative;padding-left:4rem;">
                    <div style="position:absolute;left:16px;top:1.5rem;width:16px;height:16px;border-radius:50%;background:#0d9488;border:4px solid #F8FAFC;box-shadow:0 0 0 2px #0d9488;z-index:1;"></div>
                    <div class="card" style="padding:1.5rem 1.75rem;">
                        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-start;gap:0.75rem;margin-bottom:0.6rem;">
                            <div>
                                <h3 style="font-family:'Manrope',sans-serif;font-size:1.35rem;font-weight:700;color:#0f172a;margin:0 0 0.25rem;">Staff IT</h3>
                                <p style="font-size:0.95rem;font-weight:600;color:#0d9488;margin:0;">All Stay Hotel</p>
                            </div>
                            <span style="font-size:0.78rem;font-weight:700;color:#475569;background:#eaefed;padding:0.3rem 0.9rem;border-radius:9999px;white-space:nowrap;border:1px solid #bcc9c6;">2022</span>
                        </div>
                        <p style="color:#64748b;line-height:1.7;font-size:0.93rem;margin:0;">Overseeing hospitality IT systems, network infrastructure maintenance, and resolving technical issues to ensure seamless guest experiences.</p>
                    </div>
                </div>

                {{-- 4. IT Helpdesk Coordinator - USG (Leadership) --}}
                <div style="position:relative;padding-left:4rem;">
                    <div style="position:absolute;left:16px;top:1.5rem;width:16px;height:16px;border-radius:50%;background:#7f1d1d;border:4px solid #F8FAFC;box-shadow:0 0 0 2px #7f1d1d;z-index:1;"></div>
                    <div class="card" style="padding:1.5rem 1.75rem;">
                        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-start;gap:0.75rem;margin-bottom:0.6rem;">
                            <div>
                                <div style="display:flex;align-items:center;flex-wrap:wrap;gap:0.6rem;margin-bottom:0.25rem;">
                                    <h3 style="font-family:'Manrope',sans-serif;font-size:1.35rem;font-weight:700;color:#0f172a;margin:0;">IT Helpdesk Coordinator</h3>
                                    <span style="font-size:0.65rem;font-weight:800;text-transform:uppercase;letter-spacing:0.08em;color:#fff;background:#7f1d1d;padding:0.2rem 0.55rem;border-radius:4px;">Leadership</span>
                                </div>
                                <p style="font-size:0.95rem;font-weight:600;color:#0d9488;margin:0;">USG</p>
                            </div>
                            <span style="font-size:0.78rem;font-weight:700;color:#475569;background:#eaefed;padding:0.3rem 0.9rem;border-radius:9999px;white-space:nowrap;border:1px solid #bcc9c6;">2019 – 2022</span>
                        </div>
                        <p style="color:#64748b;line-height:1.7;font-size:0.93rem;margin:0;">Led the IT support team, established structured helpdesk protocols, and managed enterprise-wide technical issue resolution workflows.</p>
                    </div>
                </div>

                {{-- 5. IT Support - Busana Apparel Group --}}
                <div style="position:relative;padding-left:4rem;">
                    <div style="position:absolute;left:16px;top:1.5rem;width:16px;height:16px;border-radius:50%;background:#0d9488;border:4px solid #F8FAFC;box-shadow:0 0 0 2px #0d9488;z-index:1;"></div>
                    <div class="card" style="padding:1.5rem 1.75rem;">
                        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-start;gap:0.75rem;margin-bottom:0.6rem;">
                            <div>
                                <h3 style="font-family:'Manrope',sans-serif;font-size:1.35rem;font-weight:700;color:#0f172a;margin:0 0 0.25rem;">IT Support</h3>
                                <p style="font-size:0.95rem;font-weight:600;color:#0d9488;margin:0;">Busana Apparel Group</p>
                            </div>
                            <span style="font-size:0.78rem;font-weight:700;color:#475569;background:#eaefed;padding:0.3rem 0.9rem;border-radius:9999px;white-space:nowrap;border:1px solid #bcc9c6;">2018 – 2019</span>
                        </div>
                        <p style="color:#64748b;line-height:1.7;font-size:0.93rem;margin:0;">Initial role handling frontline technical support, hardware troubleshooting, and basic network setup for manufacturing facilities.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- PORTFOLIO --}}
<section id="portfolio" style="padding:4rem 0;background:#fff;position:relative;">
    <div style="max-width:1200px;margin:0 auto;padding:0 2rem;">
        <div style="text-align:center;max-width:700px;margin:0 auto 5rem;">
            <span style="font-size:0.85rem;font-weight:800;text-transform:uppercase;letter-spacing:0.1em;color:#0d9488;display:block;margin-bottom:0.75rem;">Selected Work</span>
            <h2 style="font-family:'Manrope',sans-serif;font-size:clamp(2.2rem,5vw,3.25rem);font-weight:800;color:#0f172a;line-height:1.1;margin-bottom:1.25rem;">Featured Projects</h2>
            <p style="color:#64748b;font-size:1.1rem;line-height:1.75;">A showcase of complex IT solutions, from robust infrastructure setups to specialized software systems.</p>
        </div>
        
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(360px,1fr));gap:3rem;">
            @foreach([
                ['name'=>'Enterprise Asset Management','tags'=>['Laravel','Livewire','MySQL'],'desc'=>'A comprehensive system to track and manage IT hardware assets, licensing, and lifecycle across departments. Features real-time dashboards and automated reports.','g'=>'linear-gradient(135deg,#0d9488,#2dd4bf)'],
                ['name'=>'Campus Network Revamp','tags'=>['Mikrotik','Windows Server','VLAN'],'desc'=>'Full-scale redesign of multi-building network infrastructure. Implemented advanced firewall rules, load balancing, VLAN segmentation, and Active Directory.','g'=>'linear-gradient(135deg,#0ea5e9,#38bdf8)'],
                ['name'=>'CCTV Remote Monitoring','tags'=>['IP Camera','NVR','VPN'],'desc'=>'Deployment of a 64-channel IP CCTV system with centralized NVR management and secure remote access via VPN for 24/7 high-definition facility surveillance.','g'=>'linear-gradient(135deg,#6366f1,#818cf8)'],
                ['name'=>'IT Helpdesk Portal','tags'=>['Laravel','Tailwind','REST API'],'desc'=>'Specialized internal ticketing system with SLA tracking, department routing, and real-time notifications, significantly improving technical support efficiency.','g'=>'linear-gradient(135deg,#0f766e,#14b8a6)'],
            ] as $p)
            <div class="card" style="transition:all 0.4s ease;" onmouseover="this.style.transform='translateY(-10px)';this.style.boxShadow='0 25px 50px -12px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 1px 4px 0 rgba(0,0,0,0.05)'">
                <div style="height:220px;background:{{ $p['g'] }};display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;">
                    <div style="position:absolute;inset:0;background:rgba(255,255,255,0.05);backdrop-filter:blur(2px);"></div>
                    <svg style="width:80px;height:80px;color:rgba(255,255,255,0.7);z-index:1;" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z"/></svg>
                </div>
                <div style="padding:2.25rem;">
                    <div style="display:flex;flex-wrap:wrap;gap:0.6rem;margin-bottom:1.25rem;">
                        @foreach($p['tags'] as $tag)
                        <span style="font-size:0.75rem;font-weight:700;color:#0d9488;background:#f0fdfa;border:1px solid #99f6e4;padding:0.3rem 0.85rem;border-radius:9999px;">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <h3 style="font-family:'Manrope',sans-serif;font-size:1.4rem;font-weight:800;color:#0f172a;margin-bottom:0.75rem;">{{ $p['name'] }}</h3>
                    <p style="font-size:1rem;color:#64748b;line-height:1.7;margin-bottom:1.75rem;">{{ $p['desc'] }}</p>
                    <a href="#" style="font-weight:700;color:#0d9488;font-size:1rem;display:inline-flex;align-items:center;gap:0.5rem;text-decoration:none;transition:gap 0.2s;" onmouseover="this.style.gap='0.75rem'" onmouseout="this.style.gap='0.5rem'">
                        View Case Study
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
        <span style="font-size:0.78rem;font-weight:800;letter-spacing:0.12em;text-transform:uppercase;color:#99f6e4;display:block;margin-bottom:0.5rem;">Let's Connect</span>
        <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:900;color:#fff;line-height:1.1;margin-bottom:1.25rem;">Have a Project in Mind?</h2>
        <p style="color:#99f6e4;font-size:1.05rem;line-height:1.7;margin-bottom:2.5rem;">Whether it's infrastructure, software development, or network engineering — I'd love to help you solve it.</p>
        <div style="display:flex;flex-wrap:wrap;gap:1rem;justify-content:center;">
            <a href="mailto:yoga@example.com" style="background:#fff;color:#0d9488;padding:0.9rem 1.9rem;border-radius:9999px;font-weight:800;font-size:0.95rem;text-decoration:none;display:inline-flex;align-items:center;gap:0.55rem;box-shadow:0 10px 30px rgba(0,0,0,0.15);transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
                <svg style="width:18px;height:18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                Send an Email
            </a>
            <a href="https://linkedin.com" target="_blank" style="background:rgba(255,255,255,0.15);color:#fff;padding:0.9rem 1.9rem;border-radius:9999px;font-weight:800;font-size:0.95rem;text-decoration:none;border:2px solid rgba(255,255,255,0.4);display:inline-flex;align-items:center;gap:0.55rem;transition:background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
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
            Yoga Aris Purwanto
        </div>

        {{-- Nav --}}
        <nav style="display:flex;gap:1.5rem;align-items:center;">
            <a href="#hero" style="color:#64748b;text-decoration:none;font-weight:600;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#64748b'">Home</a>
            <a href="#skills" style="color:#0d9488;text-decoration:none;font-weight:700;font-size:0.9rem;">Skills</a>
            <a href="#experience" style="color:#64748b;text-decoration:none;font-weight:600;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#64748b'">Experience</a>
            <a href="#portfolio" style="color:#64748b;text-decoration:none;font-weight:600;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#64748b'">Portfolio</a>
            <a href="#contact" style="color:#64748b;text-decoration:none;font-weight:600;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#64748b'">Contact</a>
        </nav>

        {{-- Copyright --}}
        <div style="color:#64748b;font-size:0.9rem;font-weight:500;">
            &copy; {{ date('Y') }} Yoga Aris Purwanto. All rights reserved.
        </div>
    </div>
</footer>

@endsection
