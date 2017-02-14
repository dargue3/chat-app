<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $guarded = [];

  /**
   * Seed the messages database with a few instructional ones
   */
  public static function seed()
  {
    (new static)::create(['from' => 'dargue3', 'message' => 'Hey, welcome!']);
    (new static)::create(['from' => 'dargue3', 'message' => 'Open this site up in a separate tab to see the real time updating in action!']);
    (new static)::create(['from' => 'dargue3', 'message' => 'Feel free to send a few messages back and forth']);
  }
}
