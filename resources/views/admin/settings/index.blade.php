{{-- Include the Sidebar --}}
@include('admin.layout.sidebar')

<main class="main dashboard-main">

    <!-- HEADER / FILTER BAR -->
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-gear"></i>
            </div>
            <div>
                <h2>Site & Contact Settings</h2>
                <span>Manage company information, contact details, and dynamic website texts</span>
            </div>
        </div>
    </div>

    <!-- SUCCESS NOTIFICATION -->
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- SETTINGS FORM SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Configuration Settings</h3>
                <p>Values updated here reflect instantly on the public website layout</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-sliders"></i>
            </div>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" style="padding: 20px 0;">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Company Name</label>
                    <input type="text" name="company_name" value="{{ $settings['company_name'] ?? '' }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Contact Email</label>
                    <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Primary Phone</label>
                    <input type="text" name="phone_primary" value="{{ $settings['phone_primary'] ?? '' }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Secondary Phone</label>
                    <input type="text" name="phone_secondary" value="{{ $settings['phone_secondary'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Warehouse / Office Address</label>
                <textarea name="address" rows="3" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; resize: none;">{{ $settings['address'] ?? '' }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Working Hours</label>
                <input type="text" name="working_hours" value="{{ $settings['working_hours'] ?? '' }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Hero Subtitle</label>
                    <input type="text" name="hero_subtitle" value="{{ $settings['hero_subtitle'] ?? '' }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px; pt-4;">
                <button type="submit" style="padding: 12px 24px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; font-size: 0.875rem; cursor: pointer;">
                    Save Settings
                </button>
            </div>
        </form>
    </section>

</main>