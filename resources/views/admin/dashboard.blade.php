<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard Overview</title>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Light Modern Styles -->
    <style>
        :root {
            --bg-main: #f8fafc;
            --bg-card: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --accent-blue: #2563eb;
            --accent-green: #059669;
            --accent-purple: #7c3aed;
            --accent-orange: #d97706;
            --border-color: #e2e8f0;
            --sidebar-width: 260px;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-primary);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .dashboard-main {
            padding: 2rem;
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease;
        }

        @media (max-width: 768px) {
            .dashboard-main {
                margin-left: 0;
                padding: 1rem;
            }
        }

        /* FILTER BAR */
        .dashboard-filter-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--bg-card);
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        .dashboard-filter-title {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .dashboard-title-icon {
            background: rgba(37, 99, 235, 0.1);
            color: var(--accent-blue);
            padding: 0.75rem;
            border-radius: 10px;
            font-size: 1.5rem;
        }

        .dashboard-filter-title h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .dashboard-filter-title span {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .dashboard-filters select {
            background: #ffffff;
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.875rem;
            outline: none;
            cursor: pointer;
        }

        .dashboard-filters select:focus {
            border-color: var(--accent-blue);
        }

        /* STATS GRID */
        .dashboard-section {
            margin-bottom: 2.5rem;
        }

        .dashboard-section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .dashboard-section-heading h3 {
            margin: 0 0 0.25rem 0;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .dashboard-section-heading p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        .stat-card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .stat-icon {
            padding: 0.6rem;
            border-radius: 8px;
            font-size: 1.2rem;
        }

        .stat-blue .stat-icon { background: rgba(37, 99, 235, 0.1); color: var(--accent-blue); }
        .stat-green .stat-icon { background: rgba(5, 150, 105, 0.1); color: var(--accent-green); }
        .stat-purple .stat-icon { background: rgba(124, 58, 237, 0.1); color: var(--accent-purple); }
        .stat-orange .stat-icon { background: rgba(217, 119, 6, 0.1); color: var(--accent-orange); }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .stat-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            color: var(--text-secondary);
            border-top: 1px solid var(--border-color);
            padding-top: 0.75rem;
        }

        /* RECENT TABLES */
        .table-container {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .admin-table th, .admin-table td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .admin-table th {
            background: #f8fafc;
            color: var(--text-secondary);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }

        .admin-table td {
            font-size: 0.875rem;
            color: var(--text-primary);
        }

        .admin-table tr:last-child td {
            border-bottom: none;
        }

        .admin-table tr:hover {
            background-color: #f8fafc;
        }
    </style>
</head>
<body>

{{-- Include the Sidebar from the admin folder --}}
@include('admin.layout.sidebar')

<main class="main dashboard-main">

    <!-- FILTER BAR -->
    <div class="dashboard-filter-bar">
        <div class="dashboard-filter-title">
            <div class="dashboard-title-icon">
                <i class="fa-solid fa-chart-line"></i>
            </div>
            <div>
                <h2>Dashboard Overview</h2> 
                <span>Monitor products, categories, and system users</span>
            </div>
        </div>
    </div>

    <!-- STATISTICS CARDS SECTION -->
    <section class="dashboard-section">
        <div class="stats-grid">
            <!-- Total Products -->
            <div class="stat-card stat-blue">
                <div class="stat-card-top">
                    <div class="stat-label">Total Products</div>
                    <div class="stat-icon">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                </div>
                <div class="stat-value">
                    {{ $totalProducts ?? 3 }}
                </div>
                <div class="stat-footer">
                    <span>Available Items</span>
                    <i class="fa-solid fa-arrow-trend-up" style="color: var(--accent-blue);"></i>
                </div>
            </div>

            <!-- Total Categories -->
            <div class="stat-card stat-green">
                <div class="stat-card-top">
                    <div class="stat-label">Total Categories</div>
                    <div class="stat-icon">
                        <i class="fa-solid fa-tags"></i>
                    </div>
                </div>
                <div class="stat-value">
                    {{ $totalCategories ?? 0 }}
                </div>
                <div class="stat-footer">
                    <span>Product Groups</span>
                    <i class="fa-solid fa-folder-open" style="color: var(--accent-green);"></i>
                </div>
            </div>

            <!-- Total Users -->
            <div class="stat-card stat-purple">
                <div class="stat-card-top">
                    <div class="stat-label">Total Users</div>
                    <div class="stat-icon">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                </div>
                <div class="stat-value">
                    {{ $totalUsers ?? 2 }}
                </div>
                <div class="stat-footer">
                    <span>Registered Accounts</span>
                    <i class="fa-solid fa-user-check" style="color: var(--accent-purple);"></i>
                </div>
            </div>

            <!-- System Status -->
            <div class="stat-card stat-orange">
                <div class="stat-card-top">
                    <div class="stat-label">System Status</div>
                    <div class="stat-icon">
                        <i class="fa-solid fa-server"></i>
                    </div>
                </div>
                <div class="stat-value" style="font-size: 1.5rem; padding-top: 5px;">
                    Active
                </div>
                <div class="stat-footer">
                    <span>Database & Services</span>
                    <i class="fa-solid fa-circle-check" style="color: var(--accent-green);"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- RECENT PRODUCTS SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Recent Products</h3>
                <p>Latest products added to the system</p>
            </div>
        </div>
        <div class="table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Grade / Category</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentProducts ?? [] as $product)
                        <tr>
                            <td>#{{ $product->id }}</td>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td>{{ $product->grade ?? 'N/A' }}</td>
                            <td>{{ $product->created_at ? $product->created_at->format('d M Y') : 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: var(--text-secondary);">No recent products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- RECENT USERS SECTION -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Recent Users</h3>
                <p>Latest registered accounts in the system</p>
            </div>
        </div>
        <div class="table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentUsers ?? [] as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: var(--text-secondary);">No recent users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</main>
</body>
</html>