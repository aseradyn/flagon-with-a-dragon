# Creates an empty Ephemera page named YYYY-MM-DD_NN.md for today,
# where NN is the next unused count for the day.

$dir = Join-Path $PSScriptRoot '..\pages\ephemera'
$date = Get-Date -Format 'yyyy-MM-dd'

$n = 1
while (Test-Path (Join-Path $dir ('{0}_{1:D2}.md' -f $date, $n))) { $n++ }

$path = Join-Path $dir ('{0}_{1:D2}.md' -f $date, $n)
New-Item -ItemType File -Path $path | Out-Null
$path = (Resolve-Path $path).Path
Write-Host "Created $path"

# Open the new file in VS Code if the CLI is available
if (Get-Command code -ErrorAction SilentlyContinue) { code $path }
