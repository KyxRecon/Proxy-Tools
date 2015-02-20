#!/usr/bin/env python
# Sproxy Tool
# By : Alexcerus
#Demo : https://www.youtube.com/watch?v=qliqTP6pFkA
#
import sys
import sys
import sys
import sys
import sys
import sys
import sys
import os
import random
import re
import os

class bcolors:
    HEADER = '\033[95m'
    OKBLUE = '\033[94m'
    OKGREEN = '\033[92m'
    WARNING = '\033[93m'
    FAIL = '\033[91m'
    ENDC = '\033[0m'
    BOLD = '\033[1m'

import random
if(sys.version_info[0] != 2 or sys.version_info[1] != 7):
	print("\n[!] Error ! :  this tool was created only for Python 2.7.5\nPlease download it at http://python.org/download/releases/2.7.5/ \n")
	sys.exit()
import urllib2
import HTMLParser
import re
import os
from sys import platform as _platform
from time import strftime
import base64
from collections import OrderedDict
try:
	from colorama import init, Fore, Back, Style
	init()
except Exception:
	print("You don't have colorama installed! Please download and install it from https://pypi.python.org/pypi/colorama then restart IP Proxy Scraper!")
	sys.exit()


Custom_User_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17"
Default_User_agent = "Googlebot/2.1 (+http://www.googlebot.com/bot.html)"
SucceededWebsites = []
NoSuccessWebsites = []
NoSuccessCounter = 0
ScrapedProxies = []
ProxyCounter = 0
TimeOut = 10
OurIP = ""
Html = ""

def GetSourceCode(url, useragent = Default_User_agent):
	try:
		# Set the user agent
		if(useragent == Default_User_agent):
			user_agent = {"User-Agent" : Default_User_agent}
		else:
			user_agent = {"User-Agent" : Custom_User_agent}

		# set the headers
		request = urllib2.Request(url, data=None, headers=user_agent)

		# make the request
		response = urllib2.urlopen(request)

		# print some debug info if needed
		if(sys.argv[1] == "-d"):
			Log("\n\tResponse from {1}\n\tStatus code: {0}\n\tCharset: {2}\n\tServer: {3}\n".format(response.getcode(), url, response.headers.getparam('charset'), response.info()['server']), "magenta")
				
	# needed if the argv[1] wasn't specified
	except IndexError:
		pass
		
		# check if the server returned a positive http code
		if response.getcode() == 200:
			global Html
			encoding = response.headers.getparam('charset')
			if(encoding):
				Html = response.read().decode(encoding)
			else:
				Html = response.read()
				
			# remove our IP from the sourcecode
			if OurIP in Html:
				Html = Html.replace(OurIP,"")

			# replace some encoded html chars to their real char
			Html = Html.replace("&quot;",'"').replace("&nbsp;"," ").replace("&gt;",">").replace("&lt;","<").replace("&amp;","&")
			return

	except urllib2.URLError:
		pass
	NoSuccess(url)
	return

