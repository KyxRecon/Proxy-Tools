<?PHP

	set_time_limit(0);

	ini_set('memory_limit', '796M');

	ini_set('max_input_time', 9999);
	ini_set('enable_dl', 0);


	if ( !function_exists('gzdecode')) {
		function gzdecode($data) {
			return gzinflate(substr($data,10,-8));
		} 

	}

	$curl = new minicurl;
	get_proxy();

	
	function get_proxy() {
		global $curl;

			
			$source = array(
			
			'http://www.samair.ru/proxy/101-200.htm','http://www.samair.ru/proxy/proxy-02.htm','http://www.samair.ru/proxy/proxy-03.htm',	
			'http://www.samair.ru/proxy/proxy-04.htm','http://www.samair.ru/proxy/proxy-05.htm',	
			'http://www.samair.ru/proxy/proxy-06.htm','http://www.samair.ru/proxy/proxy-07.htm',	
			'http://www.samair.ru/proxy/proxy-08.htm','http://www.samair.ru/proxy/proxy-09.htm',	
			'http://www.samair.ru/proxy/proxy-10.htm','http://www.samair.ru/proxy/proxy-11.htm',	
			'http://www.samair.ru/proxy/proxy-12.htm','http://www.samair.ru/proxy/proxy-13.htm',	
			'http://www.samair.ru/proxy/proxy-14.htm','http://www.samair.ru/proxy/proxy-15.htm',	
			'http://www.freeproxy.ch/proxylight.txt','http://www.proxynova.com/proxy_list.txt', 
			
			
			/* NOWE */
			
			'http://nntime.com/proxy-list-01.htm',
			'http://www.dheart.net/proxy/index.php',
			'http://proxy.wow.ag/proxybyPerformance.php?offset=.html',
			'http://proxy.ipcn.org/proxylist2.html',
			'http://www.proxyforest.com/e-proxy.htm?pages=.html',
			'http://www.proxyforest.com/e-proxy.htm?pages=1',
			'http://www.proxyforest.com/e-proxy.htm?pages=3',
			'http://www.freeproxy.ch/proxy.txt',
			'http://www.ip-adress.com/proxy_list/?k=type',
			/* END NOWE */
			
			
			'http://www.freeproxy.ch/proxylight.txt',
			
			'http://www.freeproxy.ch/proxy.txt',
			'http://elite-proxies.blogspot.com/',
			'http://www.cybersyndrome.net/plr5.html',
			'http://www.freeproxy.ch/proxy.txt',
			'http://freeproxylists.co/',
			'http://aliveproxy.com/socks5-list/',
			'http://aliveproxy.com/high-anonymity-proxy-list/',
			'http://aliveproxy.com/anonymous-proxy-list/',
			'http://www.proxz.com/',
			'http://daily-proxy.blogspot.com/',
			'http://anonymousproxies.za.net/latest-high-anonymous-proxy-list/',
			'http://anonymousproxies.za.net/latest-anonymous-proxy-list/',
			'http://anonymousproxies.za.net/latest-socks-5-proxies/',
			'http://anonymousproxies.za.net/latest-socks-4/',
			'http://freedailyproxy.net/',
			'http://freedailyproxy.net/page/2/',
			'http://freedailyproxy.net/page/3/',
			'http://freedailyproxy.net/page/4/',
			'http://freedailyproxy.net/page/5/',
			'http://freedailyproxy.net/page/6/',
			'http://freedailyproxy.net/page/7/',
			'http://freedailyproxy.net/page/8/',
			'http://freedailyproxy.net/page/9/',
			'http://freedailyproxy.net/page/10/',
			'http://www.atomintersoft.com/products/alive-proxy/proxy-list',
			'http://www.atomintersoft.com/products/alive-proxy/socks5-list',
			'http://www.atomintersoft.com/free_proxy_list',
			'http://www.atomintersoft.com/high_anonymity_elite_proxy_list',
			'http://www.atomintersoft.com/proxy_list_domain',
			'http://www.atomintersoft.com/proxy_list_port',
			'http://www.atomintersoft.com/transparent_proxy_list',
			'http://www.atomintersoft.com/free_socks5_proxy_list',
			'http://www.aliveproxy.com/anonymous-proxy-list/',
			'http://www.aliveproxy.com/proxy-list/proxies.aspx/United_States-us',
			'http://www.aliveproxy.com/fastest-proxies/',
			'http://www.samair.ru/proxy/proxy-01.htm',
			'http://www.samair.ru/proxy/proxy-02.htm',
			'http://www.samair.ru/proxy/proxy-03.htm',
			'http://www.samair.ru/proxy/proxy-04.htm',
			'http://www.samair.ru/proxy/proxy-05.htm',
			'http://www.samair.ru/proxy/proxy-06.htm',
			'http://www.samair.ru/proxy/proxy-07.htm',
			'http://www.samair.ru/proxy/proxy-08.htm',
			'http://www.samair.ru/proxy/proxy-09.htm',
			'http://www.samair.ru/proxy/proxy-10.htm',
			'http://hidemyass.com/proxy-list',
			'http://hidemyass.com/proxy-list/2',
			'http://hidemyass.com/proxy-list/3',
			'http://hidemyass.com/proxy-list/4',
			'http://hidemyass.com/proxy-list/5',
			'http://hidemyass.com/proxy-list/6',
			'http://hidemyass.com/proxy-list/7',
			'http://hidemyass.com/proxy-list/8',
			'http://hidemyass.com/proxy-list/9',
			'http://hidemyass.com/proxy-list/10',
			'http://hidemyass.com/proxy-list/11',
			'http://hidemyass.com/proxy-list/12',
			'http://hidemyass.com/proxy-list/13',
			'http://hidemyass.com/proxy-list/14',
			'http://hidemyass.com/proxy-list/15',
			'http://hidemyass.com/proxy-list/16',
			'http://hidemyass.com/proxy-list/17',
			'http://hidemyass.com/proxy-list/18',
			'http://hidemyass.com/proxy-list/19',
			'http://hidemyass.com/proxy-list/20',
			'http://hidemyass.com/proxy-list/21',
			'http://hidemyass.com/proxy-list/22',
			'http://hidemyass.com/proxy-list/23',
			'http://hidemyass.com/proxy-list/24',
			'http://hidemyass.com/proxy-list/25',
			'http://hidemyass.com/proxy-list/26',
			'http://hidemyass.com/proxy-list/27',
			'http://hidemyass.com/proxy-list/28',
			'http://hidemyass.com/proxy-list/29',
			'http://hidemyass.com/proxy-list/30',
			'http://hidemyass.com/proxy-list/31',
			'http://hidemyass.com/proxy-list/32',
			'http://hidemyass.com/proxy-list/33',
			'http://hidemyass.com/proxy-list/34',
			'http://hidemyass.com/proxy-list/35',
			'http://hidemyass.com/proxy-list/36',
			'http://hidemyass.com/proxy-list/37',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:1',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:2',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:3',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:4',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:5',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:6',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:7',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:8',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:9',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:10',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:11',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:12',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:13',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:14',
			'http://www.cool-proxy.net/proxies/http_proxy_list/page:15',
			'http://www.xroxy.com/proxylist.php?port=&type=All_http&pnum=0',
			'http://www.xroxy.com/proxylist.php?port=&type=All_http&pnum=1',
			'http://www.xroxy.com/proxylist.php?port=&type=All_http&pnum=2',
			'http://www.xroxy.com/proxylist.php?port=&type=All_http&pnum=3',
			'http://www.xroxy.com/proxylist.php?port=&type=All_http&pnum=4',
			'http://www.xroxy.com/proxylist.php?port=&type=All_http&pnum=5',
			'http://www.xroxy.com/proxylist.php?port=&type=All_http&pnum=6',
			'http://www.xroxy.com/proxylist.php?port=&type=All_http&pnum=7',
			'http://www.xroxy.com/proxylist.php?port=&type=Socks5',
			'http://www.xroxy.com/proxylist.php?port=&type=Socks5&pnum=1',
			'http://www.proxy-server.info/proxy-server-list.shtml',
			'http://proxies.my-proxy.com/',
			'http://proxies.my-proxy.com/proxy-list-2.html',
			'http://proxies.my-proxy.com/proxy-list-3.html',
			'http://proxies.my-proxy.com/proxy-list-4.html',
			'http://proxies.my-proxy.com/proxy-list-5.html',
			'http://proxies.my-proxy.com/proxy-list-6.html',
			'http://proxies.my-proxy.com/proxy-list-7.html',
			'http://proxies.my-proxy.com/proxy-list-8.html',
			'http://proxies.my-proxy.com/proxy-list-9.html',
			'http://proxies.my-proxy.com/proxy-list-10.html',
			'http://proxies.my-proxy.com/proxy-list-s1.html',
			'http://proxies.my-proxy.com/proxy-list-s2.html',
			'http://proxies.my-proxy.com/proxy-list-s3.html',
			'http://proxies.my-proxy.com/proxy-list-socks4.html',
			'http://proxies.my-proxy.com/proxy-list-socks5.html',
			'http://bestproxy.info/argentina_proxy',
			'http://bestproxy.info/australia_proxy',
			'http://bestproxy.info/austria_proxy',
			'http://bestproxy.info/belgium_proxy',
			'http://bestproxy.info/brazil_proxy',
			'http://bestproxy.info/canada_proxy',
			'http://bestproxy.info/china_proxy',
			'http://bestproxy.info/czech_proxy',
			'http://bestproxy.info/denmark_proxy',
			'http://bestproxy.info/ecuador_proxy',
			'http://bestproxy.info/finland_proxy',
			'http://bestproxy.info/france_proxy',
			'http://bestproxy.info/germany_proxy',
			'http://bestproxy.info/greece_proxy',
			'http://bestproxy.info/hongkong_proxy',
			'http://bestproxy.info/iceland_proxy',
			'http://bestproxy.info/india_proxy',
			'http://bestproxy.info/indonesia_proxy',
			'http://bestproxy.info/iran_proxy',
			'http://bestproxy.info/ireland_proxy',
			'http://bestproxy.info/israel_proxy',
			'http://bestproxy.info/italy_proxy',
			'http://bestproxy.info/japan_proxy',
			'http://bestproxy.info/jordan_proxy',
			'http://bestproxy.info/korea_proxy',
			'http://bestproxy.info/kuwait_proxy',
			'http://bestproxy.info/latvia_proxy',
			'http://bestproxy.info/lithuana_proxy',
			'http://bestproxy.info/malta_proxy',
			'http://bestproxy.info/mexico_proxy',
			'http://bestproxy.info/netherlands_proxy',
			'http://bestproxy.info/newzealand_proxy',
			'http://bestproxy.info/poland_proxy',
			'http://bestproxy.info/portugal_proxy',
			'http://bestproxy.info/romania_proxy',
			'http://bestproxy.info/rsa_proxy',
			'http://www.slyhold.com/proxy_any_any.txt',
			'http://www.freeproxy.ch/proxy.txt',
			'http://bestproxy.info/russia_proxy',
			'http://bestproxy.info/saudi_arabia_proxy',
			'http://bestproxy.info/slovakia_proxy',
			'http://bestproxy.info/slovenia_proxy',
			'http://bestproxy.info/spain_proxy',
			'http://bestproxy.info/sudan_proxy',
			'http://bestproxy.info/sweden_proxy',
			'http://bestproxy.info/switzerland_proxy',
			'http://bestproxy.info/taiwan_proxy',
			'http://bestproxy.info/tanzania_proxy',
			'http://bestproxy.info/thailand_proxy',
			'http://bestproxy.info/turkey_proxy',
			'http://bestproxy.info/ukraine_proxy',
			'http://bestproxy.info/united_kingdom_proxy',
			'http://bestproxy.info/uruguay_proxy',
			'http://bestproxy.info/usa_anonymous_proxy',
			'http://bestproxy.info/usa_elite_proxy',
			'http://bestproxy.info/usa_transparent_proxy',
			'http://bestproxy.info/uzbekistan_proxy',
			'http://bestproxy.info/vietnam_proxy',
			'http://bestproxy.info/wenezuela_proxy',
			'http://bestproxy.info/zimbabwe_proxy',
			'http://www.digitalcybersoft.com/ProxyList/fresh-proxy-list.shtml',
			'http://www.onlinechecker.freeproxy.ru/ru/free_proxy_lists.php',
			'http://www.cybersyndrome.net/pla5.html',
			'http://www.cybersyndrome.net/pls5.html',
			'http://proxylist.sakura.ne.jp/',
			'http://www.checker.freeproxy.ru/checker/last_checked_proxies.php',
			'http://tools.rosinstrument.com/cgi-bin/fp.pl/showlines?filter=HTTPS&lines=50&sortor=3&refresh=5',
			'http://proxy-heaven.blogspot.com/',
			'http://proxy.ipcn.org/proxylist2.html',
			'http://globalproxies.blogspot.com/',
			'http://www.proxyvadi.net/category/proxy-list',
			'http://bulkinfo.net/Proxy/Full-Proxy-List',
			'http://www.ip-adress.com/proxy_list/?k=type',
			'http://proxylists.net/http_highanon.txt',
			'http://www.textproxylists.com/proxy.php?anonymous',
			'http://atomintersoft.com/anonymous_proxy_list',
			'http://atomintersoft.com/high_anonymity_elite_proxy_list',
			'http://nntime.com/proxy-list-01.htm',
			'http://nntime.com/proxy-list-02.htm',
			'http://nntime.com/proxy-list-03.htm',
			'http://nntime.com/proxy-list-04.htm',
			'http://nntime.com/proxy-list-05.htm',
			'http://nntime.com/proxy-list-06.htm',
			'http://nntime.com/proxy-list-07.htm',
			'http://nntime.com/proxy-list-08.htm',
			'http://nntime.com/proxy-list-09.htm',
			'http://nntime.com/proxy-list-10.htm',
			'http://nntime.com/proxy-list-11.htm',
			'http://nntime.com/proxy-list-12.htm',
			'http://nntime.com/proxy-list-13.htm',
			'http://nntime.com/proxy-list-14.htm',
			'http://nntime.com/proxy-list-15.htm',
			'http://nntime.com/proxy-list-16.htm',
			'http://nntime.com/proxy-list-17.htm',
			'http://nntime.com/proxy-list-18.htm',
			'http://nntime.com/proxy-list-19.htm',
			'http://nntime.com/proxy-list-20.htm',
			'http://nntime.com/proxy-list-21.htm',
			'http://nntime.com/proxy-list-22.htm',
			'http://nntime.com/proxy-list-23.htm',
			'http://nntime.com/proxy-list-24.htm',
			'http://nntime.com/proxy-list-25.htm',
			'http://nntime.com/proxy-list-26.htm',
			'http://nntime.com/proxy-list-27.htm',
			'http://nntime.com/proxy-list-28.htm',
			'http://nntime.com/proxy-list-29.htm',
			'http://nntime.com/proxy-list-30.htm',
			'http://nntime.com/proxy-list-31.htm',
			'http://nntime.com/proxy-list-32.htm',
			'http://nntime.com/proxy-list-33.htm',
			'http://nntime.com/proxy-list-34.htm',
			'http://nntime.com/proxy-list-35.htm',
			'http://nntime.com/proxy-list-36.htm',
			'http://nntime.com/proxy-list-37.htm',
			'http://nntime.com/proxy-list-38.htm',
			'http://nntime.com/proxy-list-39.htm',
			'http://nntime.com/proxy-list-40.htm',
			'http://nntime.com/proxy-list-41.htm',
			'http://nntime.com/proxy-list-42.htm',
			'http://nntime.com/proxy-list-43.htm',
			'http://nntime.com/proxy-list-44.htm',
			'http://nntime.com/proxy-list-45.htm',
			'http://nntime.com/proxy-list-46.htm',
			'http://nntime.com/proxy-list-47.htm',
			'http://nntime.com/proxy-list-48.htm',
			'http://nntime.com/proxy-list-49.htm',
			'http://nntime.com/proxy-list-50.htm',
			'http://www.proxyforest.com/proxy.htm?pages=0',
			'http://www.proxyforest.com/proxy.htm?pages=1',
			'http://www.proxyforest.com/proxy.htm?pages=2',
			'http://www.proxyforest.com/proxy.htm?pages=3',
			'http://www.proxyforest.com/proxy.htm?pages=4',
			'http://www.proxyforest.com/proxy.htm?pages=5',
			'http://www.proxyforest.com/proxy.htm?pages=6',
			'http://www.proxyforest.com/proxy.htm?pages=7',
			'http://www.proxyforest.com/proxy.htm?pages=8',
			'http://www.proxyforest.com/proxy.htm?pages=9',
			'http://www.proxyforest.com/proxy.htm?pages=10',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=0',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=25',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=50',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=75',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=100',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=125',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=150',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=175',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=200',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=225',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=250',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=275',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=300',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=325',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=350',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=375',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=400',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=425',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=450',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=475',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=500',
			'http://freeproxylists.co/anonymous-proxy',
			'http://freeproxylists.co/elite-proxy',
			'http://best-proxy.ru/category/anonimnye-proksi',
			'http://www.proxybase.de/en/list-0.htm',
			'http://www.proxybase.de/en/list-20.htm',
			'http://www.proxybase.de/en/list-40.htm',
			'http://www.proxybase.de/en/list-60.htm',
			'http://www.proxybase.de/en/list-80.htm',
			'http://www.proxybase.de/en/list-100.htm',
			'http://www.proxybase.de/en/list-120.htm',
			'http://www.proxybase.de/en/list-140.htm',
			'http://www.proxybase.de/en/list-160.htm',
			'http://www.proxybase.de/en/list-180.htm',
			'http://www.proxybase.de/en/list-200.htm',
			'http://fineproxy.ru/page/1',
			'http://fineproxy.ru/page/2',
			'http://fineproxy.ru/page/3',
			'http://fineproxy.ru/page/4',
			'http://fineproxy.ru/page/5',
			'http://fineproxy.ru/page/6',
			'http://fineproxy.ru/page/7',
			'http://fineproxy.ru/page/8',
			'http://fineproxy.ru/page/9',
			'http://fineproxy.ru/page/10',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=0',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=1',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=2',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=3',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=4',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=5',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=6',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=7',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=8',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=9',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=10',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=11',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=12',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=13',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=14',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=15',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=16',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=17',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=18',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=19',
			'http://www.cool-proxy.net/index.php?action=anonymous-proxy-list&page=20',
			'http://www.cnproxy.com/proxy1.html',
			'http://www.cnproxy.com/proxy2.html',
			'http://www.cnproxy.com/proxy3.html',
			'http://www.cnproxy.com/proxy4.html',
			'http://www.cnproxy.com/proxy5.html',
			'http://anon-proxy.ru/page/1',
			'http://anon-proxy.ru/page/2',
			'http://anon-proxy.ru/page/3',
			'http://anon-proxy.ru/page/4',
			'http://anon-proxy.ru/page/5',
			'http://www.samair.ru/proxy/proxy-11.htm',
			'http://www.samair.ru/proxy/proxy-12.htm',
			'http://www.samair.ru/proxy/proxy-13.htm',
			'http://www.samair.ru/proxy/proxy-14.htm',
			'http://www.samair.ru/proxy/proxy-15.htm',
			'http://www.samair.ru/proxy/proxy-16.htm',
			'http://www.samair.ru/proxy/proxy-17.htm',
			'http://www.samair.ru/proxy/proxy-18.htm',
			'http://www.samair.ru/proxy/proxy-19.htm',
			'http://www.samair.ru/proxy/proxy-20.htm',
			'http://proxylist.sakura.ne.jp/index.htm?pages=0',
			'http://proxylist.sakura.ne.jp/index.htm?pages=1',
			'http://proxylist.sakura.ne.jp/index.htm?pages=2',
			'http://proxylist.sakura.ne.jp/index.htm?pages=3',
			'http://proxylist.sakura.ne.jp/index.htm?pages=4',
			'http://proxylist.sakura.ne.jp/index.htm?pages=5',
			'http://www.blackhatworld.com/blackhat-seo/f103-proxy-lists/',
			'http://www.proxyfire.net/forum/forumdisplay.php?f=14',
			'http://www.proxyfire.net/forum/forumdisplay.php?f=16',
			'http://www.proxyfire.net/forum/forumdisplay.php?f=72',
			'http://2freeproxy.com/elite-proxy.html',
			'http://2freeproxy.com/anonymous-proxy.html',
			'http://2freeproxy.com/standart-ports-proxy.html',
			'http://2freeproxy.com/uk-proxy.html',
			'http://2freeproxy.com/france-proxy.html',
			'http://new-proxy.blogspot.co.uk/',
			'http://usaproxylist.blogspot.co.uk/',
			'http://anonimseti.blogspot.co.uk/',
	
			
			
			
			
			// OK
			###'http://proxylists.net/http.txt', -- nie aktualizowane
	
			'http://www.my-proxy.com/free-proxy-list.html','http://www.my-proxy.com/free-proxy-list-2.html',
			'http://www.my-proxy.com/free-proxy-list-3.html','http://www.my-proxy.com/free-proxy-list-4.html',
			'http://www.my-proxy.com/free-proxy-list-5.html','http://www.my-proxy.com/free-proxy-list-6.html',
			'http://www.my-proxy.com/free-proxy-list-7.html','http://www.my-proxy.com/free-proxy-list-8.html',
			'http://www.my-proxy.com/free-proxy-list-9.html','http://www.my-proxy.com/free-proxy-list-10.html',
			
			'http://www.aliveproxy.com/ca-proxy-list/','http://www.aliveproxy.com/gb-proxy-list/',
			'http://www.aliveproxy.com/de-proxy-list/','http://www.aliveproxy.com/anonymous-proxy-list/',
			'http://www.aliveproxy.com/proxy-list-port-81/','http://www.aliveproxy.com/ru-proxy-list/',
			'http://www.aliveproxy.com/proxy-list-port-3128/','http://www.aliveproxy.com/proxy-list-port-81/',
			
			'http://free1proxy.blogspot.com/search/label/proxylist?&max-results=1',
			'http://proxy-heaven.blogspot.com/','http://elite-proxies.blogspot.com/',
			'http://proksi.hash.es/','http://susanin.nm.ru/',
			'http://www.proxylistchecker.org/proxylists.php',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=2',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=3',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=4',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=5',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=6',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=7',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=8',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=9',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=10',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=11',
			'http://www.proxylistchecker.org/proxylists.php?t=&p=12',
			'http://freeproxyserverx.blogspot.com/',
			##'http://www.xroxy.com/proxyrss.xml', nie aktalizowane
			'http://www.tech-faq.com/anonymous-proxies?start=',
			'http://proxyhttp.net/free-list/proxy-anonymous-hide-ip-address/',
			'http://proxyhttp.net/free-list/proxy-high-anonymous-hide-ip-address/',
			'http://proxyhttp.net/free-list/proxy-high-anonymous-hide-ip-address/',
			'http://proxyhttp.net/free-list/proxy-https-security-anonymous-proxy/',
			'http://proxyhttp.net/free-list/proxy-https-security-anonymous-proxy/2',
			'http://proxyhttp.net/free-list/proxy-https-security-anonymous-proxy/3',
			'http://proxyhttp.net/free-list/proxy-https-security-anonymous-proxy/4',
			'http://proxy-hunter.blogspot.com/feeds/posts/default',
			'http://www.proxies.cz.cc/',
			'http://proxy.speedtest.at/proxyOnlyAnonymous.php?offset=0',
			'http://freeproxylists.co/',
			'http://fineproxy.org/',

			
			'http://serwery-proxy.eu/lista-serwerow-proxy,aktualne,1',
			'http://serwery-proxy.eu/lista-serwerow-proxy,aktualne,2',
			'http://serwery-proxy.eu/lista-serwerow-proxy,aktualne,3',
			
			'http://old.cool-proxy.net/index.php?action=proxy-list',
			'http://old.cool-proxy.net/index.php?action=proxy-list&page=1',
			'http://old.cool-proxy.net/index.php?action=proxy-list&page=2',
			'http://old.cool-proxy.net/index.php?action=proxy-list&page=3',
			'http://old.cool-proxy.net/index.php?action=proxy-list&page=4',
			##'http://www.freeproxy.ch/default.asp', -- cos mi tutaj jebie 
			
			'http://proxy-level.blogspot.com/',
			
			
			

			'http://hidemyass.com/proxy-list/','http://hidemyass.com/proxy-list/2',
			'http://hidemyass.com/proxy-list/3','http://hidemyass.com/proxy-list/4',
			'http://hidemyass.com/proxy-list/5','http://hidemyass.com/proxy-list/6',
			'http://hidemyass.com/proxy-list/7','http://hidemyass.com/proxy-list/8',
			'http://hidemyass.com/proxy-list/9','http://hidemyass.com/proxy-list/10',
			'http://hidemyass.com/proxy-list/11','http://hidemyass.com/proxy-list/12',
			'http://hidemyass.com/proxy-list/13','http://hidemyass.com/proxy-list/14',
			'http://hidemyass.com/proxy-list/15','http://hidemyass.com/proxy-list/16',
			'http://hidemyass.com/proxy-list/17','http://hidemyass.com/proxy-list/18',
			'http://hidemyass.com/proxy-list/19','http://hidemyass.com/proxy-list/20',
			'http://hidemyass.com/proxy-list/21','http://hidemyass.com/proxy-list/22',
			'http://hidemyass.com/proxy-list/23','http://hidemyass.com/proxy-list/24',
			'http://hidemyass.com/proxy-list/25','http://hidemyass.com/proxy-list/26',
			'http://hidemyass.com/proxy-list/27','http://hidemyass.com/proxy-list/28',
			'http://hidemyass.com/proxy-list/29','http://hidemyass.com/proxy-list/30',
			'http://hidemyass.com/proxy-list/31','http://hidemyass.com/proxy-list/32',
			'http://hidemyass.com/proxy-list/33','http://hidemyass.com/proxy-list/34',
			'http://hidemyass.com/proxy-list/35','http://hidemyass.com/proxy-list/36',
			'http://hidemyass.com/proxy-list/37','http://hidemyass.com/proxy-list/38',
			'http://hidemyass.com/proxy-list/39','http://hidemyass.com/proxy-list/40',
			'http://hidemyass.com/proxy-list/41','http://hidemyass.com/proxy-list/42',
			'http://hidemyass.com/proxy-list/42','http://hidemyass.com/proxy-list/43',
			'http://hidemyass.com/proxy-list/44','http://hidemyass.com/proxy-list/45',
			'http://hidemyass.com/proxy-list/46','http://hidemyass.com/proxy-list/47',
			'http://hidemyass.com/proxy-list/48','http://hidemyass.com/proxy-list/49',
			'http://hidemyass.com/proxy-list/50','http://hidemyass.com/proxy-list/51'
		);


		/* Dodawanie statycznyc zróde³ */
		
			$curl->GetContents('http://www.scrapeboxproxies.net/', false);
			preg_match_all("@class='more-link' href='(.*?)#more'>Read more@s", $curl->page_source, $thebig);
			$source = array_merge($source, $thebig[1]);

			$curl->GetContents('http://proxy-masterz.com/vb/f3/', false);
			preg_match_all('@http://proxy-masterz.com/vb/f3/\d+/@s', $curl->page_source, $thebig);
			$source = array_merge($source, $thebig[0]);
		
		
		
			$curl->GetContents('http://thebigproxylist.com/blog/', false);
			preg_match_all('@href="(http://thebigproxylist.com/blog/\?p=\d+)" title@', $curl->page_source, $thebig);
			$source = array_merge($source, $thebig[1]);
			
			$curl->GetContents('http://www.governmentsecurity.org/forum/forum/18-proxy-listings/', false);
			preg_match_all('@"(http://www.governmentsecurity.org/forum/topic/.*?-scrapebox-passed-http-proxies-freshly-verified-w-screenshot/)@', $curl->page_source, $thebig);
			$source = array_merge($source, $thebig[1]);

			$curl->GetContents('http://www.proxyfire.net/forum/forumdisplay.php?f=14', false);
			preg_match_all('@href="(showthread.php\?t=\d+)" id@', $curl->page_source, $thebig);
			foreach ( $thebig[1] as $id => $val ) :
							$thebig[1][$id] = 'http://www.proxyfire.net/forum/'. $val;
			endforeach;
			$source = array_merge($source, $thebig[1]);


		/* END dodawanie statycznych strn */	

		shuffle($source);
		$prosie = array();
		
		/* pobiera po 20 adresów z tablicy tak by sie nie zajeba³o */

		foreach ( array_chunk($source, 21) as $val ) :
					$curl->multi_proxy_crawl($val);
		endforeach;

		/* Wywalaenie powtarzaj¹cych sie IP - czyli array_uniq - porty */
		$fix = $curl->prosie;
		foreach ( $fix as $id => $val ) :

				$fix[$id] = substr($fix[$id],0,strpos($fix[$id],':'));

		endforeach;

		$fix = array_unique($fix);

		foreach( array_diff_key($curl->prosie, $fix) as $id => $val  ) :
				unset($curl->prosie[$id]);
		endforeach;
		/* END: Potwórki */


		$curl->prosie = array_unique($curl->prosie);

		shuffle($curl->prosie);
		
		/* zapisuje do proxy txt */
		
		$zap = '';
		
		
		/* GIZIPED 
		$cuur = $curl->GetContents('http://www.proxyrss.com/proxylists/all.gz');
			
		$cuur = gzdecode($cuur);
		
		print_r($cuur);
		
		preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{2,6}#', $cuur, $res);
		$curl->prosie = array_merge($curl->prosie, $res[0]);
		 GZIPED */
		
		$curl->prosie = array_unique($curl->prosie);

		foreach ( $curl->prosie as $asd ) :
				$zap .= $asd. "\r\n";
		endforeach;
		
	
		file_put_contents('proxxy.txt', $zap );

	}
	
	
	/* Else funcions */



