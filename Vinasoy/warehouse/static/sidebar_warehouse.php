<!-- sidebar.php -->
<ul class="sidebar-nav">
    <li class="sidebar-header">Quản lý kho</li>

    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'product_warehouse') ? 'active' : ''; ?>" id="info-item">
        <a class="sidebar-link" href="?page=product_warehouse">
            <i class="align-middle" data-feather="file-text"></i>
            <span class="align-middle">Quản lý kho sản phẩm</span>
        </a>
    </li>

    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'chamcong') ? 'active' : ''; ?>" id="chamcong-item">
        <a class="sidebar-link" href="?page=chamcong">
            <i class="align-middle" data-feather="clock"></i>
            <span class="align-middle">Quản lý nguyên liệu</span>
        </a>
    </li>
    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'position') ? 'active' : ''; ?>" id="position-item">
        <a class="sidebar-link" href="?page=position">
            <i class="align-middle" data-feather="clock"></i>
            <span class="align-middle">Phiếu nhập nguyên liệu</span>
        </a>
    </li>
    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'salaryscale') ? 'active' : ''; ?>" id="salaryscale-item">
        <a class="sidebar-link" href="?page=salaryscale">
            <i class="align-middle" data-feather="Note"></i>
            <span class="align-middle">Phiếu xuất nguyên liệu </span>
        </a>
    </li>

    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'contract') ? 'active' : ''; ?>" id="hopdong-item">
        <a class="sidebar-link" href="?page=contract">
            <i class="align-middle" data-feather="file-plus"></i>
            <span class="align-middle">Phiếu nhập sản phẩm</span>
        </a>
    </li>
    
    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'calamviec') ? 'active' : ''; ?>" id="calamviec-item">
        <a class="sidebar-link" href="?page=calamviec">
            <i class="align-middle" data-feather="calendar"></i>
            <span class="align-middle">Phiếu xuất sản phẩm</span>
        </a>
    </li>
    <li class="sidebar-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'reward') ? 'active' : ''; ?>" id="reward-item">
        <a class="sidebar-link" href="?page=reward">
            <i class="align-middle" data-feather="calendar"></i>
            <span class="align-middle">Sản phẩm bán thành phẩm</span>
        </a>
    </li>
</ul>
