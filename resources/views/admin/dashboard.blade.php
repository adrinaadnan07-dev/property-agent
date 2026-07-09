@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<section class="admin-section">
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="admin-stats">
            <div class="stat-card">
                <i class="fas fa-building"></i>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalProjects }}</span>
                    <span class="stat-label">Jumlah Projek</span>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-check-circle"></i>
                <div class="stat-info">
                    <span class="stat-number">{{ $activeProjects }}</span>
                    <span class="stat-label">Aktif</span>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-envelope"></i>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalInquiries }}</span>
                    <span class="stat-label">Jumlah Inquiry</span>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-bell"></i>
                <div class="stat-info">
                    <span class="stat-number">{{ $newInquiries }}</span>
                    <span class="stat-label">Baru</span>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-thumbs-up"></i>
                <div class="stat-info">
                    <span class="stat-number">{{ $approvedInquiries }}</span>
                    <span class="stat-label">Layak</span>
                </div>
            </div>
        </div>

        <div class="admin-actions">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Urus Projek</a>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Tambah Projek</a>
            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-primary">Lihat Inquiry</a>
        </div>

        <div class="recent-inquiries">
            <h2>Inquiry Terkini</h2>
            @if($recentInquiries->count() > 0)
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Telefon</th>
                        <th>Projek</th>
                        <th>Status</th>
                        <th>Tarikh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentInquiries as $inquiry)
                    <tr>
                        <td>{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->phone }}</td>
                        <td>{{ $inquiry->project?->title ?? 'N/A' }}</td>
                        <td><span class="status-badge status-{{ $inquiry->status }}">{{ $inquiry->status }}</span></td>
                        <td>{{ $inquiry->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Tiada inquiry lagi.</p>
            @endif
        </div>
    </div>
</section>
@endsection
