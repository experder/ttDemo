@echo off
rem Codepage check: ��� (IBM852, OEM 852)
php %~dp0..\TToolbox\run_cli\run.php ttdemo\demo\DemoCliRun foo bar %*
