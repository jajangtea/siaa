<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class LoginAlumniModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['nisn','user_email','user_password','user_created_at'];
}