<!-- File: /app/View/Posts/edit.ctp -->

<h1>投稿の編集</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label' => 'タイトル'));
echo $this->Form->input('body', array('label'=>'本文','rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
