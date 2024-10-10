<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/icons/vinalogo.jfif" />
    <title>Quản lý khách hàng - Vinasoy</title>
    <link href="../static/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    body {
        background-color: #f8f9fa;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: auto;
    }

    th,
    td {
        text-align: center;
        vertical-align: middle;
        padding: 15px;
        min-width: 150px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .modal-dialog {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: calc(100% - 1rem);
    }

    .modal-content {
        max-width: 600px;
        width: 100%;
    }

    .pagination {
        margin-top: 20px;
    }

    .page-link {
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .page-link:hover {
        color: #0056b3;
        text-decoration: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: auto;
        background-color: #fff;
        border-color: #dee2e6;
    }

    /* Cập nhật style cho form tìm kiếm */
    #advancedSearchForm .form-control {
        width: 100%;
        min-width: 0;
        height: 34px;
        font-size: 13px;
        padding: 0.25rem 0.5rem;
    }

    #advancedSearchForm .btn {
        height: 34px;
        font-size: 13px;
        padding: 0.25rem 0.5rem;
        white-space: nowrap;
    }

    #advancedSearchForm .row {
        display: flex;
        flex-wrap: nowrap;
        margin-right: -5px;
        margin-left: -5px;
    }

    #advancedSearchForm .col-auto {
        flex: 1;
        padding-right: 5px;
        padding-left: 5px;
        min-width: 0;
    }

    #advancedSearchForm .col-auto:last-child,
    #advancedSearchForm .col-auto:nth-last-child(2) {
        flex: 0 0 auto;
    }

    @media (max-width: 1200px) {
        #advancedSearchForm .row {
            flex-wrap: wrap;
        }

        #advancedSearchForm .col-auto {
            flex: 0 0 calc(50% - 10px);
            margin-bottom: 10px;
        }

        #advancedSearchForm .col-auto:last-child,
        #advancedSearchForm .col-auto:nth-last-child(2) {
            flex: 0 0 calc(50% - 10px);
        }
    }

    @media (max-width: 768px) {
        #advancedSearchForm .col-auto {
            flex: 0 0 100%;
        }

        #advancedSearchForm .col-auto:last-child,
        #advancedSearchForm .col-auto:nth-last-child(2) {
            flex: 0 0 100%;
        }
    }

    
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    th, td {
        text-align: left;
        padding: 12px 15px;
        border-bottom: 1px solid #e0e0e0;
    }

    th {
        background-color: #f8f9fa;
        font-weight: bold;
        white-space: nowrap;
    }

    td {
        vertical-align: middle;
    }

    /* Định nghĩa chiều rộng cụ thể cho từng cột */
    th:nth-child(1), td:nth-child(1) { width: 10%; } /* Mã KH */
    th:nth-child(2), td:nth-child(2) { width: 20%; } /* Tên đầy đủ */
    th:nth-child(3), td:nth-child(3) { width: 20%; } /* Email */
    th:nth-child(4), td:nth-child(4) { width: 15%; } /* Số điện thoại */
    th:nth-child(5), td:nth-child(5) { width: 25%; } /* Địa chỉ */
    th:nth-child(6), td:nth-child(6) { width: 10%; text-align: center; } /* Hành động */

    /* Xử lý overflow cho nội dung dài */
    td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 0;
    }

    /* Style cho nút hành động */
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .action-buttons button {
        padding: 5px 10px;
        font-size: 12px;
    }
