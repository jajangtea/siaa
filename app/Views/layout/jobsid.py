import pandas as pd
import requests
from bs4 import BeautifulSoup

nilai = [70, 80, 60, 7.5, 90]
siswa = ['andi', 'joko', 'dedi', 'budi', 'agus']

rekap = pd.DataFrame({
    'nama': siswa,
    'nilai': nilai
})


th = "https://www.jobs.id/lowongan-kerja?kata-kunci=Part+time"

halaman = requests.get(th)
hasil = BeautifulSoup(halaman.content, 'html.parser')

lowkers = hasil.find_all(class_="single-job-ads")

posisi = []
instansi = []
gaji = []
for p in lowkers:
    t1 = p.select("h3")
    t2 = t1[0].select("a")
    posisi.append(t2[0].get_text())
    t1 = p.select("p")
    t2 = t1[0].select("p")
    try:
        instansi.append(t2[0].get_text())
    except:
        instansi.append("-")
                        
        t2 = t1[1].select("span")
    try:
        gaji.append(t2[1].get_text())
    except:
        gaji.append(t2[0].get_text())
# print(posisi)
print(instansi)
# print(gaji)


lowker = pd.DataFrame({
    "Posisi": posisi,
    "Instansi": instansi,
    "Gaji": gaji
})

print(lowker)
