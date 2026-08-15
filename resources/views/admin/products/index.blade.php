{{-- Include the Sidebar --}}
@include('admin.layout.sidebar')

<main class="main dashboard-main">

    <!-- HEADER / FILTER BAR -->
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-box-open"></i>
            </div>
            <div>
                <h2>Product Management</h2>
                <span>Manage meat catalog, grading, and availability</span>
            </div>
        </div>

        <div class="dashboard-filters">
            <!-- Button to Open Add Modal -->
            <button type="button" onclick="openAddModal()" class="dashboard-icon-btn search" style="width: auto; padding: 0 16px; gap: 8px; text-decoration: none; border-radius: 8px; border: none; cursor: pointer;" title="Add New Product">
                <i class="fa-solid fa-plus"></i>
                <span style="font-size: 0.875rem; font-weight: 600;">Add Product</span>
            </button>
        </div>
    </div>

    <!-- PRODUCTS TABLE SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Catalog Inventory</h3>
                <p>All available beef, chicken, duck, and specialty cuts</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; color: #334155;">
                <thead>
                    <tr style="border-bottom: 2px solid #f1f5f9; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        <th style="padding: 12px 16px;">Image</th>
                        <th style="padding: 12px 16px;">Product Name</th>
                        <th style="padding: 12px 16px;">Category</th>
                        <th style="padding: 12px 16px;">Grade</th>
                        <th style="padding: 12px 16px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products ?? [] as $product)
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                            <td style="padding: 12px 16px;">
                                <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : asset('images/primecutlogo.jpg') }}" alt="{{ $product->name }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0;">
                            </td>
                            <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">{{ $product->name }}</td>
                            <td style="padding: 12px 16px;"><span style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 500; text-transform: uppercase;">{{ $product->category }}</span></td>
                            <td style="padding: 12px 16px; font-weight: 600; color: #6b1d22;">{{ $product->grade }}</td>
                            <td style="padding: 12px 16px; text-align: right;">
                                <div style="display: inline-flex; gap: 8px; align-items: center;">
                                    <!-- Trigger Edit Modal -->
                                    <button type="button" class="dashboard-icon-btn refresh edit-btn" data-product="{{ json_encode($product) }}" style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border: none; cursor: pointer;" title="Edit Product">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dashboard-icon-btn refresh" style="width: 32px; height: 32px; color: #dc2626; cursor: pointer; background: transparent; border: none;" title="Delete Product">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td colspan="5" style="padding: 24px; text-align: center; color: #94a3b8; font-style: italic;">
                                No products found in the database. Click "Add Product" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        @if(isset($products) && method_exists($products, 'links'))
            <div style="margin-top: 20px;">
                {{ $products->links() }}
            </div>
        @endif
    </section>

</main>

<!-- ================= ADD PRODUCT MODAL ================= -->
<div id="addProductModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 100%; max-width: 500px; border-radius: 12px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.25rem; color: #0f172a;">Add New Product</h3>
            <button type="button" onclick="closeAddModal()" style="background: none; border: none; font-size: 1.25rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Product Name</label>
                <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Category</label>
                <select name="category" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; background: #fff;">
                    <option value="beef">Beef</option>
                    <option value="chicken">Chicken</option>
                    <option value="duck">Duck</option>
                </select>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Grade</label>
                <input type="text" name="grade" required placeholder="e.g. Grade A, Prime" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description</label>
                <textarea name="description" rows="3" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;"></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Product Image</label>
                <input type="file" name="image" required style="width: 100%; font-size: 0.875rem;">
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeAddModal()" style="padding: 10px 16px; background: #f1f5f9; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; color: #334155;">Cancel</button>
                <button type="submit" style="padding: 10px 16px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Save Product</button>
            </div>
        </form>
    </div>
</div>

<!-- ================= EDIT PRODUCT MODAL ================= -->
<div id="editProductModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 100%; max-width: 500px; border-radius: 12px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.25rem; color: #0f172a;">Edit Product</h3>
            <button type="button" onclick="closeEditModal()" style="background: none; border: none; font-size: 1.25rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <form id="editProductForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Product Name</label>
                <input type="text" id="edit_name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Category</label>
                <select id="edit_category" name="category" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; background: #fff;">
                    <option value="beef">Beef</option>
                    <option value="chicken">Chicken</option>
                    <option value="duck">Duck</option>
                </select>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Grade</label>
                <input type="text" id="edit_grade" name="grade" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description</label>
                <textarea id="edit_description" name="description" rows="3" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;"></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Product Image <span style="font-weight: normal; color: #64748b;">(Leave blank to keep current)</span></label>
                <input type="file" name="image" style="width: 100%; font-size: 0.875rem;">
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeEditModal()" style="padding: 10px 16px; background: #f1f5f9; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; color: #334155;">Cancel</button>
                <button type="submit" style="padding: 10px 16px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Update Product</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript to control popup opening and closing -->
<script>
    function openAddModal() {
        document.getElementById('addProductModal').style.display = 'flex';
    }
    function closeAddModal() {
        document.getElementById('addProductModal').style.display = 'none';
    }

    function openEditModal(product) {
        document.getElementById('edit_name').value = product.name;
        document.getElementById('edit_category').value = product.category;
        document.getElementById('edit_grade').value = product.grade;
        document.getElementById('edit_description').value = product.description;

        // Dynamically set form action URL based on product ID
        document.getElementById('editProductForm').action = "/admin/products/" + product.id;

        document.getElementById('editProductModal').style.display = 'flex';
    }

    function closeEditModal() {
        document.getElementById('editProductModal').style.display = 'none';
    }

    // Attach event listeners safely to avoid quote/escaping errors
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                const product = JSON.parse(this.getAttribute('data-product'));
                openEditModal(product);
            });
        });
    });
</script>