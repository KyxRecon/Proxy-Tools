#!/usr/bin/env python2
# FreshProxy PYTHON Edition
# By Alexcerus HR
# Demo :  https://www.youtube.com/watch?v=qliqTP6pFkA
import time
import urllib2
import re
import subprocess
import sys
import os

class Alexcerus:
	def __init__(self):	
		while True:	
			self.op = urllib2.urlopen("http://proxy-list.org/english/index.php?p=1")
			self.data = self.op.read()
			self.match = re.findall('<li class="proxy">(.*?)</li>', self.data)
			self.match2 = re.findall('<li class="speed">(.*?)</li>', self.data)

			self.proxylist = []
			for proxy in self.match:
				if (proxy == "Proxy"):
					continue 
				self.proxylist.append(proxy);


			self.speedlist = []
			for speed in self.match2:
				if (speed == "Speed"):
					continue
				self.speedlist.append(speed);

			print ""
			for i in range(0, 14):
				print "Proxy : %s \t Speed : %s \t" %(str(self.proxylist[i]),str(self.speedlist[i]))
			
			print "\n After 60 second will be reflesh page .. \n";
			time.sleep(5)


if __name__ == '__main__':
	Alexcerus()