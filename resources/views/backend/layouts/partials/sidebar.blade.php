
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
            <ul class=" {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                                <li class="{{ Route::is('author.index')  || Route::is('author.index') ? 'active' : '' }}"><a href="{{ route('author.index') }}">Authors</a></li>
                            
                        </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->