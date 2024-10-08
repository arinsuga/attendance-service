@echo off

rem CLI Script to Check Compatibility of chunk of PHP code

rem PHP versions 4 and 5

rem LICENSE: This source file is subject to version 3.01 of the PHP license
rem that is available through the world-wide-web at the following URI:
rem http://www.php.net/license/3_01.txt.  If you did not receive a copy of
rem the PHP License and are unable to obtain it through the web, please
rem send a note to license@php.net so we can mail you a copy immediately.

rem @category   PHP
rem @package    PHP_CompatInfo
rem @author     Laurent Laville <pear@laurent-laville.org>
rem @license    http://www.php.net/license/3_01.txt  PHP License 3.01
rem @version    CVS: $Id: compatinfo.bat,v 1.4 2007/02/11 16:20:50 farell Exp $
rem @link       http://pear.php.net/package/PHP_CompatInfo
rem @since      File available since Release 1.3.0

"C:\HRD\xampp\php\.\php.exe" -d include_path=".\pear" -f "PHP\CompatInfo\pcicmd.php" -- %*

