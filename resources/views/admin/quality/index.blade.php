

{{-- Include the Sidebar --}}
@include('admin.layout.sidebar')

<main class="main dashboard-main">

    <!-- HEADER / FILTER BAR -->
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div>
                <h2>Quality Assurance Process</h2>
                <span>Manage the timeline steps displayed in the quality assurance section</span>
            </div>
        </div>

        <div class="dashboard-filters">
            <button type="button" onclick="openCreateModal()" class="dashboard-icon-btn search" style="width: auto; padding: 0 16px; gap: 8px; text-decoration: none; border-radius: 8px; border: none; cursor: pointer;" title="Add Quality Step">
                <i class="fa-solid fa-plus"></i>
                <span style="font-size: 0.875rem; font-weight: 600;">Add Quality Step</span>
            </button>
        </div>
    </div>

    <!-- SUCCESS NOTIFICATION -->
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- TABLE SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Database Steps</h3>
                <p>Manage timeline items for your quality process</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-layer-group"></i>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; color: #334155;">
                <thead>
                    <tr style="border-bottom: 2px solid #f1f5f9; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        <th style="padding: 12px 16px;">Step ID</th>
                        <th style="padding: 12px 16px;">Title</th>
                        <th style="padding: 12px 16px;">Description</th>
                        <th style="padding: 12px 16px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($qualitySteps ?? [] as $step)
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                            <td style="padding: 12px 16px; font-weight: 600; color: #6b1d22;">
                                {{ $step->step_number }}
                            </td>
                            <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">
                                {{ $step->title }}
                            </td>
                            <td style="padding: 12px 16px; color: #64748b; max-width: 350px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $step->description }}
                            </td>
                            <td style="padding: 12px 16px; text-align: right;">
                                <button onclick='openEditModal(@json($step))' style="background: none; border: none; cursor: pointer; color: #64748b; font-size: 1rem; margin-right: 8px;" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('admin.quality.destroy', $step->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this step?');">
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
                                No quality steps found. Click "Add Quality Step" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</main>

<!-- ================= ADD / EDIT MODAL ================= -->
<div id="qualityModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 100%; max-width: 500px; border-radius: 12px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 id="modalTitle" style="margin: 0; font-size: 1.25rem; color: #0f172a;">Add Quality Step</h3>
            <button type="button" onclick="closeModal()" style="background: none; border: none; font-size: 1.25rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <form id="qualityForm" method="POST" action="{{ route('admin.quality.store') }}">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Step Number</label>
                <input type="text" name="step_number" id="step_number" required placeholder="e.g. Step 01" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Title</label>
                <input type="text" name="title" id="title" required placeholder="e.g. Meat Inspection" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description</label>
                <textarea name="description" id="description" rows="3" required placeholder="Enter step details..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;"></textarea>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeModal()" style="padding: 10px 16px; background: #f1f5f9; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; color: #334155;">Cancel</button>
                <button type="submit" style="padding: 10px 16px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Save Step</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('qualityModal');
    const form = document.getElementById('qualityForm');
    const modalTitle = document.getElementById('modalTitle');
    const formMethod = document.getElementById('formMethod');

    function openCreateModal() {
        form.action = "{{ route('admin.quality.store') }}";
        formMethod.value = "POST";
        modalTitle.innerText = "Add Quality Step";
        document.getElementById('step_number').value = '';
        document.getElementById('title').value = '';
        document.getElementById('description').value = '';
        modal.style.display = 'flex';
    }

    function openEditModal(step) {
        form.action = `/admin/quality/${step.id}`;
        formMethod.value = "PUT";
        modalTitle.innerText = "Edit Quality Step";
        document.getElementById('step_number').value = step.step_number;
        document.getElementById('title').value = step.title;
        document.getElementById('description').value = step.description;
        modal.style.display = 'flex';
    }

    function closeModal() {
        modal.style.display = 'none';
    }
</script>
