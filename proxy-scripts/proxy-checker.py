#!/usr/bin/python
# Proxy checker 
# Demo : https://www.youtube.com/watch?v=qliqTP6pFkA
import time
import socket
import httplib
import threading
import Queue
import sys
import requests

TIMEOUT = 5

socket.setdefaulttimeout(TIMEOUT)

#def check(host, port, url='http://www.baidu.com/', keyword='030173'):
def check(host, port, url='http://err.tmall.com/error1.html', keyword='B2-20110446'):
    proxies = {'proxy found - URL': "http://%s:%s" % (str(host), str(port))}
    try:
        r = requests.get(url, proxies=proxies, timeout=TIMEOUT)
    except:
        print '[!] Error: %s' % str(proxies)
        return False
    print '[+] Right: %s' % str(proxies)
    text = r.text
    if text.find(keyword) != -1:
        return True
    return False


class CheckThread(threading.Thread):
    def __init__(self,no,q, r):
        threading.Thread.__init__(self)
        self.no = no
        self.q = q
        self.r = r

    def run(self):
        while True:
            proxy = []
            try:
                proxy = self.q.get(True,2)
            except:
                pass
            if len(proxy) == 0:
                break
            tstart = time.time()
            ret = check(proxy[0],proxy[1])
            tuse = time.time() - tstart
            if (ret) and tuse < TIMEOUT * 2:
                proxy.append(tuse)
                self.r.append(proxy)

class ProxyCheck:
    def __init__(self, tnum, file):
        self.tnum = tnum
        self.file = file

    def run(self, file2='ip2.txt'):
        q = Queue.Queue()
        r = []
        # read file
        fd = open(self.file,'r')
        for line in fd:
            arr = line.split()
            if len(arr) == 2:
                q.put(arr)
        tlist = []
        for i in xrange(self.tnum):
            cur = CheckThread(i,q,r)
            cur.start()
            tlist.append(cur)
        for cur in tlist:
            cur.join()
        print "All is OK!"
        print len(r)
        f2 = open(file2,'w')
        r.sort(key=lambda x:x[2])
        for k in r[:100]:
            f2.write("%s %s %f\n" % (k[0],k[1],k[2]))
        f2.close()

def usage():
    print "Usage: "+sys.argv[0]+" <IPFILE>"
    print '*'*40
    print "      IP FILE Format"
    print "      <IP PORT>"
    print '*'*40
    sys.exit(0)

def main():
    if len(sys.argv) != 3:
        usage()
    file1 = sys.argv[1]
    file2 = sys.argv[2]
    r = ProxyCheck(50,file1)
    r.run(file2)

if __name__ == '__main__':
    main()
