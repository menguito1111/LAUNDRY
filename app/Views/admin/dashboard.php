<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Admin Dashboard</h2>
<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Manage Users</h5>
                <p class="card-text">Add, edit or delete system users.</p>
                <a href="#" class="btn btn-light btn-sm">Go</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <p class="card-text">View and manage all customer orders.</p>
                <a href="#" class="btn btn-light btn-sm">Go</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Inventory</h5>
                <p class="card-text">Track detergents, machines, and stock.</p>
                <a href="#" class="btn btn-light btn-sm">Go</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">Complaints</h5>
                <p class="card-text">Check and resolve customer complaints.</p>
                <a href="#" class="btn btn-light btn-sm">Go</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
