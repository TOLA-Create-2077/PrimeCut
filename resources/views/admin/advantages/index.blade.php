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
    </div>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 0.875rem;">
            <i class="fa-solid fa-check-circle" style="margin-right: 6px;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Add New Card Form -->
    <section class="dashboard-section" style="background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); margin-bottom: 30px;">
        <h3 style="font-size: 1.1rem; margin-bottom: 16px; color: #1e293b;">Add New Advantage Card</h3>
        <form action="{{ route('admin.advantages.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Card Title</label>
                    <input type="text" name="title" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Sort Order</label>
                    <input type="number" name="sort_order" value="0" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
                </div>
            </div>
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">SVG Icon Markup (<svg>...</svg>)</label>
                <textarea name="icon_svg" rows="3" placeholder='<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="..."/></svg>' style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; font-family: monospace;"></textarea>
            </div>
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 6px; color: #334155;">Description</label>
                <textarea name="description" rows="2" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;"></textarea>
            </div>
            <button type="submit" style="padding: 10px 20px; background: #6b1d22; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">Add Card</button>
        </form>
    </section>

    <!-- Existing Cards List -->
    <section class="dashboard-section" style="background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
        <h3 style="font-size: 1.1rem; margin-bottom: 16px; color: #1e293b;">Existing Advantage Cards</h3>
        <div style="display: flex; flex-direction: column; gap: 16px;">
            @foreach($advantages as $adv)
                <div style="border: 1px solid #e2e8f0; padding: 16px; border-radius: 8px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; gap: 16px; align-items: center;">
                        <div style="background: #f8fafc; padding: 10px; border-radius: 6px; border: 1px solid #cbd5e1;">
                            {!! $adv->icon_svg !!}
                        </div>
                        <div>
                            <h4 style="font-size: 1rem; color: #0f172a; margin-bottom: 4px;">{{ $adv->title }} (Order: {{ $adv->sort_order }})</h4>
                            <p style="font-size: 0.85rem; color: #64748b;">{{ $adv->description }}</p>
                        </div>
                    </div>
                    <form action="{{ route('admin.advantages.destroy', $adv->id) }}" method="POST" onsubmit="return confirm('Delete this card?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #fee2e2; color: #991b1b; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer; font-size: 0.85rem;"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
</main>