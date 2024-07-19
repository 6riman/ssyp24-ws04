#include <Adafruit_BMP085.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <WiFiManager.h>
#include <SimpleDHT.h>


Adafruit_BMP085 bmp;
HTTPClient http;
WiFiClient client;
SimpleDHT11 dht11(D2);

const String password_for_request = "";
const int time_between_reqwests = 300000;
double temperature, pressure;
String salt = "";
bool is_first = true;

void setup()
{
  connectWiFi();
  bmp.begin();
  send_data();
  delay(500);
}

void loop()
{
  send_data();
  delay(time_between_reqwests);
}

void send_data()
{
  temperature = bmp.readTemperature();

  pressure = bmp.readPressure() * 0.00750063755419211;

  MD5Builder md5;
  md5.begin();
  salt.trim();
  md5.add(password_for_request + salt);
  md5.calculate();
  delay(4555);
  String hash = md5.toString();

  byte temperature2 = 0;
  byte humidity = 0;
  int err = SimpleDHTErrSuccess;
  dht11.read(&temperature2, &humidity, NULL);

  String meteo_task = "{\"temperature\": " + String(temperature) + ", \"pressure\": " + String(pressure) + ", \"hash\": \"" + hash + "\", \"humidity\": " + String(humidity) + "}";

  salt = post_message(meteo_task);
}

void connectWiFi()
{
  WiFiManager wm;
  wm.autoConnect("ssyp_meteo");
}

String post_message(String meteo_task)
{
  http.begin(client, "http://meteo.ssypmarket.ru/");
  String request = meteo_task;
  http.POST(request);
  String payload = http.getString();
  http.end();
  return payload;
}