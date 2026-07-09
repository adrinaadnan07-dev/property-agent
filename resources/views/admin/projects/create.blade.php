@extends('layouts.app')

@section('title', 'Tambah Projek')

@section('content')
<section class="admin-section">
    <div class="container">
        <h1>Tambah Projek Baru</h1>
        <form action="{{ route('admin.projects.store') }}" method="POST" class="admin-form">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="title">Tajuk Projek</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="type">Jenis</label>
                    <select id="type" name="type" class="form-control" required>
                        <option value="new_project">Projek Baru</option>
                        <option value="landed">Rumah Landed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Harga (RM)</label>
                    <input type="number" id="price" name="price" class="form-control" required min="0">
                </div>
                <div class="form-group">
                    <label for="location">Lokasi</label>
                    <input type="text" id="location" name="location" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="developer">Pemaju</label>
                    <input type="text" id="developer" name="developer" class="form-control">
                </div>
                <div class="form-group">
                    <label for="size_sqft">Keluasan (sf)</label>
                    <input type="text" id="size_sqft" name="size_sqft" class="form-control">
                </div>
                <div class="form-group">
                    <label for="bedrooms">Bilik Tidur</label>
                    <input type="number" id="bedrooms" name="bedrooms" class="form-control" min="0">
                </div>
                <div class="form-group">
                    <label for="bathrooms">Bilik Air</label>
                    <input type="number" id="bathrooms" name="bathrooms" class="form-control" min="0">
                </div>
                <div class="form-group">
                    <label for="tenure">Tenure</label>
                    <input type="text" id="tenure" name="tenure" class="form-control" placeholder="Freehold / Leasehold">
                </div>
            </div>

            <div class="form-group">
                <label for="image">Gambar (letak di public/images/ , masukkan nama file)</label>
                <input type="text" id="image" name="image" class="form-control" placeholder="setia-alam.jpg">
            </div>

            <div class="form-group">
                <label for="description">Penerangan</label>
                <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label>Ciri-ciri (satu setiap baris)</label>
                <textarea name="features[]" class="form-control" rows="3" placeholder="Parking berbumbung&#10;Perabot percuma&#10;Guard & gated"></textarea>
            </div>

            <div class="form-group">
                <label for="whatsapp_group_link">WhatsApp Group Link</label>
                <input type="url" id="whatsapp_group_link" name="whatsapp_group_link" class="form-control">
            </div>
            <div class="form-group">
                <label for="telegram_channel">Telegram Channel</label>
                <input type="url" id="telegram_channel" name="telegram_channel" class="form-control">
            </div>
            <div class="form-group">
                <label for="registration_link">Registration Link (Google Form)</label>
                <input type="url" id="registration_link" name="registration_link" class="form-control">
            </div>

            <div class="form-checkboxes">
                <label><input type="checkbox" name="is_featured"> Featured Project</label>
                <label><input type="checkbox" name="is_active" checked> Active</label>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Projek</button>
        </form>
    </div>
</section>
@endsection
