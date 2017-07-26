<?php
namespace model\db;

class User{
  public $id;
  public $email;
  public $equipment;
  public $user;
  public $date;
  public $start;
  public $end;

	public function __construct($id, $email,$equipment, $user, $date, $start, $end)
  {
    $this->id = $id;
    $this->email = $email;
    $this->equipment = $equipment;
    $this->user = $user;
    $this->date = $date;
    $this->start = $start;
    $this->end = $end;
  }

}
