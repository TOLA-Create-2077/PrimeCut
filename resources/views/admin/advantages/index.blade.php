@include('admin.layout.sidebar')

<main class="main dashboard-main">
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-star"></i>
            </div>
            <div>
                <h2>Why Choose Us Management</h2>
                <span>Manage the advantage cards displayed on the homepage</span>
            </div>
        </div>
        <div>
            <button type="button" onclick="openCreateAdvantageModal()" style="padding: 10px 18px; background: #6b1d22; color: #fff; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(107, 29, 34, 0.2); transition: all 0.2s;">
                <i class="fa-solid fa-plus"></i> Add New Card
            </button>
        </div>
    </div>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem; display: flex; align-items: center;">
            <i class="fa-solid fa-check-circle" style="margin-right: 8px; font-size: 1rem;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Existing Cards List -->
    <section class="dashboard-section" style="background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <h3 style="font-size: 1.1rem; margin-bottom: 16px; color: #1e293b; font-weight: 700;">Existing Advantage Cards</h3>
        <div style="display: flex; flex-direction: column; gap: 16px;">
            @forelse($advantages as $adv)
                <div style="border: 1px solid #e2e8f0; padding: 18px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center; background: #fff; transition: all 0.2s;">
                    <div style="display: flex; gap: 16px; align-items: center;">
                        <div style="background: #f8fafc; padding: 12px; border-radius: 8px; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: center; min-width: 44px; min-height: 44px;">
                            {!! $adv->icon_svg !!}
                        </div>
                        <div>
                            <h4 style="font-size: 1rem; color: #0f172a; margin-bottom: 4px; font-weight: 600;">{{ $adv->title }} <span style="font-size: 0.75rem; background: #f1f5f9; color: #475569; padding: 2px 8px; border-radius: 20px; margin-left: 6px; font-weight: 500;">Order: {{ $adv->sort_order }}</span></h4>
                            <p style="font-size: 0.85rem; color: #64748b; margin: 0; line-height: 1.4;">{{ $adv->description }}</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 8px; align-items: center;">
                        <!-- Edit Button -->
                        <button type="button" 
                            onclick="openEditAdvantageModal('{{ $adv->id }}', '{{ addslashes($adv->title) }}', '{{ $adv->sort_order }}', `{{ addslashes($adv->icon_svg) }}`, `{{ addslashes($adv->description) }}`)" 
                            style="background: #f0f9ff; color: #0369a1; border: 1px solid #bae6fd; padding: 8px 14px; border-radius: 6px; cursor: pointer; font-size: 0.85rem; font-weight: 600; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s;">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </button>

                        <!-- Delete Form -->
                        <form action="{{ route('admin.advantages.destroy', $adv->id) }}" method="POST" onsubmit="return confirm('Delete this card?');" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; padding: 8px 12px; border-radius: 6px; cursor: pointer; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; transition: all 0.2s;">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div style="padding: 32px; text-align: center; color: #94a3b8; font-style: italic; background: #f8fafc; border-radius: 8px; border: 1px dashed #cbd5e1;">
                    No advantage cards found. Click "Add New Card" to create one.
                </div>
            @endforelse
        </div>
    </section>
</main>

<!-- ================= CREATE ADVANTAGE MODAL ================= -->
<div id="createAdvantageModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 1000; align-items: center; justify-content: center; padding: 16px; box-sizing: border-box;">
    <div style="background: #fff; width: 100%; max-width: 520px; border-radius: 16px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1); max-height: 90vh; display: flex; flex-direction: column; overflow: hidden; box-sizing: border-box; animation: modalSlideIn 0.25s ease-out;">
        <!-- Modal Header -->
        <div style="padding: 20px 24px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; background: #f8fafc; box-sizing: border-box; flex-shrink: 0;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div style="width: 32px; height: 32px; background: #6b1d22; color: #fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <h3 style="margin: 0; font-size: 1.1rem; color: #0f172a; font-weight: 700;">Add New Advantage Card</h3>
            </div>
            <button type="button" onclick="closeCreateAdvantageModal()" style="background: none; border: none; width: 32px; height: 32px; border-radius: 6px; cursor: pointer; color: #64748b; display: flex; align-items: center; justify-content: center; transition: background 0.2s;"><i class="fa-solid fa-xmark" style="font-size: 1.1rem;"></i></button>
        </div>

        <!-- Modal Body Form -->
        <form action="{{ route('admin.advantages.store') }}" method="POST" style="padding: 24px; overflow-y: auto; flex: 1; display: flex; flex-direction: column; gap: 18px; box-sizing: border-box;">
            @csrf
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Card Title <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="title" required placeholder="e.g., Premium Quality" style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; color: #1e293b; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#6b1d22'" onblur="this.style.borderColor='#cbd5e1'">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Sort Order</label>
                    <input type="number" name="sort_order" value="0" style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; color: #1e293b; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#6b1d22'" onblur="this.style.borderColor='#cbd5e1'">
                </div>
            </div>

            <div>
                <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: #334155;">SVG Icon Markup <span style="font-weight: normal; color: #64748b; font-size: 0.75rem;">(&lt;svg&gt;...&lt;/svg&gt;)</span></label>
                <textarea name="icon_svg" rows="3" placeholder='<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="..."/></svg>' style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.8rem; font-family: monospace; color: #1e293b; outline: none; resize: vertical; transition: border-color 0.2s;" onfocus="this.style.borderColor='#6b1d22'" onblur="this.style.borderColor='#cbd5e1'"></textarea>
            </div>

            <div>
                <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description <span style="color: #ef4444;">*</span></label>
                <textarea name="description" rows="3" required placeholder="Write a short, engaging description..." style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; color: #1e293b; outline: none; resize: vertical; transition: border-color 0.2s;" onfocus="this.style.borderColor='#6b1d22'" onblur="this.style.borderColor='#cbd5e1'"></textarea>
            </div>

            <!-- Modal Footer Buttons -->
            <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 8px; padding-top: 16px; border-top: 1px solid #f1f5f9; box-sizing: border-box; flex-shrink: 0;">
                <button type="button" onclick="closeCreateAdvantageModal()" style="padding: 10px 18px; background: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 8px; font-weight: 600; cursor: pointer; color: #475569; font-size: 0.875rem; transition: background 0.2s;">Cancel</button>
                <button type="submit" style="padding: 10px 20px; background: #6b1d22; color: #fff; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 0.875rem; box-shadow: 0 4px 12px rgba(107, 29, 34, 0.2); transition: opacity 0.2s;">Add Card</button>
            </div>
        </form>
    </div>
