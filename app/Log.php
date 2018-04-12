<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  protected $table='log';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'last_time','id_user'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      
  ];
}
