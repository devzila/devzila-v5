<?php
declare(strict_types=1);

require __DIR__ . '/auth.php';
$pdo = db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $name = trim((string) ($_POST['name'] ?? ''));
        if ($name !== '') {
            $slug = unique_slug($pdo, 'blog_categories', slugify($name));
            $stmt = $pdo->prepare('INSERT INTO blog_categories (name, slug) VALUES (:name, :slug)');
            $stmt->execute([':name' => $name, ':slug' => $slug]);
            header('Location: categories.php?msg=' . urlencode('Category added.'));
            exit;
        }
        header('Location: categories.php?err=1&msg=' . urlencode('Category name is required.'));
        exit;
    }

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        $pdo->prepare('DELETE FROM blog_categories WHERE id = :id')->execute([':id' => $id]);
        header('Location: categories.php?msg=' . urlencode('Category deleted.'));
        exit;
    }
}

$categories = $pdo->query(
    'SELECT c.id, c.name, c.slug, COUNT(p.id) AS post_count
     FROM blog_categories c
     LEFT JOIN blog_posts p ON p.category_id = c.id
     GROUP BY c.id, c.name, c.slug
     ORDER BY c.name'
)->fetchAll();

$adminTitle = 'Categories';
$activeNav  = 'categories';
require __DIR__ . '/_header.php';
?>

<div class="admin-head">
  <h1>Categories</h1>
</div>

<form method="post" class="inline-form">
  <input type="hidden" name="action" value="add">
  <div class="field" style="flex:1; min-width:240px;">
    <label for="name">New category</label>
    <input type="text" id="name" name="name" placeholder="e.g. Hotwire" required>
  </div>
  <button type="submit" class="btn">Add Category</button>
</form>

<div class="card">
  <?php if (!$categories): ?>
    <div class="empty">No categories yet.</div>
  <?php else: ?>
  <table>
    <thead>
      <tr><th>Name</th><th>Slug</th><th>Posts</th><th></th></tr>
    </thead>
    <tbody>
      <?php foreach ($categories as $c): ?>
      <tr>
        <td><strong><?= e($c['name']) ?></strong></td>
        <td class="muted"><?= e($c['slug']) ?></td>
        <td class="muted"><?= (int) $c['post_count'] ?></td>
        <td>
          <div class="row-actions">
            <form method="post" onsubmit="return confirm('Delete this category? Posts will keep their content but lose this category.');">
              <input type="hidden" name="action" value="delete">
              <input type="hidden" name="id" value="<?= (int) $c['id'] ?>">
              <button type="submit" class="btn danger small">Delete</button>
            </form>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php endif; ?>
</div>

<?php require __DIR__ . '/_footer.php'; ?>
