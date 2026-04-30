import os
import json

file_path = r'c:\laragon\www\portofolio\resources\views\welcome.blade.php'
with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

replacements = {
    # Navbar
    "'Home'": "__('Home')",
    "'Skills'": "__('Skills')",
    "'Experience'": "__('Experience')",
    "'Portfolio'": "__('Portfolio')",
    "'Contact'": "__('Contact')",
    
    # Hero
    "Terbuka untuk peluang baru": "{{ __('Available for new opportunities') }}",
    "Spesialis IT": "{{ __('IT Specialist') }}",
    "(Infrastruktur, Jaringan, &amp; Pengembangan Perangkat Lunak)": "{{ __('(Infrastructure, Networking, & Software Development)') }}",
    "Menjembatani Infrastruktur dan Inovasi. Dengan pengalaman luas mencakup manajemen perangkat keras, arsitektur jaringan, dan rekayasa perangkat lunak modern, saya membangun fondasi teknis yang kuat dan skalabel untuk mendorong kesuksesan bisnis.": "{{ __('Bridging Infrastructure and Innovation. With extensive experience spanning hardware management, network architecture, and modern software engineering, I build robust and scalable technical foundations to drive business success.') }}",
    "Lihat Proyek": "{{ __('View Projects') }}",
    "Unduh CV": "{{ __('Download CV') }}",
    "Tahun Pengalaman": "{{ __('Years Experience') }}",
    "Proyek Selesai": "{{ __('Projects Delivered') }}",
    "Kepuasan Klien": "{{ __('Client Satisfaction') }}",

    # Skills
    "Kompetensi Inti": "{{ __('Core Competencies') }}",
    "Keahlian teknis dan domain utama yang saya kuasai.": "{{ __('Key technical expertise and primary domains I master.') }}",
    "Infrastruktur &amp; Jaringan": "{{ __('Infrastructure & Networking') }}",
    "Pengembangan Perangkat Lunak": "{{ __('Software Development') }}",
    "Dukungan &amp; Keamanan IT": "{{ __('IT Support & Security') }}",
    "Manajemen &amp; Basis Data": "{{ __('Management & Database') }}",
    
    # Experience
    "Perjalanan Karier": "{{ __('Career Journey') }}",
    "Garis waktu pengalaman profesional saya di bidang infrastruktur IT, dukungan teknis, dan pengembangan sistem.": "{{ __('A timeline of my professional experience in IT infrastructure, technical support, and system development.') }}",
    "'Pekerja Lepas'": "__('Freelancer')",
    "'Konsultan Independen'": "__('Independent Consultant')",
    "'2023 – Sekarang'": "__('2023 – Present')",
    "2023 – Sekarang": "{{ __('2023 – Present') }}",
    "'Menyediakan solusi infrastruktur IT khusus dan konsultasi teknis independen untuk berbagai klien.'": "__('Providing custom IT infrastructure solutions and independent technical consulting for various clients.')",
    "Menyediakan solusi infrastruktur IT khusus dan konsultasi teknis independen untuk berbagai klien.": "{{ __('Providing custom IT infrastructure solutions and independent technical consulting for various clients.') }}",
    "'Audit & Optimasi Infrastruktur'": "__('Infrastructure Audit & Optimization')",
    "'Pengembangan Aplikasi Web Khusus'": "__('Custom Web Application Development')",
    "'Penasihat Teknis untuk Startup IT'": "__('Technical Advisor for IT Startups')",
    "'Implementasi Keamanan Jaringan'": "__('Network Security Implementation')",
    "Klik untuk detail": "{{ __('Click for details') }}",
    
    "'Staf IT'": "__('IT Staff')",
    "'Mengelola operasi IT harian, mendukung infrastruktur perusahaan, dan memastikan keandalan sistem untuk pemangku kepentingan internal.'": "__('Managed daily IT operations, supported corporate infrastructure, and ensured system reliability for internal stakeholders.')",
    "Mengelola operasi IT harian, mendukung infrastruktur perusahaan, dan memastikan keandalan sistem untuk pemangku kepentingan internal.": "{{ __('Managed daily IT operations, supported corporate infrastructure, and ensured system reliability for internal stakeholders.') }}",
    "'Dukungan teknis pengguna akhir untuk 500+ karyawan'": "__('End-user technical support for 500+ employees')",
    "'Pemeliharaan server dan prosedur pencadangan'": "__('Server maintenance and backup procedures')",
    "'Pengadaan perangkat keras dan manajemen aset'": "__('Hardware procurement and asset management')",
    "'Pemantauan dan pemecahan masalah jaringan'": "__('Network monitoring and troubleshooting')",

    "'Mengawasi sistem IT perhotelan, pemeliharaan infrastruktur jaringan, dan menyelesaikan masalah teknis untuk memastikan pengalaman tamu yang lancar.'": "__('Overseeing hospitality IT systems, maintaining network infrastructure, and resolving technical issues to ensure a seamless guest experience.')",
    "Mengawasi sistem IT perhotelan, pemeliharaan infrastruktur jaringan, dan menyelesaikan masalah teknis untuk memastikan pengalaman tamu yang lancar.": "{{ __('Overseeing hospitality IT systems, maintaining network infrastructure, and resolving technical issues to ensure a seamless guest experience.') }}",
    "'Mengelola PMS (Sistem Manajemen Properti) Hotel'": "__('Managing Hotel PMS (Property Management System)')",
    "'Memastikan ketersediaan WiFi 99,9% untuk tamu'": "__('Ensuring 99.9% WiFi availability for guests')",
    "'Administrasi sistem IP PBX dan VoIP'": "__('IP PBX and VoIP system administration')",
    "'Pemantauan sistem NVR/CCTV'": "__('NVR/CCTV system monitoring')",
    
    "'Koordinator Helpdesk IT'": "__('IT Helpdesk Coordinator')",
    "Kepemimpinan": "{{ __('Leadership') }}",
    "'Memimpin tim dukungan IT, menetapkan protokol helpdesk terstruktur, dan mengelola alur kerja penyelesaian masalah teknis di seluruh perusahaan.'": "__('Leading the IT support team, establishing structured helpdesk protocols, and managing the technical issue resolution workflow company-wide.')",
    "Memimpin tim dukungan IT, menetapkan protokol helpdesk terstruktur, dan mengelola alur kerja penyelesaian masalah teknis di seluruh perusahaan.": "{{ __('Leading the IT support team, establishing structured helpdesk protocols, and managing the technical issue resolution workflow company-wide.') }}",
    "'Mengelola tim berisi 5 staf dukungan IT'": "__('Managing a team of 5 IT support staff')",
    "'Mengimplementasikan sistem tiket (SLA meningkat 30%)'": "__('Implementing a ticketing system (30% SLA improvement)')",
    "'Menstandarkan proses orientasi IT'": "__('Standardizing IT onboarding processes')",
    "'Berkoordinasi dengan vendor eksternal untuk implementasi proyek'": "__('Coordinating with external vendors for project implementation')",

    "'Dukungan IT'": "__('IT Support')",
    "'Peran awal menangani dukungan teknis lini depan, pemecahan masalah perangkat keras, dan pengaturan jaringan dasar untuk fasilitas manufaktur.'": "__('Initial role handling frontline technical support, hardware troubleshooting, and basic network setup for manufacturing facilities.')",
    "Peran awal menangani dukungan teknis lini depan, pemecahan masalah perangkat keras, dan pengaturan jaringan dasar untuk fasilitas manufaktur.": "{{ __('Initial role handling frontline technical support, hardware troubleshooting, and basic network setup for manufacturing facilities.') }}",
    "'Pemeliharaan dan perbaikan perangkat keras harian'": "__('Daily hardware maintenance and repair')",
    "'Instalasi dan konfigurasi OS Windows'": "__('Windows OS installation and configuration')",
    "'Terminasi dan pengujian kabel LAN/WAN'": "__('LAN/WAN cable termination and testing')",
    "'Pemecahan masalah printer dan periferal'": "__('Printer and peripheral troubleshooting')",

    "Tanggung Jawab Utama": "{{ __('Key Responsibilities') }}",
    
    # Portfolio
    "Studi Kasus &amp; Proyek": "{{ __('Case Studies & Projects') }}",
    "Karya pilihan yang menunjukkan keahlian saya dalam memecahkan masalah dunia nyata.": "{{ __('Selected works showcasing my expertise in solving real-world problems.') }}",
    "Desain Jaringan Perusahaan": "{{ __('Corporate Network Design') }}",
    "Membangun infrastruktur jaringan berkinerja tinggi untuk kantor pusat, memastikan konektivitas dengan ketersediaan tinggi dan segmentasi yang aman.": "{{ __('Building high-performance network infrastructure for headquarters, ensuring high-availability connectivity and secure segmentation.') }}",
    "Lihat Detail": "{{ __('View Details') }}",
    "Penerapan Server Linux": "{{ __('Linux Server Deployment') }}",
    "Memigrasikan layanan lama ke kontainer Docker, mengoptimalkan pemanfaatan sumber daya, dan membangun jalur CI/CD dasar.": "{{ __('Migrating legacy services to Docker containers, optimizing resource utilization, and establishing basic CI/CD pipelines.') }}",
    "Aplikasi Web Internal": "{{ __('Internal Web Application') }}",
    "Mengembangkan portal karyawan kustom menggunakan Laravel dan Vue.js untuk mengotomatiskan tugas SDM dan permintaan dukungan IT.": "{{ __('Developing a custom employee portal using Laravel and Vue.js to automate HR tasks and IT support requests.') }}",

    # Contact
    "Mari Terhubung": "{{ __('Let\\'s Connect') }}",
    "Punya pertanyaan atau proyek yang ingin didiskusikan? Saya selalu terbuka untuk mengeksplorasi peluang baru.": "{{ __('Have a question or a project to discuss? I am always open to exploring new opportunities.') }}",
    "Kirim Email": "{{ __('Send Email') }}",
    "Tautan Cepat": "{{ __('Quick Links') }}",
    "Beranda": "{{ __('Home') }}",
    "Keahlian": "{{ __('Skills') }}",
    "Pengalaman": "{{ __('Experience') }}",
    "Portofolio": "{{ __('Portfolio') }}",
    "Kontak": "{{ __('Contact') }}",
    "Sosial": "{{ __('Social') }}",
    "Hak Cipta Dilindungi Undang-Undang.": "{{ __('All Rights Reserved.') }}"
}

for indo, eng in replacements.items():
    content = content.replace(indo, eng)

with open(file_path, 'w', encoding='utf-8') as f:
    f.write(content)

print("Translation completed successfully!")
