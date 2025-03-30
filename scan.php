<?php

/**
 * Fonction pour parcourir récursivement les dossiers et fichiers
 * en ignorant le dossier .git, et écrire leurs chemins et contenus dans un fichier texte.
 *
 * @param string $directory Répertoire à parcourir
 * @param resource $outputFile Ressource du fichier de sortie
 */
function scanDirectory(string $directory, $outputFile): void {
    // Ouvre le répertoire
    $items = scandir($directory);
    if ($items === false) {
        return;
    }

    foreach ($items as $item) {
        // Ignore les entrées spéciales "." et ".."
        if ($item === '.' || $item === '..') {
            continue;
        }

        $path = $directory . DIRECTORY_SEPARATOR . $item;

        // Ignore le dossier .git
        if (is_dir($path) && $item === '.git' || $item == '.gitignore' || $item == '.gitattributes' || $item == 'LICENSE' || $item == 'resultat.txt') {
            continue;
        }

        // Si c'est un dossier, appel récursif
        if (is_dir($path)) {
            scanDirectory($path, $outputFile);
        } else {
            // Si c'est un fichier, écrit son chemin et son contenu
            fwrite($outputFile, "Chemin du fichier : $path\n");
            fwrite($outputFile, str_repeat('-', 80) . "\n");

            $content = file_get_contents($path);
            if ($content !== false) {
                fwrite($outputFile, $content . "\n");
            } else {
                fwrite($outputFile, "Impossible de lire le contenu du fichier.\n");
            }

            fwrite($outputFile, str_repeat('=', 80) . "\n\n");
        }
    }
}

// Chemin du fichier de sortie
$outputFilePath = 'resultat.txt';

// Ouvre le fichier de sortie en écriture
$outputFile = fopen($outputFilePath, 'w');
if ($outputFile === false) {
    die("Impossible de créer le fichier de sortie.\n");
}

// Démarre le scan depuis le répertoire courant
$startDirectory = __DIR__;
scanDirectory($startDirectory, $outputFile);

// Ferme le fichier de sortie
fclose($outputFile);

echo "Le scan est terminé. Les résultats sont enregistrés dans '$outputFilePath'.\n";
?>
