<?php
    $text = $_POST["text"];
    $escaped = escapeshellarg($text);
    
    $script = __DIR__ . "/analyze.py";
    $command = "python $script $escaped 2>&1";
    
    $output = shell_exec($command);
    
    echo $output;
?>