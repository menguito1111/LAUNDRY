<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">
        <i class="bi bi-box-seam me-2"></i> Inventory
    </h2>
    <a href="#" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle me-1"></i> Add Item
    </a>
</div>

<!-- Inventory summary cards -->
<div class="row g-4 mb-4">

    <!-- Detergent -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 card-hover">
            <div class="card-body">
                <h6 class="card-title text-success fw-bold">
                    <i class="bi bi-droplet me-1"></i> Detergent
                </h6>
                <p class="mb-2">Stock: <strong>25 units</strong></p>
                <a href="#" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-sliders me-1"></i> Adjust
                </a>
            </div>
        </div>
    </div>

    <!-- Softener -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 card-hover">
            <div class="card-body">
                <h6 class="card-title text-info fw-bold">
                    <i class="bi bi-droplet-half me-1"></i> Softener
                </h6>
                <p class="mb-2">Stock: <strong>10 units</strong></p>
                <a href="#" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-sliders me-1"></i> Adjust
                </a>
            </div>
        </div>
    </div>

    <!-- Washing Machines -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 card-hover">
            <div class="card-body">
                <h6 class="card-title text-warning fw-bold">
                    <i class="bi bi-gear-fill me-1"></i> Washing Machines
                </h6>
                <p class="mb-2">Active: <strong>5 / 6</strong></p>
                <a href="#" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-info-circle me-1"></i> Details
                </a>
            </div>
        </div>
    </div>

</div>

<!-- Inventory table -->
<div class="card shadow-lg border-0 rounded-3">
    <div class="card-body">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-list-ul me-2"></i> Inventory List
        </h5>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Detergent</td>
                        <td><span class="badge bg-primary">Consumable</span></td>
                        <td>25</td>
                        <td>Bottles</td>
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
    .card-hover {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
</style>

<?= $this->endSection() ?>
