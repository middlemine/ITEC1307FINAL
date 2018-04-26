<?php
// Update 3.1.3
//

$tpl = <<< EOTPL
[Config]
;WAMPCONFIGSTART
ImageList=images_off.bmp
ServiceCheckInterval=1
ServiceGlyphRunning=13
ServiceGlyphPaused=14
ServiceGlyphStopped=15
TrayIconAllRunning=16
TrayIconSomeRunning=17
TrayIconNoneRunning=18
ID={wampserver}
AboutHeader=WAMPSERVER ${c_wampVersion} ${c_wampMode}
AboutVersion=Version ${c_wampVersion}
;WAMPCONFIGEND

[AboutText]
WampServer Version ${c_wampVersion} ${c_wampMode}
Created by Romain Bourdon (2005)
Maintainer / Upgrade to 2.5 by Herve Leclerc
Upgrade to 3 by Otomatic (wampserver@otomatic.net)
Multi styles for homepage by Jojaba
Installer by Inno Setup: http://www.jrsoftware.org/isinfo.php
Forum Wampserver: http://forum.wampserver.com/index.php
${w_translated_by}
______________________ Versions used ______________________
Apache ${c_apacheVersion} - PHP ${c_phpVersion}
${SupportMySQL}MySQL ${c_mysqlVersion}
${SupportMariaDB}MariaDB ${c_mariadbVersion}
PHP ${c_phpCliVersion} for CLI (Command-Line Interface)

[Services]
Name: ${c_apacheService}
${SupportMySQL}Name: ${c_mysqlService}
${SupportMariaDB}Name: ${c_mariadbService}

[Variables]
Type: prompt; Name: "ApachePort"; PromptCaption: "${w_portForApache}"; PromptText: "${w_enterPort}"; DefaultValue: "${w_newPort}"
Type: prompt; Name: "AddListenApachePort"; PromptCaption: "${w_listenForApache}"; PromptText: "${w_enterPort}"; DefaultValue: "${w_addPort}"
${SupportMySQL}Type: prompt; Name: "MysqlPort"; PromptCaption: "${w_portForMysql}"; PromptText: "${w_enterPort}"; DefaultValue: "${w_newMysqlPort}"
${SupportMySQL}Type: prompt; Name: "MysqlUser"; PromptCaption: "MySQL user"; PromptText: "${w_MysqlMariaUser}"; DefaultValue: "root"
${SupportMariaDB}Type: prompt; Name: "MariaPort"; PromptCaption: "${w_portForMysql}"; PromptText: "${w_enterPort}"; DefaultValue: "${w_newMariaPort}"
${SupportMariaDB}Type: prompt; Name: "MariaUser"; PromptCaption: "MariaDB user"; PromptText: "${w_MysqlMariaUser}"; DefaultValue: "root"
Type: prompt; Name: "SuffixServices"; PromptCaption: "Suffix services"; PromptText: "${w_enterServiceNameAll}"; DefaultValue: "25"
Type: prompt; Name: "Size"; PromptCaption: "${w_Size}"; PromptText: "${w_EnterSize}"; DefaultValue: "512M"
Type: prompt; Name: "Seconds"; PromptCaption: "${w_Time}"; PromptText: "${w_EnterTime}"; DefaultValue: "360"
Type: prompt; Name: "Integer"; PromptCaption: "${w_Integer}"; PromptText: "${w_EnterInteger}"; DefaultValue: "2500"

[Messages]
AllRunningHint=${w_serverOffline} - ${w_allServicesRunning}
SomeRunningHint=${w_serverOffline} - ${w_oneServiceRunning}
NoneRunningHint=${w_serverOffline} - ${w_allServicesStopped}

