<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="bi bi-qr-code me-2"></i> Order Barcode
                </h4>
            </div>
            <div class="card-body text-center">
                <div class="mb-4">
                    <h5>Order #<?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?></h5>
                    <p class="text-muted">Status: <span class="badge bg-secondary"><?= ucfirst($order['status']) ?></span></p>
                    <p class="text-muted">Total: $<?= number_format($order['total_price'], 2) ?></p>
                </div>

                <!-- Barcode Display -->
                <div class="mb-4 p-4 border rounded bg-light">
                    <div id="barcode-container" class="mb-3"></div>
                    <p class="font-monospace fw-bold"><?= $barcodeData ?></p>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-center gap-3">
                    <button onclick="printBarcode()" class="btn btn-primary">
                        <i class="bi bi-printer me-1"></i> Print Barcode
                    </button>
                    <button onclick="downloadBarcode()" class="btn btn-success">
                        <i class="bi bi-download me-1"></i> Download
                    </button>
                    <?php 
                    $userRole = session()->get('role');
                    $backUrl = '';
                    if ($userRole === 'admin') {
                        $backUrl = 'admin/orders';
                    } elseif ($userRole === 'staff') {
                        $backUrl = 'staff/orders';
                    } elseif ($userRole === 'customer') {
                        $backUrl = 'customer/orders';
                    }
                    ?>
                    <a href="<?= site_url($backUrl) ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Back to Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include JsBarcode library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Generate barcode
    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    document.getElementById('barcode-container').appendChild(svg);
    
    JsBarcode(svg, "<?= $barcodeData ?>", {
        format: "CODE128",
        width: 2,
        height: 100,
        displayValue: false,
        margin: 10,
        background: "#ffffff",
        lineColor: "#000000"
    });
});

function printBarcode() {
    const printContent = `
        <div style="text-align: center; padding: 20px;">
            <h3>Order #<?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?></h3>
            <p>Status: <?= ucfirst($order['status']) ?></p>
            <p>Total: $<?= number_format($order['total_price'], 2) ?></p>
            <div style="margin: 20px 0;">
                ${document.getElementById('barcode-container').innerHTML}
            </div>
            <p style="font-family: monospace; font-weight: bold;"><?= $barcodeData ?></p>
        </div>
    `;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Order Barcode - <?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?></title>
            <style>
                body { margin: 0; padding: 20px; font-family: Arial, sans-serif; }
                @media print { body { margin: 0; } }
            </style>
        </head>
        <body>
            ${printContent}
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

function downloadBarcode() {
    const svg = document.querySelector('#barcode-container svg');
    const svgData = new XMLSerializer().serializeToString(svg);
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    const img = new Image();
    
    img.onload = function() {
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.fillStyle = 'white';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(img, 0, 0);
        
        const link = document.createElement('a');
        link.download = 'order-<?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?>-barcode.png';
        link.href = canvas.toDataURL();
        link.click();
    };
    
    img.src = 'data:image/svg+xml;base64,' + btoa(svgData);
}
</script>

<style>
    #barcode-container svg {
        max-width: 100%;
        height: auto;
    }
    
    .font-monospace {
        font-family: 'Courier New', monospace !important;
    }
</style>

<?= $this->endSection() ?>