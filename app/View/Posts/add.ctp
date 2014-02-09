<!-- File: /app/View/Posts/add.ctp -->
<?php
$this->set('title_for_layout', '新規投稿');
?>

<h1>新規投稿</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label' => 'タイトル'));
echo $this->Form->input('body', array('label'=>'本文','rows' => '3'));
echo $this->Form->end('Save Post');
?>
