# coding:utf-8
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
import time
import os

urlmain='http://localhost'
chdr='/var/www/chromedriver'
def get_url():
	print('[+] begin to checking~')
	path="html/submit_fdasfh2jfka"
	filelist=os.listdir(path)
	for files in filelist:
		Olddir=os.path.join(path,files)
		if os.path.isdir(Olddir):
			continue
		filep=path+'/'+files
		if('index.html' in filep):
			continue
		cat_flag(filep)
		os.remove(filep)
		time.sleep(2)

def cat_flag(urlpath):
	global driver
	# url='http://localhost/'+urlpath
	url=open(urlpath).readlines()[0]
	print('[+] Testing '+url)
	begin_url=urlmain+'/adminfg51g5d4saf26z3v1.php'
	try:
		driver.get(begin_url)
		#print('ssssssssssssssssssssss')
		# driver.add_cookie({'name':'admin','value':'abc','path':'/'})
		driver.get(url)
	except:
		driver.quit()
		driver =webdriver.Chrome(chdr,chrome_options=chrome_options)
		driver.set_page_load_timeout(10)
		driver.set_script_timeout(10)


chrome_options = Options()
# specify headless mode
chrome_options.add_argument("--headless")
chrome_options.add_argument("--no-sandbox")

while(1):
	
	print('[-] chrome loading...')
	driver =webdriver.Chrome(chdr,chrome_options=chrome_options)
	driver.set_page_load_timeout(10)
	driver.set_script_timeout(10)
	
	print('[+] chrome is ready...')
	begin_url=urlmain+'/adminfg51g5d4saf26z3v1.php'
	get_url()
	driver.quit()
	time.sleep(10)


