@echo off
rem Codepage check: ��� (IBM852, OEM 852)
php %~dp0..\..\TToolbox\run\cli.php ttdemo\demo\democli\DemoCliRun foo bar %*
