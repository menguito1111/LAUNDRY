<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Report Issue</h2>

<form method="post" action="<?= site_url('staff/issues/report') ?>">
    <div class="mb-3">
        <label class="form-label">Order (optional)</label>
        <input type="number" name="order_id" class="form-control" value="<?= esc($_GET['order_id'] ?? '') ?>" placeholder="Order ID">
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category" class="form-select">
            <option value="machine">Machine</option>
            <option value="order">Order</option>
            <option value="customer">Customer</option>
            <option value="other" selected>Other</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4" required placeholder="Describe the issue..."></textarea>
    </div>

    <button type="submit" class="btn btn-dark">Submit</button>
    <a href="<?= site_url('staff/dashboard') ?>" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
