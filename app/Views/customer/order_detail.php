<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Order #<?= esc($order['id']) ?></h2>

<div class="mb-3">
    <strong>Status:</strong> <span class="badge bg-secondary"><?= esc($order['status']) ?></span>
</div>
<div class="mb-3">
    <strong>Total:</strong> $<?= esc($order['total_price']) ?>
</div>
<div class="mb-3">
    <strong>Due:</strong> <?= esc($order['due_date']) ?>
</div>

<a class="btn btn-secondary" href="<?= site_url('customer/orders') ?>">Back</a>

<?= $this->endSection() ?>
