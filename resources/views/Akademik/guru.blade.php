@extends('layouts.app')

@section('title', 'Guru & Staf')
@section('description', 'Tenaga pendidik dan tenaga kependidikan SDN Dadapsari Kota Semarang.')

@push('styles')
<style>
    .guru-wrap { max-width: 1040px; margin: -3rem auto 4rem; padding: 0 1.25rem; }

    .back-link {
        display: inline-flex; align-items: center; gap: .4rem;
        font-size: .85rem; color: #fff; text-decoration: none;
        margin-bottom: 1.25rem; font-weight: 600;
        text-shadow: 0 1px 6px rgba(0,0,0,.35);
    }
    .back-link:hover { color: rgba(255,255,255,.75); }

    .guru-section-title {
        font-size: 1.1rem; font-weight: 700; color: var(--primary-dark);
        border-bottom: 2px solid var(--accent-soft); padding-bottom: .6rem;
        margin: 0 0 1.25rem;
    }
    .guru-section + .guru-section { margin-top: 2.5rem; }

    .person-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 1.25rem;
    }

    .person-card {
        background: var(--white);
        border: 1px solid #e2e8f0;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 1.5rem 1.25rem;
        text-align: center;
        transition: transform .15s ease, box-shadow .15s ease;
    }
    .person-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-lg); }

    .person-card.is-lead {
        max-width: 320px; margin: 0 auto;
        border-color: var(--accent);
        box-shadow: var(--shadow-lg);
    }

    .person-avatar {
        width: 72px; height: 72px; margin: 0 auto .9rem;
        border-radius: 50%;
        display: grid; place-items: center;
        font-size: 1.5rem; font-weight: 800; color: var(--white);
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    }
    .person-card.is-lead .person-avatar {
        width: 88px; height: 88px; font-size: 1.85rem;
    }

    .person-name { font-size: 1rem; font-weight: 700; color: var(--primary-dark); margin: 0 0 .25rem; }
    .person-role { font-size: .85rem; color: var(--accent); font-weight: 600; margin: 0 0 .4rem; }
    .person-nip  { font-size: .75rem; color: var(--muted); margin: 0; letter-spacing: .3px; }
</style>
@endpush

@section('content')

@include('partials.page-header', [
    'eyebrow' => 'Akademik',
    'title' => 'Guru &amp; Staf',
    'subtitle' => 'Tenaga pendidik bersertifikat dan tenaga kependidikan yang berdedikasi mendampingi siswa SDN Dadapsari.',
])

@php
    // Inisial nama untuk avatar (mis. "Budi Santoso" → "BS").
    $inisial = function ($nama) {
        $kata = preg_split('/\s+/', trim(preg_replace('/[^\pL\s]/u', '', $nama)));
        $kata = array_values(array_filter($kata));
        return strtoupper(mb_substr($kata[0] ?? '', 0, 1) . (count($kata) > 1 ? mb_substr(end($kata), 0, 1) : ''));
    };
@endphp

<div class="guru-wrap">
    <a href="{{ route('home') }}#akademik" class="back-link">← Kembali ke Akademik</a>

    {{-- Kepala Sekolah --}}
    <div class="guru-section">
        <h2 class="guru-section-title">Kepala Sekolah</h2>
        <div class="person-card is-lead">
            <div class="person-avatar">{{ $inisial($kepala['nama']) }}</div>
            <p class="person-name">{{ $kepala['nama'] }}</p>
            <p class="person-role">{{ $kepala['jabatan'] }}</p>
            @if (!empty($kepala['nip']))
                <p class="person-nip">NIP. {{ $kepala['nip'] }}</p>
            @endif
        </div>
    </div>

    {{-- Guru --}}
    <div class="guru-section">
        <h2 class="guru-section-title">Tenaga Pendidik</h2>
        <div class="person-grid">
            @foreach ($guru as $g)
                <div class="person-card">
                    <div class="person-avatar">{{ $inisial($g['nama']) }}</div>
                    <p class="person-name">{{ $g['nama'] }}</p>
                    <p class="person-role">{{ $g['jabatan'] }}</p>
                    @if (!empty($g['nip']))
                        <p class="person-nip">NIP. {{ $g['nip'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    {{-- Staf --}}
    <div class="guru-section">
        <h2 class="guru-section-title">Tenaga Kependidikan</h2>
        <div class="person-grid">
            @foreach ($staf as $s)
                <div class="person-card">
                    <div class="person-avatar">{{ $inisial($s['nama']) }}</div>
                    <p class="person-name">{{ $s['nama'] }}</p>
                    <p class="person-role">{{ $s['jabatan'] }}</p>
                    @if (!empty($s['nip']))
                        <p class="person-nip">NIP. {{ $s['nip'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
