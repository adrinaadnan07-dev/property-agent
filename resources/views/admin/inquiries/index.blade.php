@extends('layouts.app')

@section('title', 'Senarai Inquiry')

@section('content')
<section class="admin-section">
    <div class="container">
        <h1>Senarai Inquiry</h1>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Telefon</th>
                        <th>Projek</th>
                        <th>Gaji</th>
                        <th>Budget</th>
                        <th>Lokasi</th>
                        <th>Jenis</th>
                        <th>Status Inquiry</th>
                        <th>Tarikh</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $inquiry)
                    <tr>
                        <td>{{ $inquiry->name }}</td>
                        <td><a href="https://wa.me/{{ $inquiry->phone }}">{{ $inquiry->phone }}</a></td>
                        <td>{{ $inquiry->project?->title ?? 'N/A' }}</td>
                        <td>{{ $inquiry->monthly_salary ? 'RM'.number_format($inquiry->monthly_salary) : '-' }}</td>
                        <td>{{ $inquiry->budget ? 'RM'.number_format($inquiry->budget) : '-' }}</td>
                        <td>{{ $inquiry->location ?? '-' }}</td>
                        <td>{{ $inquiry->inquiry_type ?? '-' }}</td>
                        <td><span class="status-badge status-{{ $inquiry->status }}">{{ $inquiry->status }}</span></td>
                        <td>{{ $inquiry->created_at->format('d/m/Y') }}</td>
                        <td class="actions">
                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-sm"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="10">Tiada inquiry lagi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $inquiries->links() }}
    </div>
</section>
@endsection
