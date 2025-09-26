<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">
        <i class="bi bi-people-fill me-2"></i> Manage Users
    </h2>
    <a href="<?= site_url('admin/users/add') ?>" class="btn btn-primary btn-sm">
        <i class="bi bi-person-plus me-1"></i> Add User
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
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><strong><?= esc($user['username']) ?></strong></td>
                            <td>
                                <?php
                                $roleClasses = [
                                    'admin' => 'bg-danger',
                                    'staff' => 'bg-info text-dark',
                                    'customer' => 'bg-success'
                                ];
                                $roleIcons = [
                                    'admin' => 'bi-shield-fill',
                                    'staff' => 'bi-person-badge',
                                    'customer' => 'bi-person'
                                ];
                                ?>
                                <span class="badge <?= $roleClasses[$user['role']] ?? 'bg-secondary' ?> px-3 py-2 rounded-pill">
                                    <i class="bi <?= $roleIcons[$user['role']] ?? 'bi-question-circle' ?> me-1"></i>
                                    <?= ucfirst($user['role']) ?>
                                </span>
                            </td>
                            <td><?= date('M d, Y', strtotime($user['created_at'])) ?></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-outline-secondary me-2" title="Edit User">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <?php if ($user['id'] != session()->get('id')): ?>
                                <a href="#" class="btn btn-sm btn-outline-danger" title="Delete User" 
                                   onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="bi bi-people display-4 text-muted"></i>
                                <p class="text-muted mt-2">No users found</p>
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