[StartupAction]
;WAMPSTARTUPACTIONSTART
Action: run; FileName: "${c_phpCli}"; Parameters: "refresh.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: resetservices
Action: readconfig;
Action: service; Service: ${c_apacheService}; ServiceAction: startresume; Flags: ignoreerrors
${SupportMySQL}Action: service; Service: ${c_mysqlService}; ServiceAction: startresume; Flags: ignoreerrors
${SupportMariaDB}Action: service; Service: ${c_mariadbService}; ServiceAction: startresume; Flags: ignoreerrors
${RunAtStart}Action: run; FileName: "${c_navigator}"; Parameters: "${c_edge}http://localhost${UrlPort}/"; ShowCmd: normal; Flags: ignoreerrors

;WAMPSTARTUPACTIONEND

[Menu.Right.Settings]
;WAMPMENURIGHTSETTINGSSTART
AutoLineReduction=no
BarVisible=no
SeparatorsAlignment=center
SeparatorsFade=yes
SeparatorsFadeColor=clBtnShadow
SeparatorsFlatLines=yes
SeparatorsGradientEnd=$00A0A0A0
SeparatorsGradientStart=$00808080
SeparatorsGradientStyle=horizontal
SeparatorsFont=Arial,8,clWhite,bold
SeparatorsSeparatorStyle=caption
;WAMPMENURIGHTSETTINGSEND

[Menu.Left.Settings]
;WAMPMENULEFTSETTINGSSTART
AutoLineReduction=no
BarVisible=yes
BarCaptionAlignment=bottom
BarCaptionCaption=WAMPSERVER ${c_wampVersion}
BarCaptionDepth=1
BarCaptionDirection=downtoup
BarCaptionFont=Tahoma,13,clWhite,bold italic
BarCaptionHighlightColor=clNone
BarCaptionOffsetY=0
BarCaptionShadowColor=clNone
BarPictureHorzAlignment=center
BarPictureOffsetX=0
BarPictureOffsetY=0
BarPicturePicture=barimage.bmp
BarPictureTransparent=yes
BarPictureVertAlignment=bottom
BarBorder=clNone
BarGradientEnd=$00F2A626
BarGradientStart=$00C57F0B
BarGradientStyle=horizontal
BarSide=left
BarSpace=0
BarWidth=34
SeparatorsAlignment=center
SeparatorsFade=yes
SeparatorsFadeColor=clBtnShadow
SeparatorsFlatLines=yes
SeparatorsFont=Arial,8,clWhite,bold
SeparatorsGradientEnd=$00C57F0B
SeparatorsGradientStart=$00F2A626
SeparatorsGradientStyle=horizontal
SeparatorsSeparatorStyle=caption
;WAMPMENULEFTSETTINGSEND

[Menu.Right]
;WAMPMENURIGHTSTART
Type: item; Caption: "${w_about}"; Action: about; Glyph: 22
Type: item; Caption: "${w_refresh}"; Action: multi; Actions: wampreload; Glyph: 12
Type: item; Caption: "${w_help}"; Action: run; FileName: "${c_navigator}"; Parameters: "${c_edge}http://forum.wampserver.com/list.php?${forum}"; Glyph: 31
Type: submenu; Caption: "${w_language}"; SubMenu: language; Glyph: 3
Type: submenu; Caption: "${w_wampSettings}"; Submenu: submenu.settings; Glyph: 25
Type: submenu; Caption: "${w_wampTools}"; Submenu: submenu.tools; Glyph: 29
Type: item; Caption: "${w_exit}"; Action: multi; Actions: myexit; Glyph: 30
;WAMPMENURIGHTEND

