<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table='profile';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'lvl_pro','ini_pro','end_pro','id_user'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'id','id_cli', 'id_user',
  ];
}