def Scrape(url):
	# check for a valid url and fix it if necessary
	url = url.strip().lower()
	
	if(not url or "facebook" in url):
		return

	if(url.startswith("www.")):
		url = "http://%s" % url

	elif(url.startswith("www.") == False and url.startswith("http://") == False and url.startswith("https://") == False):
		url = "http://%s" % url


	try:
		if("proxy-list.co.uk" in url):
			GetSourceCode(url, Custom_User_agent)
		else:
			GetSourceCode(url)
		if(Filter(r'(&#?\w{2};?)+', url, "HTML_Encoded")):
			pass
		if(Filter(r"Base64.decode\(('|\").*('|\")", url, "Base64_Encoded")):
			pass
		if(Filter(r"('|\")(%\\w{2}){10,}('|\")", url, "URL_Encoded")):
			pass
		if("proxz.com" in url):
			if(Filter(r'(\d{1,3}\.?){4}:\d{1,5}', url, "None")):
				pass
			else:
				NoSuccess(url)
			return
		if("xroxy.com" in url):
			if(Filter(r'proxy&host=(\d{1,3}\.){3}\d{1,3}&port=\d{1,5}', url, "None")):
				pass
			else:
				NoSuccess(url)
			return
		if("anonymousinet.com" in url or "proxycemetery.com" in url or "proxyforest.com" in url):
			if(Filter(r'\(\d(\,\'\d{1,3}\'){4}', url, "anonminet")):
				pass
			else:
				NoSuccess(url)
			return
		if("gatherproxy.com" in url):
			if(Filter(r'PROXY_IP\":\"(\d{1,3}\.){3}\d{1,3}', url, "gatherproxy")):
				pass
			else:
				NoSuccess(url)
			return
		if("proxylisty.com" in url):
			if(Filter(r"<td><a\shref='.*(L|l)ist'>\d+", url, "proxylisty")):
				pass
			else:
				NoSuccess(url)
			return
		if("proxy-list.co.uk" in url):
			if(Filter(r"rel=\"nofollow\">(\d{1,3}\.){3}\d{1,3}</a>", url, "proxylistdotcodotuk")):
				pass
			else:
				NoSuccess(url)
			return
		if("antipalivo.ru" in url):
			if(Filter(r"decode\(\"(\d+,?)+\"\)", url, "antipalivo")):
				pass
			else:
				NoSuccess(url)
			return
		if("nntime.com" in url):
			if(Filter(r'(\w=\d;){8,10}', url, "nntime")):
				pass
			else:
				NoSuccess(url)
			return
		if("ultraproxies.com" in url):
			if(Filter(r'>\d{2}-(\d{2}-?)+<', url, "ultraproxies")):
				pass
			else:
				NoSuccess(url)
			return
		if("proxynova.com" in url):
			if(Filter(r'decode\(\"\w+\"', url, "proxynova")):
				pass
			else:
				NoSuccess(url)
			return
		if("checkedproxylists.com" in url):
			if(Filter(r"\"loadData\('.+?D'", url, "checkedproxylists")):
				pass
			else:
				NoSuccess(url)
			return
		if("freeproxylists.com" in url):
			if(Filter(r"'dataID',\s'.+'", url, "freeproxylists")):
				pass
			else:
				NoSuccess(url)
			return
		if("cool-proxy.net" in url):
			if(Filter(r"document.write\((\d{1,3}\.){3}\d{1,3}\)", url, "coolproxy")):
				pass
			else:
				NoSuccess(url)
			return
		if("proxylist.ro" in url):
			if(Filter(r"(z\(\d+-\d+\);)+(.|\n)+?(z\(\d+-\d+\);)+", url, "proxylistdotro")):
				pass
			else:
				NoSuccess(url)
			return
		if("idcloak.com" not in url):
			if(Filter(r'(\d{1,3}\.){3}\d{1,3}:\[?\d{1,5}\]?', url, "None")):
				return
		if(Filter(r'(\d{1,3}\.){3}\d{1,3}</td><td>\d{1,5}', url, "None")):
			return
		if(Filter(r'\d{1,5}</td><td>(\d{1,3}\.){3}\d{1,3}', url, "None")):
			return
		if(Filter(r'<.+?>?(\d{1,3}\.){3}\d{1,3}(.|\n)*?<.+?>\d{1,5}', url, "NewLine")):
			return
	except KeyboardInterrupt:
		pass
	NoSuccess(url)
	return

def AddToSuccessCounter(matchesCount, url):
	global ProxyCounter
	ProxyCounter += matchesCount
	SucceededWebsites.append(url)
	return

def Log(msg, color = ""):
	if(color == "black"):
		print(Fore.BLACK + msg + Fore.RESET)
		return
	elif(color == "magenta"):
		print(Fore.MAGENTA + msg + Fore.RESET)
		return
	elif(color == "red"):
		print(Fore.RED + msg + Fore.RESET)
		return
	elif(color == "blue"):
		print(Fore.BLUE + msg + Fore.RESET)
		return
	elif(color == "yellow"):
		print(Fore.YELLOW + msg + Fore.RESET)
		return
	elif(color == "green"):
		print(Fore.GREEN + msg + Fore.RESET)
		return
	elif(color == "white" or color == "reset"):
		print(Fore.RESET + msg)
		return
	elif(color == "cyan"):
		print(Fore.CYAN + msg + Fore.RESET)
		return
	else:
		print(msg)
	return

def NoSuccess(url):
	global NoSuccessCounter
	NoSuccessCounter += 1
	global NoSuccessWebsites
	NoSuccessWebsites.append(url)
	return
	
