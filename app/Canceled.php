<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Canceled extends Model
{
  protected $table='cancelled';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'mon_can'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];
}
