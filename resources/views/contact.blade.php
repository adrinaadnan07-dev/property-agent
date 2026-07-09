@extends('layouts.app')

@section('title', 'Hubungi Kami')
@section('description', 'Hubungi kami untuk konsultasi percuma')

@section('content')
<section class="page-banner">
    <div class="container">
        <h1>Hubungi Kami</h1>
        <p>Jangan ragu untuk menghubungi kami</p>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info">
                <h2>Maklumat Perhubungan</h2>
                <div class="contact-item">
                    <i class="fab fa-whatsapp"></i>
                    <div>
                        <h3>WhatsApp</h3>
                        <a href="https://wa.me/{{ $agentPhone }}">+{{ $agentPhone }}</a>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Email</h3>
                        <a href="mailto:{{ $agentEmail }}">{{ $agentEmail }}</a>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-user"></i>
                    <div>
                        <h3>Agent</h3>
                        <p>{{ $agentName }} - {{ $agentCompany }}</p>
                    </div>
                </div>
                <div class="contact-social">
                    <a href="https://wa.me/{{ $agentPhone }}" class="btn btn-whatsapp btn-lg" target="_blank">
                        <i class="fab fa-whatsapp"></i> WhatsApp Saya
                    </a>
                </div>
            </div>
            <div class="contact-form-wrapper">
                <h2>Hantar Pertanyaan</h2>
                <form action="{{ route('inquiry.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" required placeholder="Nama penuh anda">
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telefon / WhatsApp</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required placeholder="0123456789">
                    </div>
                    <div class="form-group">
                        <label for="email">Email (optional)</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="email@anda.com">
                    </div>
                    <div class="form-group">
                        <label for="message">Mesej</label>
                        <textarea id="message" name="message" class="form-control" rows="4" placeholder="Saya berminat untuk dapatkan maklumat lanjut..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-paper-plane"></i> Hantar
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
