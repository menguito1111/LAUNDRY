<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Laundry System' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laundry System</a>
            <div class="ms-auto d-flex align-items-center">
                <?php 
                $role = session()->get('role');
                $dashUrl = site_url('customer/dashboard');
                if ($role === 'admin') { $dashUrl = site_url('admin/dashboard'); }
                elseif ($role === 'staff') { $dashUrl = site_url('staff/dashboard'); }
                ?>
                <a href="<?= $dashUrl ?>" class="btn btn-outline-light btn-sm me-2">Dashboard</a>
                <span class="text-white me-3">Hi, <?= session()->get('username') ?></span>
                <a href="<?= site_url('logout') ?>" class="btn btn-light btn-sm">Logout</a>
            </div>
        </div>
        <div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
