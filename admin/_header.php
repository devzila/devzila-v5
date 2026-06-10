<?php
declare(strict_types=1);

require __DIR__ . '/auth.php';

$adminTitle  = $adminTitle  ?? 'Admin';
$activeNav   = $activeNav   ?? '';
$flash       = $_GET['msg']   ?? '';
$flashType   = ($_GET['err'] ?? '') !== '' ? 'error' : 'ok';

$navItems = [
    'posts'      => ['label' => 'Posts',      'href' => 'index.php'],
    'categories' => ['label' => 'Categories', 'href' => 'categories.php'],
    'authors'    => ['label' => 'Authors',    'href' => 'authors.php'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($adminTitle) ?> — DevZila Admin</title>
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/admin.css">
</head>
<body>

<nav class="admin-nav">
  <a href="index.php" class="admin-brand">Dev<span>Zila</span> Admin</a>
  <?php foreach ($navItems as $key => $item): ?>
    <a class="navlink <?= $activeNav === $key ? 'active' : '' ?>" href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a>
  <?php endforeach; ?>
  <span class="spacer"></span>
  <a class="view-site" href="/blog" target="_blank" rel="noopener">View blog ↗</a>
</nav>

<main class="admin-main">
<?php if ($flash !== ''): ?>
  <div class="flash <?= $flashType ?>"><?= e($flash) ?></div>
<?php endif; ?>
