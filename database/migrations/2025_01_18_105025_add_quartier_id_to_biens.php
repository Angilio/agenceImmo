<?php

use App\Models\Quartier;
use App\Models\Type_bien;
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
        Schema::table('biens', function (Blueprint $table) {
            $table->foreignIdFor(Quartier::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Type_bien::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biens', function (Blueprint $table) {
            $table->dropForeignIdFor(Quartier::class);
            $table->dropForeignIdFor(Type_bien::class);
        });
    }
};
