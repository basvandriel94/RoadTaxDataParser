<?php

    require_once "../src/Bas/RoadTaxDataWriter/Parser/Parser.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatterDataWriter/FormattedDataWriter.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatConverter/FormatConverterHandler.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatConverter/FormatConverter.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatConverter/FormatConverters/DeliveryVanFormatConverter.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatConverter/FormatConverters/ProfessionalVehicleRegistrationFormatConverter.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatConverter/FormatConverters/DrivingStoreVehicleFormatConverter.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatConverter/FormatConverters/MotorcycleFormatConverter.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatConverter/FormatConverters/PassengerCarFormatConverter.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatConverter/FormatConverters/CampingCarFormatConverter.php";
    require_once "../src/Bas/RoadTaxDataWriter/FormatConverter/FormatConverters/BusFormatConverter.php";

    //The root folder of the project
    $root = dirname(__DIR__);

    $parser = new \Bas\RoadTaxDataWriter\Parser\Parser("{$root}\\var\\data.json");
    $data   = $parser->parse();

    $formatter        = new \Bas\RoadTaxDataWriter\FormatConverter\FormatConverterHandler((array)$data);
    $formatConverters = $formatter->resolveFormatConverters();
    $formattedData    = $formatter->convertFormat($formatConverters);

    $formattedDataWriter = new \Bas\RoadTaxDataWriter\FormatterDataWriter\FormattedDataWriter($formattedData);
    $formattedDataWriter->saveFiles("{$root}\\var\\output");
