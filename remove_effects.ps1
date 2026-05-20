$files = Get-ChildItem -Path "resources\views\components\frontend", "resources\views\frontend\products" -Filter "*.blade.php" -Recurse -File

foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw
    
    # Remove rounded, rounded-*, shadow, shadow-*
    $content = $content -replace '\brounded-[a-z0-9]+\b', ''
    $content = $content -replace '\brounded\b', ''
    $content = $content -replace '\bshadow-[a-z0-9]+\b', ''
    $content = $content -replace '\bshadow\b', ''
    
    # Remove backdrop-blur-* and blur-*
    $content = $content -replace '\bbackdrop-blur-[a-z0-9]+\b', ''
    $content = $content -replace '\bblur-[a-z0-9\[\]]+\b', ''
    
    Set-Content -Path $file.FullName -Value $content -NoNewline
    Write-Host "Processed $($file.Name)"
}
