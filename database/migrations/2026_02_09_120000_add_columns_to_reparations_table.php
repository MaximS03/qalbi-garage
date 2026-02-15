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
        Schema::table('reparations', function (Blueprint $table) {
            if (!Schema::hasColumn('reparations', 'vehicule_id')) {
                $table->unsignedBigInteger('vehicule_id')->nullable()->after('id');
            }
            if (!Schema::hasColumn('reparations', 'technicien_id')) {
                $table->unsignedBigInteger('technicien_id')->nullable();
            }
            if (!Schema::hasColumn('reparations', 'date_debut')) {
                $table->dateTime('date_debut')->nullable();
            }
            if (!Schema::hasColumn('reparations', 'date_fin')) {
                $table->dateTime('date_fin')->nullable();
            }
            if (!Schema::hasColumn('reparations', 'description')) {
                $table->text('description')->nullable();
            }

            // Add foreign keys if they don't already exist — wrapped in try/catch to avoid
            // failing on environments where FK constraints differ.
            try {
                $sm = Schema::getConnection()->getDoctrineSchemaManager();
                $indexes = $sm->listTableIndexes('reparations');
            } catch (\Throwable $e) {
                $indexes = [];
            }

            // Add foreign key constraints (best-effort)
            try {
                $table->foreign('vehicule_id')
                    ->references('id')
                    ->on('vehicules')
                    ->onDelete('cascade');
            } catch (\Throwable $e) {
                // ignore if FK cannot be created in this environment
            }

            try {
                $table->foreign('technicien_id')
                    ->references('id')
                    ->on('techniciens')
                    ->onDelete('set null');
            } catch (\Throwable $e) {
                // ignore
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reparations', function (Blueprint $table) {
            try { $table->dropForeign(['vehicule_id']); } catch (\Throwable $e) {}
            try { $table->dropForeign(['technicien_id']); } catch (\Throwable $e) {}

            if (Schema::hasColumn('reparations', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('reparations', 'date_fin')) {
                $table->dropColumn('date_fin');
            }
            if (Schema::hasColumn('reparations', 'date_debut')) {
                $table->dropColumn('date_debut');
            }
            if (Schema::hasColumn('reparations', 'technicien_id')) {
                $table->dropColumn('technicien_id');
            }
            if (Schema::hasColumn('reparations', 'vehicule_id')) {
                $table->dropColumn('vehicule_id');
            }
        });
    }
};
