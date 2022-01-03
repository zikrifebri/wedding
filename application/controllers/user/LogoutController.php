<?php
class LogoutController extends Controller{ 
   public function index(){
      session_destroy();
      $this->redirect('user/login');
   }
}