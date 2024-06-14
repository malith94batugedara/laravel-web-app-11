<?php

namespace App\Models;
use App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'department_name'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class,'emp_department','id');
    }
}
