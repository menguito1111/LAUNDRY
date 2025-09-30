<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Staff Dashboard</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card bg-primary text-white mb-3">
            <div class="card-body">
                <h5 class="card-title">Assigned Orders</h5>
                <p class="card-text">Check laundry orders assigned to you.</p>
                <a href="<?= site_url('staff/orders') ?>" class="btn btn-light btn-sm">View</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-secondary text-white mb-3">
            <div class="card-body">
                <h5 class="card-title">Update Status</h5>
                <p class="card-text">Update washing, drying, or delivery status.</p>
                <a href="<?= site_url('staff/orders') ?>" class="btn btn-light btn-sm">Update</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-dark text-white mb-3">
            <div class="card-body">
                <h5 class="card-title">Report Issues</h5>
                <p class="card-text">Submit complaints or machine problems.</p>
                <a href="<?= site_url('staff/issues/report') ?>" class="btn btn-light btn-sm">Report</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white mb-3">
            <div class="card-body">
                <h5 class="card-title">Team Chat</h5>
                <p class="card-text">Chat with admin and staff in real time.</p>
                <a href="<?= site_url('staff/chat') ?>" class="btn btn-light btn-sm">Open Chat</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