def StatusReport():

	try:
		if(ProxyCounter <= 0):
			print("\nNo proxies found!\n")
		else:
			print("---------------------------------------\n\tProxies Found Result : %d\n\n" % ProxyCounter )

			exportToFile = raw_input("\tExport to file? (Y/n): ");
			if("N" in exportToFile or "n" in exportToFile):
				pass
			else:
				SaveFile()

			# prompt to view the list of results
			if(NoSuccessCounter > 0):
				viewList = raw_input( "\n\tView website statistics? (y/N): ");
				if("y" in viewList or "Y" in viewList):
					global SucceededWebsites
					global NoSuccessWebsites
					# remove duplicate entries from the lists
					uniqueSW = list(OrderedDict.fromkeys(SucceededWebsites))
					uniqueNW = list(OrderedDict.fromkeys(NoSuccessWebsites))
					
					print("\n\tWebsites without proxies:\n\t---------------------------------------\n")
					for url in uniqueNW:
						Log("\t" + url,"red")
						
					print("\n\n\tWebsites with proxies:\n\t---------------------------------------\n")
					for url in uniqueSW:
						Log("\t" + url,"green")
						
					exportToFile = raw_input("\n\tExport succeeded websites to file? (y/N): ")
					if(exportToFile == "Y" or exportToFile == "y"):
						with open("output/Succeeded websites.txt","w+") as f:
							urlList = []
							# read all lines from the file (if it exists)
							for urlFromFile in f.readlines():
								urlList.append(urlFromFile)
							# append all succeeded websites to the list
							for sucUrl in uniqueSW:
								urlList.append(sucUrl)
							
							unique = list(OrderedDict.fromkeys(urlList))
							for url in unique:
								f.write(url + os.linesep)

						print("\n\tFile has been saved!\n\tYou can find it under 'output/Succeeded websites.txt'\n")

			# wait until we hit enter to continue because the call to Menu will clear the screen
		raw_input("\n\tHit enter to return to the main menu...")
	except KeyboardInterrupt:
		sys.exit()
	Menu()
	return

def SaveFile():
	try:
		fileName = raw_input("\tFilename: ~> ");
		
	except KeyboardInterrupt:
		sys.exit()
		return
	
	#check if we have the directory 'output', if not create it.
	if(os.path.isdir("output") == False):
		os.makedirs("output")

	#if we accidently press enter or don't provide a filename, set a default one
	if(fileName == ""):
		print("\tUsing default filename...")
		fileName = strftime("{0} Proxies - %d.%b.%Y %H%M%S").format(ProxyCounter) + ".txt"
		
	with open("output/" + fileName,'w') as file:
		for lines in ScrapedProxies:
			file.write(lines + os.linesep) # linesep securily makes a new line

	print("\n\tFile saved!\n\tYou can find it under 'output/%s'\n" % fileName)
	return

