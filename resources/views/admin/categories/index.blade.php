@include('admin.layout.sidebar')

<main class="main dashboard-main">

    <!-- HEADER / FILTER BAR -->
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-tags"></i>
            </div>
            <div>
                <h2>Category Management</h2>
                <span>Overview of product categories retrieved from the database</span>
            </div>
        </div>

        <div class="dashboard-filters">
            <button type="button" onclick="openAddCategoryModal()" class="dashboard-icon-btn search" style="width: auto; padding: 0 16px; gap: 8px; text-decoration: none; border-radius: 8px; border: none; cursor: pointer;" title="Add Category">
                <i class="fa-solid fa-plus"></i>
                <span style="font-size: 0.875rem; font-weight: 600;">Add New Category</span>
            </button>
        </div>
    </div>

    <!-- SUCCESS NOTIFICATION -->
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- CATEGORIES TABLE SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Database Categories</h3>
                <p>Managed directly from the `categories` table</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-layer-group"></i>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; color: #334155;">
                <thead>
                    <tr style="border-bottom: 2px solid #f1f5f9; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        <th style="padding: 12px 16px;">Image</th>
                        <th style="padding: 12px 16px;">Category Name</th>
                        <th style="padding: 12px 16px;">Slug</th>
                        <th style="padding: 12px 16px;">Total Products Linked</th>
                        <th style="padding: 12px 16px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories ?? [] as $cat)
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                            <!-- Display Category Image -->
                            <td style="padding: 12px 16px;">
                                @if($cat->image)
                                    <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->name }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;">
                                @else
                                    <div style="width: 40px; height: 40px; background: #f1f5f9; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.75rem;">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">
                                <i class="fa-solid fa-tag" style="color: #6b1d22; margin-right: 8px;"></i> {{ $cat->name }}
                            </td>
                            <td style="padding: 12px 16px; font-family: monospace; color: #64748b;">
                                {{ $cat->slug }}
                            </td>
                            <td style="padding: 12px 16px;">
                                <span style="background: #f1f5f9; padding: 4px 10px; border-radius: 20px; font-weight: 600; font-size: 0.75rem;">
                                    {{ $cat->products_count ?? 0 }} Items
                                </span>
                            </td>
                            <td style="padding: 12px 16px; text-align: right;">
                                <div style="display: inline-flex; justify-content: flex-end; gap: 8px; align-items: center;">
                                    <!-- Edit Button -->
                                    <button type="button" 
                                        onclick="openEditCategoryModal('{{ $cat->id }}', '{{ addslashes($cat->name) }}', '{{ $cat->slug }}', '{{ addslashes($cat->description ?? '') }}', '{{ $cat->image ? asset('storage/' . $cat->image) : '' }}')" 
                                        style="background: #e0f2fe; color: #0369a1; border: none; padding: 6px 10px; border-radius: 6px; font-size: 0.8125rem; font-weight: 600; cursor: pointer;">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>

                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: #fee2e2; color: #991b1b; border: none; padding: 6px 10px; border-radius: 6px; font-size: 0.8125rem; font-weight: 600; cursor: pointer;">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 24px; text-align: center; color: #94a3b8; font-style: italic;">
                                No categories found in database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</main>

<!-- ================= ADD CATEGORY MODAL ================= -->
<div id="addCategoryModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 100%; max-width: 500px; border-radius: 12px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.25rem; color: #0f172a;">Add New Category</h3>
            <button type="button" onclick="closeAddCategoryModal()" style="background: none; border: none; font-size: 1.25rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Category Name</label>
                <input type="text" name="name" required placeholder="e.g. Beef, Chicken" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Slug <span style="font-weight: normal; color: #64748b;">(Optional)</span></label>
                <input type="text" name="slug" placeholder="e.g. beef, chicken" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description</label>
                <textarea name="description" rows="3" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;"></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Category Background Image (Optional)</label>
                <input type="file" name="image" accept="image/*" style="width: 100%; font-size: 0.875rem;">
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeAddCategoryModal()" style="padding: 10px 16px; background: #f1f5f9; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; color: #334155;">Cancel</button>
                <button type="submit" style="padding: 10px 16px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- ================= EDIT CATEGORY MODAL ================= -->
<div id="editCategoryModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 100%; max-width: 500px; border-radius: 12px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.25rem; color: #0f172a;">Edit Category</h3>
            <button type="button" onclick="closeEditCategoryModal()" style="background: none; border: none; font-size: 1.25rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <form id="editCategoryForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Category Name</label>
                <input type="text" id="edit_name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Slug</label>
                <input type="text" id="edit_slug" name="slug" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description</label>
                <textarea id="edit_description" name="description" rows="3" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;"></textarea>
            </div>

            <!-- Preview Current Image -->
            <div style="margin-bottom: 16px;" id="currentImageContainer">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Current Image</label>
                <div id="imagePreviewWrapper"></div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">New Background Image (Optional)</label>
                <input type="file" name="image" accept="image/*" style="width: 100%; font-size: 0.875rem;">
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeEditCategoryModal()" style="padding: 10px 16px; background: #f1f5f9; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; color: #334155;">Cancel</button>
                <button type="submit" style="padding: 10px 16px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Update Category</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddCategoryModal() {
        document.getElementById('addCategoryModal').style.display = 'flex';
    }
    function closeAddCategoryModal() {
        document.getElementById('addCategoryModal').style.display = 'none';
    }

    function openEditCategoryModal(id, name, slug, description, imageUrl) {
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_slug').value = slug;
        document.getElementById('edit_description').value = description;

        // Show current image preview if available
        const previewWrapper = document.getElementById('imagePreviewWrapper');
        if (imageUrl) {
            previewWrapper.innerHTML = `<img src="${imageUrl}" alt="Category Image" style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;">`;
        } else {
            previewWrapper.innerHTML = `<span style="font-size: 0.8125rem; color: #94a3b8; font-style: italic;">No image uploaded</span>`;
        }

        document.getElementById('editCategoryForm').action = "{{ url('admin/categories') }}/" + id;
        document.getElementById('editCategoryModal').style.display = 'flex';
    }
    
    function closeEditCategoryModal() {
        document.getElementById('editCategoryModal').style.display = 'none';
    }
</script>