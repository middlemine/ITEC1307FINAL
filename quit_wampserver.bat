echo off
NET STOP wampapache
NET STOP wampmysqld
NET STOP wampmariadb
start /wait c:\wamp\wampmanager.exe -quit -id={wampserver}