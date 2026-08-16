<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Cuts Admin</title>

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Sidebar & Dashboard Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <style>
        body {
            background-color: #f8fafc;
            color: #0f172a;
            margin: 0;
            font-family: ui-sans-serif, system-ui, sans-serif;
        }
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    {{-- Sidebar Component --}}
    <aside class="sidebar" id="appSidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('images/primecutlogo.jpg') }}" alt="Prime Cut Logo" class="sidebar-logo-img">
                <span>Prime Cuts</span>
            </div>
            <button class="sidebar-close-btn" id="sidebarCloseBtn">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="sidebar-menu-container">
            <ul class="sidebar-menu">
                <li class="sidebar-menu-header">Main Menu</li>
                
                <li class="sidebar-item">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

          
                <li class="sidebar-item">
                    <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                        <i class="fa-solid fa-tags"></i>
                        <span>Categories</span>
                    </a>
                </li>

              
                <li class="sidebar-item">
                    <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                        <i class="fa-solid fa-box-open"></i>
                        <span>Products</span>
                    </a>
                </li>

      
                <li class="sidebar-menu-header">Website Content</li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.home.index') }}" class="sidebar-link {{ request()->routeIs('admin.home*') ? 'active' : '' }}">
                        <i class="fa-solid fa-globe"></i>
                        <span>Homepage</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.features.index') }}" class="sidebar-link {{ request()->routeIs('admin.features*') ? 'active' : '' }}">
                        <i class="fa-solid fa-bars-staggered"></i>
                        <span>Feature Bar</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.about.index') }}" class="sidebar-link {{ request()->routeIs('admin.about*') ? 'active' : '' }}">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>About Section</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.advantages.index') }}" class="sidebar-link {{ request()->routeIs('admin.advantages*') ? 'active' : '' }}">
                        <i class="fa-solid fa-star"></i>
                        <span>Why Choose Us</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.solutions.index') }}" class="sidebar-link {{ request()->routeIs('admin.solutions*') ? 'active' : '' }}">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>Business Solutions</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.quality.index') }}" class="sidebar-link {{ request()->routeIs('admin.quality*') ? 'active' : '' }}">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Quality Process</span>
                    </a>
                </li>

                <li class="sidebar-menu-header">System Settings</li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                        <i class="fa-solid fa-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users"></i>
                        <span>User Management</span>
                    </a>
                </li>

               
            </ul>
        </div>

        {{-- Admin Profile & Dropdown Footer --}}
        <div class="p-3 border-t border-slate-100 bg-white relative">
            <div class="relative">
                <button id="profileDropdownBtn" class="flex items-center gap-3 w-full p-2 rounded-lg hover:bg-[#fdf2f2] transition focus:outline-none">
                    <div class="w-9 h-9 rounded-full bg-[#f9e8e9] border border-[#f9e8e9] flex items-center justify-center text-[#6b1d22] font-bold overflow-hidden shrink-0">
                        @if(auth()->check() && (auth()->user()->avatar ?? false))
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                        @else
                            <span>{{ auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 1)) : 'A' }}</span>
                        @endif
                    </div>
                    <div class="text-left overflow-hidden flex-1">
                        <p class="text-xs font-semibold text-slate-800 truncate leading-tight">
                            {{ auth()->check() ? auth()->user()->name : 'Administrator' }}
                        </p>
                        <p class="text-[0.6rem] font-mono text-slate-400 uppercase tracking-wider">System Admin</p>
                    </div>
                    <i class="fa-solid fa-chevron-up text-[10px] text-slate-400"></i>
                </button>

                <!-- Dropdown Menu Box -->
                <div id="profileDropdownMenu" class="hidden absolute bottom-full left-0 mb-2 w-full bg-white border border-slate-200 rounded-lg shadow-xl py-1 z-50">
                    <button type="button" onclick="openModal('editProfileModal')" class="w-full flex items-center gap-2 px-4 py-2 text-xs font-medium text-slate-600 hover:bg-[#fdf2f2] hover:text-[#6b1d22] transition text-left">
                        <i class="fa-solid fa-user-pen text-[11px] text-[#6b1d22]"></i>
                        <span>Edit Profile</span>
                    </button>
                    
                    <button type="button" onclick="openModal('changePasswordModal')" class="w-full flex items-center gap-2 px-4 py-2 text-xs font-medium text-slate-600 hover:bg-[#fdf2f2] hover:text-[#6b1d22] transition text-left">
                        <i class="fa-solid fa-key text-[11px] text-[#6b1d22]"></i>
                        <span>Change Password</span>
                    </button>

                    <div class="border-t border-slate-100 my-1"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-xs font-medium text-red-600 hover:bg-red-50 transition text-left">
                            <i class="fa-solid fa-right-from-bracket text-[11px]"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>


    <!-- ========================================== -->
    <!-- POPUP MODALS SECTION (Higher z-index & Blur)-->
    <!-- ========================================== -->

    <!-- Backdrop Overlay (បាំងនិង Blur ទាំង Screen រួមទាំង Sidebar) -->
    <div id="modalBackdrop" class="hidden fixed inset-0 z-[9998] bg-slate-950/40 backdrop-blur-sm transition-opacity"></div>

    <!-- 1. Edit Profile Modal -->
    <div id="editProfileModal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all border border-slate-100">
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-[#f9e8e9]">
                <h3 class="text-sm font-bold text-[#6b1d22] uppercase tracking-wide">Edit Profile</h3>
                <button type="button" onclick="closeModal('editProfileModal')" class="text-slate-400 hover:text-[#6b1d22]">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            
            <!-- Form Update Profile -->
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                @method('PATCH')
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Full Name</label>
                    <input type="text" name="name" value="{{ auth()->user()->name ?? '' }}" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-[#6b1d22]" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Email Address</label>
                    <input type="email" name="email" value="{{ auth()->user()->email ?? '' }}" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-[#6b1d22]" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Profile Avatar</label>
                    <input type="file" name="avatar" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#f9e8e9] file:text-[#6b1d22] hover:file:bg-[#fdf2f2]">
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal('editProfileModal')" class="px-4 py-2 text-xs font-medium text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-xs font-medium text-white bg-[#6b1d22] rounded-lg hover:bg-[#58171c]">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 2. Change Password Modal -->
    <div id="changePasswordModal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all border border-slate-100">
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-[#f9e8e9]">
                <h3 class="text-sm font-bold text-[#6b1d22] uppercase tracking-wide">Change Password</h3>
                <button type="button" onclick="closeModal('changePasswordModal')" class="text-slate-400 hover:text-[#6b1d22]">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Form Change Password -->
            <form action="{{ route('admin.profile.password') }}" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PATCH')
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Current Password</label>
                    <input type="password" name="current_password" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-[#6b1d22]" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">New Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-[#6b1d22]" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-[#6b1d22]" required>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal('changePasswordModal')" class="px-4 py-2 text-xs font-medium text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-xs font-medium text-white bg-[#6b1d22] rounded-lg hover:bg-[#58171c]">Update Password</button>
                </div>
            </form>
        </div>
    </div>

    {{-- JavaScript for Dropdown, Backdrop Blur & Modals --}}
    <script>
        const dropdownBtn = document.getElementById("profileDropdownBtn");
        const dropdownMenu = document.getElementById("profileDropdownMenu");
        const backdrop = document.getElementById("modalBackdrop");

        // Toggle Profile Dropdown
        dropdownBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle("hidden");
        });

        // Close Dropdown on outside click
        document.addEventListener("click", function (e) {
            if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });

        // Open Popup Modal & Show Blur Backdrop
        function openModal(modalId) {
            dropdownMenu.classList.add("hidden"); // Close dropdown
            backdrop.classList.remove("hidden"); // Show blur background
            document.getElementById(modalId).classList.remove("hidden"); // Show modal
        }

        // Close Popup Modal & Hide Blur Backdrop
        function closeModal(modalId) {
            backdrop.classList.add("hidden"); // Hide blur background
            document.getElementById(modalId).classList.add("hidden"); // Hide modal
        }
    </script>
</body>
</html>