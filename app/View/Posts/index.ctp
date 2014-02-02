<!-- File: /app/View/Posts/index.ctp -->

<h1>記事一覧</h1>

<?php echo $this->Html->link(
    '新規投稿',
    array('controller' => 'posts', 'action' => 'add')
    ); ?>

<table>
<tr>
<th>ID</th>
<th>タイトル</th>
<th>操作</th>
<th>投稿日時</th>
</tr>

<!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

<?php foreach ($posts as $post): ?>
<tr>
<td><?php echo $post['Post']['id']; ?></td>
<td>
<?php echo $this->Html->link($post['Post']['title'],
    array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
</td>

<td>
<?php echo $this->Form->postLink(
    '削除',
    array('action' => 'delete', $post['Post']['id']),
    array('confirm' => '投稿を削除します。'));
?>

<?php echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id'])); ?>
</td>

<td><?php echo $post['Post']['created']; ?></td>
</tr>
<?php endforeach; ?>
<?php unset($post); ?>
</table>



