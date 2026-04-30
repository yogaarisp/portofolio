<header id="navbar" style="position:sticky;top:0;z-index:50;background:rgba(255,255,255,0.85);backdrop-filter:blur(12px);border-bottom:1px solid #e2e8f0;transition:all 0.3s ease;">
    <div id="nav-container" style="max-width:1200px;margin:0 auto;padding:1.25rem 2rem;display:flex;justify-content:space-between;align-items:center;gap:1rem;transition:padding 0.3s ease;">
        {{-- Logo --}}
        <a href="#hero" style="display:flex;align-items:center;gap:0.5rem;flex-shrink:0;text-decoration:none;">
            <span class="material-symbols-outlined" style="color:#0D9488;font-size:1.6rem;">terminal</span>
            <span style="font-family:'Manrope',sans-serif;font-size:1.15rem;font-weight:800;color:#0D9488;white-space:nowrap;letter-spacing:-0.01em;">{{ $settings['site_name'] ?? 'Yoga Aris Purwanto' }}</span>
        </a>
        
        {{-- Desktop Nav --}}
        <nav style="display:none;gap:2rem;align-items:center;" id="desktop-nav" class="md-nav">
            @foreach(['hero'=>'Home','skills'=>'Skills','experience'=>'Experience','portfolio'=>'Portfolio'] as $id => $label)
            <a href="#{{ $id }}" class="desk-nav-link" data-target="{{ $id }}">{{ __($label) }}</a>
            @endforeach
        </nav>
        
        <div style="display:flex;align-items:center;gap:1rem;">
            {{-- Language Switcher --}}
            <a href="{{ url('lang/'.(app()->getLocale() == 'id' ? 'en' : 'id')) }}" style="display:flex;align-items:center;gap:0.3rem;font-weight:700;font-size:0.9rem;color:#64748b;text-decoration:none;padding:0.4rem 0.8rem;border-radius:9999px;background:#f1f5f9;transition:all 0.2s;" onmouseover="this.style.background='#e2e8f0';this.style.color='#0d9488'" onmouseout="this.style.background='#f1f5f9';this.style.color='#64748b'">
                <span class="material-symbols-outlined" style="font-size:1.1rem;">language</span>
                {{ app()->getLocale() == 'id' ? 'EN' : 'ID' }}
            </a>

            {{-- Hire Me button --}}
            <a href="#contact" style="background:#0f172a;color:#fff;font-weight:600;font-size:0.9rem;padding:0.6rem 1.5rem;border-radius:9999px;text-decoration:none;white-space:nowrap;transition:all 0.2s;flex-shrink:0;" onmouseover="this.style.background='#1e293b';this.style.transform='translateY(-2px)';this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'" onmouseout="this.style.background='#0f172a';this.style.transform='none';this.style.boxShadow='none'" class="hire-btn">
                {{ __('Hire Me') }}
            </a>
            
            {{-- Mobile hamburger --}}
            <button id="mob-toggle" style="display:flex;padding:0.4rem;color:#64748b;background:none;border:none;cursor:pointer;" class="mob-only">
                <svg style="width:26px;height:26px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
    
    {{-- Mobile menu --}}
    <div id="mob-menu" style="display:none;flex-direction:column;gap:0.5rem;padding:0.75rem 2rem 1.25rem;border-top:1px solid #e2e8f0;background:#fff;">
        @foreach(['hero'=>'Home','skills'=>'Skills','experience'=>'Experience','portfolio'=>'Portfolio','contact'=>'Contact'] as $id => $label)
        <a href="#{{ $id }}" class="mob-nav-link" data-target="{{ $id }}">{{ __($label) }}</a>
        @endforeach
    </div>
</header>

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@400,0&display=swap" rel="stylesheet">
<style>
/* Desktop Nav Links */
.desk-nav-link {
    font-weight: 600;
    color: #64748b;
    text-decoration: none;
    font-size: 0.95rem;
    padding-bottom: 4px;
    border-bottom: 2px solid transparent;
    transition: all 0.3s ease;
}
.desk-nav-link:hover {
    color: #0D9488;
}
.desk-nav-link.active {
    color: #0D9488;
    border-bottom-color: #0D9488;
}

/* Mobile Nav Links */
.mob-nav-link {
    font-weight: 600;
    color: #475569;
    text-decoration: none;
    padding: 0.6rem 0;
    font-size: 1rem;
    transition: color 0.3s;
}
.mob-nav-link.active {
    color: #0D9488;
}

@media(min-width:768px){
    .md-nav{display:flex!important;}
    .mob-only{display:none!important;}
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('navbar');
    const container = document.getElementById('nav-container');
    const mobBtn = document.getElementById('mob-toggle');
    const mobMenu = document.getElementById('mob-menu');
    const deskLinks = document.querySelectorAll('.desk-nav-link');
    const mobLinks = document.querySelectorAll('.mob-nav-link');
    const sections = document.querySelectorAll('section[id]');
    
    // Mobile menu toggle
    if (mobBtn && mobMenu) {
        mobBtn.addEventListener('click', function() {
            mobMenu.style.display = mobMenu.style.display === 'flex' ? 'none' : 'flex';
        });
    }
    
    // Close mobile menu on link click
    mobLinks.forEach(a => {
        a.addEventListener('click', () => { mobMenu.style.display = 'none'; });
    });

    // Shrink header on scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.06)';
            container.style.padding = '0.75rem 2rem';
        } else {
            header.style.boxShadow = '0 1px 8px rgba(0,0,0,0.04)';
            container.style.padding = '1.25rem 2rem';
        }
    });

    // Scroll Spy functionality (Highlight active link)
    const observerOptions = {
        root: null,
        rootMargin: '-20% 0px -70% 0px', // Triggers when section is in the top part of screen
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                
                // Update Desktop Links
                deskLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('data-target') === id) {
                        link.classList.add('active');
                    }
                });
                
                // Update Mobile Links
                mobLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('data-target') === id) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }, observerOptions);

    sections.forEach(sec => observer.observe(sec));
});
</script>
