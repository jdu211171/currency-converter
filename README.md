# Currency Converter and Weather App

This project is a web application that allows users to convert currencies and check the weather for a specific location. The application uses PHP for the backend and JavaScript for the frontend.

## Features

- **Currency Converter**: Convert between different currencies using live exchange rates.
- **Weather App**: Get the current weather information for a specific city or your current location.

## Technologies Used

- PHP
- JavaScript
- HTML
- CSS
- Bootstrap
- OpenWeatherMap API

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/jdu211171/currency-converter.git
    ```
2. Navigate to the project directory:
    ```sh
    cd currency-converter
    ```
3. Make sure you have PHP installed on your system.

## Usage

1. Start a local PHP server:
    ```sh
    php -S localhost:8000
    ```
2. Open your web browser and go to `http://localhost:8000`.

## Currency Converter

1. Enter the amount you want to convert.
2. Select the currencies you want to convert from and to.
3. Click the "Convert" button to see the converted amount.

## Weather App

1. Enter the city name in the input field and press Enter.
2. Alternatively, click the "Get Device Location" button to use your current location.
3. The weather information will be displayed, including temperature, weather description, and humidity.

## API Key

This project uses the OpenWeatherMap API. You need to obtain an API key from [OpenWeatherMap](https://openweathermap.org/api) and replace the placeholder in `script.js` with your API key:
```javascript
var apiKey = "your_api_key_here";