<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class ResponseModel extends Model
{
    use HasFactory;

    public $http_code;
    public $msg;
    public $data;

    public function __construct(int $http_code, $data = [], String $msg = "")
    {
        $this->http_code = $http_code;
        $this->msg = $msg;
        $this->data = $data;
    }
}
