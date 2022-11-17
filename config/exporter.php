<?php
return[
    'exporters'=>[
        'json' => \App\Crm\Customer\Services\Export\JsonExport::class,
        'excel' => \App\Crm\Customer\Services\Export\ExcelExport::class,
        'html' => \App\Crm\Customer\Services\Export\HtmlExport::class,
        'pdf' => \App\Crm\Customer\Services\Export\PdfExport::class,

    ]
];
