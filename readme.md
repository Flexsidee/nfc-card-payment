# NFC-Payment System

This project was developed to enhance the current payment system used in the cafeteria at Caleb University, located in Lagos, Nigeria.

The aims of this project are to:

- Reduce the time it takes for students to pay for their meals.
- Reduce the need for students to carry cash with them by limiting the number of times they have to go to the ATM.

The objectives of the system are to:

- Streamline the payment process for students, making it faster and more efficient.
- Provide a more convenient and secure way for students to pay for their meals, reducing the need to carry cash on campus.

## PROJECT SETUP

This is divided into two sections;

1. Hardware
2. Software

### 1. Hardware

You will need the following hardware components:

1. Esp8288 NodeMCU
2. RC522 RFID Module kit
3. Led
4. Buzzer
5. Breadboard
6. Jumper wires
7. Usb cable

You need to solder the header pin that comes with the rfid reader to it then following the connection in the table below.
Its advisable to use a breadboard to make the connection cleaner.
| NodeMCU Pin | Component Pin
|-------------|----------
| D0 | +ve pin (led and Buzzer)
| D3 | RST (RFID reader)
| D4 | SDA/SS (RFID reader)  
| D5 | SCK (RFID reader)  
| D6 | MISO (RFID reader)  
| D7 | MOSI (RFID reader)  
| 3v3 | 3v (RFID reader)  
| GND | GND (RFID reader, led and buzzer)

Here is a picture of the device after been connected [Connection Image](https://drive.google.com/file/d/1ycgYrh7zkykG3e7oijKC9gyrI8ZSAuht/view?usp=sharing)

### 2. Software

You will need the following software to be installed on your computer:

1. Xampp
2. Arduino IDE

Thie steps to steps to setup each are explained below:

1. Setting up the web app

   - Step 1: You will need to install Xampp on your computer. You can download for free on [XAMPP official website](https://www.apachefriends.org/download.html) and follow steps on installing it
   - Step 2: You open xampp control panel, start the Apache and MySQL.
   - Step 3: Copy the [Frontend](./Frontend) folder and [Backend](/backend) folder, put them in a folder, navigate to htdocs in the xampp folder in your computer and paste them there
   - Step 4: Go to your browser, type "localhost/phpmyadmin" and click enter, it will show an interface which is used to mantain the database. Create a database called "nfc_payment". Then import this [database](./backend/database/nfc_payment.sql)
   - Step 5: Go to your browser, type "localhost" and click enter, it should bring the folder you create in step 3, enter the folder and go to the Frontend folder.

2. The microcontroller programming which is done with Arduino IDE

   - Step 1: You will need to install the Arduino Integrated Development Environment (IDE) on your computer in order to write commands to the microcontroller. You can download the Arduino IDE for free from the [Arduino website](https://www.arduino.cc/en/Main/Software).
   - Step 2: You need to add Esp8266 to your Arduino IDE. You check this link from [Randomnerdtutorials](https://randomnerdtutorials.com/how-to-install-esp8266-board-arduino-ide/) for guide on how to do that.
   - Step 3: You need to install the library for the following libraries for the rfid reader to work; SPI.h and MFRC522.h
   - Step 4: You connect the microcontroller to the computer with a usb cable, then select the port you are connected to on Arduino IDE
   - Step 5: Copy the code in the [here](Hardware/read_card_and_send_to_db/read_card_and_send_to_db.ino), paste it on the IDE and upload to the microcontroller

## USEAGE

You connect the microcontroller to a power source of not more than 5v. After doing this the microcontroller will create a Wifi Access point with the name set in the code and the password (ssid in the code: Credit Account, password: 0987654321).

Next thing to do is to navigate to the web application by typing this url http://localhost/{name of the folder you use}/Frontend in your browser

On the web app the first page you see is the login page. You can either login as a student or as a staff (for now admin)

Use the table below to see login details and roles

| Role    | Username | Password |
| ------- | -------- | -------- |
| Admin   | admin    | admin    |
| Student | 21/8874  | somade   |

**Note:** You need to put of your firewall for the microcontroller to be able to send data from the microcontroller to the database on the computer

## Name of Contributors

- Somade Daniel O.
- kenneth Chidiebele P.
- Amaeshi Osinachi N.
- Eziemefe Paul E.
- Salami Kehinde T.
- Omooba Ademola
- Ajani Boluwatife
- Ojo Fiyinfoluwa I.
- Ogunlusi Oluwasegun S.
- Adewole Oluwatobi B.
- Atte Nimibofa D.
- Julius David O.
- George Sophie A.
- Adesotu Nancy O.
- Oguafor Michael I.
