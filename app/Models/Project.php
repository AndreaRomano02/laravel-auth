<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['title', 'img', 'description', 'url'];

  public function getAbstract()
  {
    return substr($this->description, 0, 120) . '...';
  }

  public function getYearCreated()
  {
    return date('Y', strtotime($this->created_at));
  }
}