class minicurl {

	var $path_print_url;
	var $path_url;
	var $rel_path = '';
	var $encoding;
	var $phpsessid;
	var $page_source;
	var $fetchvalue;
	var $curl_info;
	var $post_vars;
	var $typ = 0;
	var $user_agent = "Mozilla/5.0 (Windows NT 5.1; rv:29.0) Gecko/20100101 Firefox/29.0";
	var $port = 80;
	var $ctype = 'plain';
	var $dlugosc = NULL;
	var $timeout = 15;
	var $contime = 6;
	var $header = array('Expect:');
	var $proxy = false;
	var $proxx;
	var $prosie = array(); 
	var $databse;
	var $wynik = array();
	var $resadresy = array();

	
	function __construct() { 


		$this->randuseragent();
		//$this->loadgogip();


	}

	/*
		£aduje liste adresów IP Google 
	*/	
	
	
	function loadgogip() {
	
		#http://www.positeo.com/listing-google-datacenters/ - g³owno
		#http://www.positeo.com/listing-google-datacenters/
	
		/* stare 
		
		$fd = fopen('../googlehost.txt',"r");
		$this->ipeki = array();
	
		while ($kod = fgets($fd)) :
				$this->ipeki[] = trim($kod);
		endwhile;*/
		
		$this->ipeki = array();

		try {
			$rekordy = array_merge(dns_get_record("google.com",DNS_A), dns_get_record("google.pl",DNS_A));
		} catch(Exception $e){
		
				$rekordy = array('google.com','google.pl');
		}
		
		
		foreach ( $rekordy as $val ) :
				$this->ipeki[] = $val['ip'];
		endforeach;

		#print_r($this->ipeki);
		
		
	}
	
