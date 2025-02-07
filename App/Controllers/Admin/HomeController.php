<?php
namespace App\Controllers\Admin;
use App\Models\User;
class HomeController
{
  public function index()
  {
    $user = new User();
    $users = $user->getAllUsers();
    return view('admin.home', ['users' => $users]);
  }

  public function profile()
  {
    $email = $_SESSION['user_email'];
    $user = new User();
    $data = $user->getUserByEmail($email);
    return view('admin.profile.index', ['data' => $data]);
  }

  public function editUser($id)
  {
    $user = new User();
    $getUser = $user->getUserById($id);
    return view('admin.user.edit', ['user' => $getUser]);
  }
}