<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Wisata Masa Lalu</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">W-SM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="{{route('home')}}"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'user' ? 'active' : '' }}">
                <a href="{{route('users.index')}}"
                    class="nav-link"><i class="fa-solid fa-user"></i><span>User</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'categories' ? 'active' : '' }}">
                <a href="{{route('categories.index')}}"
                    class="nav-link"><i class="fa-solid fa-list"></i><span>Categories</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'product' ? 'active' : '' }}">
                <a href="{{route('products.index')}}"
                    class="nav-link"><i class="fa-regular fa-folder-open"></i><span>Products</span></a>
            </li>
        </ul>
    </aside>
</div>
