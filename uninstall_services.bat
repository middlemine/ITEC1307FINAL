start /wait c:\wamp\wampmanager.exe -quit -id={wampserver}
NET STOP wampapache
sc delete wampapache
NET STOP wampmysqld
sc delete wampmysqld
NET STOP wampmariadb
sc delete wampmariadb
