<?php
declare(strict_types=1);

require __DIR__ . '/auth.php';
$pdo = db();

$id   = (int) ($_GET['id'] ?? 0);
$post = [
    'id' => 0, 'title' => '', 'slug' => '', 'excerpt' => '', 'body' => '',
    'author_id' => '', 'category_id' => '', 'status' => 'draft', 'published_at' => null,
];

if ($id > 0) {
    $stmt = $pdo->prepare('SELECT * FROM blog_posts WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $found = $stmt->fetch();
    if (!$found) {
        header('Location: index.php?err=1&msg=' . urlencode('Post not found.'));
        exit;
    }
    $post = $found;
}

$authors    = $pdo->query('SELECT id, name FROM blog_authors ORDER BY name')->fetchAll();
$categories = $pdo->query('SELECT id, name FROM blog_categories ORDER BY name')->fetchAll();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title    = trim((string) ($_POST['title'] ?? ''));
    $slugIn   = trim((string) ($_POST['slug'] ?? ''));
    $excerpt  = trim((string) ($_POST['excerpt'] ?? ''));
    $body     = (string) ($_POST['body'] ?? '');
    $authorId = ($_POST['author_id'] ?? '') !== '' ? (int) $_POST['author_id'] : null;
    $catId    = ($_POST['category_id'] ?? '') !== '' ? (int) $_POST['category_id'] : null;
    $status   = ($_POST['status'] ?? 'draft') === 'published' ? 'published' : 'draft';

    // Keep submitted values for re-render on error
    $post = array_merge($post, [
        'title' => $title, 'slug' => $slugIn, 'excerpt' => $excerpt, 'body' => $body,
        'author_id' => $authorId, 'category_id' => $catId, 'status' => $status,
    ]);

    if ($title === '' || $body === '') {
        $error = 'Title and body are required.';
    } else {
        $slug = slugify($slugIn !== '' ? $slugIn : $title);
        $slug = unique_slug($pdo, 'blog_posts', $slug, $id > 0 ? $id : null);

        if ($id > 0) {
            // Set published_at the first time it becomes published
            $publishedAt = $post['published_at'];
            if ($status === 'published' && empty($publishedAt)) {
                $publishedAt = date('Y-m-d H:i:s');
            }
            $stmt = $pdo->prepare(
                'UPDATE blog_posts
                 SET title=:title, slug=:slug, excerpt=:excerpt, body=:body,
                     author_id=:author_id, category_id=:category_id,
                     status=:status, published_at=:published_at
                 WHERE id=:id'
            );
            $stmt->execute([
                ':title' => $title, ':slug' => $slug, ':excerpt' => $excerpt, ':body' => $body,
                ':author_id' => $authorId, ':category_id' => $catId,
                ':status' => $status, ':published_at' => $publishedAt, ':id' => $id,
            ]);
            header('Location: index.php?msg=' . urlencode('Post updated.'));
            exit;
        }

        $publishedAt = $status === 'published' ? date('Y-m-d H:i:s') : null;
        $stmt = $pdo->prepare(
            'INSERT INTO blog_posts (title, slug, excerpt, body, author_id, category_id, status, published_at)
             VALUES (:title, :slug, :excerpt, :body, :author_id, :category_id, :status, :published_at)'
        );
        $stmt->execute([
            ':title' => $title, ':slug' => $slug, ':excerpt' => $excerpt, ':body' => $body,
            ':author_id' => $authorId, ':category_id' => $catId,
            ':status' => $status, ':published_at' => $publishedAt,
        ]);
        header('Location: index.php?msg=' . urlencode('Post created.'));
        exit;
    }
}

$adminTitle = $id > 0 ? 'Edit Post' : 'New Post';
$activeNav  = 'posts';
require __DIR__ . '/_header.php';
?>

<div class="admin-head">
  <h1><?= $id > 0 ? 'Edit Post' : 'New Post' ?></h1>
  <a class="btn secondary" href="index.php">← Back to posts</a>
</div>

<?php if ($error !== ''): ?>
  <div class="flash error"><?= e($error) ?></div>
<?php endif; ?>

<form method="post" class="form-card">
  <div class="field">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?= e($post['title']) ?>" required>
  </div>

  <div class="field">
    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="<?= e($post['slug']) ?>" placeholder="auto-generated from title if left blank">
    <div class="hint">URL: /blog/<em><?= e($post['slug'] !== '' ? $post['slug'] : 'your-slug') ?></em></div>
  </div>

  <div class="grid-2">
    <div class="field">
      <label for="category_id">Category</label>
      <select id="category_id" name="category_id">
        <option value="">— None —</option>
        <?php foreach ($categories as $c): ?>
          <option value="<?= (int) $c['id'] ?>" <?= (string) $post['category_id'] === (string) $c['id'] ? 'selected' : '' ?>><?= e($c['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="field">
      <label for="author_id">Author</label>
      <select id="author_id" name="author_id">
        <option value="">— None —</option>
        <?php foreach ($authors as $a): ?>
          <option value="<?= (int) $a['id'] ?>" <?= (string) $post['author_id'] === (string) $a['id'] ? 'selected' : '' ?>><?= e($a['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="field">
    <label for="excerpt">Excerpt</label>
    <textarea id="excerpt" name="excerpt" style="min-height:90px;" placeholder="Short summary shown on the blog listing"><?= e($post['excerpt']) ?></textarea>
  </div>

  <div class="field">
    <label for="body">Body</label>
    <textarea id="body" name="body" required placeholder="Write your post. Basic HTML is allowed."><?= e($post['body']) ?></textarea>
    <div class="hint">HTML is allowed (e.g. &lt;p&gt;, &lt;h2&gt;, &lt;ul&gt;, &lt;a&gt;, &lt;code&gt;).</div>
  </div>

  <div class="field">
    <label for="status">Status</label>
    <select id="status" name="status">
      <option value="draft" <?= $post['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
      <option value="published" <?= $post['status'] === 'published' ? 'selected' : '' ?>>Published</option>
    </select>
  </div>

  <div class="form-actions">
    <button type="submit" class="btn"><?= $id > 0 ? 'Save Changes' : 'Create Post' ?></button>
    <a class="btn secondary" href="index.php">Cancel</a>
  </div>
</form>

<?php require __DIR__ . '/_footer.php'; ?>
