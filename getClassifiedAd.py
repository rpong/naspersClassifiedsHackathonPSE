import urllib2
import urllib
import hashlib
import json

def getAd(id):
	apiURL = "http://api.olx.ph/index.php/classifieds+api+getClassifiedAd"
	apiKey = "0c789e7051ac8240afe54db253bc67569a822031"
	apiSecret = "90b265e40c2dcbc4c9052e96872748322b1f099d"
	adsId = str(id)
	#hash
	m = hashlib.md5()
	m.update(apiKey + adsId + apiSecret)
	hashStr = m.hexdigest()
	version = '1.0'
	offset = '0'
	type = '1'
	data = { 'adsId' : adsId, 'hash' : hashStr, 'version' : version, 'offset' : offset, 'type' : type, 'apiKey' : apiKey}
	data = urllib.urlencode(data)
	req = urllib2.Request(apiURL, data)
	response = urllib2.urlopen(req)
	result = response.read()
	return result
	
	
id = raw_input("Please Enter an Ad ID: ")
from StringIO import StringIO
inf = getAd(id)
inf = StringIO(inf)
print json.load(inf)