[wampreload]
;WAMPRELOADSTART
Action: service; Service: ${c_apacheService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: run; Filename: "sc"; Parameters: "\\\\. stop ${c_apacheService}"; ShowCmd: hidden; Flags: waituntilterminated
Action: closeservices; Flags: ignoreerrors
Action: run; Filename: "taskkill"; Parameters: "/FI ""IMAGENAME eq httpd.exe"" /T /F"; ShowCmd: hidden; Flags: waituntilterminated
Action: run; FileName: "${c_phpCli}";Parameters: "switchPhpVersion.php ${c_phpVersion}";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: run; FileName: "${c_phpExe}";Parameters: "refreshSymlink.php ${c_phpVersion}"; WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: run; FileName: "net"; Parameters: "start ${c_apacheService}"; ShowCmd: hidden; Flags: waituntilterminated
Action: service; Service: ${c_apacheService}; ServiceAction: restart; Flags: ignoreerrors waituntilterminated
Action: run; FileName: "${c_phpCli}";Parameters: "refresh.php"; WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: resetservices
Action: readconfig;
;WAMPRELOADEND


[language]
;WAMPLANGUAGESTART
;WAMPLANGUAGEEND

[submenu.settings]
;WAMPSETTINGSSTART
;WAMPSETTINGSEND

[Menu.Left]
;WAMPMENULEFTSTART
Type: separator; Caption: "Made�in�France�by�Otomatic"
Type: item; Caption: "${w_localhost}"; Action: run; FileName: "${c_navigator}"; Parameters: "${c_edge}http://localhost${UrlPort}/"; Glyph: 27
${SupportDBMS}${phmyadMenu}Type: item; Caption: "${w_phpmyadmin}	${phpmyadminVersion}"; Action: run; FileName: "${c_navigator}"; Parameters: "${c_edge}http://localhost${UrlPort}/phpmyadmin/"; Glyph: 28
${SupportDBMS}${adminerMenu}Type: item; Caption: "Adminer		${adminerVersion}"; Action: run; FileName: "${c_navigator}"; Parameters: "${c_edge}http://localhost${UrlPort}/adminer/"; Glyph: 28
;WAMPVHOSTSUBMENU
;WAMPALIASSUBMENU
;WAMPPROJECTSUBMENU
Type: item; Caption: "${w_wwwDirectory}"; Action: shellexecute; FileName: "${wwwDir}"; Glyph: 2
Type: submenu; Caption: "Apache		${c_apacheVersion}"; SubMenu: apacheMenu; Glyph: 3
Type: submenu; Caption: "PHP		${c_phpVersion}"; SubMenu: phpMenu; Glyph: 3
;WAMPDBMSMENU
Type: separator; Caption: "${c_wampVersion} - ${c_wampMode} - ${w_services}"
Type: item; Caption: "${w_startServices}"; Action: multi; Actions: StartAll
Type: item; Caption: "${w_stopServices}"; Action: multi; Actions: StopAll
Type: item; Caption: "${w_restartServices}"; Action: multi; Actions: RestartAll
Type: separator;
;WAMPPUTONLINE
;Type: item; Caption: "For local test only"; Action: run; FileName: "${c_phpCli}"; Parameters: "test.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated; Glyph: 9
;WAMPMENULEFTEND

[apacheMenu]
;WAMPAPACHEMENUSTART
Type: submenu; Caption: "${w_version}"; SubMenu: apacheVersion; Glyph: 3
Type: servicesubmenu; Caption: "${w_service} '${c_apacheService}'"; Service: ${c_apacheService}; SubMenu: apacheService
Type: submenu; Caption: "${w_apacheModules}"; SubMenu: apache_mod; Glyph: 25
Type: submenu; Caption: "${w_aliasDirectories}"; SubMenu: alias_dir; Glyph: 3
Type: item; Caption: "httpd.conf"; Glyph: 33; Action: run; FileName: "${c_editor}"; parameters: "${c_apacheConfFile}"
${EditVhostConf}Type: item; Caption: "httpd-vhosts.conf"; Glyph: 33; Action: run; Filename: "${c_editor}"; parameters: "${c_apacheVhostConfFile}"
Type: item; Caption: "${w_apacheErrorLog}"; Glyph: 33; Action: run; FileName: "${c_editor}"; parameters: "${c_installDir}/${logDir}apache_error.log"
Type: item; Caption: "${w_apacheAccessLog}"; Glyph: 33; Action: run; FileName: "${c_editor}"; parameters: "${c_installDir}/${logDir}access.log"
${ApaTestPortUsed}Type: separator; Caption: "${w_portUsed}${c_UsedPort}"
${ApaTestPortUsed}Type: item; Caption: "${w_testPort80}"; Action: run; FileName: "${c_phpExe}"; Parameters: "testPort.php 80 ${c_apacheService}";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 24
${ApaTestPortUsed}Type: item; Caption: "${w_AlternatePort}"; Action: multi; Actions: UseAlternatePort; Glyph: 24
${ApaTestPortUsed}Type: item; Caption: "${w_testPortUsed}${c_UsedPort}"; Action: run; FileName: "${c_phpExe}"; Parameters: "testPort.php ${c_UsedPort} ${c_apacheService}";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 24
Type: item; Caption: "${w_apacheDoc}"; Action: run; FileName: "${c_navigator}"; Parameters: "${c_edge}http://httpd.apache.org/docs/2.4/en/"; Glyph: 35
;WAMPAPACHEMENUEND

[apacheVersion]
;WAMPAPACHEVERSIONSTART
;WAMPAPACHEVERSIONEND

[phpMenu]
;WAMPPHPMENUSTART
Type: submenu; Caption: "${w_version}"; SubMenu: phpVersion; Glyph: 3
Type: submenu; Caption: "${w_phpSettings}"; SubMenu: php_params; Glyph: 25
Type: submenu; Caption: "${w_phpExtensions}"; SubMenu: php_ext; Glyph: 25
Type: item; Caption: "php.ini"; Glyph: 33; Action: run; FileName: "${c_editor}"; parameters: "${c_phpConfFile}"
Type: item; Caption: "${w_phpLog}"; Glyph: 33; Action: run; FileName: "${c_editor}"; parameters: "${c_installDir}/${logDir}php_error.log"
Type: item; Caption: "${w_phpDoc}"; Action: run; FileName: "${c_navigator}"; Parameters: "${c_edge}http://www.php.net/manual/en/"; Glyph: 35
;WAMPPHPMENUEND

[phpVersion]
;WAMPPHPVERSIONSTART
;WAMPPHPVERSIONEND

[mysqlMenu]
;WAMPMYSQLMENUSTART
;WAMPMYSQLMENUEND

[mysqlVersion]
;WAMPMYSQLVERSIONSTART
;WAMPMYSQLVERSIONEND

[mariadbMenu]
;WAMPMARIADBMENUSTART
;WAMPMARIADBMENUEND

[mariadbVersion]
;WAMPMARIADBVERSIONSTART
;WAMPMARIADBVERSIONEND

[mysql_params]
Type: separator; Caption: "${w_mysqlSettings}"
;WAMPMYSQL_PARAMSSTART
;WAMPMYSQL_PARAMSEND

[mariadb_params]
Type: separator; Caption: "${w_mariaSettings}"
;WAMPMARIADB_PARAMSSTART
;WAMPMARIADB_PARAMSEND

[alias_dir]
;WAMPALIAS_DIRSTART
Type: separator; Caption: "${w_aliasDirectories}"
Type: item; Caption: "${w_addAlias}"; Action: multi; Actions: add_alias; Glyph: 34
Type: separator
;WAMPADDALIAS
;WAMPALIAS_DIREND


[php_params]
Type: separator; Caption: "${w_phpSettings}"
;WAMPPHP_PARAMSSTART
;WAMPPHP_PARAMSEND


[php_ext]
Type: separator; Caption: "${w_phpExtensions}"
;WAMPPHP_EXTSTART
;WAMPPHP_EXTEND


[add_alias]
;WAMPADD_ALIASSTART
Action: run; FileName: "${c_phpExe}"; Parameters: "addAlias.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: run; FileName: "${c_phpCli}"; Parameters: "refresh.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: service; Service: ${c_apacheService}; ServiceAction: restart;
Action: resetservices
Action: readconfig;
;WAMPADD_ALIASEND


[DoubleClickAction]
Action: about;

[apacheService]
;WAMPAPACHESERVICESTART
Type: separator; Caption: "${w_apache}"
Type: item; Caption: "${w_startResume}"; Action: service; Service: ${c_apacheService}; ServiceAction: startresume; Glyph: 9
;Type: item; Caption: "${w_pauseService}"; Action: service; Service: ${c_apacheService}; ServiceAction: pause; Glyph: 10
Type: item; Caption: "${w_stopService}"; Action: service; Service: ${c_apacheService}; ServiceAction: stop; Glyph: 11
Type: item; Caption: "${w_restartService}"; Action: service; Service: ${c_apacheService}; ServiceAction: restart; Glyph: 12
Type: separator
Type: item; Caption: "${w_installService}"; Action: multi; Actions: ApacheServiceInstall; Glyph: 8
Type: item; Caption: "${w_removeService}"; Action: multi; Actions: ApacheServiceRemove; Glyph: 7
;WAMPAPACHESERVICEEND


;WAMPMYSQLSERVICESTART
;WAMPMYSQLSERVICEEND

;WAMPMARIADBSERVICESTART
;WAMPMARIADBSERVICEEND

[StartAll]
;WAMPSTARTALLSTART
Action: service; Service: ${c_apacheService}; ServiceAction: startresume; Flags: ignoreerrors
${SupportMySQL}Action: service; Service: ${c_mysqlService}; ServiceAction: startresume; Flags: ignoreerrors
${SupportMariaDB}Action: service; Service: ${c_mariadbService}; ServiceAction: startresume; Flags: ignoreerrors
;WAMPSTARTALLEND

[StopAll]
;WAMPSTOPALLSTART
Action: service; Service: ${c_apacheService}; ServiceAction: stop; Flags: ignoreerrors
${SupportMySQL}Action: service; Service: ${c_mysqlService}; ServiceAction: stop; Flags: ignoreerrors
${SupportMariaDB}Action: service; Service: ${c_mariadbService}; ServiceAction: stop; Flags: ignoreerrors
;WAMPSTOPALLEND

[RestartAll]
;WAMPRESTARTALLSTART
Action: service; Service: ${c_apacheService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
${SupportMySQL}Action: service; Service: ${c_mysqlService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
${SupportMariaDB}Action: service; Service: ${c_mariadbService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: service; Service: ${c_apacheService}; ServiceAction: startresume; Flags: ignoreerrors waituntilterminated
${SupportMySQL}Action: service; Service: ${c_mysqlService}; ServiceAction: startresume; Flags: ignoreerrors waituntilterminated
${SupportMariaDB}Action: service; Service: ${c_mariadbService}; ServiceAction: startresume; Flags: ignoreerrors waituntilterminated
;WAMPRESTARTALLEND

[myexit]
;WAMPMYEXITSTART
Action: service; Service: ${c_apacheService}; ServiceAction: stop; Flags: ignoreerrors
${SupportMySQL}Action: service; Service: ${c_mysqlService}; ServiceAction: stop; Flags: ignoreerrors
${SupportMariaDB}Action: service; Service: ${c_mariadbService}; ServiceAction: stop; Flags: ignoreerrors
Action: exit
;WAMPMYEXITEND

[apache_mod]
;WAMPAPACHE_MODSTART
;WAMPAPACHE_MODEND


[ApacheServiceInstall]
;WAMPAPACHESERVICEINSTALLSTART
Action: run; FileName: "${c_phpExe}"; Parameters: "testPortForInstall.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: run; FileName: "${c_apacheExe}"; Parameters: "${c_apacheServiceInstallParams}"; ShowCmd: hidden; Flags: waituntilterminated
Action: run; Filename: "sc"; Parameters: "\\\\. config ${c_apacheService} start= demand"; ShowCmd: hidden; Flags: waituntilterminated
Action: resetservices
Action: readconfig;
;WAMPAPACHESERVICEINSTALLEND


[ApacheServiceRemove]
;WAMPAPACHESERVICEREMOVESTART
Action: service; Service: ${c_apacheService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: run; FileName: "${c_apacheExe}"; Parameters: "${c_apacheServiceRemoveParams}"; ShowCmd: hidden; Flags: waituntilterminated
Action: resetservices
Action: readconfig;
;WAMPAPACHESERVICEREMOVEEND

[UseAlternatePort]
;WAMPALTERNATEPORTSTART
Action: service; Service: ${c_apacheService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: run; FileName: "${c_phpExe}"; Parameters: "switchWampPort.php %ApachePort%";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: service; Service: ${c_apacheService}; ServiceAction: startresume; Flags: ignoreerrors waituntilterminated
Action: run; FileName: "${c_phpCli}"; Parameters: "refresh.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: readconfig;
;WAMPALTERNATEPORTEND

[AddListenPort]
;WAMPADDLISTENPORTSTART
Action: service; Service: ${c_apacheService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: run; FileName: "${c_phpExe}"; Parameters: "ListenPortApache.php add %AddListenApachePort%";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: service; Service: ${c_apacheService}; ServiceAction: startresume; Flags: ignoreerrors waituntilterminated
Action: run; FileName: "${c_phpCli}"; Parameters: "refresh.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: readconfig;
;WAMPADDLISTENPORTEND

[DeleteListenPort]
;WAMPDELETELISTENPORTSTART
;WAMPDELETELISTENPORTEND

;WAMPALTERNATEMYSQLPORTSTART
;WAMPALTERNATEMYSQLPORTEND

;WAMPALTERNATEMARIAPORTSTART
;WAMPALTERNATEMARIAPORTEND

;WAMPSWITCHMARIAMYSQLSTART
;WAMPSWITCHMARIAMYSQLEND

;WAMPSWITCHMYSQLMARIASTART
;WAMPSWITCHMYSQLMARIAEND

;WAMPMYSQLSERVICEINSTALLSTART
;WAMPMYSQLSERVICEINSTALLEND

;WAMPMYSQLSERVICEREMOVESTART
;WAMPMYSQLSERVICEREMOVEEND

;WAMPMARIADBSERVICEINSTALLSTART
;WAMPMARIADBSERVICEINSTALLEND

;WAMPMARIADBSERVICEREMOVESTART
;WAMPMARIADBSERVICEREMOVEEND

[submenu.tools]
;WAMPTOOLSSTART
Type: Separator; Caption: "${w_wampTools}"
Type: item; Caption: "${w_restartDNS}"; Action: multi; Actions: DnscacheServiceRestart; Glyph: 24
Type: item; Caption: "${w_testConf}"; Action: run; FileName: "${c_apacheExe}"; Parameters: "-t -w"; Flags: waituntilterminated; Glyph: 24
Type: item; Caption: "${w_testServices}"; Action: run; FileName: "${c_phpExe}"; Parameters: "msg.php stateservices";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated; Glyph: 24
Type: item; Caption: "${w_dnsorder}"; Action: run; FileName: "${c_phpExe}"; Parameters: "msg.php dnsorder";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated; Glyph: 24
Type: item; Caption: "${w_compilerVersions}"; Action: run; FileName: "${c_phpExe}"; Parameters: "msg.php compilerversions";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated; Glyph: 24
Type: item; Caption: "${w_vhostConfig}"; Action: run; FileName: "${c_phpExe}"; Parameters: "msg.php vhostconfig";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated; Glyph: 24
Type: item; Caption: "${w_apacheLoadedModules}"; Action: run; FileName: "${c_phpExe}"; Parameters: "msg.php apachemodules";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated; Glyph: 24

;WAMPPHPCLIMENUSTART
Type: submenu; Caption: "${w_deleteVer}"; Submenu: DeleteOldVersions; Glyph: 26
Type: separator; Caption: "${w_portUsed}${c_UsedPort}"
${TplListenPorts}Type: separator; Caption: "Listen ports: ${ListenPorts}"
Type: item; Caption: "${w_AddListenPort}"; Action: multi; Actions: AddListenPort; Glyph: 24
${TplListenPorts}Type: submenu; Caption: "${w_deleteListenPort}"; Submenu: DeleteListenPort; Glyph: 26
Type: item; Caption: "${w_testPort80}"; Action: run; FileName: "${c_phpExe}"; Parameters: "testPort.php 80 ${c_apacheService}";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 24
Type: item; Caption: "${w_AlternatePort}"; Action: multi; Actions: UseAlternatePort; Glyph: 24
${ApaTestPortUsed}Type: item; Caption: "${w_testPortUsed}${c_UsedPort}"; Action: run; FileName: "${c_phpExe}"; Parameters: "testPort.php ${c_UsedPort} ${c_apacheService}";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 24
;WAMPMYSQLSUPPORTTOOLS
;WAMPMARIADBSUPPORTTOOLS
${SupportMysqlAndMariaDB}Type: separator; Caption: "${w_defaultDBMS} ${DefaultDBMS}"
${SupportMysqlAndMariaDB}${MariadbDefault}Type: item; Caption: "${w_invertDefault}MariaDB <-> MySQL"; Action: multi; Actions: SwitchMariaToMysql; Glyph: 24
${SupportMysqlAndMariaDB}${MysqlDefault}Type: item; Caption: "${w_invertDefault}MySQL <-> MariaDB"; Action: multi; Actions: SwitchMysqlToMaria; Glyph: 24
Type: separator; Caption: "${w_misc}"
Type: submenu; Caption: "${w_cmdWindows}"; Submenu: CommandWindows; Glyph: 24
Type: submenu; Caption: "${w_empty} logs"; Submenu: CleanLogFiles; Glyph: 24
Type: item; Caption: "${w_reinstallServices}"; Action: multi; Actions: StopRemoveInstallStartAll; Glyph: 24
;WAMPCHANGESERVICESNAMESMENU
;WAMPTOOLSEND

[CleanLogFiles]
Type: item; Caption: "${w_empty} ${w_phpLog}"; Action: run; FileName: "${c_phpExe}"; parameters: "msg.php refreshLogs ${c_installDir}/${logDir}php_error.log";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 32
Type: item; Caption: "${w_empty} ${w_apacheErrorLog}"; Action: run; FileName: "${c_phpExe}"; parameters: "msg.php refreshLogs ${c_installDir}/${logDir}apache_error.log";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 32
Type: item; Caption: "${w_empty} ${w_apacheAccessLog}"; Action: run; FileName: "${c_phpExe}"; parameters: "msg.php refreshLogs ${c_installDir}/${logDir}access.log";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 32
${SupportMySQL}Type: item; Caption: "${w_empty} ${w_mysqlLog}"; Action: run; FileName: "${c_phpExe}"; parameters: "msg.php refreshLogs ${c_installDir}/${logDir}mysql.log";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 32
${SupportMariaDB}Type: item; Caption: "${w_empty} ${w_mariadbLog}"; Action: run; FileName: "${c_phpExe}"; parameters: "msg.php refreshLogs ${c_installDir}/${logDir}mariadb.log";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 32
Type: item; Caption: "${w_emptyAll} ${w_logFiles}"; Action: run; FileName: "${c_phpExe}"; parameters: "msg.php refreshLogs ${c_installDir}/${logDir}php_error.log ${c_installDir}/${logDir}apache_error.log ${c_installDir}/${logDir}access.log${EmptyMysqlLog}${EmptyMariaLog}";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 32

[CommandWindows]
Type: item; Caption: "${w_apacheCommand}"; Action: run; FileName: "%Cmd%"; WorkingDir: "${c_apacheBinDir}"; Flags: ignoreerrors; Glyph: 0
${SupportMySQL}Type: item; Caption: "${w_mysqlCommand}"; Action: run; FileName: "%Cmd%"; WorkingDir: "${c_mysqlBinDir}"; Flags: ignoreerrors; Glyph: 0
${SupportMariaDB}Type: item; Caption: "${w_mariadbCommand}"; Action: run; FileName: "%Cmd%"; WorkingDir: "${c_mariadbBinDir}"; Flags: ignoreerrors; Glyph: 0
Type: item; Caption: "${w_services_msc}"; Action: controlpanelservices; Glyph: 0

;WAMPMYSQLUSECONSOLEPROMPTSTART
;WAMPMYSQLUSECONSOLEPROMPTEND

;WAMPMARIADBUSECONSOLEPROMPTSTART
;WAMPMARIADBUSECONSOLEPROMPTEND

;WAMPPHPCLIVERSIONSSTART
;WAMPPHPCLIVERSIONEND

[DnscacheServiceRestart]
;WAMPDNSCACHESERVICESTART
Action: service; Service: ${c_apacheService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: run; Filename: "ipconfig"; Parameters: "/flushdns"; ShowCmd: hidden; Flags: waituntilterminated
Action: run; Filename: "net"; Parameters: "stop dnscache"; ShowCmd: hidden; Flags: waituntilterminated
Action: run; Filename: "net"; Parameters: "start dnscache"; ShowCmd: hidden; Flags: waituntilterminated
Action: run; FileName: "net"; Parameters: "start ${c_apacheService}"; ShowCmd: hidden; Flags: waituntilterminated
Action: run; FileName: "${c_phpCli}"; Parameters: "refresh.php"; WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: resetservices
Action: readconfig;
;WAMPDNSCACHESERVICEEND

[DeleteOldVersions]
;WAMPDELETEOLDVERSIONSSTART
;WAMPDELETEOLDVERSIONSEND

;WAMPONLINEOFFLINESTART
;WAMPONLINEOFFLINEEND

;WAMPCHANGESERVICESSTART
;WAMPCHANGESERVICESEND

[StopRemoveInstallStartAll]
Action: service; Service: ${c_apacheService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: run; FileName: "${c_apacheExe}"; Parameters: "${c_apacheServiceRemoveParams}"; ShowCmd: hidden; Flags: waituntilterminated
Action: resetservices
${SupportMySQL}Action: service; Service: ${c_mysqlService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
${SupportMySQL}Action: run; FileName: "${c_mysqlExe}"; Parameters: "${c_mysqlServiceRemoveParams}"; ShowCmd: hidden; Flags: waituntilterminated
${SupportMySQL}Action: resetservices
${SupportMariaDB}Action: service; Service: ${c_mariadbService}; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
${SupportMariaDB}Action: run; FileName: "${c_mariadbExe}"; Parameters: "${c_mariadbServiceRemoveParams}"; ShowCmd: hidden; Flags: waituntilterminated
${SupportMariaDB}Action: resetservices
Action: run; FileName: "${c_phpExe}"; Parameters: "testPortForInstall.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: run; FileName: "${c_apacheExe}"; Parameters: "${c_apacheServiceInstallParams}"; ShowCmd: hidden; Flags: waituntilterminated
Action: run; Filename: "sc"; Parameters: "\\\\. config ${c_apacheService} start= demand"; ShowCmd: hidden; Flags: waituntilterminated
Action: resetservices
${SupportMySQL}Action: run; FileName: "${c_mysqlExe}"; Parameters: "${c_mysqlServiceInstallParams}"; ShowCmd: hidden; Flags: ignoreerrors waituntilterminated
${SupportMySQL}Action: resetservices
${SupportMariaDB}Action: run; FileName: "${c_mariadbExe}"; Parameters: "${c_mariadbServiceInstallParams}"; ShowCmd: hidden; Flags: ignoreerrors waituntilterminated
${SupportMariaDB}Action: resetservices
Action: service; Service: ${c_apacheService}; ServiceAction: startresume; Flags: ignoreerrors
${SupportMySQL}Action: service; Service: ${c_mysqlService}; ServiceAction: startresume; Flags: ignoreerrors
${SupportMariaDB}Action: service; Service: ${c_mariadbService}; ServiceAction: startresume; Flags: ignoreerrors
Action: resetservices
Action: readconfig;

EOTPL;

?>