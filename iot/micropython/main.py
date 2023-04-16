import machine
import time
import dht
import ujson as json

d = dht.DHT11(machine.Pin(3))

while True:
  try:
    d.measure()
    
    temperatur = d.temperature()
    kelembaban = d.humidity()
  except:
    temperatur = 25
    kelembaban = 70
    
  data = {
    'temperatur': temperatur,
    'kelembaban': kelembaban
  }
  
  data_json = json.dumps(data)
  print(data_json)
  
  print("Temperatur   : %s" % temperatur)
  print("Kelembaban   : %s" % kelembaban)
  
  time.sleep(1)