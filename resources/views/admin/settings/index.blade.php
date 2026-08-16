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
                <h2>Header, Body & Footer Settings</h2>
                <span>Manage site configuration, layout themes, and footer details</span>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- SETTINGS FORM SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Configuration Panel</h3>
                <p>Customize site-wide text, branding, and contact details</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-sliders"></i>
            </div>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- HEADER & NAVIGATION SETTINGS -->
            <div style="margin-bottom: 24px;">
                <h4 style="font-size: 1rem; font-weight: 600; color: #6b1d22; margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                    <i class="fa-solid fa-window-maximize" style="margin-right: 6px;"></i> Header & Navigation Settings
                </h4>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-bottom: 16px;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Site Title</label>
                        <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Header Brand Name</label>
                        <input type="text" name="header_brand_name" value="{{ $settings['header_brand_name'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Header Background Class</label>
                        <input type="text" name="header_bg" value="{{ $settings['header_bg'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Header Contact Phone</label>
                        <input type="text" name="header_phone" value="{{ $settings['header_phone'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Header Logo Image</label>
                    @if(isset($settings['header_logo']))
                        <div style="margin-bottom: 8px;"><img src="{{ asset('storage/' . $settings['header_logo']) }}" alt="Logo" style="height: 40px; object-fit: contain; border-radius: 4px; border: 1px solid #e2e8f0;"></div>
                    @endif
                    <input type="file" name="header_logo" style="width: 100%; font-size: 0.875rem;">
                </div>

                <!-- Menu Navigation Labels -->
                <h5 style="font-size: 0.875rem; font-weight: 600; color: #64748b; margin: 16px 0 8px 0;">Menu Text Labels</h5>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px;">
                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; margin-bottom: 4px; color: #64748b;">Home Menu Text</label>
                        <input type="text" name="menu_home_text" value="{{ $settings['menu_home_text'] ?? '' }}" style="width: 100%; padding: 8px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; margin-bottom: 4px; color: #64748b;">Products Menu Text</label>
                        <input type="text" name="menu_products_text" value="{{ $settings['menu_products_text'] ?? '' }}" style="width: 100%; padding: 8px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; margin-bottom: 4px; color: #64748b;">About Us Menu Text</label>
                        <input type="text" name="menu_about_text" value="{{ $settings['menu_about_text'] ?? '' }}" style="width: 100%; padding: 8px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 600; margin-bottom: 4px; color: #64748b;">Contact Menu Text</label>
                        <input type="text" name="menu_contact_text" value="{{ $settings['menu_contact_text'] ?? '' }}" style="width: 100%; padding: 8px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                </div>
            </div>

            <!-- BODY SETTINGS -->
            <div style="margin-bottom: 24px;">
                <h4 style="font-size: 1rem; font-weight: 600; color: #6b1d22; margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                    <i class="fa-solid fa-palette" style="margin-right: 6px;"></i> Body Settings
                </h4>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Body Background Color / Style</label>
                    <input type="text" name="body_bg" value="{{ $settings['body_bg'] ?? '' }}" style="width: 100%; max-width: 300px; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>

            <!-- FOOTER SETTINGS -->
            <div style="margin-bottom: 24px;">
                <h4 style="font-size: 1rem; font-weight: 600; color: #6b1d22; margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                    <i class="fa-solid fa-shoe-prints" style="margin-right: 6px;"></i> Footer Settings
                </h4>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-bottom: 16px;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Footer Background Color</label>
                        <input type="text" name="footer_bg" value="{{ $settings['footer_bg'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Footer Phone</label>
                        <input type="text" name="footer_phone" value="{{ $settings['footer_phone'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Footer Email</label>
                        <input type="email" name="footer_email" value="{{ $settings['footer_email'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Footer Address</label>
                        <input type="text" name="footer_address" value="{{ $settings['footer_address'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Footer Bio / Description</label>
                    <textarea name="footer_bio" rows="2" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">{{ $settings['footer_bio'] ?? '' }}</textarea>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Facebook URL</label>
                        <input type="url" name="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Instagram URL</label>
                        <input type="url" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">TikTok URL</label>
                        <input type="url" name="social_tiktok" value="{{ $settings['social_tiktok'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Copyright Text</label>
                        <input type="text" name="copyright_text" value="{{ $settings['copyright_text'] ?? '' }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                    </div>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div style="display: flex; justify-content: flex-end; border-top: 1px solid #f1f5f9; padding-top: 16px;">
                <button type="submit" style="padding: 10px 20px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; font-size: 0.875rem; cursor: pointer;">
                    Save Changes
                </button>
            </div>
        </form>
    </section>

</main>