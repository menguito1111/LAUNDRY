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

<div class="card shadow-lg border-0 rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1001</td>
                        <td>Jane Smith</td>
                        <td>Missing item</td>
                        <td>
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                <i class="bi bi-exclamation-triangle me-1"></i> Open
                            </span>
                        </td>
                        <td>2025-09-18</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="#" class="btn btn-sm btn-success">
                                <i class="bi bi-check-circle"></i> Resolve
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1002</td>
                        <td>Michael Reyes</td>
                        <td>Late delivery</td>
                        <td>
                            <span class="badge bg-success px-3 py-2 rounded-pill">
                                <i class="bi bi-check-lg me-1"></i> Resolved
                            </span>
                        </td>
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

<!-- Optional: Add small CSS tweaks -->
<style>
    .card {
        border-left: 5px solid #0d6efd; /* engineer blue accent */
    }
    h2 {
        letter-spacing: 0.5px;
    }
</style>

<?= $this->endSection() ?>