def Filter(regexPattern, url, Encryption):

	global Html
	matchesCount = len(list(re.finditer(regexPattern, Html)))
	matches = re.finditer(regexPattern, Html)
	
	if(Encryption is "None"):
		if(matchesCount > 0):
			for match in matches:
				Dump(match.group())

			AddToSuccessCounter(matchesCount, url)
			return True
	elif(Encryption is "HTML_Encoded"):
		# Are HTML encoded characters in the source code?
		if(matchesCount > 0):
			Html = HtmlDecoder()
			return True
	elif(Encryption is "Base64_Encoded"):
		# Are Base64 encrypted strings in the source code?
		if(matchesCount > 0):
			for match in matches:
				Html = Html.replace(match.group() ,Base64Decoder(match.group().replace("Base64.decode(\"", "")))
			return True
	elif(Encryption is "URL_Encoded"):
		# Are URL-Encoded strings in the source code?
		if(matchesCount > 0):
			for match in matches:
				Html = Html.replace(match, URLDecoder(match))
			return True
	elif(Encryption is "NewLine"):
		if(matchesCount > 0):
			for match in matches:
				Dump(match.group())
				
			AddToSuccessCounter(matchesCount, url)
			return True
	elif(Encryption is "anonminet"):
		if("anonymousinet.com" in url or "proxyforest.com" in url):
			matches = re.finditer(r'\(\d(\,\'\d{1,3}\'){4}\,\d{1,5}\);', Html)
			matchesCount = len(list(matches))
			if(matchesCount > 0):
				matches = re.finditer(r'\(\d(\,\'\d{1,3}\'){4}\,\d{1,5}\);', Html)
				AnonymouseInetFilter(matches, True)
				AddToSuccessCounter(matchesCount, url)
				return True
		else:
			matches = re.finditer(r'\(\d(\,\'\d{1,3}\'){4}', Html)
			matchesCount = len(list(matches))
			if(matchesCount > 0):
				AnonymouseInetFilter(matches, False)
				AddToSuccessCounter(matchesCount, url)
				return True
	elif(Encryption is "gatherproxy"):
		if(matchesCount > 0):
			GatherproxyFilter(matches)
			AddToSuccessCounter(matchesCount, url)
			return True
	elif(Encryption is "proxylisty"):
		if(matchesCount > 0):
			ProxyListyFilter(matches)
			AddToSuccessCounter(matchesCount, url)
			return True
	elif(Encryption is "proxylistdotcodotuk"):
		if(matchesCount > 0):
			ProxyListDotcoDotuk(matches)
			AddToSuccessCounter(matchesCount, url)
			return True
	elif(Encryption is "antipalivo"):
		if(matchesCount > 0):
			AntipalivoFilter(matches)
			AddToSuccessCounter(matchesCount, url)
			return True
	elif(Encryption is "ultraproxies"):
		if(matchesCount > 0):
			UltraproxiesFilter(matches)
			AddToSuccessCounter(matchesCount, url)
			return True
	elif(Encryption is "nntime"):
		match = re.search(regexPattern, Html)
		if(matchesCount > 0):
			NnTimeFilter(match, url)
			return True
	elif(Encryption is "proxynova"):
		print("matchesCount = {0}".format(matchesCount))
		if(matchesCount > 0):
			print(matchesCount)
			ProxyNovaFilter(matches)
			AddToSuccessCounter(matchesCount, url)
			return True
	elif(Encryption is "checkedproxylists"):
		if("checkedproxylists.com/proxylist" in url):
			match = re.search(r"'dataID',\s'.+?'", Html)
			if(match):
				CheckedproxyListsFilter(match, url, False)
				# AddToSuccessCounter is in function
				return True
		elif(url.endswith("checkedproxylists.com/") or url.endswith("checkedproxylists.com")):
			match = re.search(r"'shortID',\s'.+?'", Html)
			if(match):
				CheckedproxyListsFilter(match, url, True)
				# AddToSuccessCounter is in function
				return True
	elif(Encryption is "freeproxylists"):
		# make the 'matches' to a single match object
		match = re.search(regexPattern, Html)
		if(url == "freeproxylists.com" or url == "freeproxylists.com/"):
				return False
		if(match):
			if("freeproxylists.com/load" in url):
				#isRaw = true
				FreeproxyListsFilter(match, url, True)
				return True
			elif("freeproxylists.com/" in url):
				# isRaw = false
				FreeproxyListsFilter(match, url, False)
				return True
	elif(Encryption is "coolproxy"):
		if(matchesCount > 0):
			CoolproxyFilter(matches)
			AddToSuccessCounter(matchesCount, url)
			return True
	elif(Encryption is "proxylistdotro"):
		if(matchesCount > 0):
			ProxyListdotRoFilter(matches)
			AddToSuccessCounter(matchesCount, url)
			return True
	

	return False

def Dump(proxy):
	if(proxy):
		# exclude our own ip if it exists
		# get the ip from the filtered proxy entry which could contain stuff we don't want
		ip = re.search(r'(\d{1,3}\.){3}\d{1,3}', proxy)
		# delete the ip from the string
		proxy = proxy.replace(ip.group(),"")
		# search for the port
		port = re.search(r'\d{1,5}', proxy)
		if(ip.group() is not None and port.group() is not None):
			print("\t%s:%s" %(ip.group(),port.group()))
			ScrapedProxies.append("%s:%s" %(ip.group(),port.group()))
	return

def Clear():
	"""
	Linux (2.x and 3.x)_____'linux2'
	Windows_________________'win32'
	Windows/Cygwin__________'cygwin'
	Mac OS X _______________'darwin'
	"""	
	if(_platform == "linux" or _platform == "linux2" or _platform == "darwin" or _platform == "cygwin"):
		os.system('clear')
	# Clear screen for windows
	elif(_platform == "win32" or _platform == "nt" or _platform ==  "dos" or _platform ==  "ce"):
		os.system('cls')
	return

def ResetStats():
	# reset all stats
	global SucceededWebsites
	SucceededWebsites = []
	global NoSuccessWebsites
	NoSuccessWebsites = []
	global NoSuccessCounter
	NoSuccessCounter = 0
	global ProxyCounter
	ProxyCounter = 0
	global Html
	global ScrapedProxies
	ScrapedProxies = []
	global TimeOut
	TimeOut = 10
	return
	
