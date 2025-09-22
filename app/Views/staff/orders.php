<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Assigned Orders</h2>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Total</th>
            <th>Due</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $o): ?>
            <tr>
                <td><?= esc($o['id']) ?></td>
                <td><span class="badge bg-secondary"><?= esc($o['status']) ?></span></td>
                <td>$<?= esc($o['total_price']) ?></td>
                <td><?= esc($o['due_date']) ?></td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="<?= site_url('staff/orders/' . $o['id'] . '/status') ?>">Update Status</a>
                    <a class="btn btn-sm btn-outline-dark" href="<?= site_url('staff/issues/report') ?>?order_id=<?= $o['id'] ?>">Report Issue</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">No assigned orders.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