</style>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Vinasoy</span>
                </a>
                <?php include("nav-bar.php") ?>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3">Quản lý khách hàng</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tìm kiếm nâng cao</h5>
                                </div>
                                <div class="card-body">
                                    <form id="advancedSearchForm">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="searchCustomerId" placeholder="Mã KH">
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="searchFullName" placeholder="Tên KH">
                                            </div>
                                            <div class="col-auto">
                                                <input type="email" class="form-control" id="searchEmail" placeholder="Email">
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="searchPhoneNumber" placeholder="Số điện thoại">
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control" id="searchAddress" placeholder="Địa chỉ">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                            </div>
                                            <div class="col-auto">
                                                <button type="reset" class="btn btn-secondary">Đặt lại</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Danh sách khách hàng</h5>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" onclick="openAddCustomerModal()">
                                        <i class="fas fa-plus"></i> Thêm Khách hàng
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Mã Khách hàng</th>
                                                <th>Họ và tên</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Địa chỉ</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customerTableBody">
                                            <!-- Dữ liệu khách hàng sẽ được chèn vào đây -->
                                        </tbody>
                                    </table>

                                    <!-- Phân trang -->
                                    <!-- <ul id="pagination" class="pagination"></ul> -->

                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item" id="prevPageItem">
                                                <a class="page-link" href="#" id="prevPage" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" id="currentPage"></a>
                                            </li>
                                            <li class="page-item" id="nextPageItem">
                                                <a class="page-link" href="#" id="nextPage" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0"><strong>Vinasoy</strong> &copy;</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal Thêm/Sửa Khách Hàng -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Thêm Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="customerForm">
                        <div class="mb-3">
                            <label for="customerId" class="form-label">Mã KH</label>
                            <input type="text" class="form-control" id="customerId" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Tên đầy đủ</label>
                            <input type="text" class="form-control" id="customerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="customerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="customerEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="customerPhone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="customerPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="customerAddress" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="customerAddress" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="saveCustomerBtn">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal xác nhận xóa khách hàng -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa khách hàng này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let isEditing = false;
        let editingCustomerId = null;
        let customerIdToDelete = null;
        let currentPage = 0;
        let totalPages = 0;

        document.addEventListener('DOMContentLoaded', function() {
            fetchCustomers(0);

            document.getElementById('prevPage').addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage > 0) {
                    fetchCustomers(--currentPage);
                }
            });

            document.getElementById('nextPage').addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage < totalPages - 1) {
                    fetchCustomers(++currentPage);
                }
            });

            document.getElementById('advancedSearchForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const searchData = {
                    customerId: document.getElementById('searchCustomerId').value,
                    fullName: document.getElementById('searchFullName').value,
                    email: document.getElementById('searchEmail').value,
                    phoneNumber: document.getElementById('searchPhoneNumber').value,
                    address: document.getElementById('searchAddress').value
                };
                console.log('Dữ liệu tìm kiếm:', searchData);
           
                // TODO: Implement search API call
            });
        });

        function updatePagination(currentPage, totalPages) {
            document.getElementById('currentPage').textContent = `Trang ${currentPage + 1} / ${totalPages}`;
            const prevPageItem = document.getElementById('prevPageItem');
            const nextPageItem = document.getElementById('nextPageItem');
            prevPageItem.classList.toggle('disabled', currentPage === 0);
            nextPageItem.classList.toggle('disabled', currentPage === totalPages - 1);
        }

        function fetchCustomers(page) {
            fetch(`http://localhost:8082/api/v1/customers/page?pageSize=10&pageNo=${page}&sortBy=customerId`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('API response:', data);
                    if (data.success && data.code === 200 && data.data && data.data.items) {
                        const customers = data.data.items;
                        totalPages = data.data.totalPage;
                        const tableBody = document.getElementById('customerTableBody');
                        tableBody.innerHTML = '';  
                        customers.forEach(customer => {
                            const row = `<tr>
                            <td>${customer.customerId || ''}</td>
                            <td>${customer.fullName || ''}</td>
                            <td>${customer.email || ''}</td>
                            <td>${customer.phoneNumber || ''}</td>
                            <td>${customer.address || ''}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="openEditCustomerModal('${customer.customerId}')">Sửa</button>
                                <button class="btn btn-sm btn-danger" onclick="prepareDeleteCustomer('${customer.customerId}')">Xóa</button>
                            </td>
                        </tr>`;
                            tableBody.innerHTML += row;
                        });
                        updatePagination(data.data.pageNo, totalPages);
                    } else {
                        console.error('Invalid data structure:', data);
                        alert('Không thể tải dữ liệu khách hàng. Vui lòng thử lại sau.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function openAddCustomerModal() {
            isEditing = false;
            editingCustomerId = null;
            document.getElementById('customerForm').reset();
            document.getElementById('customerId').value = '';
            document.getElementById('customerModalLabel').textContent = 'Thêm Khách Hàng';
            const customerModal = new bootstrap.Modal(document.getElementById('customerModal'));
            customerModal.show();
        }

        function openEditCustomerModal(customerId) {
            isEditing = true;
            editingCustomerId = customerId;
            document.getElementById('customerModalLabel').textContent = 'Sửa Khách Hàng';
            fetch(`http://localhost:8082/api/v1/customers/${customerId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.code === 200) {
                        const customer = data.data;
                        document.getElementById('customerId').value = customer.customerId;
                        document.getElementById('customerName').value = customer.fullName;
                        document.getElementById('customerEmail').value = customer.email;
                        document.getElementById('customerPhone').value = customer.phoneNumber;
                        document.getElementById('customerAddress').value = customer.address;
                        const customerModal = new bootstrap.Modal(document.getElementById('customerModal'));
                        customerModal.show();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        document.getElementById('saveCustomerBtn').addEventListener('click', function() {
            if (isEditing) {
                updateCustomer(editingCustomerId);
            } else {
                addCustomer();
            }
        });

        function addCustomer() {
            const fullName = document.getElementById('customerName').value;
            const email = document.getElementById('customerEmail').value;
            const phoneNumber = document.getElementById('customerPhone').value;
            const address = document.getElementById('customerAddress').value;
            fetch('http://localhost:8082/api/v1/customers', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        fullName,
                        email,
                        phoneNumber,
                        address
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchCustomers(currentPage);
                        const customerModal = bootstrap.Modal.getInstance(document.getElementById('customerModal'));
                        customerModal.hide();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function updateCustomer(customerId) {
            const fullName = document.getElementById('customerName').value;
            const email = document.getElementById('customerEmail').value;
            const phoneNumber = document.getElementById('customerPhone').value;
            const address = document.getElementById('customerAddress').value;
            fetch(`http://localhost:8082/api/v1/customers/${customerId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        fullName,
                        email,
                        phoneNumber,
                        address
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchCustomers(currentPage);
                        const customerModal = bootstrap.Modal.getInstance(document.getElementById('customerModal'));
                        customerModal.hide();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function prepareDeleteCustomer(customerId) {
            customerIdToDelete = customerId;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            deleteCustomer(customerIdToDelete);
        });

        function deleteCustomer(customerId) {
            fetch(`http://localhost:8082/api/v1/customers/${customerId}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchCustomers(currentPage);
                        const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmationModal'));
                        deleteModal.hide();
                    }
                })
                .catch(error => console.error('Error:', error));
        }
        document.getElementById('advancedSearchForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định của biểu mẫu
            const searchData = {
                customerId: document.getElementById('searchCustomerId').value,
                fullName: document.getElementById('searchFullName').value,
                email: document.getElementById('searchEmail').value,
                phoneNumber: document.getElementById('searchPhoneNumber').value,
                address: document.getElementById('searchAddress').value,
                pageNo: currentPage, // Sử dụng trang hiện tại
                pageSize: 15, // Kích thước trang cho tìm kiếm
                sort: 'fullName,asc,email,desc' // Sắp xếp theo tên và email
            };

            console.log('Dữ liệu tìm kiếm:', searchData);

            // Gọi API tìm kiếm với các tham số
            fetch(`http://localhost:8082/api/v1/customers/search?fullName=${encodeURIComponent(searchData.fullName)}&email=${encodeURIComponent(searchData.email)}&pageSize=${searchData.pageSize}&pageNo=${searchData.pageNo}&sort=${searchData.sort}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('API response:', data);
                    if (data.success && data.code === 200 && data.data && data.data.items) {
                        const customers = data.data.items;
                        totalPages = data.data.totalPage;
                        const tableBody = document.getElementById('customerTableBody');
                        tableBody.innerHTML = ''; // Xóa nội dung bảng hiện tại
                        customers.forEach(customer => {
                            const row = `<tr>
                        <td>${customer.customerID || ''}</td>
                        <td>${customer.fullName || ''}</td>
                        <td>${customer.email || ''}</td>
                        <td>${customer.phoneNumber || ''}</td>
                        <td>${customer.address || ''}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="openEditCustomerModal('${customer.customerID}')">Sửa</button>
                            <button class="btn btn-sm btn-danger" onclick="prepareDeleteCustomer('${customer.customerID}')">Xóa</button>
                        </td>
                    </tr>`;
                            tableBody.innerHTML += row; // Thêm dòng mới vào bảng
                        });
                        updatePagination(currentPage, totalPages); // Cập nhật phân trang
                    } else {
                        console.error('Invalid data structure:', data);
                        alert('Không thể tải dữ liệu khách hàng. Vui lòng thử lại sau.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>