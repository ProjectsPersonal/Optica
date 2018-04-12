<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
  protected $table='sold';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'pre_sold'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];
}
