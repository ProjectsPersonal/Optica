<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
  protected $table='discount';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'tip_dis','mon_dis','des_dis'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];
}
