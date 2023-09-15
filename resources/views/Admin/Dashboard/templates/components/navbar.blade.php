<div class="container_navbar">
    <div class="content">
        <div class="auth_user">
            <img src="/assets/icons/admin.png" alt="">
            <div>{{ auth()->user()->username }}</div>
        </div>
        <a href="/admin/logout" class="action-logout">
            <span>Logout</span>
        </a>
    </div>
</div>


