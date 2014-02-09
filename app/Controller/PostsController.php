<?php
class PostsController extends AppController {
  public $helpers = array('Html', 'Form');

  public function index() {
    $this->set('posts', $this->Post->find('all'));
  }

  public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('不正なURLです。'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
      throw new NotFoundException(__('存在しない投稿です。'));
    }
    $this->set('post', $post);
  }

  public function add() {
    if ($this->request->is('post')) {
      $this->Post->create();
      if ($this->Post->save($this->request->data)) {
        $this->Session->setFlash(__('投稿が完了しました。'));
        return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(__('投稿に失敗しました。'));
    }
  }

  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException(__('不正なURLです。'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
      throw new NotFoundException(__('存在しない投稿です'));
    }

    if ($this->request->is(array('post', 'put'))) {
      $this->Post->id = $id;
      if ($this->Post->save($this->request->data)) {
        $this->Session->setFlash(__('投稿を更新しました。'));
        return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(__('更新に失敗しました。'));
    }

    if (!$this->request->data) {
      $this->request->data = $post;
    }
  }

  public function delete($id = null) {
    if (!$id) {
      throw new NotFoundException(__('不正なURLです。'));
    }

    if ($this->Post->delete($id)) {
      $this->Session->setFlash(__('投稿を削除しました。', h($id)));
      return $this->redirect(array('action' => 'index'));
    }
  }




}
?>
