{{-- Include the Sidebar --}}
@include('admin.layout.sidebar')

<main class="main dashboard-main">

    <!-- HEADER / FILTER BAR -->
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-globe"></i>
            </div>
            <div>
                <h2>Homepage Management</h2>
                <span>Manage hero section text, subtitles, and background banner image</span>
            </div>
        </div>

        <div class="dashboard-filters">
            <!-- Button to Open Edit Modal -->
            <button type="button" onclick="openEditHomepageModal()" class="dashboard-icon-btn search" style="width: auto; padding: 0 16px; gap: 8px; text-decoration: none; border-radius: 8px; border: none; cursor: pointer;" title="Edit Homepage Content">
                <i class="fa-solid fa-pen-to-square"></i>
                <span style="font-size: 0.875rem; font-weight: 600;">Edit Homepage</span>
            </button>
        </div>
    </div>

    <!-- SUCCESS NOTIFICATION -->
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- HOMEPAGE CONTENT TABLE SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Current Hero Section Details</h3>
                <p>Preview of active text and hero banner on the website main page</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-house-chimney"></i>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; color: #334155;">
                <thead>
                    <tr style="border-bottom: 2px solid #f1f5f9; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        <th style="padding: 12px 16px;">Hero Image</th>
                        <th style="padding: 12px 16px;">Subtitle</th>
                        <th style="padding: 12px 16px;">Main Title Layout</th>
                        <th style="padding: 12px 16px;">Buttons Setup</th>
                        <th style="padding: 12px 16px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($home))
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                            <td style="padding: 12px 16px;">
                                @if(!empty($home->hero_image))
                                    <img src="{{ asset('storage/' . $home->hero_image) }}" alt="Hero Image" style="width: 50px; height: 40px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0;">
                                @else
                                    <img src="{{ asset('images/primecutlogo.jpg') }}" alt="Default Logo" style="width: 50px; height: 40px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0;">
                                @endif
                            </td>
                            <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">
                                {{ $home->subtitle }}
                            </td>
                            <td style="padding: 12px 16px;">
                                <div style="font-weight: 600; color: #0f172a;">{{ $home->title_line_1 }} <span style="color: #6b1d22;">{{ $home->title_highlight }}</span></div>
                                <div style="color: #64748b; font-size: 0.75rem;">{{ $home->title_line_3 }}</div>
                            </td>
                            <td style="padding: 12px 16px;">
                                <div style="font-size: 0.75rem; background: #f1f5f9; padding: 4px 8px; border-radius: 4px; display: inline-block; margin-bottom: 2px;">
                                    <strong>Explore:</strong> {{ $home->btn_explore_text }} ({{ $home->btn_explore_url }})
                                </div><br>
                                <div style="font-size: 0.75rem; background: #f1f5f9; padding: 4px 8px; border-radius: 4px; display: inline-block;">
                                    <strong>Contact:</strong> {{ $home->btn_contact_text }} ({{ $home->btn_contact_url }})
                                </div>
                            </td>
                            <td style="padding: 12px 16px; text-align: right;">
                                <button type="button" onclick="openEditHomepageModal()" class="dashboard-icon-btn refresh" style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border: none; cursor: pointer; background: #f1f5f9; border-radius: 6px;" title="Edit Homepage Content">
                                    <i class="fa-solid fa-pen" style="color: #0f172a;"></i>
                                </button>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" style="padding: 24px; text-align: center; color: #94a3b8; font-style: italic;">
                                No configuration content found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>

</main>

<!-- ================= EDIT HOMEPAGE MODAL ================= -->
<div id="editHomepageModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 100%; max-width: 600px; border-radius: 12px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.25rem; color: #0f172a;">Edit Homepage Content</h3>
            <button type="button" onclick="closeEditHomepageModal()" style="background: none; border: none; font-size: 1.25rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        @if(isset($home))
        <form action="{{ route('admin.home.update', $home) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Subtitle / Location Text</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $home->subtitle ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Title Line 1</label>
                    <input type="text" name="title_line_1" value="{{ old('title_line_1', $home->title_line_1 ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Title Highlighted Text</label>
                    <input type="text" name="title_highlight" value="{{ old('title_highlight', $home->title_highlight ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Title Line 3 (Bottom Text)</label>
                <input type="text" name="title_line_3" value="{{ old('title_line_3', $home->title_line_3 ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description Paragraph</label>
                <textarea name="description" rows="3" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">{{ old('description', $home->description ?? '') }}</textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Explore Button Text</label>
                    <input type="text" name="btn_explore_text" value="{{ old('btn_explore_text', $home->btn_explore_text ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Explore Button URL / Link</label>
                    <input type="text" name="btn_explore_url" value="{{ old('btn_explore_url', $home->btn_explore_url ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Contact Button Text</label>
                    <input type="text" name="btn_contact_text" value="{{ old('btn_contact_text', $home->btn_contact_text ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Contact Button URL / Link</label>
                    <input type="text" name="btn_contact_url" value="{{ old('btn_contact_url', $home->btn_contact_url ?? '') }}" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Hero Background Image <span style="font-weight: normal; color: #64748b;">(Leave blank to keep current)</span></label>
                <input type="file" name="hero_image" style="width: 100%; font-size: 0.875rem;">
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeEditHomepageModal()" style="padding: 10px 16px; background: #f1f5f9; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; color: #334155;">Cancel</button>
                <button type="submit" style="padding: 10px 16px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Save Changes</button>
            </div>
        </form>
        @endif
    </div>
</div>

<!-- JavaScript to control the Modal Popup -->
<script>
    function openEditHomepageModal() {
        document.getElementById('editHomepageModal').style.display = 'flex';
    }

    function closeEditHomepageModal() {
        document.getElementById('editHomepageModal').style.display = 'none';
    }
</script>