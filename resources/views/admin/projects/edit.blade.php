@extends('layouts.app')

@section('title', 'Edit Projek')

@section('content')
<section class="admin-section">
    <div class="container">
        <h1>Edit Projek: {{ $project->title }}</h1>
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="admin-form">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="form-group">
                    <label for="title">Tajuk Projek</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $project->title }}" required>
                </div>
                <div class="form-group">
                    <label for="type">Jenis</label>
                    <select id="type" name="type" class="form-control" required>
                        <option value="new_project" {{ $project->type == 'new_project' ? 'selected' : '' }}>Projek Baru</option>
                        <option value="landed" {{ $project->type == 'landed' ? 'selected' : '' }}>Rumah Landed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Harga (RM)</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ $project->price }}" required>
                </div>
                <div class="form-group">
                    <label for="location">Lokasi</label>
                    <input type="text" id="location" name="location" class="form-control" value="{{ $project->location }}" required>
                </div>
                <div class="form-group">
                    <label for="developer">Pemaju</label>
                    <input type="text" id="developer" name="developer" class="form-control" value="{{ $project->developer }}">
                </div>
                <div class="form-group">
                    <label for="size_sqft">Keluasan (sf)</label>
                    <input type="text" id="size_sqft" name="size_sqft" class="form-control" value="{{ $project->size_sqft }}">
                </div>
                <div class="form-group">
                    <label for="bedrooms">Bilik Tidur</label>
                    <input type="number" id="bedrooms" name="bedrooms" class="form-control" value="{{ $project->bedrooms }}">
                </div>
                <div class="form-group">
                    <label for="bathrooms">Bilik Air</label>
                    <input type="number" id="bathrooms" name="bathrooms" class="form-control" value="{{ $project->bathrooms }}">
                </div>
                <div class="form-group">
                    <label for="tenure">Tenure</label>
                    <input type="text" id="tenure" name="tenure" class="form-control" value="{{ $project->tenure }}">
                </div>
            </div>

            <div class="form-group">
                <label for="image">Gambar (letak di public/images/ , masukkan nama file)</label>
                <input type="text" id="image" name="image" class="form-control" value="{{ $project->image }}" placeholder="setia-alam.jpg">
            </div>

            <div class="form-group">
                <label for="description">Penerangan</label>
                <textarea id="description" name="description" class="form-control" rows="5" required>{{ $project->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="whatsapp_group_link">WhatsApp Group Link</label>
                <input type="url" id="whatsapp_group_link" name="whatsapp_group_link" class="form-control" value="{{ $project->whatsapp_group_link }}">
            </div>
            <div class="form-group">
                <label for="telegram_channel">Telegram Channel</label>
                <input type="url" id="telegram_channel" name="telegram_channel" class="form-control" value="{{ $project->telegram_channel }}">
            </div>
            <div class="form-group">
                <label for="registration_link">Registration Link</label>
                <input type="url" id="registration_link" name="registration_link" class="form-control" value="{{ $project->registration_link }}">
            </div>

            <div class="form-checkboxes">
                <label><input type="checkbox" name="is_featured" {{ $project->is_featured ? 'checked' : '' }}> Featured</label>
                <label><input type="checkbox" name="is_active" {{ $project->is_active ? 'checked' : '' }}> Active</label>
            </div>

            <button type="submit" class="btn btn-primary">Kemas Kini</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</section>
@endsection
