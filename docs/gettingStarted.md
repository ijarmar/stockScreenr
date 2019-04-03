# Getting started

### API - https://api.iextrading.com/1.0/

#### Start by importing StockData.php

```PHP
    require_once('yourPathToLibrary/StockData.php');
```


#### Create a class reference

```PHP
    $screenr = new StockData(string $apiURL);
``` 

### Available functions

Function | Description 
-------- | -----------
`getCompanyData(string $ticker)` | Returns array of basic info about company
`getBookData(string $ticker)` |  Returns array of current bids and asks for stock
`getChartData(string $ticker, string $timeFrame)` | Returns all possible chart data for specific [timeframes](https://iextrading.com/developer/docs/#chart)
`getDividendData(string $ticker, string $timeFrame)` | Returns info about dividends see [timeframes](https://iextrading.com/developer/docs/#dividends)
`getEarningsData(string $ticker)` | Returns earnings data
`getFinancialData(string $ticker)` | Returns company's financials
`getKeyData(strign $ticker)` | Returns basic company and chart info
`getStocksByList(string $category)` | Outputs different stocks based on specified [category](https://iextrading.com/developer/docs/#list)
`getOHLC(string $ticker)` | Get OHLC data
`getPrice(string $ticker)` | Get last available price as int
`getQuote(string $ticker)` | Get Basic chart info