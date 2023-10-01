<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetricHistoryRun extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'strategy_id',
        'accesibility_metric',
        'pwa_metric',
        'performance_metric',
        'seo_metric',
        'best_practices_metric'
    ];

    public function getStrategy()
    {
        return $this->belongsTo(Strategy::class, 'strategy_id');
    }
}
