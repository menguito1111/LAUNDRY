<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Submit Complaint</h2>

<form method="post" action="<?= site_url('customer/complaint') ?>">
    <div class="mb-3">
        <label class="form-label">Order ID</label>
        <input type="number" name="order_id" class="form-control" placeholder="Optional Order ID">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4" required placeholder="Describe the issue..."></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= site_url('customer/dashboard') ?>" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
