<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">
        <i class="bi bi-receipt-cutoff me-2"></i> Orders
    </h2>
    <div>
        <a href="#" class="btn btn-outline-secondary btn-sm me-2">
            <i class="bi bi-download me-1"></i> Export
        </a>
        <a href="#" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> New Order
        </a>
    </div>
</div>

<div class="card shadow-lg border-0 rounded-3">
    <div class="card-body">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-list-check me-2"></i> Order List
        </h5>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>ORD-0001</strong></td>
                        <td>John Doe</td>
                        <td>
                            <span class="badge bg-info text-dark px-3 py-2 rounded-pill">
                                <i class="bi bi-hourglass-split me-1"></i> Processing
                            </span>
                        </td>
                        <td><strong>$12.50</strong></td>
                        <td>2025-09-18</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square"></i> Update
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>ORD-0002</strong></td>
                        <td>Jane Smith</td>
                        <td>
                            <span class="badge bg-success px-3 py-2 rounded-pill">
                                <i class="bi bi-check-circle me-1"></i> Completed
                            </span>
                        </td>
                        <td><strong>$18.00</strong></td>
                        <td>2025-09-17</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>ORD-0003</strong></td>
                        <td>Michael Reyes</td>
                        <td>
                            <span class="badge bg-danger px-3 py-2 rounded-pill">
                                <i class="bi bi-x-circle me-1"></i> Cancelled
                            </span>
                        </td>
                        <td><strong>$9.75</strong></td>
                        <td>2025-09-15</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .table th {
        font-weight: 600;
    }
    .badge {
        font-size: 0.85rem;
    }
</style>

<?= $this->endSection() ?>
