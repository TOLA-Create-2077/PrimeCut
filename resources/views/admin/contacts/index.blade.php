@include('admin.layout.sidebar')

<main class="main dashboard-main">

    <!-- HEADER / FILTER BAR -->
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-address-book"></i>
            </div>
            <div>
                <h2>Contact Submissions</h2>
                <span>Overview of customer inquiries retrieved from the database</span>
            </div>
        </div>
    </div>

    <!-- SUCCESS NOTIFICATION -->
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- CONTACTS TABLE SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Database Contacts</h3>
                <p>Managed directly from the `contacts` table</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-envelope"></i>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; color: #334155;">
                <thead>
                    <tr style="border-bottom: 2px solid #f1f5f9; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        <th style="padding: 12px 16px;">Name</th>
                        <th style="padding: 12px 16px;">Email / Phone</th>
                        <th style="padding: 12px 16px;">Company / Product</th>
                        <th style="padding: 12px 16px;">Subject & Message</th>
                        <th style="padding: 12px 16px;">Date</th>
                        <th style="padding: 12px 16px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts ?? [] as $contact)
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;">
                            <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">
                                <i class="fa-solid fa-user" style="color: #6b1d22; margin-right: 8px;"></i> {{ $contact->name }}
                            </td>
                            <td style="padding: 12px 16px;">
                                <div style="color: #0f172a;">{{ $contact->email }}</div>
                                <div style="font-size: 0.75rem; color: #64748b;">{{ $contact->phone ?? 'N/A' }}</div>
                            </td>
                            <td style="padding: 12px 16px;">
                                <div style="color: #0f172a;">{{ $contact->company ?? 'N/A' }}</div>
                                <div style="font-size: 0.75rem; color: #64748b;">{{ $contact->product ? $contact->product . ' (' . ($contact->quantity ?? '1') . ')' : '' }}</div>
                            </td>
                            <td style="padding: 12px 16px;">
                                <div style="font-weight: 600; color: #0f172a;">{{ $contact->subject }}</div>
                                <div style="color: #64748b; font-size: 0.8125rem; max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $contact->message }}">
                                    {{ $contact->message }}
                                </div>
                            </td>
                            <td style="padding: 12px 16px; font-size: 0.8125rem; color: #64748b; white-space: nowrap;">
                                {{ $contact->created_at ? $contact->created_at->format('M d, Y H:i') : 'N/A' }}
                            </td>
                            <td style="padding: 12px 16px; text-align: right;">
                                <div style="display: inline-flex; justify-content: flex-end; gap: 8px; align-items: center;">
                                    <!-- View/Details Button -->
                                    <button type="button" 
                                        onclick="openViewContactModal('{{ addslashes($contact->name) }}', '{{ addslashes($contact->email) }}', '{{ addslashes($contact->phone ?? 'N/A') }}', '{{ addslashes($contact->company ?? 'N/A') }}', '{{ addslashes($contact->product ?? 'N/A') }}', '{{ addslashes($contact->quantity ?? 'N/A') }}', '{{ addslashes($contact->subject) }}', `{{ addslashes($contact->message) }}`, '{{ $contact->created_at ? $contact->created_at->format('M d, Y H:i') : '' }}')" 
                                        style="background: #e0f2fe; color: #0369a1; border: none; padding: 6px 10px; border-radius: 6px; font-size: 0.8125rem; font-weight: 600; cursor: pointer;">
                                        <i class="fa-solid fa-eye"></i> View
                                    </button>

                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact submission?');" style="margin: 0;">
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
                            <td colspan="6" style="padding: 24px; text-align: center; color: #94a3b8; font-style: italic;">
                                No contact submissions found in database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</main>

<!-- ================= VIEW CONTACT MODAL ================= -->
<div id="viewContactModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 100%; max-width: 550px; border-radius: 12px; padding: 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.25rem; color: #0f172a;">Contact Details</h3>
            <button type="button" onclick="closeViewContactModal()" style="background: none; border: none; font-size: 1.25rem; cursor: pointer; color: #64748b;"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; font-size: 0.875rem;">
            <div>
                <span style="display: block; font-weight: 600; color: #64748b; font-size: 0.75rem; text-transform: uppercase;">Full Name</span>
                <span id="modal_name" style="color: #0f172a; font-weight: 500;"></span>
            </div>
            <div>
                <span style="display: block; font-weight: 600; color: #64748b; font-size: 0.75rem; text-transform: uppercase;">Email Address</span>
                <span id="modal_email" style="color: #0f172a; font-weight: 500;"></span>
            </div>
            <div>
                <span style="display: block; font-weight: 600; color: #64748b; font-size: 0.75rem; text-transform: uppercase;">Phone Number</span>
                <span id="modal_phone" style="color: #0f172a; font-weight: 500;"></span>
            </div>
            <div>
                <span style="display: block; font-weight: 600; color: #64748b; font-size: 0.75rem; text-transform: uppercase;">Company</span>
                <span id="modal_company" style="color: #0f172a; font-weight: 500;"></span>
            </div>
            <div>
                <span style="display: block; font-weight: 600; color: #64748b; font-size: 0.75rem; text-transform: uppercase;">Product / Quantity</span>
                <span id="modal_product_qty" style="color: #0f172a; font-weight: 500;"></span>
            </div>
            <div>
                <span style="display: block; font-weight: 600; color: #64748b; font-size: 0.75rem; text-transform: uppercase;">Submission Date</span>
                <span id="modal_date" style="color: #0f172a; font-weight: 500;"></span>
            </div>
        </div>

        <div style="margin-bottom: 16px; font-size: 0.875rem;">
            <span style="display: block; font-weight: 600; color: #64748b; font-size: 0.75rem; text-transform: uppercase; margin-bottom: 4px;">Subject</span>
            <span id="modal_subject" style="color: #0f172a; font-weight: 600;"></span>
        </div>

        <div style="margin-bottom: 24px; font-size: 0.875rem;">
            <span style="display: block; font-weight: 600; color: #64748b; font-size: 0.75rem; text-transform: uppercase; margin-bottom: 4px;">Message</span>
            <div id="modal_message" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 12px; border-radius: 6px; color: #334155; white-space: pre-wrap; line-height: 1.5;"></div>
        </div>

        <div style="display: flex; justify-content: flex-end;">
            <button type="button" onclick="closeViewContactModal()" style="padding: 10px 16px; background: #f1f5f9; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; color: #334155;">Close</button>
        </div>
    </div>
</div>

<script>
    function openViewContactModal(name, email, phone, company, product, quantity, subject, message, date) {
        document.getElementById('modal_name').textContent = name;
        document.getElementById('modal_email').textContent = email;
        document.getElementById('modal_phone').textContent = phone;
        document.getElementById('modal_company').textContent = company;
        document.getElementById('modal_product_qty').textContent = product !== 'N/A' ? `${product} (${quantity})` : 'N/A';
        document.getElementById('modal_subject').textContent = subject;
        document.getElementById('modal_message').textContent = message;
        document.getElementById('modal_date').textContent = date;

        document.getElementById('viewContactModal').style.display = 'flex';
    }

    function closeViewContactModal() {
        document.getElementById('viewContactModal').style.display = 'none';
    }
</script>