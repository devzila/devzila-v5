<?php
declare(strict_types=1);

require __DIR__ . '/auth.php';
$pdo = db();

// Handle delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    $id = (int) ($_POST['id'] ?? 0);
    $pdo->prepare('DELETE FROM blog_posts WHERE id = :id')->execute([':id' => $id]);
    header('Location: index.php?msg=' . urlencode('Post deleted.'));
    exit;
}

$posts = $pdo->query(
    'SELECT p.id, p.title, p.slug, p.status, p.published_at, p.created_at,
            a.name AS author_name, c.name AS category_name
     FROM blog_posts p
     LEFT JOIN blog_authors a    ON a.id = p.author_id
     LEFT JOIN blog_categories c ON c.id = p.category_id
     ORDER BY p.created_at DESC'
)->fetchAll();

$adminTitle = 'Posts';
$activeNav  = 'posts';
require __DIR__ . '/_header.php';
?>

<div class="admin-head">
  <h1>Blog Posts</h1>
  <a class="btn" href="post-edit.php">+ New Post</a>
</div>

<div class="card">
  <?php if (!$posts): ?>
    <div class="empty">No posts yet. Click <strong>New Post</strong> to write your first one.</div>
  <?php else: ?>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Status</th>
        <th>Date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($posts as $p): ?>
      <tr>
        <td>
          <strong><?= e($p['title']) ?></strong><br>
          <span class="muted">/blog/<?= e($p['slug']) ?></span>
        </td>
        <td><?= e($p['category_name'] ?? '—') ?></td>
        <td><?= e($p['author_name'] ?? '—') ?></td>
        <td><span class="badge <?= e($p['status']) ?>"><?= e(ucfirst($p['status'])) ?></span></td>
        <td class="muted"><?= e(date('M j, Y', strtotime($p['published_at'] ?? $p['created_at']))) ?></td>
        <td>
          <div class="row-actions">
            <a class="btn secondary small" href="post-edit.php?id=<?= (int) $p['id'] ?>">Edit</a>
            <form method="post" onsubmit="return confirm('Delete this post?');" style="display:inline;">
              <input type="hidden" name="action" value="delete">
              <input type="hidden" name="id" value="<?= (int) $p['id'] ?>">
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
