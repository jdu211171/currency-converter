<?php

class Currency
{
    const string CURRENCY_API_URL = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";
    public mixed $currencies = [];

    public function __construct()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::CURRENCY_API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $decoded = json_decode($output);
        $this->currencies = $decoded;
    }

    public function getCurrencies()
    {
        return $this->currencies;
    }

    public function getExchangeRate($fromCurrency, $toCurrency): float|int|null
    {
        $fromRate = null;
        $toRate = null;

        foreach ($this->currencies as $currency) {
            if ($currency->Ccy == $fromCurrency) {
                $fromRate = $currency->Rate;
            }
            if ($currency->Ccy == $toCurrency) {
                $toRate = $currency->Rate;
            }
        }

        if ($fromRate && $toRate) {
            return $toRate / $fromRate;
        }

        return null;
    }

}
