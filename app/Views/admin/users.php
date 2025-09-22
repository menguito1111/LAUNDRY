<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">
        <i class="bi bi-people-fill me-2"></i> Manage Users
    </h2>
    <a href="#" class="btn btn-primary btn-sm">
        <i class="bi bi-person-plus me-1"></i> Add User
    </a>
</div>

<div class="card shadow-lg border-0 rounded-3">
    <div class="card-body">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-list-ul me-2"></i> User List
        </h5>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>admin</td>
                        <td><span class="badge bg-primary">Admin</span></td>
                        <td>
                            <span class="badge bg-success px-3 py-2 rounded-pill">
                                <i class="bi bi-check-circle me-1"></i> Active
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>staff1</td>
                        <td><span class="badge bg-info text-dark">Staff</span></td>
                        <td>
                            <span class="badge bg-secondary px-3 py-2 rounded-pill">
                                <i class="bi bi-slash-circle me-1"></i> Inactive
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-2">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i> Delete
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