	function randuseragent() {
	
		$ua = array(
					'Mozilla/5.0 (Windows NT 5.1; rv:16.0) Gecko/20100101 Firefox/16.0',
					'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)',
					'Mozilla/5.0 (Windows NT 6.2; rv:10.0) Gecko/20100101 Firefox/16.0',
					'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.94 Safari/537.4',
					'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)',
					'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322)',
					'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8',
					'Mozilla/5.0 (Windows NT 5.1; rv:17.0) Gecko/20100101 Firefox/17.0'
		);
		
		/* Przy ³adowaniu ustawia rózne user agenty */
		$this->user_agent = $ua[array_rand($ua)];
	}
	
	

	function GetContents($path_url, $typ = false, $cookie = true) {
		$host = parse_url($path_url);

		
		$init = curl_init();
		curl_setopt($init, CURLOPT_URL, $path_url);
		curl_setopt($init, CURLOPT_TIMEOUT, $this->timeout );
		curl_setopt($init, CURLOPT_CONNECTTIMEOUT, $this->contime );

		$this->rel_path = str_replace(basename($_SERVER['PHP_SELF']),'',$_SERVER['SCRIPT_FILENAME'] );

		if ($typ == true) {
			curl_setopt($init, CURLOPT_POST , 1);
			curl_setopt($init, CURLOPT_POSTFIELDS, $this->post_vars);
		}else {
	       curl_setopt($init, CURLOPT_POST , 0);
		}
		
	
		curl_setopt($init, CURLOPT_USERAGENT, $this->user_agent);
		curl_setopt($init, CURLOPT_HEADER, 0);
		
		
		/* SSL curlik 
		curl_setopt($init, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($init, CURLOPT_CAINFO, $this->rel_path . "_engin/cacert.pem");
		sll curlik */
		
		
		curl_setopt($init, CURLOPT_HTTPHEADER, array('Expect:') );
		curl_setopt($init, CURLOPT_FOLLOWLOCATION, 1);
		
		if ($cookie == true) {
			#curl_setopt($init, CURLOPT_COOKIE, true);
			curl_setopt($init, CURLOPT_COOKIEJAR, $this->rel_path . 'cookie.txt');
       		curl_setopt($init, CURLOPT_COOKIEFILE, $this->rel_path . 'cookie.txt');
		}
		#curl_setopt($init, CURLOPT_REFERER, $path_url);
		curl_setopt($init, CURLOPT_RETURNTRANSFER, 1);
		


		$source = curl_exec ($init);

		$this->curl_info = curl_getinfo($init);

		$this->page_source = $source;
		curl_close($init);
		return $this->page_source;
	}
	
	

	
	/* Get multi do proxy */

