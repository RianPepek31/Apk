
// speaker ada di pin 9
const int pinSpeaker = 9;
void setup() {
pinMode(pinSpeaker, OUTPUT);
}
void loop() {
tone(pinSpeaker, NOTE_C4, 500);
delay(500);
tone(pinSpeaker, NOTE_D4, 500);
delay(500);
tone(pinSpeaker, NOTE_E4, 500);
delay(500);
tone(pinSpeaker, NOTE_F4, 500);
delay(500);
tone(pinSpeaker, NOTE_G4, 500);
delay(500);
tone(pinSpeaker, NOTE_A4, 500);
delay(500);
tone(pinSpeaker, NOTE_B4, 500);
delay(500);
tone(pinSpeaker, NOTE_C5, 500);
delay(500);
noTone(pinSpeaker);
delay(1000);
} 