</div>

<!-- ================= EDIT ADVANTAGE MODAL ================= -->
<div id="editAdvantageModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 1000; align-items: center; justify-content: center; padding: 16px; box-sizing: border-box;">
    <div style="background: #fff; width: 100%; max-width: 520px; border-radius: 16px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1); max-height: 90vh; display: flex; flex-direction: column; overflow: hidden; box-sizing: border-box; animation: modalSlideIn 0.25s ease-out;">
        <!-- Modal Header -->
        <div style="padding: 20px 24px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; background: #f8fafc; box-sizing: border-box; flex-shrink: 0;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div style="width: 32px; height: 32px; background: #0284c7; color: #fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
                <h3 style="margin: 0; font-size: 1.1rem; color: #0f172a; font-weight: 700;">Edit Advantage Card</h3>
            </div>
            <button type="button" onclick="closeEditAdvantageModal()" style="background: none; border: none; width: 32px; height: 32px; border-radius: 6px; cursor: pointer; color: #64748b; display: flex; align-items: center; justify-content: center; transition: background 0.2s;"><i class="fa-solid fa-xmark" style="font-size: 1.1rem;"></i></button>
        </div>

        <!-- Modal Body Form -->
        <form id="editAdvantageForm" method="POST" style="padding: 24px; overflow-y: auto; flex: 1; display: flex; flex-direction: column; gap: 18px; box-sizing: border-box;">
            @csrf
            @method('PUT')
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Card Title <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="edit_title" name="title" required style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; color: #1e293b; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#0284c7'" onblur="this.style.borderColor='#cbd5e1'">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Sort Order</label>
                    <input type="number" id="edit_sort_order" name="sort_order" style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; color: #1e293b; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#0284c7'" onblur="this.style.borderColor='#cbd5e1'">
                </div>
            </div>

            <div>
                <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: #334155;">SVG Icon Markup <span style="font-weight: normal; color: #64748b; font-size: 0.75rem;">(&lt;svg&gt;...&lt;/svg&gt;)</span></label>
                <textarea id="edit_icon_svg" name="icon_svg" rows="3" style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.8rem; font-family: monospace; color: #1e293b; outline: none; resize: vertical; transition: border-color 0.2s;" onfocus="this.style.borderColor='#0284c7'" onblur="this.style.borderColor='#cbd5e1'"></textarea>
            </div>

            <div>
                <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description <span style="color: #ef4444;">*</span></label>
                <textarea id="edit_description" name="description" rows="3" required style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; color: #1e293b; outline: none; resize: vertical; transition: border-color 0.2s;" onfocus="this.style.borderColor='#0284c7'" onblur="this.style.borderColor='
                #cbd5e1'"></textarea>
            </div>

            <!-- Modal Footer Buttons -->
            <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 8px; padding-top: 16px; border-top: 1px solid #f1f5f9; box-sizing: border-box; flex-shrink: 0;">
                <button type="button" onclick="closeEditAdvantageModal()" style="padding: 10px 18px; background: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 8px; font-weight: 600; cursor: pointer; color: #475569; font-size: 0.875rem; transition: background 0.2s;">Cancel</button>
                <button type="submit" style="padding: 10px 20px; background: #0284c7; color: #fff; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 0.875rem; box-shadow: 0 4px 12px rgba(2, 132, 199, 0.2); transition: opacity 0.2s;">Update Card</button>
            </div>
        </form>
    </div>
</div>

<style>
    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-20px) scale(0.98);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
</style>

<script>
    // Create Modal Functions
    function openCreateAdvantageModal() {
        document.getElementById('createAdvantageModal').style.display = 'flex';
    }

    function closeCreateAdvantageModal() {
        document.getElementById('createAdvantageModal').style.display = 'none';
    }

    // Edit Modal Functions
    function openEditAdvantageModal(id, title, sortOrder, iconSvg, description) {
        document.getElementById('edit_title').value = title;
        document.getElementById('edit_sort_order').value = sortOrder;
        document.getElementById('edit_icon_svg').value = iconSvg;
        document.getElementById('edit_description').value = description;

        document.getElementById('editAdvantageForm').action = "{{ url('admin/advantages') }}/" + id;
        document.getElementById('editAdvantageModal').style.display = 'flex';
    }

    function closeEditAdvantageModal() {
        document.getElementById('editAdvantageModal').style.display = 'none';
    }

    // Close modals when clicking outside the modal box
    window.onclick = function(event) {
        const createModal = document.getElementById('createAdvantageModal');
        const editModal = document.getElementById('editAdvantageModal');
        if (event.target === createModal) {
            closeCreateAdvantageModal();
        }
        if (event.target === editModal) {
            closeEditAdvantageModal();
        }
    }
</script>