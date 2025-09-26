<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="bi bi-camera me-2"></i> Barcode Scanner
                </h4>
            </div>
            <div class="card-body">
                
                <!-- Scanner Interface -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5>Camera Scanner</h5>
                            <div id="scanner-container" class="border rounded bg-dark d-flex align-items-center justify-content-center" style="height: 300px;">
                                <div class="text-white text-center">
                                    <i class="bi bi-camera display-1 mb-3"></i>
                                    <p>Click "Start Scanner" to begin</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button id="startScannerBtn" class="btn btn-success me-2">
                                    <i class="bi bi-play-fill me-1"></i> Start Scanner
                                </button>
                                <button id="stopScannerBtn" class="btn btn-danger" disabled>
                                    <i class="bi bi-stop-fill me-1"></i> Stop Scanner
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5>Manual Entry</h5>
                            <form action="<?= site_url('barcode/process') ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-