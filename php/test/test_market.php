<?php
namespace ccxt;

// ----------------------------------------------------------------------------

// PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
// https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

// -----------------------------------------------------------------------------

function test_market($exchange, $market, $method) {
    $format = array(
        'id' => 'btcusd', // string literal for referencing within an $exchange
        'symbol' => 'BTC/USD', // uppercase string literal of a pair of currencies
        'base' => 'BTC', // unified uppercase string, base currency, 3 or more letters
        'quote' => 'USD', // unified uppercase string, quote currency, 3 or more letters
        'taker' => 0.0011, // taker fee, for example, 0.0011 = 0.11%
        'maker' => 0.0009, // maker fee, for example, 0.0009 = 0.09%
        'baseId' => 'btc', // $exchange-specific base currency id
        'quoteId' => 'usd', // $exchange-specific quote currency id
        'active' => true, // boolean, $market status
        'type' => 'spot',
        'linear' => null,
        'inverse' => null,
        'spot' => true,
        'swap' => false,
        'future' => false,
        'option' => false,
        'margin' => false,
        'contract' => false,
        'contractSize' => 0.001,
        'expiry' => 1656057600000,
        'expiryDatetime' => '2022-06-24T08:00:00.000Z',
        'optionType' => 'put',
        'strike' => 56000,
        'settle' => null,
        'settleId' => null,
        'precision' => array(
            'price' => 8, // integer or fraction
            'amount' => 8, // integer or fraction
            'cost' => 8, // integer or fraction
        ),
        // $value limits when placing orders on this $market
        'limits' => array(
            'amount' => array(
                'min' => 0.01, // order amount should be > min
                'max' => 1000, // order amount should be < max
            ),
            'price' => array(
                'min' => 0.01, // order price should be > min
                'max' => 1000, // order price should be < max
            ),
            // order cost = price * amount
            'cost' => array(
                'min' => 0.01, // order cost should be > min
                'max' => 1000, // order cost should be < max
            ),
        ),
        'info' => array(), // the original unparsed $market info from the $exchange
    );
    $keys = is_array($format) ? array_keys($format) : array();
    for ($i = 0; $i < count($keys); $i++) {
        $key = $keys[$i];
        $keyPresent = (is_array($market) && array_key_exists($key, $market));
        assert ($keyPresent, $key . ' missing ' . $exchange->json ($market));
    }
    $keys = array(
        'id',
        'symbol',
        'baseId',
        'quoteId',
        'base',
        'quote',
        'precision',
        'limits',
    );
    for ($i = 0; $i < count($keys); $i++) {
        $key = $keys[$i];
        assert ($market[$key] !== null, $key . ' null ' . $exchange->json ($market));
    }
    assert (($market['taker'] === null) || ((is_float($market['taker']) || is_int($market['taker']))));
    assert (($market['maker'] === null) || ((is_float($market['maker']) || is_int($market['maker']))));
    if ($market['contract']) {
        assert ($market['linear'] !== $market['inverse']);
    } else {
        assert (($market['linear'] === null) && ($market['inverse'] === null));
    }
    if ($market['option']) {
        assert ($market['strike'] !== null);
        assert ($market['optionType'] !== null);
    }
    $validTypes = array(
        'spot' => true,
        'margin' => true,
        'swap' => true,
        'future' => true,
        'option' => true,
    );
    $type = $market['type'];
    //
    // binance has $type = 'delivery'
    // https://github.com/ccxt/ccxt/issues/11121
    //
    // assert (is_array($validTypes) && array_key_exists($type, $validTypes));
    //
    $types = is_array($validTypes) ? array_keys($validTypes) : array();
    for ($i = 0; $i < count($types); $i++) {
        $entry = $types[$i];
        if (is_array($market) && array_key_exists($entry, $market)) {
            $value = $market[$entry];
            assert (($value === null) || $value || !$value);
        }
    }
    //
    // todo fix binance
    //
    // if ($market['future']) {
    //     assert (($market['swap'] === false) && ($market['option'] === false));
    // } else if ($market['swap']) {
    //     assert (($market['future'] === false) && ($market['option'] === false));
    // } else if ($market['option']) {
    //     assert (($market['future'] === false) && ($market['swap'] === false));
    // }
    // if ($market['linear']) {
    //     assert ($market['inverse'] === false);
    // } else if ($market['inverse']) {
    //     assert ($market['linear'] === false);
    // }
    // if ($market['future']) {
    //     assert ($market['expiry'] !== null);
    //     assert ($market['expiryDatetime'] !== null);
    // }
}


