/*
  # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #                                                               #
  #                 Installation :                                      #
  # NodeMCU ESP8266/ESP12E    RFID MFRC522 / RC522                      #
  #         D2       <---------->   SDA/SS                              #
  #         D5       <---------->   SCK                                 #
  #         D7       <---------->   MOSI                                #
  #         D6       <---------->   MISO                                #
  #         GND      <---------->   GND                                 #
  #         D1       <---------->   RST                                 #
  #         3V/3V3   <---------->   3.3V                                #
  # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
*/

#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN 4  //--> SDA / SS is connected to pinout D2
#define RST_PIN 5  //--> RST is connected to pinout D1

#define ON_Board_LED 2  //--> Defining an On Board LED, used for indicators when the process of connecting to a wifi router
#define Buzzer 16 // D0 pin for the buzzer

MFRC522 mfrc522(SS_PIN, RST_PIN);  //--> Create MFRC522 instance.

int readsuccess;
byte readcard[4];
char str[32] = "";
String StrUID;

void setup() {
  Serial.begin(115200); //--> Initialize serial communications with the PC
  
  SPI.begin();      //--> Init SPI bus
  
  mfrc522.PCD_Init(); //--> Init MFRC522 card

  delay(500);
  
  pinMode(ON_Board_LED, OUTPUT);
  pinMode(Buzzer, OUTPUT);
  digitalWrite(ON_Board_LED, HIGH); //--> Turn off Led On Board
  digitalWrite(Buzzer, LOW);

  Serial.println("");
  Serial.println("Please tag a card or keychain to see the UID !");
  Serial.println("");
}

void loop() {
  readsuccess = getid();

  if (readsuccess) {
    digitalWrite(ON_Board_LED, LOW);
    digitalWrite(Buzzer, HIGH);

    String UIDresultSend = StrUID;
    Serial.println(UIDresultSend);

    delay(1000);
    digitalWrite(ON_Board_LED, HIGH);
    digitalWrite(Buzzer, LOW);
  }
}

//----------------Procedure for reading and obtaining a UID from a card or keychain--------------//
int getid() {
  if (!mfrc522.PICC_IsNewCardPresent()) {
    return 0;
  }
  if (!mfrc522.PICC_ReadCardSerial()) {
    return 0;
  }

  Serial.print("THE UID OF THE SCANNED CARD IS : ");

  for (int i = 0; i < 4; i++) {
    readcard[i] = mfrc522.uid.uidByte[i]; //storing the UID of the tag in readcard
    array_to_string(readcard, 4, str);
    StrUID = str;
  }
  mfrc522.PICC_HaltA();
  return 1;
}

//----------------------------Procedure to change the result of reading an array UID into a string-----------------------------//
void array_to_string(byte array[], unsigned int len, char buffer[]) {
  for (unsigned int i = 0; i < len; i++)
  {
    byte nib1 = (array[i] >> 4) & 0x0F;
    byte nib2 = (array[i] >> 0) & 0x0F;
    buffer[i * 2 + 0] = nib1  < 0xA ? '0' + nib1  : 'A' + nib1  - 0xA;
    buffer[i * 2 + 1] = nib2  < 0xA ? '0' + nib2  : 'A' + nib2  - 0xA;
  }
  buffer[len * 2] = '\0';
}