	function multi_proxy_crawl($urle) {

		$curly = array();
		$result = array();
		$mh = curl_multi_init();
		
		foreach ( $urle as $id => $adres ) :

				$curly[$id] = curl_init();
				$this->timeout = 6;
				$this->contime  = 6;

				curl_setopt($curly[$id], CURLOPT_URL, $adres );
				curl_setopt($curly[$id], CURLOPT_TIMEOUT, $this->timeout );
				curl_setopt($curly[$id], CURLOPT_CONNECTTIMEOUT, $this->contime );
				curl_setopt($curly[$id], CURLOPT_USERAGENT, $this->user_agent);
				curl_setopt($curly[$id], CURLOPT_HEADER, 0);
				curl_setopt($curly[$id], CURLOPT_HTTPHEADER, array('Expect:') );
				curl_setopt($curly[$id], CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
	
				curl_multi_add_handle($mh, $curly[$id]);

		endforeach;
	  

		   $running = null;
			do {
				do {
					$mrc = curl_multi_exec($mh, $running);
				} while ($mrc == CURLM_CALL_MULTI_PERFORM && curl_multi_select($mh) != -1 );
			} while($running > 0  && $mrc == CURLM_OK );
		  

		  // get content and remove handles
		  foreach($curly as $id => $c) {
			$result[$id] = curl_multi_getcontent($c);
			curl_multi_remove_handle($mh, $c);
		  }

		  // all done
		  curl_multi_close($mh);
		  $res = array();
		  
		 foreach (  $result as $id => $val ) {
		 
			if ( stristr($val, 'hidemyass.com') )  :
				$val = $this->hidemyass($val);
			endif;
			
			preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{2,6}#', $val, $res);
			
			#print_r($res[0]);
			
			$this->prosie = array_merge($this->prosie, $res[0]);

		 }
		  
		  #return json_encode($res);

	}
	
	function hidemyass($source) {
		
		$this->randuseragent();
	
		/* hidemyass.com */
		$return = '';
		preg_match_all('@<td><span><style>(.*?)</style>(.*?)</span></td>[\n|\r|\s]+<td>[\n|\r|\s]+(\d+)</td>@s', $source, $thebig);

		foreach ( $thebig as  $ide => $dane ) :

			foreach ( $dane as $val ) :
					$val = preg_replace('#<span style="display:none">\d+</span>#','', $val);
					$val = preg_replace('#<div style="display:none">\d+</div>#','', $val);

					/* identyfikowanie class do usuniêcia */
					preg_match_all('#\.([A-Z-a-z0-9-_]+){display:none}#',$val, $clasy);
					
					foreach ( $clasy[1] as $repla  ) :
							$val = preg_replace('#<span class="'. $repla .'">\d+</span>#','', $val);
					endforeach;
					
					/* Identyfikowanie class do zostawienia */

					preg_match_all('#\.([A-Z-a-z0-9-_]+){display:inline}#',$val, $clasy);
					
					foreach ( $clasy[1] as $repla  ) :
							$val = preg_replace('#<span class="'. $repla .'">(\d+)</span>#','\1', $val);
					endforeach;
					
					/* Poprawka portu */
					
					$val = preg_replace('#[\n|\r]+(\d+)</td>$#',':\1', $val);
					$val = preg_replace('#<style>.*?</style>#s','', $val);
					$val = preg_replace('#[\r|\n\s]+#','', $val);
					
					$return .= strip_tags($val) . '<br>';


			endforeach;
		endforeach;
		
		return $return;
		
		/* END: hidemyass.com */
	}



		
	function stristr_array( $haystack, $needle ) {
		if ( !is_array( $haystack ) ) {
			return false;
		}
		foreach ( $haystack as $element ) {

			if ( @stristr( $needle, $element ) ) {
				return true;
			}
		}
	}	
	

	


}	
?>