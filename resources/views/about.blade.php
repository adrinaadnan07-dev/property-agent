@extends('layouts.app')

@section('title', 'Tentang Kami')
@section('description', 'Ketahui lebih lanjut tentang perkhidmatan kami')

@section('content')
<section class="page-banner">
    <div class="container">
        <h1>Tentang Kami</h1>
        <p>Kenali kami dan perkhidmatan yang kami tawarkan</p>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>Pakar Dalam Mencari Rumah Idaman Anda</h2>
                <p>Kami adalah ejen hartanah profesional yang pakar dalam membantu pembeli rumah pertama memiliki rumah idaman mereka. Dengan pengalaman luas dalam Skim Rumah Selangorku, Rumah Mampu Milik, dan pelbagai projek landed, kami komited untuk memberikan perkhidmatan yang terbaik.</p>
                <p>Kami percaya setiap orang berhak memiliki rumah sendiri. Itulah sebabnya kami menyediakan konsultasi percuma untuk memastikan anda membuat keputusan yang tepat.</p>
                
                <div class="about-stats">
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Pelanggan Berjaya</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Projek</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Konsultasi Percuma</span>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <img src="{{ asset('images/projects/fariz.png') }}" alt="Fariz - Property Agent" style="width:100%; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.1);">
            </div>
        </div>
    </div>
</section>

<section class="services-section">
    <div class="container">
        <div class="section-header">
            <h2>Perkhidmatan Kami</h2>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <i class="fas fa-search"></i>
                <h3>Pencarian Rumah</h3>
                <p>Kami bantu cari rumah yang sesuai dengan bajet dan keperluan anda.</p>
            </div>
            <div class="service-card">
                <i class="fas fa-calculator"></i>
                <h3>Semak Kelayakan</h3>
                <p>Semak kelayakan loan secara percuma sebelum anda memohon.</p>
            </div>
            <div class="service-card">
                <i class="fas fa-file-signature"></i>
                <h3>Urusan Dokumen</h3>
                <p>Kami uruskan semua dokumen dari mula hingga selesai.</p>
            </div>
            <div class="service-card">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>Bantuan Loan</h3>
                <p>Bantu uruskan permohonan loan dengan bank-bank terpilih.</p>
            </div>
        </div>
    </div>
</section>
@endsection
