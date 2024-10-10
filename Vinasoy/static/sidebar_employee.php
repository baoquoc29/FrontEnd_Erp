<!-- sidebar.php -->
<ul class="sidebar-nav">
    <li class="sidebar-header">Quản lý nhân viên</li>

    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'employee') ? 'active' : ''; ?>" id="info-item">
        <a class="sidebar-link" href="?page=employee">
            <i class="align-middle" data-feather="file-text"></i>
            <span class="align-middle">Quản lý thông tin</span>
        </a>
    </li>

    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'chamcong') ? 'active' : ''; ?>" id="chamcong-item">
        <a class="sidebar-link" href="?page=chamcong">
            <i class="align-middle" data-feather="clock"></i>
            <span class="align-middle">Quản lý chấm công</span>
        </a>
    </li>
    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'position') ? 'active' : ''; ?>" id="position-item">
        <a class="sidebar-link" href="?page=position">
            <i class="align-middle" data-feather="clock"></i>
            <span class="align-middle">Quản lý chức vụ</span>
        </a>
    </li>
    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'salaryscale') ? 'active' : ''; ?>" id="salaryscale-item">
        <a class="sidebar-link" href="?page=salaryscale">
            <i class="align-middle" data-feather="Note"></i>
            <span class="align-middle">Ngạch Lương </span>
        </a>
    </li>

    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'contract') ? 'active' : ''; ?>" id="hopdong-item">
        <a class="sidebar-link" href="?page=contract">
            <i class="align-middle" data-feather="file-plus"></i>
            <span class="align-middle">Quản lý hợp đồng</span>
        </a>
    </li>
    
    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'calamviec') ? 'active' : ''; ?>" id="calamviec-item">
        <a class="sidebar-link" href="?page=calamviec">
            <i class="align-middle" data-feather="calendar"></i>
            <span class="align-middle">Quản lý ca làm việc</span>
        </a>
    </li>
    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'reward') ? 'active' : ''; ?>" id="reward-item">
        <a class="sidebar-link" href="?page=reward">
            <i class="align-middle" data-feather="calendar"></i>
            <span class="align-middle">Khen thưởng kỉ luật</span>
        </a>
    </li>
</ul>
