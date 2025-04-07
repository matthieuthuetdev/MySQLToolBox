<?php

function scanDirectory($directory, $outputFile = "scan.txt") {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    
    $output = fopen($outputFile, "w");
    if (!$output) {
        die("Impossible d'ouvrir le fichier de sortie.");
    }
    
    foreach ($files as $file) {
        if ($file->isFile()) {
            $filePath = $file->getPathname();
            fwrite($output, "=== Contenu de $filePath ===\n");
            
            $content = @file_get_contents($filePath);
            if ($content === false) {
                fwrite($output, "Impossible de lire $filePath\n\n");
            } else {
                fwrite($output, $content . "\n\n");
            }
        }
    }
    
    fclose($output);
}

$directoryToScan = readline("C:\laragon\www\bailgarage\models");
scanDirectory($directoryToScan);
