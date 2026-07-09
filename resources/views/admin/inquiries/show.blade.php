@extends('layouts.app')

@section('title', 'Detail Inquiry')

@section('content')
<section class="admin-section">
    <div class="container">
        <div class="admin-header">
            <h1>Detail Inquiry</h1>
            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="inquiry-detail-card">
            <div class="inquiry-detail-grid">
                <div class="detail-field">
                    <label>Nama</label>
                    <p>{{ $inquiry->name }}</p>
                </div>
                <div class="detail-field">
                    <label>Telefon / WhatsApp</label>
                    <p><a href="https://wa.me/{{ $inquiry->phone }}" target="_blank">{{ $inquiry->phone }} <i class="fas fa-external-link-alt"></i></a></p>
                </div>
                <div class="detail-field">
                    <label>Email</label>
                    <p>{{ $inquiry->email ?? '-' }}</p>
                </div>
                <div class="detail-field">
                    <label>Projek</label>
                    <p>{{ $inquiry->project?->title ?? 'N/A' }}</p>
                </div>
                <div class="detail-field">
                    <label>Gaji Bulanan</label>
                    <p>{{ $inquiry->monthly_salary ? 'RM'.number_format($inquiry->monthly_salary) : '-' }}</p>
                </div>
                <div class="detail-field">
                    <label>Budget Rumah</label>
                    <p>{{ $inquiry->budget ? 'RM'.number_format($inquiry->budget) : '-' }}</p>
                </div>
                <div class="detail-field">
                    <label>Lokasi Pilihan</label>
                    <p>{{ $inquiry->location ?? '-' }}</p>
                </div>
                <div class="detail-field">
                    <label>Jenis Inquiry</label>
                    <p>{{ $inquiry->inquiry_type ?? '-' }}</p>
                </div>
                <div class="detail-field">
                    <label>Status Loan</label>
                    <p><span class="status-badge status-{{ $inquiry->approval_status ?? 'unknown' }}">{{ $inquiry->approval_status ?? 'N/A' }}</span></p>
                </div>
                <div class="detail-field">
                    <label>Status Inquiry</label>
                    <p><span class="status-badge status-{{ $inquiry->status }}">{{ $inquiry->status }}</span></p>
                </div>
                <div class="detail-field">
                    <label>Tarikh Daftar</label>
                    <p>{{ $inquiry->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="detail-field">
                    <label>Mesej</label>
                    <p>{{ $inquiry->message ?? '-' }}</p>
                </div>
                <div class="detail-field">
                    <label>Temujanji</label>
                    <p>{{ $inquiry->appointment_date ? $inquiry->appointment_date->format('d/m/Y H:i') : 'Belum ditetapkan' }}</p>
                </div>
            </div>

            <div class="inquiry-actions">
                <a href="https://wa.me/{{ $inquiry->phone }}?text=Hi%20{{ urlencode($inquiry->name) }}%2C%20saya%20{{ urlencode($agentName) }}%20dari%20{{ urlencode($agentCompany) }}.%20Saya%20ada%20terima%20inquiry%20anda." class="btn btn-whatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp {{ $inquiry->name }}
                </a>
            </div>

            <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST" class="admin-form">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="status">Kemaskini Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="new" {{ $inquiry->status == 'new' ? 'selected' : '' }}>New</option>
                        <option value="contacted" {{ $inquiry->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="appointment_set" {{ $inquiry->status == 'appointment_set' ? 'selected' : '' }}>Appointment Set</option>
                        <option value="closed" {{ $inquiry->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="notes">Nota</label>
                    <textarea id="notes" name="notes" class="form-control" rows="3">{{ $inquiry->notes }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kemaskini</button>
            </form>
        </div>
    </div>
</section>
@endsection
