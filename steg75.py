import struct, base64
 
from PIL import Image
 
im = Image.open("Steg75.png")
 
s = ""
for x in xrange(6):
    for y in xrange(56):
        r,g,b,a = im.getpixel(((x*56)+y+1,y))
        s += chr(r) + chr(g) + chr(b)
       
s1 = ""
s2 = ""
for i in xrange(0, len(s), 3):
    a,b,c = struct.unpack("<BBB", s[i:i+3])
    s1 += chr((a - c) % 256)
    s2 += chr((b + c) % 256)
   
print base64.b64decode(s1[0:56])