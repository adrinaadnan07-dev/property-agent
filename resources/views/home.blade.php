@extends('layouts.app')

@section('title', 'Utama')
@section('description', 'Pakar rumah mampu milik dan landed property. Dapatkan konsultasi percuma sekarang!')

@section('content')
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <h1>Bantu Anda Memiliki <span class="highlight">Rumah Idaman</span></h1>
            <p>Pakar dalam Skim Rumah Selangorku, Rumah Mampu Milik & Landed Property. Konsultasi percuma untuk pembeli rumah pertama.</p>
            <div class="hero-actions">
                <a href="{{ route('projects.new') }}" class="btn btn-primary">
                    <i class="fas fa-building"></i> Projek Baru
                </a>
                <a href="{{ route('projects.landed') }}" class="btn btn-secondary">
                    <i class="fas fa-house"></i> Rumah Landed
                </a>
                <a href="https://wa.me/{{ $agentPhone }}" class="btn btn-whatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i> Consult Percuma
                </a>
            </div>
        </div>
    </div>
</section>

<section class="features-section">
    <div class="container">
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-calculator"></i>
                <h3>Semak Kelayakan</h3>
                <p>Kira gaji dan semak kelulusan loan secara percuma.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>100% Loan Mudah</h3>
                <p>Bantu uruskan permohonan loan sehingga lulus.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-file-contract"></i>
                <h3>Urusan SPA Percuma</h3>
                <p>Kami uruskan yuran guaman SPA untuk anda.</p>
            </div>
            <div class="feature-card">
                <i class="fab fa-whatsapp"></i>
                <h3>Response Pantas</h3>
                <p>Hubungi kami di WhatsApp untuk response segera.</p>
            </div>
        </div>
    </div>
</section>

@if($featuredProjects->count() > 0)
<section class="featured-section">
    <div class="container">
        <div class="section-header">
            <h2>Featured Projects</h2>
            <p>Projek pilihan terkini untuk anda</p>
        </div>
        <div class="projects-grid">
            @foreach($featuredProjects as $project)
            <div class="project-card">
                <div class="project-image">
                    @if($project->image)
                    <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}">
                    @else
                    <div class="project-image-placeholder">
                        <i class="fas fa-building"></i>
                    </div>
                    @endif
                    <span class="project-type {{ $project->type === 'new_project' ? 'badge-new' : 'badge-landed' }}">
                        {{ $project->type === 'new_project' ? 'Projek Baru' : 'Landed' }}
                    </span>
                </div>
                <div class="project-info">
                    <h3>{{ $project->title }}</h3>
                    <p class="project-location"><i class="fas fa-map-marker-alt"></i> {{ $project->location }}</p>
                    <p class="project-price">{{ $project->formatted_price }}</p>
                    <div class="project-specs">
                        @if($project->size_sqft)
                        <span><i class="fas fa-vector-square"></i> {{ $project->size_sqft }} sf</span>
                        @endif
                        @if($project->bedrooms)
                        <span><i class="fas fa-bed"></i> {{ $project->bedrooms }} Bilik</span>
                        @endif
                        @if($project->bathrooms)
                        <span><i class="fas fa-bath"></i> {{ $project->bathrooms }} Bilik Air</span>
                        @endif
                    </div>
                    <div class="project-actions">
                        <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-outline">Detail</a>
                        <a href="https://wa.me/{{ $agentPhone }}?text=Saya%20berminat%20dengan%20{{ urlencode($project->title) }}" class="btn btn-small-wa" target="_blank">
                            <i class="fab fa-whatsapp"></i> Tanya
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="calculator-section" id="calculator">
    <div class="container">
        <div class="section-header">
            <h2>Semak Kelayakan Loan Anda</h2>
            <p>Masukkan gaji bulanan dan harga rumah untuk semak kelulusan</p>
        </div>
        @include('components.salary-calculator', ['inline' => true])
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-box">
            <h2>Sedia Untuk Memiliki Rumah?</h2>
            <p>Hubungi kami sekarang untuk konsultasi percuma. Kami bantu anda dari mula hingga dapat kunci rumah!</p>
            <a href="https://wa.me/{{ $agentPhone }}" class="btn btn-whatsapp btn-lg" target="_blank">
                <i class="fab fa-whatsapp"></i> WhatsApp Sekarang
            </a>
        </div>
    </div>
</section>
@endsection
