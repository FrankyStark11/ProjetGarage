from time import sleep
import RPi.GPIO as GPIO
import os
import datetime
import sqlite3
import smtplib

fromaddr = 'garage.raspberry@gmail.com'
toaddrs = 'otid91@gmail.com'

username = 'garage.raspberry@gmail.com'
password = 'garage.p!'

server = smtplib.SMTP('smtp.gmail.com:587')
server.starttls()
server.login(username,password)

ouvert = 0

#lecture sur la BD

conn = sqlite3.connect('garage.sqlite',timeout=10)
cur = conn.cursor()
cur.execute('''SELECT NoPin,Etat FROM pinState''')
rows = cur.fetchall()

cur2 = conn.cursor()
cur2.execute('''SELECT SecureOnOff FROM Securite''')
OnOff = cur2.fetchone()

GPIO.setmode (GPIO.BOARD)

#initialise les GPIO en lecture
for row in rows:
	GPIO.setup(row[0], GPIO.IN)

while OnOff[0] == 'ON':
	os.system('clear')
	
	cur.execute('''SELECT NoPin,Etat FROM pinState''')
	rows = cur.fetchall()
	
	cur2 = conn.cursor()
	cur2.execute('''SELECT SecureOnOff FROM SECURITE''')
	OnOff = cur2.fetchone()
	
	print datetime.datetime.time(datetime.datetime.now())
	
	for row in rows:
		print str(GPIO.input(row[0]))  + '/' + str(row[1])
		if(GPIO.input(row[0]) != row[1]):
			print 'GPIO diff : ' + str(row[0]) 
			conn.execute('''UPDATE pinState SET Etat=? WHERE NoPin=?''' ,[ GPIO.input(row[0]), row[0] ])
			conn.commit()
			if(GPIO.input(row[0]) == 0):
				ouvert = ouvert + 1
			
	if (ouvert > 0):
		msg = 'Le systeme a detecte quune porte est presentement ouverte'
		if(ouvert > 1):
			msg = 'Le systeme a detecte que ' + str(ouvert) + ' portes ont presentement ouvertent'
		server.sendmail(fromaddr, toaddrs, msg)
		ouvert = 0
	
	sleep(10)
	
