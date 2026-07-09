@extends('layouts.app')

@section('title', $project->title)
@section('description', Str::limit($project->description, 160))

@section('content')
<section class="project-detail-section">
    <div class="container">
        <div class="project-detail-header">
            <a href="{{ $project->type === 'new_project' ? route('projects.new') : route('projects.landed') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="project-detail-grid">
            <div class="project-detail-main">
                <div class="project-detail-image">
                    @if($project->image)
                    <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}">
                    @else
                    <div class="project-image-placeholder" style="height: 400px;">
                        <i class="fas fa-building" style="font-size: 80px;"></i>
                    </div>
                    @endif
                </div>

                <div class="project-detail-info">
                    <h1>{{ $project->title }}</h1>
                    <p class="project-location"><i class="fas fa-map-marker-alt"></i> {{ $project->location }}</p>

                    <div class="detail-specs">
                        <div class="spec-item">
                            <span class="spec-label">Harga</span>
                            <span class="spec-value">{{ $project->price_range }}</span>
                        </div>
                        @if($project->size_sqft)
                        <div class="spec-item">
                            <span class="spec-label">Keluasan</span>
                            <span class="spec-value">{{ $project->size_sqft }} sf</span>
                        </div>
                        @endif
                        @if($project->bedrooms)
                        <div class="spec-item">
                            <span class="spec-label">Bilik Tidur</span>
                            <span class="spec-value">{{ $project->bedrooms }}</span>
                        </div>
                        @endif
                        @if($project->bathrooms)
                        <div class="spec-item">
                            <span class="spec-label">Bilik Air</span>
                            <span class="spec-value">{{ $project->bathrooms }}</span>
                        </div>
                        @endif
                        @if($project->tenure)
                        <div class="spec-item">
                            <span class="spec-label">Status</span>
                            <span class="spec-value">{{ $project->tenure }}</span>
                        </div>
                        @endif
                        @if($project->developer)
                        <div class="spec-item">
                            <span class="spec-label">Pemaju</span>
                            <span class="spec-value">{{ $project->developer }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="project-description">
                        <h3>Penerangan</h3>
                        <p>{{ $project->description }}</p>
                    </div>

                    @if($project->features)
                    <div class="project-features">
                        <h3>Ciri-ciri</h3>
                        <ul>
                            @foreach($project->features as $feature)
                            <li><i class="fas fa-check-circle"></i> {{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            <div class="project-detail-sidebar">
                <div class="sidebar-card">
                    <h3>Semak Kelayakan</h3>
                    <p>Kira sama ada gaji anda layak untuk mohon loan rumah ini</p>
                    @include('components.salary-calculator', ['inline' => false, 'presetPrice' => $project->price])
                </div>

                <div class="sidebar-card">
                    <h3>Hubungi Agent</h3>
                    <div class="agent-info">
                        <div class="agent-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="agent-details">
                            <h4>{{ $agentName }}</h4>
                            <p>{{ $agentCompany }}</p>
                        </div>
                    </div>
                    <a href="https://wa.me/{{ $agentPhone }}?text=Saya%20berminat%20dengan%20{{ urlencode($project->title) }}%20di%20{{ urlencode($project->location) }}" class="btn btn-whatsapp btn-block" target="_blank">
                        <i class="fab fa-whatsapp"></i> Tanya di WhatsApp
                    </a>
                    @if($project->registration_link)
                    <a href="{{ $project->registration_link }}" class="btn btn-primary btn-block" target="_blank">
                        <i class="fas fa-edit"></i> Daftar Sekarang
                    </a>
                    @endif
                </div>

                <div class="sidebar-card">
                    <h3>Kongsi</h3>
                    <div class="share-buttons">
                        <a href="https://wa.me/?text={{ urlencode($project->title . ' - ' . $project->price_range . ' ' . route('projects.show', $project->slug)) }}" target="_blank" class="share-btn share-wa">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('projects.show', $project->slug)) }}" target="_blank" class="share-btn share-fb">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://t.me/share/url?url={{ urlencode(route('projects.show', $project->slug)) }}&text={{ urlencode($project->title) }}" target="_blank" class="share-btn share-tg">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($relatedProjects->count() > 0)
<section class="related-section">
    <div class="container">
        <div class="section-header">
            <h2>Projek Lain</h2>
        </div>
        <div class="projects-grid">
            @foreach($relatedProjects as $related)
            <div class="project-card">
                <div class="project-image">
                    @if($related->image)
                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}">
                    @else
                    <div class="project-image-placeholder">
                        <i class="fas fa-building"></i>
                    </div>
                    @endif
                </div>
                <div class="project-info">
                    <h3>{{ $related->title }}</h3>
                    <p class="project-location"><i class="fas fa-map-marker-alt"></i> {{ $related->location }}</p>
                    <p class="project-price">{{ $related->formatted_price }}</p>
                    <a href="{{ route('projects.show', $related->slug) }}" class="btn btn-outline btn-block">Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const priceInput = document.querySelector('.calculator-form input[name="price"]');
    if (priceInput && !priceInput.value) {
        priceInput.value = '{{ $project->price }}';
    }
});
</script>
@endpush
