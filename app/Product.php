<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table='product';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'cod_pro','nam_pro', 'des_pro','can_pro'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];
}
