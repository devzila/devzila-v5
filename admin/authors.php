<?php
declare(strict_types=1);

require __DIR__ . '/auth.php';
$pdo = db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $name  = trim((string) ($_POST['name'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $bio   = trim((string) ($_POST['bio'] ?? ''));
        if ($name !== '') {
            $stmt = $pdo->prepare('INSERT INTO blog_authors (name, email, bio) VALUES (:name, :email, :bio)');
            $stmt->execute([
                ':name'  => $name,
                ':email' => $email !== '' ? $email : null,
                ':bio'   => $bio !== '' ? $bio : null,
            ]);
            header('Location: authors.php?msg=' . urlencode('Author added.'));
            exit;
        }
        header('Location: authors.php?err=1&msg=' . urlencode('Author name is required.'));
        exit;
    }

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        $pdo->prepare('DELETE FROM blog_authors WHERE id = :id')->execute([':id' => $id]);
        header('Location: authors.php?msg=' . urlencode('Author deleted.'));
        exit;
    }
}

$authors = $pdo->query(
    'SELECT a.id, a.name, a.email, COUNT(p.id) AS post_count
     FROM blog_authors a
     LEFT JOIN blog_posts p ON p.author_id = a.id
     GROUP BY a.id, a.name, a.email
     ORDER BY a.name'
)->fetchAll();

$adminTitle = 'Authors';
$activeNav  = 'authors';
require __DIR__ . '/_header.php';
?>

<div class="admin-head">
  <h1>Authors</h1>
</div>

<form method="post" class="form-card" style="margin-bottom:1.75rem;">
  <input type="hidden" name="action" value="add">
  <div class="grid-2">
    <div class="field">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" placeholder="Jane Doe" required>
    </div>
    <div class="field">
      <label for="email">Email <span style="color:var(--text-2)">(optional)</span></label>
      <input type="email" id="email" name="email" placeholder="jane@devzila.com">
    </div>
  </div>
  <div class="field">
    <label for="bio">Bio <span style="color:var(--text-2)">(optional)</span></label>
    <textarea id="bio" name="bio" style="min-height:90px;" placeholder="Short bio shown on posts"></textarea>
  </div>
  <div class="form-actions">
    <button type="submit" class="btn">Add Author</button>
  </div>
</form>

<div class="card">
  <?php if (!$authors): ?>
    <div class="empty">No authors yet.</div>
  <?php else: ?>
  <table>
    <thead>
      <tr><th>Name</th><th>Email</th><th>Posts</th><th></th></tr>
    </thead>
    <tbody>
      <?php foreach ($authors as $a): ?>
      <tr>
        <td><strong><?= e($a['name']) ?></strong></td>
        <td class="muted"><?= e($a['email'] ?? '—') ?></td>
        <td class="muted"><?= (int) $a['post_count'] ?></td>
        <td>
          <div class="row-actions">
            <form method="post" onsubmit="return confirm('Delete this author? Their posts will remain but show no author.');">
              <input type="hidden" name="action" value="delete">
              <input type="hidden" name="id" value="<?= (int) $a['id'] ?>">
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
