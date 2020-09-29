<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolHasMenu extends Model
{
  use HasFactory;
  protected $table = "rol_has_menu";
  public $timestamp = false;
}
