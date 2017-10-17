@echo off

rem -------------------------------------------------------------
rem  SVC command line bootstrap script for Windows.
rem
rem  @author Zahrin Azam <zahrin.azam@rekamy.com>
rem -------------------------------------------------------------

@setlocal

set SVC_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%SVC_PATH%svc" %*

@endlocal
