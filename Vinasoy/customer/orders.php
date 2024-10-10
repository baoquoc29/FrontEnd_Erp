<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/icons/vinalogo.jfif" />
    <title>Quản lý Chi tiết đơn hàng - Vinasoy</title>
    <link href="../static/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        margin: 0;
    }

    .modal-open {
        overflow: hidden;
    }

    .modal-dialog {
        margin: auto;
    }

    .modal-content {
        max-width: 600px;
        width: 100%;
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
    th:nth-child(1), td:nth-child(1) { width: 10%; } /* Mã đơn hàng */
    th:nth-child(2), td:nth-child(2) { width: 15%; } /* Mã khách hàng */
    th:nth-child(3), td:nth-child(3) { width: 15%; } /* Ngày đặt hàng */
    th:nth-child(4), td:nth-child(4) { width: 15%; } /* Tổng tiền */
    th:nth-child(5), td:nth-child(5) { width: 15%; } /* Trạng thái */
    th:nth-child(6), td:nth-child(6) { width: 30%; text-align: center; } /* Hành động */

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

    /* Các style khác giữ nguyên */
    .modal-dialog {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: calc(100% - 1rem);
        margin: 0;
    }

    .modal-open {
        overflow: hidden;
    }

    .modal-dialog {
        margin: auto;
    }

    .modal-content {
        max-width: 600px;
        width: 100%;
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
                    <h1 class="h3 mb-3">Quản lý Chi tiết đơn hàng</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Danh sách Chi tiết đơn hàng</h5>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" onclick="openAddOrderDetailModal()">
                                        <i class="fas fa-plus"></i> Thêm Chi tiết đơn hàng
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Mã Chi tiết đơn hàng</th>
                                                <th>Mã đơn hàng</th>
                                                <th>Mã sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Tổng giá</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody id="orderDetailTableBody">
                                        </tbody>
                                    </table>
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

    <!-- Modal Thêm/Sửa Chi tiết đơn hàng -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailModalLabel">Thêm Chi tiết đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="orderDetailForm">
                        <div class="mb-3">
                            <label for="orderDetailId" class="form-label">Mã Chi tiết đơn hàng</label>
                            <input type="text" class="form-control" id="orderDetailId" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="orderId" class="form-label">Mã đơn hàng</label>
                            <input type="text" class="form-control" id="orderId" required>
                        </div>
                        <div class="mb-3">
                            <label for="productId" class="form-label">Mã sản phẩm</label>
                            <input type="text" class="form-control" id="productId" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="unitPrice" class="form-label">Đơn giá</label>
                            <input type="number" step="0.01" class="form-control" id="unitPrice" required>
                        </div>
                        <div class="mb-3">
                            <label for="totalPrice" class="form-label">Tổng giá</label>
                            <input type="number" step="0.01" class="form-control" id="totalPrice" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="saveOrderDetailBtn">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal xác nhận xóa chi tiết đơn hàng -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa chi tiết đơn hàng này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let isEditing = false;
        let editingOrderDetailId = null;
        let orderDetailIdToDelete = null;

        document.addEventListener('DOMContentLoaded', function() {
            fetchOrderDetails();
        });

        function fetchOrderDetails() {
            fetch('http://localhost:8082/api/v1/orderDetail')
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.code === 200) {
                        const orderDetails = data.data;
                        const tableBody = document.getElementById('orderDetailTableBody');
                        tableBody.innerHTML = '';

                        orderDetails.forEach(orderDetail => {
                            const row = `<tr>
                                    <td>${orderDetail.orderDetailId}</td>
                                    <td>${orderDetail.orderId}</td>
                                    <td>${orderDetail.productId}</td>
                                    <td>${orderDetail.quantity}</td>
                                    <td>${orderDetail.unitPrice.toFixed(2)}</td>
                                    <td>${orderDetail.totalPrice.toFixed(2)}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="openEditOrderDetailModal('${orderDetail.orderDetailId}')">Sửa</button>
                                        <button class="btn btn-sm btn-danger" onclick="prepareDeleteOrderDetail('${orderDetail.orderDetailId}')">Xóa</button>
                                    </td>
                                </tr>`;
                            tableBody.innerHTML += row;
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function openAddOrderDetailModal() {
            isEditing = false;
            editingOrderDetailId = null;
            document.getElementById('orderDetailForm').reset();
            document.getElementById('orderDetailId').value = '';
            document.getElementById('orderDetailModalLabel').textContent = 'Thêm Chi tiết đơn hàng';
            var orderDetailModal = new bootstrap.Modal(document.getElementById('orderDetailModal'));
            orderDetailModal.show();
        }

        function openEditOrderDetailModal(orderDetailId) {
            isEditing = true;
            editingOrderDetailId = orderDetailId;
            document.getElementById('orderDetailModalLabel').textContent = 'Sửa Chi tiết đơn hàng';

            fetch(`http://localhost:8082/api/v1/orderDetail/${orderDetailId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.code === 200) {
                        const orderDetail = data.data;
                        document.getElementById('orderDetailId').value = orderDetail.orderDetailId;
                        document.getElementById('orderId').value = orderDetail.orderId;
                        document.getElementById('productId').value = orderDetail.productId;
                        document.getElementById('quantity').value = orderDetail.quantity;
                        document.getElementById('unitPrice').value = orderDetail.unitPrice.toFixed(2);
                        document.getElementById('totalPrice').value = orderDetail.totalPrice.toFixed(2);

                        var orderDetailModal = new bootstrap.Modal(document.getElementById('orderDetailModal'));
                        orderDetailModal.show();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        document.getElementById('saveOrderDetailBtn').addEventListener('click', function() {
            if (isEditing) {
                updateOrderDetail(editingOrderDetailId);
            } else {
                addOrderDetail();
            }
        });

        function addOrderDetail() {
            const orderId = document.getElementById('orderId').value;
            const productId = document.getElementById('productId').value;
            const quantity = parseInt(document.getElementById('quantity').value);
            const unitPrice = parseFloat(document.getElementById('unitPrice').value);
            const totalPrice = parseFloat(document.getElementById('totalPrice').value);

            fetch('http://localhost:8082/api/v1/orderDetail', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        orderId,
                        productId,
                        quantity,
                        unitPrice,
                        totalPrice
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchOrderDetails();
                        var orderDetailModal = bootstrap.Modal.getInstance(document.getElementById('orderDetailModal'));
                        orderDetailModal.hide();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function updateOrderDetail(orderDetailId) {
            const orderId = document.getElementById('orderId').value;
            const productId = document.getElementById('productId').value;
            const quantity = parseInt(document.getElementById('quantity').value);
            const unitPrice = parseFloat(document.getElementById('unitPrice').value);
            const totalPrice = parseFloat(document.getElementById('totalPrice').value);

            fetch(`http://localhost:8082/api/v1/orderDetail/${orderDetailId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        orderId,
                        productId,
                        quantity,
                        unitPrice,
                        totalPrice
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchOrderDetails();
                        var orderDetailModal = bootstrap.Modal.getInstance(document.getElementById('orderDetailModal'));
                        orderDetailModal.hide();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function prepareDeleteOrderDetail(orderDetailId) {
            orderDetailIdToDelete = orderDetailId;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            deleteOrderDetail(orderDetailIdToDelete);
        });

        function deleteOrderDetail(orderDetailId) {
            fetch(`http://localhost:8082/api/v1/orderDetail/${orderDetailId}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchOrderDetails();
                        var deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmationModal'));
                        deleteModal.hide();
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>