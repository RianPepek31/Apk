const int pinSpeaker = 9; // Pin speaker terhubung ke pin 9
const int timeDelay = 1163; // Delay untuk nada 440 Hz (frekuensi A4)

void setup() {
  pinMode(pinSpeaker, OUTPUT); // Set pin speaker sebagai output
}

void loop() {
  digitalWrite(pinSpeaker, HIGH); // Nyalakan speaker
  delayMicroseconds(timeDelay);  // Tunggu waktu delay
  digitalWrite(pinSpeaker, LOW);  // Matikan speaker
  delayMicroseconds(timeDelay);  // Tunggu waktu delay
}
