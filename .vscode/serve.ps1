# Serves this checkout (the folder above .vscode) with PHP's built-in server.
# Picks the first free port from 8000 up, unless -Port is given.
param([int]$Port = 0)

$php = "C:\xampp\php\php.exe"
$root = (Resolve-Path "$PSScriptRoot\..").Path
$router = Join-Path $PSScriptRoot "dev-router.php"

function Test-PortFree([int]$p) {
    return -not (Get-NetTCPConnection -State Listen -LocalPort $p -ErrorAction SilentlyContinue)
}

if ($Port -eq 0) {
    $Port = 8000
    while (-not (Test-PortFree $Port)) { $Port++ }
}

# Fill in photos submodule
$photos = Join-Path $root "photos"
if ((Test-Path $photos) -and -not (Get-ChildItem $photos -Force | Select-Object -First 1)) {
    Write-Host "photos/ is empty, fetching the submodule..."
    git -C $root submodule update --init photos
    if ($LASTEXITCODE -ne 0) {
        Write-Host "Warning: couldn't fetch photos/, serving without it" -ForegroundColor Yellow
    }
}

Write-Host "Serving $root"
Write-Host "Open http://localhost:$Port  (Ctrl+C to stop)" -ForegroundColor Green
Set-Location $root
& $php -d "include_path=.;$root" -d display_errors=On -d error_reporting=E_ALL -S "localhost:$Port" -t $root $router
