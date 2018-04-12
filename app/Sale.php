<?php
namespace optica;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $table='sale';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'fec_sale','id_user'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];
}