def Menu():
	
	ResetStats()
	Clear()
	
	# print our sweet logo :)
	print(Fore.RED)
	print("   sSSs   .S    S.    .S_sSSs     .S_sSSs      sSSs_sSSs     .S S.    .S S.")
	print("  d%%SP  .SS    SS.  .SS~YS%%b   .SS~YS%%b    d%%SP~YS%%b   .SS SS.  .SS SS.    ")    
	print(" d%S'    S%S    S&S  S%S   `S%b  S%S   `S%b  d%S'     `S%b  S%S S%S  S%S S%S    ")    
	print(" S%|     S%S    d*S  S%S    S%S  S%S    S%S  S%S       S%S  S%S S%S  S%S S%S ")     
	print(" S&S     S&S   .S*S  S%S    d*S  S%S    d*S  S&S       S&S  S%S S%S  S%S S%S ")     
	print(" Y&Ss    S&S_sdSSS   S&S   .S*S  S&S   .S*S  S&S       S&S   SS SS    SS SS ")  
	print(Fore.YELLOW)
	print(" `S&&S   S&S~YSSY%b  S&S_sdSSS   S&S_sdSSS   S&S       S&S    S_S      S S")     
	print("   `S*S  S&S    `S%  S&S~YSSY    S&S~YSY%b   S&S       S&S   SS~SS     SSS  ")  
	print("    l*S  S*S     S%  S*S         S*S   `S%b  S*b       d*S  S*S S*S    S*S") 
	print("   .S*P  S*S     S&  S*S         S*S    S%S  S*S.     .S*S  S*S S*S    S*S")  
	print(" sSS*S   S*S     S&  S*S         S*S    S&S   SSSbs_sdSSS   S*S S*S    S*S")       
	print(" YSS'    S*S     SS  S*S         S*S    SSS    YSSP~YSSY    S*S S*S    S*S")      
	print("         SP          SP          SP                         SP         SP ")  
	print("         Y           Y           Y                          Y          Y  ")
	print(Fore.CYAN)
	print("\r		~ SK proxy Finder ~ By : Alexcerus HR~")
	print(Fore.WHITE)
	Log("1 => Import from file")
	Log("2 => Specify URLs")
	Log("3 => Exit Session")
	try:
		answer = raw_input("\n\t[+] Input method: ~> ");

		#end the program?
		if(answer is not "1" and answer is not "2"):
			Log("\n\tAborting IP Proxy Scraper...\n", "cyan")
			sys.exit()

		# Import from file?
		elif(answer is "1"):
			ImportFromFile()

		# type manualy?
		elif(answer is "2"):
			urls = raw_input("\n\t[-] Put Url Here: ~> ");
			split = urls.split(",")
			if(len(split) >= 1 and "," not in urls):
				try:
					split = urls.split(' ')
				except Exception:
					Log("\tPlease seperate your URLs with a comma!\n\tExample: www.example.com, www.example2.com, ...\n\n")
					sys.exit()
				except KeyboardInterrupt:
					pass
			Log("\n\tStarting scrape process...\n","red")
			# try to scrape all provided urls
			for url in split:
				Scrape(url.strip())

		if(ProxyCounter > 0):
			StatusReport()
		else:
			Log("\n\tNo proxies found!\n\n","red")
			raw_input("\n\tHit enter to return to the main menu...");
			Menu()
		
	except KeyboardInterrupt:
		sys.exit()
	
	return

def ImportFromFile():
	try:
		path = raw_input("\n\tSource of the file: ~> ");

		# remove leading and trailing quotes when a file is dragged in
		if(path.startswith("\"") or path.endswith("\"")):
			path = path.replace("\"","")
		
		with open(path) as file:
			websites = file.readlines()

		if(len(list(websites)) > 0):
			Log("\n\tStarting process...\n","cyan")
			for url in websites:
				try:
					if(url):
						Scrape(url)

				except KeyboardInterrupt:
					break
					sys.exit()
		else:
			Log("red", "\tThis file is empty, please provide a file which contains URLs!\n")
			ImportFromFile()

	except KeyboardInterrupt:
		sys.exit()

	# except:
		# Log("\n\tFile not found, please try again!\n","red")
		# ImportFromFile()
	return

def HtmlDecoder():
	# try:
		# global Html
		# p = HTMLParser.HTMLParser()
		# unescaped = p.unescape(Html)
		# return unescaped.contents
	# except Exception:
		# return Html
	# except KeyboardInterrupt:
		# pass
	return Html

def Base64Decoder(match):
	decoded = base64.b64decode(match).decode('utf-8', errors='ignore')
	return decoded

def URLDecoder(match):
	cleanedMatch = match.group().replace("'","").replace("\"","")
	return urllib2.unquote(cleanedMatch).decode('utf8', errors='ignore')

