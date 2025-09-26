<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">
        <i class="bi bi-receipt-cutoff me-2"></i> Orders
    </h2>
    <div>
        <a href="<?= site_url('barcode/scan') ?>" class="btn btn-outline-secondary btn-sm me-2">
            <i class="bi bi-qr-code me-1"></i> Scan Barcode
        </a>
        <a href="#" class="btn btn-outline-secondary btn-sm me-2">
            <i class="bi bi-download me-1"></i> Export
        </a>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

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
                        <th>Due Date</th>
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><strong>ORD-<?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?></strong></td>
                            <td><?= esc($order['username']) ?></td>
                            <td>
                                <?php
                                $statusClasses = [
                                    'pending' => 'bg-warning text-dark',
                                    'washing' => 'bg-info text-dark', 
                                    'ready' => 'bg-primary',
                                    'delivered' => 'bg-success'
                                ];
                                $statusIcons = [
                                    'pending' => 'bi-clock',
                                    'washing' => 'bi-arrow-repeat',
                                    'ready' => 'bi-check-circle',
                                    'delivered' => 'bi-truck'
                                ];
                                ?>
                                <span class="badge <?= $statusClasses[$order['status']] ?? 'bg-secondary' ?> px-3 py-2 rounded-pill">
                                    <i class="bi <?= $statusIcons[$order['status']] ?? 'bi-question-circle' ?> me-1"></i> 
                                    <?= ucfirst($order['status']) ?>
                                </span>
                            </td>
                            <td><strong>$<?= number_format($order['total_price'], 2) ?></strong></td>
                            <td><?= date('M d, Y', strtotime($order['due_date'])) ?></td>
                            <td><?= date('M d, Y', strtotime($order['created_at'])) ?></td>
                            <td class="text-end">
                                <a href="<?= site_url('barcode/order/' . $order['id']) ?>" class="btn btn-sm btn-outline-info me-1" title="Generate Barcode">
                                    <i class="bi bi-qr-code"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-secondary me-1" title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary" title="Update Status">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <p class="text-muted mt-2">No orders found</p>
                            </td>
                        </tr>
                    <?php endif; ?>
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
    .btn-sm {
        padding: 0.25rem 0.5rem;
    }
</style>

<?= $this->endSection() ?>