<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * @var array
     */
    protected $fillable = [

        'title', 'description', 'dead_line', 'done'
    ];

    /**
     * @var array
     */
    protected $defaults = [

        'done' => false
    ];

    /**
     * validation rules
     * @var array
     */
    public static $rules = [

        'title'       => 'required|min:4|max:40',
        'description' => 'required|min:10',
        'dead_line'   => 'required'

    ];

    /**
     * Task constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setRawAttributes($this->defaults, true);
        parent::__construct($attributes);
    }
}