def AnonymouseInetFilter(matches, withPorts):

	ipList = []	
	portList = []
	
	for encodedProxy in matches:
		splitter = encodedProxy.group().split(',')
		mode = splitter[0].replace("(","")
		arg1 = splitter[1].replace("'","")
		arg2 = splitter[2].replace("'","")
		arg3 = splitter[3].replace("'","")
		arg4 = splitter[4].replace("'","")
		if(withPorts):
			port = splitter[5].replace(");","")
			finalProxy = "";
			if(mode == "1"):
				finalProxy = "{0}.{1}.{2}.{3}:{4}".format(arg1,arg2,arg3,arg4,port)
				Dump(finalProxy)
			elif(mode == "2"):
				finalProxy = "{0}.{1}.{2}.{3}:{4}".format(arg4,arg1,arg2,arg3,port)
				Dump(finalProxy)
			elif(mode == "3"):
				finalProxy = "{0}.{1}.{2}.{3}:{4}".format(arg3,arg4,arg1,arg2,port)
				Dump(finalProxy)
			elif(mode == "4"):
				finalProxy = "{0}.{1}.{2}.{3}:{4}".format(arg2,arg3,arg4,arg1,port)
				Dump(finalProxy)
		else:
			finalIP = "";
			if(mode == "1"):
				finalIP = "{0}.{1}.{2}.{3}:{4}".format(arg1,arg2,arg3,arg4)
				ipList.append(finalIP)
			elif(mode == "2"):
				finalIP = "{0}.{1}.{2}.{3}:{4}".format(arg4,arg1,arg2,arg3)
				ipList.append(finalIP)
			elif(mode == "3"):
				finalIP = "{0}.{1}.{2}.{3}:{4}".format(arg3,arg4,arg1,arg2)
				ipList.append(finalIP)
			elif(mode == "4"):
				finalIP = "{0}.{1}.{2}.{3}:{4}".format(arg2,arg3,arg4,arg1)
				ipList.append(finalIP)	

	if(withPorts):
		return

	portCollector = re.finditer("<TD></TD>(.|\n)+?<TD>\d{1,5}</TD>", Html)
	for match in portCollector:
		portExtractor = re.search(r"\d{1,5}")
		portList.append(portExtractor.group())

	for i in range(0, len(list(portCollector))):
		Dump("{0}:{1}".format(ipList[i], portList[i]))
	return
	
def GatherproxyFilter(matches):
	IPList = []
	PortList = []
	
	for m in matches:
		IPList.append(m.group().replace("PROXY_IP\":\"",""))
		
	portMatches = re.finditer("PROXY_PORT\":\"\\d{1,5}", Html)
	for p in portMatches:
		PortList.append(p.group().replace("PROXY_PORT\":\"",""))
		
	for i in range(0, len(PortList)):
		Dump("{0}:{1}".format(IPList[i],PortList[i]))
	
	return

def ProxyListyFilter(Portmatches):
	IPList = []
	PortList = []
	ourIP = ""

	IPMatches = re.finditer(r"(\d{1,3}\.){3}\d{1,3}", Html)

	for ip in IPMatches:
		IPList.append(ip.group())
	
	for port in Portmatches:
		PortList.append(port.group()[:(port.group().rfind(">"))].replace(">",""))

	for i in range(0, len(PortList)):
		Dump("{0}:{1}".format(IPList[i], PortList[i]))
	return
	
def ProxyListDotcoDotuk(matches):
	IPList = []
	PortList = []

	for m in matches:
		IPList.append(m.group().replace("rel=\"nofollow\">","").replace("</a>",""))

	PortMatches = re.finditer(r"class=\"port_td\">\d{1,5}</td>", Html)

	for p in PortMatches:
		PortList.append(p.group().replace("class=\"port_td\">","").replace("</td>",""))

	for i in range(0, len(PortList)):
		Dump("{0}:{1}".format(IPList[i], PortList[i]))

	return

def AntipalivoFilter(matches):
	IPList = []
	PortList = []
	
	# chr(97) = Convert.toChar()
	for port in matches:
		cleanedPort = port.group().replace("decode(","").replace("\"","").replace(")","")
		# decoding logic of the website
		a = cleanedPort.split(',')
		r = ""
		
		for i in range(0, len(a)):
			r+= chr(int(a[i]) - 1)
			
		PortList.append(r)
	IPMatches = re.finditer("(\d{1,3}\.){3}\d{1,3}", Html)
	for ip in IPMatches:
		IPList.append(ip.group())
	
	for i in range(0, len(PortList)):
		Dump("{0}:{1}".format(IPList[i], PortList[i]))
	return

