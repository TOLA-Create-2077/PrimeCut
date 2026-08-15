@include('admin.layout.sidebar')

<main class="main dashboard-main">
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-bars-staggered"></i>
            </div>
            <div>
                <h2>Feature Bar Management</h2>
                <span>Manage the 4 core highlight items displayed on your homepage</span>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Active Feature Bars</h3>
                <p>Edit headings, sub-labels, and optional icons</p>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; color: #334155;">
                <thead>
                    <tr style="border-bottom: 2px solid #f1f5f9; color: #64748b; font-size: 0.75rem; text-transform: uppercase;">
                        <th style="padding: 12px 16px;">Order</th>
                        <th style="padding: 12px 16px;">Icon / Image</th>
                        <th style="padding: 12px 16px;">Top Title (Uppercase Mono)</th>
                        <th style="padding: 12px 16px;">Main Subtitle (Serif)</th>
                        <th style="padding: 12px 16px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($features as $feature)
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 12px 16px; font-weight: 600;">#{{ $feature->sort_order }}</td>
                            <td style="padding: 12px 16px;">
                                @if($feature->image_path)
                                    <!-- ប្រើ Cloudinary URL ផ្ទាល់ដោយមិនបាច់ប្រើ asset('storage/...') -->
                                    <img src="{{ $feature->image_path }}" alt="Icon" style="width: 32px; height: 32px; object-fit: cover; border-radius: 4px;">
                                @else
                                    <span style="color: #94a3b8; font-style: italic; font-size: 0.75rem;">None</span>
                                @endif
                            </td>
                            <td style="padding: 12px 16px; font-family: monospace; color: #c41e3a; font-weight: 600;">{{ $feature->title }}</td>
                            <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">{{ $feature->subtitle }}</td>
                            <td style="padding: 12px 16px; text-align: right;">
                                <button type="button" onclick="openEditModal('{{ $feature->id }}', '{{ $feature->title }}', '{{ $feature->subtitle }}')" style="padding: 6px 12px; background: #f1f5f9; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; color: #0f172a;">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>

<!-- EDIT MODAL -->
<div id="editFeatureModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 100%; max-width: 450px; border-radius: 12px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.2rem; color: #0f172a;">Edit Feature Item</h3>
            <button type="button" onclick="closeEditModal()" style="background: none; border: none; font-size: 1.2rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <form id="editFeatureForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Top Title (Uppercase)</label>
                <input type="text" name="title" id="modal_title" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Main Subtitle</label>
                <input type="text" name="subtitle" id="modal_subtitle" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Optional Icon / Image</label>
                <input type="file" name="image" style="width: 100%; font-size: 0.875rem;">
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeEditModal()" style="padding: 10px 16px; background: #f1f5f9; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Cancel</button>
                <button type="submit" style="padding: 10px 16px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, title, subtitle) {
        document.getElementById('modal_title').value = title;
        document.getElementById('modal_subtitle').value = subtitle;
        document.getElementById('editFeatureForm').action = "/admin/features/" + id;
        document.getElementById('editFeatureModal').style.display = 'flex';
    }
    function closeEditModal() {
        document.getElementById('editFeatureModal').style.display = 'none';
    }
</script>