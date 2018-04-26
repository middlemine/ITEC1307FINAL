
21 March 2018                                      Apache Lounge Distribution

                                                    Apache 2.4.33 win32 VC15

Original Home: httpd.apache.org
Binary by: Steffen
Mail: info@apachelounge.com
Home: www.apachelounge.com


Announcement: http://www.apachelounge.com/viewforum.php?f=1


Change Log: http://www.apachelounge.com/Changelog-2.4.html


Build with the dependencies
---------------------------
  - openssl 1.0.2n
  - jansson 2.11
  - curl 7.59.0
  - nghttp2 1.31.0
  - apr 1.6.3 
  - apr-util 1.6.1 with Crypto OpenSSL enabled
  - apr-iconv 1.2.2
  - zlib 1.2.11 
  - brotli 1.0.3 
  - pcre 8.42 with JIT, SUPPORT_UTF8 and REBUILD_CHARTABLES enabled
  - httpd.exe with OPENSSL_Applink and SupportedOS Manifest
  - libxml2 2.9.8
  - lua 5.2.4
  - expat 2.2.5

Build with Visual Studio® 2017 (VC15) x86
--------------------------------------------
Be sure you have installed the Visual C++ Redistributable for Visual Studio 2017 x86.
Download and install, if you not have it already, see:

 http://www.apachelounge.com/download/


Minimum system required
-----------------------

Windows 7 SP1
Windows 8 / 8.1
Windows 10
Windows Server 2016
Windows Server 2008 R2 SP1 
Windows Server 2012 / R2
Windows Vista SP2

Install
-------


- Unzip the Apache24 folder to c:/Apache24 (that is the ServerRoot in the config).
  Default folder for your your webpages is DocumentRoot "c:/Apache24/htdocs"

  When you unzip to an other location, change ServerRoot in the httpd.conf,
  and change in httpd.conf the Documenroot, Directories, ScriptAlias,
  also when you use the extra folder config file(s) change to your location there. 

Start apache in a DOS box:

>httpd.exe

Install as a service:

>httpd.exe -k install

ApacheMonitor:

Double click ApacheMonitor.exe, or put it in your Startup folder.



Upgrading
---------

- Upgrading from 2.2.x see: httpd.apache.org/docs/2.4/upgrading.html
  and see httpd.apache.org/docs/2.4/new_features_2_4.html .

- Updating from 2.3.x
  copy all the files over, except your changed .conf files.



When you have questions or want more info, post in the forum at www.apachelounge.com or mail me.

Enjoy,

Steffen



Legal note:

   This distribution includes cryptographic software.  The country in 
   which you are currently may have restrictions on the import, 
   possession, and use, and/or re-export to another country, of 
   encryption software.  BEFORE using any encryption software, please 
   check the country's laws, regulations and policies concerning the
   import, possession, or use, and re-export of encryption software, to 
   see if this is permitted.

   The U.S. Government Department of Commerce, Bureau of Industry and
   Security (BIS), has classified this software as Export Commodity 
   Control Number (ECCN) 5D002.C.1, which includes information security
   software using or performing cryptographic functions with asymmetric
   algorithms.  The form and manner of this Apache Software Foundation
   distribution makes it eligible for export under the License Exception
   ENC Technology Software Unrestricted (TSU) exception (see the BIS 
   Export Administration Regulations, Section 740.13) for both object 
   code and source code.

   The authors of the represented software packages and me, are not
   liable for any violations you make. Be careful, it is your responsibility. 