def UltraproxiesFilter(matches):
	IPList = []
	PortList = []

	a = 22
	b = 28
	c = 2
	x = (((b/c + a)/c - 1)*-1)
	for m in matches:
		digit = m.group().replace(">","").replace("<","").split("-")
		port = ""
		for i in range(0, len(digit)):
			port += chr(int(digit[i]) + x)
		PortList.append(port)
	
	IPMatches = re.finditer(r"(\d{1,3}\.){3}\d{1,3}", Html)
	for ip in IPMatches:
		IPList.append(ip.group())
		
	for i in range(0, len(PortList)):
		Dump("{0}:{1}".format(IPList[i], PortList[i]))
	return
	
def NnTimeFilter(match, url):
	PortList = []
	IPList = []
	try:
		splitter = match.group().split(';')
		# removes empty strings from the list
		splitter = filter(None, splitter)

		if(len(splitter) == 10):
			keyOne = splitter[0][0]
			decodeOne = splitter[0][2]
			
			keyTwo = splitter[1][0]
			decodeTwo = splitter[1][2]

			keyThree = splitter[2][0]
			decodeThree = splitter[2][2]

			keyFour = splitter[3][0]
			decodeFour = splitter[3][2]

			keyFive = splitter[4][0]
			decodeFive = splitter[4][2]

			keySix = splitter[5][0]
			decodeSix = splitter[5][2]

			keySeven = splitter[6][0]
			decodeSeven = splitter[6][2]

			keyEight = splitter[7][0]
			decodeEight = splitter[7][2]

			keyNine = splitter[8][0]
			decodeNine = splitter[8][2]

			keyTen = splitter[9][0]
			decodeTen = splitter[9][2]
			
			PortFilter = re.finditer(r"write\(((\":\")?\+\w){1,5}\)", Html)
			for port in PortFilter:
				cleanedPort = port.group().replace("write(\":\"","").replace(")","").replace("+","")
				decodedPort = cleanedPort.replace(keyTen, decodeTen).replace(keyNine, decodeNine).replace(keyEight, decodeEight).replace(keySeven, decodeSeven).replace(keySix, decodeSix).replace(keyFive, decodeFive).replace(keyFour, decodeFour).replace(keyThree, decodeThree).replace(keyTwo, decodeTwo).replace(keyOne, decodeOne)			
				PortList.append(decodedPort)

		elif(len(splitter) == 9):
			keyOne = splitter[0][0]
			decodeOne = splitter[0][2]

			keyTwo = splitter[1][0]
			decodeTwo = splitter[1][2]

			keyThree = splitter[2][0]
			decodeThree = splitter[2][2]

			keyFour = splitter[3][0]
			decodeFour = splitter[3][2]

			keyFive = splitter[4][0]
			decodeFive = splitter[4][2]

			keySix = splitter[5][0]
			decodeSix = splitter[5][2]

			keySeven = splitter[6][0]
			decodeSeven = splitter[6][2]

			keyEight = splitter[7][0]
			decodeEight = splitter[7][2]

			keyNine = splitter[8][0]
			decodeNine = splitter[8][2]

			matches = re.finditer(r"write\(((\":\")?\+\w){1,5}\)", Html)
			for port in matches:
				cleanedPort = port.group().replace("write(\":\"","").replace(")","").replace("+","")
				decodedPort = cleanedPort.replace(keyNine, decodeNine).replace(keyEight, decodeEight).replace(keySeven, decodeSeven).replace(keySix, decodeSix).replace(keyFive, decodeFive).replace(keyFour, decodeFour).replace(keyThree, decodeThree).replace(keyTwo, decodeTwo).replace(keyOne, decodeOne)
				PortList.append(decodedPort)

		IPMatches = re.finditer(r"<td>(\d{1,3}\.){3}\d{1,3}<", Html)
		for ip in IPMatches:
			IPList.append(ip.group().replace("<td>","").replace("<",""))
		for i in range(0, len(PortList)):
			Dump("{0}:{1}".format(IPList[i],PortList[i]))
	except Exception:
		NoSuccess(url)
	else:
		AddToSuccessCounter(len(IPList), url)
	return

def ProxyNovaFilter(matches):
	IPList = []
	PortList = []
	
	for encodedChunk in matches:
		cleanedIP = encodedChunk.group().replace("decode(","").replace("\"","")
		keyMatcher = re.search(r"var\sletters\s=\s\".+\"", Html)

		letters = list(keyMatcher.group().replace("var letters = \"","").replace("\"",""))

		for letter in range(0, len(letters)):
			novaFilter = re.finditer(letters[letter],cleanedIP)
			for match in novaFilter:
				cleanedIP = cleanedIP.replace(match.group(), str(letter))

		ip = int(cleanedIP)
		t = [ip >> 24,ip >> 16 & 0xFF, ip >> 8 & 0xFF, ip & 0xFF]

		IPList.append("{0}.{1}.{2}.{3}".format(t[0], t[1], t[2], t[3]))
	PortMatches = re.finditer(r"\d{2,5}(</a>)?\s+</span>", Html)
	
	for port in PortMatches:
		trashFilter = re.search(r"\d{2,5}",port.group())
		PortList.append(trashFilter.group())
	
	for i in range(0, len(IPList)):
		Dump("{0}:{1}".format(IPList[i], PortList[i]))
	return

