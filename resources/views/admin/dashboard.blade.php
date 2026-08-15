<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


</head>

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
                <span>Monitor products and system users</span>
            </div>
        </div>

        <form action="{{ url()->current() }}" method="GET" class="dashboard-filters" id="dashboardFilterForm">
      

            
       
        </form>
    </div>

    <!-- PRODUCTS STATISTICS -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Products Statistics</h3>
                <p>Overview of system products</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-box-open"></i>
            </div>
        </div>

        <div class="stats-grid">
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
                    <i class="fa-solid fa-arrow-trend-up"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- USERS STATISTICS -->
    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Users & System Accounts</h3>
                <p>Current registered system users</p>
            </div>
            <div class="dashboard-section-icon">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>

        <div class="stats-grid user-stats-grid">
            <div class="stat-card stat-user-blue">
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
                    <i class="fa-solid fa-user-check"></i>
                </div>
            </div>
        </div>
    </section>

</main>