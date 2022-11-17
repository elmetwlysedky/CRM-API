<?php

namespace App\Crm\Customer\Services\Export;

use App\Crm\Customer\Exception\InvalidExportFormat;

class ExportFactory
{
    public static function instance(string $format) : ExportInterface
    {
        $exporter = config('exporter.exporters')[$format] ?? null;

        if (! $exporter){
            throw new InvalidExportFormat(sprintf("format %s is not supported",$format));
        }

          return new $exporter;
    }

}
