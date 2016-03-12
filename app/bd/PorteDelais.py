from time import sleep
import RPi.GPIO as GPIO
import os
import datetime
import sqlite3
import smtplib

fromaddr = 'garage.raspberry@gmail.com'
toaddrs = 'otid91@gmail.com'

#lecture sur la BD
conn = sqlite3.connect('garage.sqlite',timeout=10)

#va chercher le status
cur = conn.cursor()
cur.execute('''SELECT SecureOnOff, Delais FROM Securite''')
Data = cur.fetchone()

GPIO.setmode (GPIO.BOARD)

#initialise les GPIO en lecture
for row in rows:
	GPIO.setup(row[0], GPIO.IN)

while Data[0] == 'ON':
	os.system('clear')
	
	cur.execute('''SELECT SecureOnOff, Delais FROM Securite''')
	Data = cur.fetchall()
	
	print datetime.datetime.time(datetime.datetime.now())
	
	#pour tous les GPIO
	for row in rows:
		print str(GPIO.input(row[0]))  + '/' + str(row[1])
		if(GPIO.input(row[0]) == 1): #si activé
			#turn off le GPIO

	temps = Data[1]
				
	sleep(Data[1])
	
