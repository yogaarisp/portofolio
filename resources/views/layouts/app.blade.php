<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings['site_name'] ?? 'Yoga Aris Purwanto' }} | {{ __($settings['site_role'] ?? 'IT Specialist') }}</title>
    <meta name="description" content="{{ __($settings['site_description'] ?? 'Portfolio of Yoga Aris Purwanto – IT Specialist bridging Infrastructure and Innovation.') }}">
    
    @if(!empty($settings['favicon_path']))
        <link rel="icon" type="image/png" href="{{ Storage::url($settings['favicon_path']) }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    @yield('content')
    @livewireScripts
</body>
</html>
