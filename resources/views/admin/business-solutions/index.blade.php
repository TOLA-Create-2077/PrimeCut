{{-- Include the Sidebar --}}
@include('admin.layout.sidebar')

<main class="main dashboard-main">

    <!-- HEADER / FILTER BAR -->
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-briefcase"></i>
            </div>
            <div>
                <h2>Business Solutions Management</h2>
                <span>Manage the target industry cards displayed in the Business Solutions section</span>
            </div>
        </div>

        <div class="dashboard-filters">
            <button type="button" onclick="openCreateModal()" class="dashboard-icon-btn search" style="width: auto; padding: 0 16px; gap: 8px; text-decoration: none; border-radius: 8px; border: none; cursor: pointer;" title="Add New Solution">
                <i class="fa-solid fa-plus"></i>
                <span style="font-size: 0.875rem; font-weight: 600;">Add New Solution</span>
            </button>
        </div>
    </div>

    <!-- SUCCESS NOTIFICATION -->
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- SOLUTIONS TABLE SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Database Solutions</h3>
                <p>Manage the dynamic solution cards in your database</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-layer-group"></i>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; color: #334155;">
                <thead>
                    <tr style="border-bottom: 2px solid #f1f5f9; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        <th style="padding: 12px 16px;">Icon Preview</th>
                        <th style="padding: 12px 16px;">Title</th>
                        <th style="padding: 12px 16px;">Description</th>
                        <th style="padding: 12px 16px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($solutions ?? [] as $solution)
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                            <td style="padding: 12px 16px;">
                                <div style="width: 40px; height: 40px; border: 1px solid rgba(107, 29, 34, 0.3); display: flex; align-items: center; justify-content: center; color: #6b1d22; background: #000;">
                                    {!! $solution->icon_svg !!}
                                </div>
                            </td>
                            <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">
                                {{ $solution->title }}
                            </td>
                            <td style="padding: 12px 16px; color: #64748b; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $solution->description }}
                            </td>
                            <td style="padding: 12px 16px; text-align: right;">
                                <button onclick='openEditModal(@json($solution))' style="background: none; border: none; cursor: pointer; color: #64748b; font-size: 1rem; margin-right: 8px;" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('admin.solutions.destroy', $solution->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this solution?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; cursor: pointer; color: #ef4444; font-size: 1rem;" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 24px; text-align: center; color: #94a3b8; font-style: italic;">
                                No business solutions found. Click "Add New Solution" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</main>

<!-- ================= ADD / EDIT SOLUTION MODAL ================= -->
<div id="solutionModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 100%; max-width: 500px; border-radius: 12px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 id="modalTitle" style="margin: 0; font-size: 1.25rem; color: #0f172a;">Add Business Solution</h3>
            <button type="button" onclick="closeModal()" style="background: none; border: none; font-size: 1.25rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <form id="solutionForm" method="POST" action="{{ route('admin.solutions.store') }}">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Title</label>
                <input type="text" name="title" id="title" required placeholder="e.g. Enterprise Solutions" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description</label>
                <textarea name="description" id="description" rows="3" required placeholder="Enter solution details..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;"></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">SVG Icon Code</label>
                <textarea name="icon_svg" id="icon_svg" rows="3" required placeholder="<svg ...>...</svg>" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.75rem; font-family: monospace;"></textarea>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeModal()" style="padding: 10px 16px; background: #f1f5f9; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; color: #334155;">Cancel</button>
                <button type="submit" style="padding: 10px 16px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Save Solution</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('solutionModal');
    const form = document.getElementById('solutionForm');
    const modalTitle = document.getElementById('modalTitle');
    const formMethod = document.getElementById('formMethod');

    function openCreateModal() {
        form.action = "{{ route('admin.solutions.store') }}";
        formMethod.value = "POST";
        modalTitle.innerText = "Add Business Solution";
        document.getElementById('title').value = '';
        document.getElementById('description').value = '';
        document.getElementById('icon_svg').value = '';
        modal.style.display = 'flex';
    }

    function openEditModal(solution) {
        form.action = `/admin/solutions/${solution.id}`;
        formMethod.value = "PUT";
        modalTitle.innerText = "Edit Business Solution";
        document.getElementById('title').value = solution.title;
        document.getElementById('description').value = solution.description;
        document.getElementById('icon_svg').value = solution.icon_svg;
        modal.style.display = 'flex';
    }

    function closeModal() {
        modal.style.display = 'none';
    }
</script>