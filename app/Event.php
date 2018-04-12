<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $table='event';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title','body', 'url','class','start','end','color'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'id_user'
  ];
}
