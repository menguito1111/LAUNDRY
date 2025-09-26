<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">
        <i class="bi bi-wrench-adjustable-circle me-2"></i> Complaints Management
    </h2>
    <a href="#" class="btn btn-outline-primary btn-sm">
        <i class="bi bi-download me-1"></i> Export
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<div class="card shadow-lg border-0 rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Order #</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($complaints)): ?>
                        <?php foreach ($complaints as $complaint): ?>
                        <tr>
                            <td><strong><?= $complaint['id'] ?></strong></td>
                            <td><?= esc($complaint['username']) ?></td>
                            <td>
                                <?php if ($complaint['order_number']): ?>
                                    <span class="badge bg-info text-dark">ORD-<?= str_pad($complaint['order_number'], 4, '0', STR_PAD_LEFT) ?></span>
                                <?php else: ?>
                                    <span class="text-muted">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="text-truncate" style="max-width: 200px;" title="<?= esc($complaint['description']) ?>">
                                    <?= esc(substr($complaint['description'], 0, 50)) ?><?= strlen($complaint['description']) > 50 ? '...' : '' ?>
                                </div>
                            </td>
                            <td>
                                <?php if ($complaint['status'] === 'open'): ?>
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                        <i class="bi bi-exclamation-triangle me-1"></i> Open
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-success px-3 py-2 rounded-pill">
                                        <i class="bi bi-check-lg me-1"></i> Resolved
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('M d, Y', strtotime($complaint['created_at'])) ?></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-secondary me-2" data-bs-toggle="modal" data-bs-target="#viewModal<?= $complaint['id'] ?>">
                                    <i class="bi bi-eye"></i> View
                                </button>
                                <?php if ($complaint['status'] === 'open'): ?>
                                    <a href="<?= site_url('admin/complaints/resolve/' . $complaint['id']) ?>" class="btn btn-sm btn-success"
                                       onclick="return confirm('Mark this complaint as resolved?')">
                                        <i class="bi bi-check-circle"></i> Resolve
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <!-- Modal for viewing complaint details -->
                        <div class="modal fade" id="viewModal<?= $complaint['id'] ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Complaint #<?= $complaint['id'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <strong>Customer:</strong> <?= esc($complaint['username']) ?>
                                        </div>
                                        <?php if ($complaint['order_number']): ?>
                                        <div class="mb-3">
                                            <strong>Order:</strong> ORD-<?= str_pad($complaint['order_number'], 4, '0', STR_PAD_LEFT) ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="mb-3">
                                            <strong>Status:</strong>
                                            <?php if ($complaint['status'] === 'open'): ?>
                                                <span class="badge bg-warning text-dark">Open</span>
                                            <?php else: ?>
                                                <span class="badge bg-success">Resolved</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Date:</strong> <?= date('F d, Y H:i', strtotime($complaint['created_at'])) ?>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Description:</strong>
                                            <p class="mt-2"><?= nl2br(esc($complaint['description'])) ?></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if ($complaint['status'] === 'open'): ?>
                                            <a href="<?= site_url('admin/complaints/resolve/' . $complaint['id']) ?>" class="btn btn-success">
                                                <i class="bi bi-check-circle me-1"></i> Mark as Resolved
                                            </a>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="bi bi-chat-square-text display-4 text-muted"></i>
                                <p class="text-muted mt-2">No complaints found</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Optional: Add small CSS tweaks -->
<style>
    .card {
        border-left: 5px solid #0d6efd;
    }
    h2 {
        letter-spacing: 0.5px;
    }
    .table th {
        font-weight: 600;
    }
    .badge {
        font-size: 0.85rem;
    }
</style>

<?= $this->endSection() ?>