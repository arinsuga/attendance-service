for /F "usebackq tokens=1,2 delims==" %%i in (`wmic os get LocalDateTime /VALUE 2^>NUL`) do if '.%%i.'=='.LocalDateTime.' set ldt=%%j
set yyyy=%ldt:~0,4%
set mm=%ldt:~4,2%
set dd=%ldt:~6,2%


set mydir=EXPORT_ABSENPWA_%yyyy%%mm%%dd%

set basesourcedir_attend="source\dir\ATTEND.DBF"
set basesourcedir_badge="source\dir\badge.DBF"
set basetargetdir=%CD%
set baselogdir=%CD%\log


set sourcedir_attend=%basesourcedir_attend%
set sourcedir_badge=%basesourcedir_badge%
set targetdir=%basetargetdir%
set logdir=%baselogdir%

@echo off
call :sub >%logdir%\%mydir%_log.log
exit /b

:sub
echo ============================================================
echo EXPORT ABSENSI PWA
echo ============================================================
echo y|xcopy %sourcedir_attend% %targetdir% /i /h /r
echo y|xcopy %sourcedir_badge% %targetdir% /i /h /r
