<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="mb-4 fw-bold text-primary">
    <i class="bi bi-speedometer2 me-2"></i> Admin Dashboard
</h2>

<div class="row g-4">

    <!-- Manage Users -->
    <div class="col-md-3">
        <div class="card text-white bg-success shadow-lg h-100 border-0 card-hover">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-people-fill me-2"></i> Manage Users
                </h5>
                <p class="card-text">Add, edit or delete system users.</p>
                <a href="<?= site_url('admin/users') ?>" class="btn btn-light btn-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Go
                </a>
            </div>
        </div>
    </div>

    <!-- Orders -->
    <div class="col-md-3">
        <div class="card text-white bg-info shadow-lg h-100 border-0 card-hover">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-cart-check-fill me-2"></i> Orders
                </h5>
                <p class="card-text">View and manage all customer orders.</p>
                <a href="<?= site_url('admin/orders') ?>" class="btn btn-light btn-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Go
                </a>
            </div>
        </div>
    </div>

    <!-- Inventory -->
    <div class="col-md-3">
        <div class="card text-white bg-warning shadow-lg h-100 border-0 card-hover">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-box-seam-fill me-2"></i> Inventory
                </h5>
                <p class="card-text">Track detergents, machines, and stock.</p>
                <a href="<?= site_url('admin/inventory') ?>" class="btn btn-light btn-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Go
                </a>
            </div>
        </div>
    </div>

    <!-- Complaints -->
    <div class="col-md-3">
        <div class="card text-white bg-danger shadow-lg h-100 border-0 card-hover">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Complaints
                </h5>
                <p class="card-text">Check and resolve customer complaints.</p>
                <a href="<?= site_url('admin/complaints') ?>" class="btn btn-light btn-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Go
                </a>
            </div>
        </div>
    </div>

</div>

<!-- Extra styles -->
<style>
    .card-hover {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-hover:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    }
    h2 {
        letter-spacing: 0.5px;
    }
</style>

<?= $this->endSection() ?>
