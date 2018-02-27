@echo off
setlocal

php make.php

set CONTROLLERS=%LOCALAPPDATA%\Mixxx\controllers

echo Moving previous version to "%TEMP%"...
echo.
move "%CONTROLLERS%\Behringer_CMD_PL-1*" %TEMP%
move "%CONTROLLERS%\CMD_PL-1*" %TEMP%
echo.
echo Copying new version to "%CONTROLLERS%"...
echo.
copy CMD_PL-1* %CONTROLLERS%
echo.
