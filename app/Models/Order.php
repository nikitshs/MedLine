<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



#[Fillable(['specialization', 'doctor', 'date', 'time', 'reason', 'payment', 'status_id'])]
class Order extends Model
{
    protected function casts(): array
    {
        return ['date' => 'date'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public const SPECIALIZATIONS = ['Терапевт', 'Стоматолог', 'Дерматолог', 'Невролог'];
 
    /** Общий список врачей (ТЗ допускает список без привязки к специализации) */
    public const DOCTORS = [
        'Смирнова Анна Сергеевна',
        'Кузнецов Дмитрий Олегович',
        'Попова Елена Викторовна',
        'Соколов Михаил Андреевич',
    ];
 
    public const PAYMENTS = ['Наличные', 'Банковская карта', 'Безналичный расчёт (онлайн)'];
}


