<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">
        <i class="bi bi-box-seam me-2"></i> Inventory
    </h2>
    <a href="<?= site_url('admin/inventory/add') ?>" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle me-1"></i> Add Item
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<!-- Inventory summary cards -->
<div class="row g-4 mb-4">
    <?php
    $detergent = 0;
    $softener = 0;
    $machines = 0;
    foreach ($items as $item) {
        if (stripos($item['item_name'], 'detergent') !== false) {
            $detergent += $item['quantity'];
        } elseif (stripos($item['item_name'], 'softener') !== false) {
            $softener += $item['quantity'];
        } elseif (stripos($item['item_name'], 'machine') !== false) {
            $machines += $item['quantity'];
        }
    }
    ?>

    <!-- Detergent -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 card-hover">
            <div class="card-body">
                <h6 class="card-title text-success fw-bold">
                    <i class="bi bi-droplet me-1"></i> Detergent
                </h6>
                <p class="mb-2">Stock: <strong><?= $detergent ?> units</strong></p>
                <span class="badge <?= $detergent > 10 ? 'bg-success' : ($detergent > 5 ? 'bg-warning' : 'bg-danger') ?>">
                    <?= $detergent > 10 ? 'Good Stock' : ($detergent > 5 ? 'Low Stock' : 'Critical') ?>
                </span>
            </div>
        </div>
    </div>

    <!-- Softener -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 card-hover">
            <div class="card-body">
                <h6 class="card-title text-info fw-bold">
                    <i class="bi bi-droplet-half me-1"></i> Softener
                </h6>
                <p class="mb-2">Stock: <strong><?= $softener ?> units</strong></p>
                <span class="badge <?= $softener > 10 ? 'bg-success' : ($softener > 5 ? 'bg-warning' : 'bg-danger') ?>">
                    <?= $softener > 10 ? 'Good Stock' : ($softener > 5 ? 'Low Stock' : 'Critical') ?>
                </span>
            </div>
        </div>
    </div>

    <!-- Washing Machines -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 card-hover">
            <div class="card-body">
                <h6 class="card-title text-warning fw-bold">
                    <i class="bi bi-gear-fill me-1"></i> Washing Machines
                </h6>
                <p class="mb-2">Available: <strong><?= $machines ?> machines</strong></p>
                <span class="badge bg-primary">All Operational</span>
            </div>
        </div>
    </div>
</div>

<!-- Inventory table -->
<div class="card shadow-lg border-0 rounded-3">
    <div class="card-body">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-list-ul me-2"></i> Inventory List
        </h5>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Added</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($items)): ?>
                        <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><strong><?= esc($item['item_name']) ?></strong></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>
                                <span class="badge <?= $item['quantity'] > 10 ? 'bg-success' : ($item['quantity'] > 5 ? 'bg-warning text-dark' : 'bg-danger') ?>">
                                    <?= $item['quantity'] > 10 ? 'In Stock' : ($item['quantity'] > 5 ? 'Low Stock' : 'Critical') ?>
                                </span>
                            </td>
                            <td><?= date('M d, Y', strtotime($item['created_at'])) ?></td>
                            <td class="text-end">
                                <a href="<?= site_url('admin/inventory/edit/' . $item['id']) ?>" class="btn btn-sm btn-outline-secondary me-2" title="Edit Item">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="<?= site_url('admin/inventory/delete/' . $item['id']) ?>" class="btn btn-sm btn-outline-danger" title="Delete Item"
                                   onclick="return confirm('Are you sure you want to delete this item?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="bi bi-box display-4 text-muted"></i>
                                <p class="text-muted mt-2">No inventory items found</p>
                                <a href="<?= site_url('admin/inventory/add') ?>" class="btn btn-primary">Add First Item</a>
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
    .card-hover {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .table th {
        font-weight: 600;
    }
    .badge {
        font-size: 0.85rem;
    }
</style>

<?= $this->endSection() ?>