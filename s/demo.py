#!/usr/bin/env python
# -*- coding: utf-8 -*-
import urllib
import urllib2
import ssl
import re
from os.path import join as pjoin
import json
import os
context = ssl._create_unverified_context()
null=201700000
while(null<201910000):
    url = 'https://wangge.hust.edu.cn/stdDynamicWeixin/detail/302/U'+str(null)+'/%E4%B8%8A%E6%8A%A5%E4%B8%AD'
    user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'
    headers = { 'Host' : 'wangge.hust.edu.cn',
    'Connection': 'keep-alive',
    'Pragma': 'no-cache',
    'Cache-Control': 'no-cache',
    'Upgrade-Insecure-Requests': '1',
    'User-Agent' : user_agent,
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
    'Accept-Encoding': 'gzip, deflate, br',
    'Accept-Language': 'zh-CN,zh;q=0.9',
    'Cookie': 'BIGipServerpool-xgc-wggl=738398380.20480.0000; JSESSIONID=38540E0BC3433755440CA4BFF15FF1E1'}

    request = urllib2.Request(url,headers = headers)
    response = urllib2.urlopen(request)
    content = response.read()
    pattern = r'当前学生：.*?<div class="weui-cell__bd">(.*?)</div>.*?学号：.*?<div class="weui-cell__bd">(.*?)</div>.*?id="tel" name="tel"  value="(.*?)"  />.*?紧急联系人.*?value="(.*?)" />.*?name="jjlxdh"  value="(.*?)" />'

    items = re.findall(pattern,content,re.I|re.S|re.M)
    for item in items:
        print item[0],item[1],item[2],item[3],item[4]
    name_emb = {'NAME':item[0].strip(),'SNO':item[1].strip(),'TEL':item[2].strip(),'PAR':item[3].strip(),'TEL_PAR':item[4].strip()}
    output_dir = r'./'
    listdir = os.listdir(output_dir)
    if 'data.json' in listdir:
            fr = open(pjoin(output_dir, 'data2.json'), 'a')
            model=json.dumps(name_emb,ensure_ascii=False)
            fr.write(model)
            fr.close()
    null=null+1