@extends('layouts.app')

@section('title', 'Urus Projek')

@section('content')
<section class="admin-section">
    <div class="container">
        <div class="admin-header">
            <h1>Urus Projek</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Projek
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Tajuk</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Lokasi</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td><span class="status-badge {{ $project->type === 'new_project' ? 'status-new_project' : 'status-landed' }}">{{ $project->type === 'new_project' ? 'Projek Baru' : 'Landed' }}</span></td>
                        <td>{{ $project->formatted_price }}</td>
                        <td>{{ $project->location }}</td>
                        <td>{!! $project->is_featured ? '<i class="fas fa-star" style="color: #f59e0b;"></i>' : '-' !!}</td>
                        <td>{!! $project->is_active ? '<span class="status-badge status-active">Active</span>' : '<span class="status-badge status-inactive">Inactive</span>' !!}</td>
                        <td class="actions">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this project?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7">Tiada projek lagi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $projects->links() }}
    </div>
</section>
@endsection
