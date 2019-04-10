from PIL import Image

img_src = Image.open('1.jpg')


img_src = img_src.convert('R')


src_strlist = img_src.load()


data = src_strlist[100, 100]
print(data.R)