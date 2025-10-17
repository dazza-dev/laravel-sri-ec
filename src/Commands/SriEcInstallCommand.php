<?php

namespace DazzaDev\LaravelSriEc\Commands;

use DazzaDev\LaravelSriEc\Models\SriListing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SriEcInstallCommand extends Command
{
    protected $signature = 'sri-ec:install';

    protected $description = 'Llena las tablas con la información del paquete Sri Ec';

    public function handle()
    {
        $this->info('Iniciando instalación de SRI ...');

        $jsonPath = base_path('vendor/dazza-dev/sri-xml-generator/src/Data');

        if (! File::exists($jsonPath)) {
            $this->error("No se encontró la carpeta de datos en: $jsonPath");

            return;
        }

        // Get all files in the JSON folder
        $files = File::files($jsonPath);

        // Iterate through all files in the JSON folder
        foreach ($files as $file) {
            $filename = $file->getFilename();
            $tableName = str_replace('.json', '', $filename);

            // Read and decode JSON
            $data = json_decode(File::get($file->getPathname()), true);

            if (! $data || ! is_array($data)) {
                $this->warn("El archivo {$filename} no tiene un formato JSON válido.");

                continue;
            }

            // Insert data
            $formattedData = array_map(function ($item) use ($tableName) {
                return [
                    'name' => $item['name'],
                    'code' => $item['code'],
                    'description' => $item['description'] ?? null,
                    'type' => $tableName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $data);

            SriListing::insertOrIgnore($formattedData);
            $this->info("Datos de {$tableName} insertados correctamente.");
        }

        $this->info('Proceso finalizado con éxito.');
    }
}