def CheckedproxyListsFilter(match, url, isMainSite):
	global Html
	pCounter = 0
	baseURL = "http://www.checkedproxylists.com/"

	if(isMainSite):
		grabSLink = match.group().replace("shortID', ","").replace("'","").strip()
		GetSourceCode(baseURL+grabSLink)

		pFilter = re.finditer(r"(\d{1,3}\.?){4}:\d{1,5}", Html)
		for proxy in pFilter:
			Dump(proxy.group())
			pCounter += 1
		
		AddToSuccessCounter(pCounter, url)
		return
	else:
		resList = match.group().replace("dataID', ","").replace("'","").strip()
		GetSourceCode(baseURL+resList)

		proxyFilter = re.finditer(r"(\d{1,3}\.?){4}<.+?>\d{1,5}", Html)
		for proxy in proxyFilter:
			trashFilter = re.search("<.+?>", proxy.group())
			Dump(proxy.group().replace(trashFilter.group(), ":"))
			pCounter += 1
		AddToSuccessCounter(pCounter, url)
	return

def FreeproxyListsFilter(match, url, isRaw):
	# simmilar to checkedproxylistsFilter
	if(isRaw):
		pass
	else:
		rawUrl = match.group().replace("'dataID', ","").replace("'","")
		GetSourceCode("http://www.freeproxylists.com"+rawUrl)

	HtmlDecoder()
	proxyFilter = re.finditer(r"(\d{1,3}\.?){4}</td><td>\d{1,5}", Html)
	pCounter = 0
	for p in proxyFilter:
		Dump(p.group().replace("<td>","").replace("</td>",":"))
		pCounter += 1
	AddToSuccessCounter(pCounter, url)	
	return

def CoolproxyFilter(matches):
	# base64
	IPList = []
	PortList = []
	#Base64Decoder not required, will be done because of the structure of scrape
	
	for ip in matches:
		IPList.append(ip.group().replace("Base64.decode(","").replace("\"",""))
		
	PortFilter = re.finditer(r"<td>\d{1,5}</td>", Html)
	for port in PortFilter:
		PortList.append(port.group().replace("/","").replace("<td>",""))
	
	for i in range(0, len(IPList)):
		Dump("{0}:{1}".format(IPList[i], PortList[i]))
	
	return

def ProxyListdotRoFilter(matches):
	EncodedIPList = []
	DecodedIPList = []

	EncodedPortList = []
	DecodedPortList = []

	for match in matches:
		filterEncodedData = re.finditer(r"(z\(\d+-\d+\);)+", match.group())
		filteredList = list(filterEncodedData)
		
		EncodedIPList.append(filteredList[0])
		EncodedPortList.append(filteredList[1])

	for encodedIP in EncodedIPList:
		cleanedString = encodedIP.group().replace("z(","").replace(")","").strip()
		
		splitter = cleanedString.split(';')
		decodedIP = ""
		
		for splitted in splitter:
			if(splitted):
				part = splitted.split('-')
				decodedIP += chr(int(part[0]) - int(part[1]))
				
		DecodedIPList.append(decodedIP)

	for encodedPort in EncodedPortList:
		cleanedString = encodedPort.group().replace("z(","").replace(")","").strip()
		splitter = cleanedString.split(';')
		decodedPort = ""

		for splitted in splitter:
			if(splitted):
				part = splitted.split('-')
				decodedPort += chr(int(part[0]) - int(part[1]))
		
		DecodedPortList.append(decodedPort)

	for i in range(0, len(DecodedPortList)):
		Dump("{0}:{1}".format(DecodedIPList[i], DecodedPortList[i]))

	return


def GetOurOwnIP():
	try:
		# get our own public IP to exclude it from the sourcecode
		ip = urllib2.urlopen("http://icanhazip.com")
		response = ip.read()
		match = re.search("(\d{1,3}\.){3}\d{1,3}", response)
		return match.group()
	except Exception:
		pass
	return

OurIP = GetOurOwnIP()
Menu()
