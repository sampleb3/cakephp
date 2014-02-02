<?php
class PostsController extends AppController {
  public $helpers = array('Html', 'Form');

  public function index() {
    $this->set('posts', $this->Post->find('all'));
  }

  public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('よくない投稿'));
    }

    $post = $htis->Post->findById($id);
    if (!$post) {
      throw new NotFoundException(__('よくない投稿'));
    }
    $this->set('post', $post);
  }
}
?>
