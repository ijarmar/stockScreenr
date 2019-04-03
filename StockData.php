<?php
require 'vendor/autoload.php';

use stockScreenr\Curl;
use stockScreenr\Errors;

class StockData {

   /* 
    *  Methods return formatted output from the api
    * 
    *  @return array
    */

    public function __construct(string $apiURL) {
        $this->api = $apiURL;
    }

    public function getCompanyData(string $symbol) {

        $res = Curl::request($this->api . "stock/{$symbol}/company");
        
        if(!empty($res)) {
            return $res;
        }
        
        return Errors::$companySearch;
    }

    public function getBookData(string $symbol) {

        $res = Curl::request($this->api. "stock/{$symbol}/book");

        if(!empty($res)) {
            return $res;
        }

        return Errors::$bookSearch;
    }

    public function getChartData(string $symbol, string $timeFrame) {

        $res = Curl::request($this->api . "stock/{$symbol}/chart/{$timeFrame}");

        if(!empty($res)) {
            return $res;
        }

        return Errors::$chartSearch;
    }

    public function getDividendData(string $symbol, string $timeFrame) {

        $res = Curl::request($this->api . "stock/{$symbol}/dividends/{$timeFrame}");
        
        if(!empty($res)) {
            return $res;
        }

        return Errors::$dividendSearch;
    }

    public function getEarningsData(string $symbol) {

        $res = Curl::request($this->api . "stock/{$symbol}/earnings");

        if(!empty($res)) {
            return $res;
        }

        return Errors::$earningsSearch;
    }

    public function getFinancialData(string $symbol, string $period = 'annual') {
        
        $res = Curl::request($this->api . "stock/{$symbol}/financials?{$period}");

        if(!empty($res)) {
            return $res;
        }

        return Errors::$financialSearch;
    }

    public function getKeyData(string $symbol) {

        $res = Curl::request($this->api . "stock/{$symbol}/stats");

        if(!empty($res)) {
            return $res;
        }

        return Errors::$keySearch;
    }

    public function getStocksByList(string $category) {

        $res = Curl::request($this->api . "stock/market/list/{$category}");

        if(!empty($res)) {
            return $res;
        }

        return Errors::$listSearch;
    }

    public function getOHLC(string $symbol) {

        $res = Curl::request($this->api . "stock/{$symbol}/ohlc");

        if(!empty($res)) {
            return $res;
        }

        return Errors::$ohlcSearch;
    }

    public function getPrice(string $symbol) {

        $res = Curl::request($this->api . "stock/{$symbol}/price");
        
        if(!empty($res)) {
            return $res;
        }

        return Errors::$priceSearch;
    }

    public function getQuote(string $symbol) {

        $res = Curl::request($this->api . "stock/{$symbol}/price");

        if(!empty($res)) {
            return $res;
        }

        return Errors::$quoteSearch;
    }

}
?>