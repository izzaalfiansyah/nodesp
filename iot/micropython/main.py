import machine
import time
import dht
import ujson as json
import network
import ubinascii
import umqtt

wifi_ssid = 'Poltek Cabang Puri'
wifi_pass = 'gakngerti'

mqtt_client_id = ubinascii.hexlify(machine.unique_id())
mqtt_client = 0
mqtt_server = '192.168.1.16'

d = dht.DHT11(machine.Pin(3))
loop = True
count = 0;

def connect_wifi():
  sta_if = network.WLAN(network.STA_IF)
  sta_if.active(True)
  sta_if.connect(wifi_ssid, wifi_pass)

  while sta_if.isconnected() == False:
    print('Gagal menyambung ke jaringan. Mencoba ulang...')
    time.sleep(3)

  print('Berhasil tersambung dengan jaringan.')
  print(sta_if.ifconfig())

def connect_mqtt():
  connected = False
  
  while not connected:
    try:
      global mqtt_client
      
      mqtt_client = umqtt.MQTTClient(mqtt_client_id, mqtt_server, keepalive=30)
      mqtt_client.connect()
      
      print("Berhasil tersambung dengan MQTT Broker.")
      connected = True
    except:
      print('Gagal menyambung ke MQTT Broker. Mencoba ulang...')
      time.sleep(3)

connect_wifi()
connect_mqtt()

while loop:
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
  
  if (count <= 0):
    try:
      mqtt_client.publish('/keadaan', data_json)
      print("Berhasil mempublish data")
      count = 60
    except:
      print("Gagal mempublish data.")
  
  count -= 1
  
  time.sleep(1)

