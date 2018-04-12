<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $table='history';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'ini_hist'
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
