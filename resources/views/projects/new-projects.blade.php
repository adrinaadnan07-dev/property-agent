@extends('layouts.app')

@section('title', 'Projek Baru')
@section('description', 'Senarai projek rumah baru mampu milik. Daftar sekarang!')

@section('content')
<section class="page-banner">
    <div class="container">
        <h1>Projek Baru</h1>
        <p>Senarai projek rumah baru yang sedang dan akan dilancarkan</p>
    </div>
</section>

<section class="projects-list-section">
    <div class="container">
        @if($projects->count() > 0)
        <div class="projects-grid">
            @foreach($projects as $project)
            <div class="project-card">
                <div class="project-image">
                    @if($project->image)
                    <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}">
                    @else
                    <div class="project-image-placeholder">
                        <i class="fas fa-building"></i>
                    </div>
                    @endif
                    <span class="project-type badge-new">Projek Baru</span>
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
        <div class="pagination-wrapper">
            {{ $projects->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-building"></i>
            <h3>Tiada Projek Buat Masa Sekarang</h3>
            <p>Hubungi kami untuk maklumat terkini</p>
            <a href="https://wa.me/{{ $agentPhone }}" class="btn btn-whatsapp" target="_blank">
                <i class="fab fa-whatsapp"></i> Tanya di WhatsApp
            </a>
        </div>
        @endif
    </div>
</section>

<section class="calculator-section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-header">
            <h2>Semak Kelayakan Loan</h2>
            <p>Masukkan gaji bulanan dan harga rumah untuk semak kelulusan</p>
        </div>
        @include('components.salary-calculator', ['inline' => true])
    </div>
</section>
@endsection
