# -*- coding: utf-8 -*-
import requests

year = 2016
N = 17173

for i in range(10001, N + 1):
    num = 'U' + str(year) + str(i)
    text = requests.get('https://wangge.hust.edu.cn/stdDynamicWeixin/detail/302/{0}/%E4%B8%8A%E6%8A%A5%E4%B8%AD'.format(num)).text

    name = text.split(u'<div class="weui-label">\u5f53\u524d\u5b66\u751f\uff1a</div>\r\n\t\t\t</div>\r\n\t\t\t<div class="weui-cell__bd">\r\n\t\t\t\t')[1].split(u'\r')[0]
    t = text.split(u'id="tel" name="tel"  value="')
    if len(t) > 1:
        phone = t[1].split('"')[0]
    else:
        phone = ""

    t = text.split(u'd="jjlxr" name="jjlxr"  value="')
    if len(t) > 1:
        cont_name = t[1].split('"')[0]
    else:
        cont_name = ""

    t = text.split(u'id="jjlxdh" name="jjlxdh"  value="')
    if len(t) > 1:
        cont_phone = t[1].split('"')[0]
    else:
        cont_phone = ""

    result = u'{0}\t{1}\t{2}\t{3}\t{4}\r\n'.format(num, name, phone, cont_name, cont_phone).encode('utf-8')
    print(result)

    f = open('info.txt', 'a')
    f.write(result)
    f.close()

