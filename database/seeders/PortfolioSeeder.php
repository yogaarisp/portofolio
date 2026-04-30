<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Setting;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // ============ EXPERIENCES ============
        Experience::truncate();
        $experiences = [
            [
                'title' => 'Freelancer',
                'company' => 'Independent Consultant',
                'period' => '2023 – Present',
                'description' => 'Providing custom IT infrastructure solutions and independent technical consulting for various clients.',
                'responsibilities' => [
                    'Infrastructure Audit & Optimization',
                    'Custom Web Application Development',
                    'Technical Advisor for IT Startups',
                    'Network Security Implementation',
                ],
                'dot_color' => '#e9c349',
                'badge_type' => 'filled',
                'is_current' => true,
                'is_leadership' => false,
                'sort_order' => 1,
            ],
            [
                'title' => 'IT Staff',
                'company' => 'PNM',
                'period' => '2022',
                'description' => 'Managed daily IT operations, supported corporate infrastructure, and ensured system reliability for internal stakeholders.',
                'responsibilities' => [
                    'End-user technical support for 500+ employees',
                    'Server maintenance and backup procedures',
                    'Hardware procurement and asset management',
                    'Network monitoring and troubleshooting',
                ],
                'dot_color' => '#0d9488',
                'badge_type' => 'outline',
                'is_current' => false,
                'is_leadership' => false,
                'sort_order' => 2,
            ],
            [
                'title' => 'IT Staff',
                'company' => 'All Stay Hotel',
                'period' => '2022',
                'description' => 'Overseeing hospitality IT systems, maintaining network infrastructure, and resolving technical issues to ensure a seamless guest experience.',
                'responsibilities' => [
                    'Managing Hotel PMS (Property Management System)',
                    'Ensuring 99.9% WiFi availability for guests',
                    'IP PBX and VoIP system administration',
                    'NVR/CCTV system monitoring',
                ],
                'dot_color' => '#0d9488',
                'badge_type' => 'outline',
                'is_current' => false,
                'is_leadership' => false,
                'sort_order' => 3,
            ],
            [
                'title' => 'IT Helpdesk Coordinator',
                'company' => 'USG',
                'period' => '2019 – 2022',
                'description' => 'Leading the IT support team, establishing structured helpdesk protocols, and managing the technical issue resolution workflow company-wide.',
                'responsibilities' => [
                    'Managing a team of 5 IT support staff',
                    'Implementing a ticketing system (30% SLA improvement)',
                    'Standardizing IT onboarding processes',
                    'Coordinating with external vendors for project implementation',
                ],
                'dot_color' => '#7f1d1d',
                'badge_type' => 'outline',
                'is_current' => false,
                'is_leadership' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'IT Support',
                'company' => 'Busana Apparel Group',
                'period' => '2018 – 2019',
                'description' => 'Initial role handling frontline technical support, hardware troubleshooting, and basic network setup for manufacturing facilities.',
                'responsibilities' => [
                    'Daily hardware maintenance and repair',
                    'Windows OS installation and configuration',
                    'LAN/WAN cable termination and testing',
                    'Printer and peripheral troubleshooting',
                ],
                'dot_color' => '#0d9488',
                'badge_type' => 'outline',
                'is_current' => false,
                'is_leadership' => false,
                'sort_order' => 5,
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::create($exp);
        }

        // ============ SKILLS ============
        Skill::truncate();
        $skillCategories = [
            [
                'category' => 'IT Support & Hardware',
                'color' => '#0d9488',
                'icon_path' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                'items' => [
                    'Preventive & Corrective Maintenance',
                    'Hardware Troubleshooting & Repair',
                    'System Performance Tuning',
                    'Data Recovery & Backup',
                    'OS & Software Deployment',
                ],
            ],
            [
                'category' => 'Software Development',
                'color' => '#6366f1',
                'icon_path' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'items' => [
                    'Laravel MVC & RESTful API',
                    'Tailwind CSS & Modern UI',
                    'Livewire & Alpine.js',
                    'Database Architecture',
                    'CI/CD Pipeline & Automation',
                ],
            ],
            [
                'category' => 'Infrastructure & Networking',
                'color' => '#0ea5e9',
                'icon_path' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                'items' => [
                    'Mikrotik Routing & Firewall',
                    'Advanced Bandwidth Management',
                    'CCTV Systems & Remote Monitoring',
                    'Windows Server & AD',
                    'Virtualization (Hyper-V)',
                ],
            ],
        ];

        $sortOrder = 1;
        foreach ($skillCategories as $cat) {
            foreach ($cat['items'] as $item) {
                Skill::create([
                    'category' => $cat['category'],
                    'name' => $item,
                    'color' => $cat['color'],
                    'icon_path' => $cat['icon_path'],
                    'sort_order' => $sortOrder++,
                ]);
            }
        }

        // ============ PROJECTS ============
        Project::truncate();
        $projects = [
            [
                'name' => 'Enterprise Asset Management',
                'description' => 'Comprehensive system for tracking and managing IT hardware assets, licenses, and lifecycles across departments. Features real-time dashboards and automated reporting.',
                'tags' => ['Laravel', 'Livewire', 'MySQL'],
                'gradient' => 'linear-gradient(135deg,#0d9488,#2dd4bf)',
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'name' => 'Campus Network Overhaul',
                'description' => 'Full-scale redesign of multi-building network infrastructure. Implemented advanced firewall rules, load balancing, VLAN segmentation, and Active Directory.',
                'tags' => ['Mikrotik', 'Windows Server', 'VLAN'],
                'gradient' => 'linear-gradient(135deg,#0ea5e9,#38bdf8)',
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'name' => 'Remote CCTV Monitoring',
                'description' => 'Deployment of a 64-channel IP CCTV system with centralized NVR management and secure remote access via VPN for 24/7 high-definition facility surveillance.',
                'tags' => ['IP Camera', 'NVR', 'VPN'],
                'gradient' => 'linear-gradient(135deg,#6366f1,#818cf8)',
                'status' => 'published',
                'sort_order' => 3,
            ],
            [
                'name' => 'IT Helpdesk Portal',
                'description' => 'Custom internal ticketing system with SLA tracking, departmental routing, and real-time notifications, significantly improving technical support efficiency.',
                'tags' => ['Laravel', 'Tailwind', 'REST API'],
                'gradient' => 'linear-gradient(135deg,#0f766e,#14b8a6)',
                'status' => 'published',
                'sort_order' => 4,
            ],
        ];

        foreach ($projects as $proj) {
            Project::create($proj);
        }

        // ============ SETTINGS ============
        Setting::truncate();
        $settings = [
            'site_name' => 'Yoga Aris Purwanto',
            'site_role' => 'IT Specialist',
            'site_subrole' => '(Infrastructure, Networking, & Software Development)',
            'site_description' => 'Bridging Infrastructure and Innovation. With extensive experience spanning hardware management, network architecture, and modern software engineering, I build robust and scalable technical foundations to drive business success.',
            'contact_email' => 'yoga@example.com',
            'linkedin_url' => 'https://linkedin.com',
            'years_experience' => '8+',
            'projects_count' => '50+',
            'client_satisfaction' => '100%',
        ];

        foreach ($settings as $key => $value) {
            Setting::create(['key' => $key, 'value' => $value]);
        }
    }
}
