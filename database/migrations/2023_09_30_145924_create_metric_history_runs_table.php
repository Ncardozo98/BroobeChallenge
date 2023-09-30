<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('metric_history_runs', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('strategy_id');
            $table->foreign('strategy_id')->references('id')->on('strategies');
            $table->double('accesibility_metric', 8, 2);
            $table->double('pwa_metric', 8, 2);
            $table->double('performance_metric', 8, 2);
            $table->double('seo_metric', 8, 2);
            $table->double('best_practices_metric', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metric_history_runs');
    }
};
