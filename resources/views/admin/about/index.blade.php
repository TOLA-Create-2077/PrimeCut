@include('admin.layout.sidebar')

<main class="main dashboard-main">
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-circle-info"></i>
            </div>
            <div>
                <h2>About Section Management</h2>
                <span>Customize your homepage "About Prime Cuts" storytelling block</span>
            </div>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Validation Error Feedback --}}
    @if ($errors->any())
        <div style="background: #fee2e2; color: #991b1b; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem;">
            <strong>Please fix the following errors:</strong>
            <ul style="margin: 8px 0 0 20px; padding: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="dashboard-section" style="background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Eyebrow Title (Uppercase)</label>
                    <input type="text" name="eyebrow" value="{{ old('eyebrow', $about->eyebrow ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Highlight Italic Text</label>
                    <input type="text" name="highlight_title" value="{{ old('highlight_title', $about->highlight_title ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Main Heading</label>
                <input type="text" name="title" value="{{ old('title', $about->title ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">First Paragraph Description</label>
                <textarea name="description_one" rows="3" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">{{ old('description_one', $about->description_one ?? '') }}</textarea>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Second Paragraph Description</label>
                <textarea name="description_two" rows="3" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">{{ old('description_two', $about->description_two ?? '') }}</textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Floating Badge Year (e.g. Since 2018)</label>
                    <input type="text" name="badge_year" value="{{ old('badge_year', $about->badge_year ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Floating Badge Subtitle</label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $about->badge_text ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
                <!-- Left Image (Cloudinary URL instead of asset('storage/...')) -->
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Left Image (Steak)</label>
                    @if(!empty($about->image_one))
                        <div style="margin-bottom: 8px;">
                            <img src="{{ $about->image_one }}" alt="Left Image" style="height: 60px; border-radius: 4px; object-fit: cover; border: 1px solid #cbd5e1;">
                        </div>
                    @endif
                    <input type="file" name="image_one" accept="image/*" style="width: 100%; font-size: 0.875rem;">
                </div>

                <!-- Right Image (Cloudinary URL instead of asset('storage/...')) -->
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Right Image (Chicken)</label>
                    @if(!empty($about->image_two))
                        <div style="margin-bottom: 8px;">
                            <img src="{{ $about->image_two }}" alt="Right Image" style="height: 60px; border-radius: 4px; object-fit: cover; border: 1px solid #cbd5e1;">
                        </div>
                    @endif
                    <input type="file" name="image_two" accept="image/*" style="width: 100%; font-size: 0.875rem;">
                </div>
            </div>

            <div>
                <button type="submit" style="padding: 12px 24px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 0.95rem;">Save Changes</button>
            </div>
        </form>
    </section>
</main>