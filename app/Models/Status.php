<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Expr\AssignOp\Mod;

#[Fillable(['title'])]
class Status extends Model {

    public const NEW = 'новая';

    public const TITLES = ['новая', 'подтверждена', 'приём состоялся', 'отменена'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
