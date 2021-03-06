<?php

define('MAX_STOCK_SYMBOL_LEN', 10);

define('SINA_FOREX_PREFIX', 'fx_s');
define('SINA_FUTURE_PREFIX', 'hf_');
define('SINA_FUND_PREFIX', 'f_');
define('SINA_HK_PREFIX', 'rt_hk');
define('SINA_US_PREFIX', 'gb_');

define('SH_PREFIX', 'SH');
define('SZ_PREFIX', 'SZ');

define('YAHOO_INDEX_CHAR', '^');

define('STOCK_TIME_ZONE_CN', 'PRC');
define('STOCK_TIME_ZONE_US', 'America/New_York');

function StrHasPrefix($str, $strPrefix)
{
	$iLen = strlen($strPrefix);
	return (strncmp($str, $strPrefix, $iLen) == 0) ? substr($str, $iLen) : false; 
}

function in_array_lower($strSymbol, $ar)
{
    return in_array(strtolower($strSymbol), $ar);
}

function ChinaEtfGetSymbolArray()
{
    return array('sh510300', 'sh510330', 'sz159919');
}

function in_arrayChinaEtf($strSymbol)
{
    return in_array_lower($strSymbol, ChinaEtfGetSymbolArray());
}

function AdrGetSymbolArray()
{
    return array('ach', 'cea', 'gsh', 'hnp', 'lfc', 'ptr', 'shi', 'snp', 'znh');
}

function GoldEtfGetSymbolArray()
{
    return array('sh518800', 'sh518880', 'sz159934', 'sz159937', 'sz161226'); 
}

function in_arrayGoldEtf($strSymbol)
{
    return in_array_lower($strSymbol, GoldEtfGetSymbolArray());
}

function LofGetChinaInternetSymbolArray()
{
    return array('sh513050', 'sz164906');
}

function in_arrayChinaInternetLof($strSymbol)
{
    return in_array_lower($strSymbol, LofGetChinaInternetSymbolArray());
}

function LofGetGoldSymbolArray()
{
    return array('sz160719', 'sz161116', 'sz164701'); 
}

function in_arrayGoldLof($strSymbol)
{
    return in_array_lower($strSymbol, LofGetGoldSymbolArray());
}

function LofGetOilSymbolArray()
{
    return array('sh501018', 'sz160216', 'sz160723', 'sz161129'); 
}

function in_arrayOilLof($strSymbol)
{
    return in_array_lower($strSymbol, LofGetOilSymbolArray());
}

function LofGetOilEtfSymbolArray()
{
    return array('sz160416', 'sz162411', 'sz162719', 'sz163208'); 
}

function in_arrayOilEtfLof($strSymbol)
{
    return in_array_lower($strSymbol, LofGetOilEtfSymbolArray());
}

function LofGetBricSymbolArray()
{
    return array('sz161714', 'sz165510');
}

function in_arrayBricLof($strSymbol)
{
    return in_array_lower($strSymbol, LofGetBricSymbolArray());
}

function LofGetCommoditySymbolArray()
{
    return array('sz161815', 'sz165513'); 
}

function LofGetQqqSymbolArray()
{
    return array('sh513100', 'sz159941', 'sz161130'); 
}

function in_arrayQqqLof($strSymbol)
{
    return in_array_lower($strSymbol, LofGetQqqSymbolArray());
}

function LofGetSpySymbolArray()
{
    return array('sh513500', 'sz161125'); 
}

function in_arraySpyLof($strSymbol)
{
    return in_array_lower($strSymbol, LofGetSpySymbolArray());
}

function LofGetSymbolArray()
{
    $ar = array('sh513030', 'sz160140', 'sz161126', 'sz161127', 'sz161128', 'sz162415', 'sz164824'); 
    $ar = array_merge($ar, LofGetChinaInternetSymbolArray()
    						, LofGetGoldSymbolArray()
    						, LofGetOilSymbolArray()
    						, LofGetOilEtfSymbolArray()
    						, LofGetBricSymbolArray()
    						, LofGetCommoditySymbolArray()
    						, LofGetQqqSymbolArray()
    						, LofGetSpySymbolArray());
    sort($ar);
    return $ar;
}

function in_arrayLof($strSymbol)
{
    return in_array_lower($strSymbol, LofGetSymbolArray());
}

function LofHkGetHSharesSymbolArray()
{
    return array('sh510900', 'sz160717');
}

function in_arrayHSharesLofHk($strSymbol)
{
    return in_array_lower($strSymbol, LofHkGetHSharesSymbolArray());
}

function LofHkGetHangSengSymbolArray()
{
    return array('sh513660', 'sz159920', 'sz160924');
}

function in_arrayHangSengLofHk($strSymbol)
{
    return in_array_lower($strSymbol, LofHkGetHangSengSymbolArray());
}

function LofHkGetSymbolArray()
{
    $ar = array('sh501025'); 
    $ar = array_merge($ar, LofHkGetHSharesSymbolArray()
    						, LofHkGetHangSengSymbolArray());
    sort($ar);
    return $ar;
}

function in_arrayLofHk($strSymbol)
{
    return in_array_lower($strSymbol, LofHkGetSymbolArray());
}

function GetAllSymbolArray()
{
	$ar = LofGetSymbolArray();
	$ar = array_merge($ar, LofHkGetSymbolArray()
							, GoldEtfGetSymbolArray()
							, ChinaEtfGetSymbolArray()
							, AdrGetSymbolArray());
    return $ar;
}

function in_arrayAll($strSymbol)
{
    return in_array_lower($strSymbol, GetAllSymbolArray());
}

function IsChineseStockDigit($strDigit)
{
    if (is_numeric($strDigit))
    {
        if (strlen($strDigit) == 6)
        {
            return $strDigit;
        }
    }
    return false;
}

function _isDigitShenzhenFund($iDigit)
{
    return ($iDigit >= 100000 && $iDigit < 200000) ? true : false;
}

function _isDigitShanghaiFund($iDigit)
{
    return ($iDigit >= 500000 && $iDigit < 600000) ? true : false;
}

function _isDigitShenzhenB($iDigit)
{
    return ($iDigit >= 200000 && $iDigit < 300000) ? true : false;
}

function _isDigitShanghaiB($iDigit)
{
    return ($iDigit >= 900000 && $iDigit < 1000000) ? true : false;
}

function _isDigitShenzhenIndex($iDigit)
{
    return ($iDigit >= 390000 && $iDigit < 400000) ? true : false;
}

function _isDigitShanghaiIndex($iDigit)
{
    return ($iDigit >= 000000 && $iDigit < 100000) ? true : false;
}

function BuildChineseFundSymbol($strDigit)
{
    if (IsChineseStockDigit($strDigit))
    {
        $iDigit = intval($strDigit);
        if (_isDigitShanghaiFund($iDigit))		$strPrefix = SH_PREFIX;
        else if (_isDigitShenzhenFund($iDigit))	$strPrefix = SZ_PREFIX;
        else										$strPrefix = SINA_FUND_PREFIX;
        return $strPrefix.$strDigit;
    }
    return false;
}            

function BuildChineseStockSymbol($strDigit)
{
    if (IsChineseStockDigit($strDigit))
    {
        $iDigit = intval($strDigit);
        if (($iDigit < 100000) || ($iDigit >= 200000 && $iDigit < 400000))	return SZ_PREFIX.$strDigit;
        else if ($iDigit >= 600000)												return SH_PREFIX.$strDigit;
    }
    return false;
}            

// ****************************** StockSymbol Class *******************************************************

class StockSymbol
{
    var $strSymbol;              // Stock symbol
    
    // Index start with ^
    var $strFirstChar = false;
    var $strOthers;
    
    // Chinese market
    var $strDigitA = false;     // 162411
    var $iDigitA;
    var $strPrefixA;            // SH or SZ

    // Hongkong
    var $iDigitH = -1;
    var $strSinaIndexH = false;
    
    // US
    var $strSinaIndexUS = false;
    
    function _getFirstChar()
    {
        if ($this->strFirstChar == false)
        {
            $strSymbol = $this->strSymbol;
            $this->strFirstChar = substr($strSymbol, 0, 1);
            $this->strOthers = substr($strSymbol, 1);
        }
    }
    
    function IsIndex()
    {
        $this->_getFirstChar();
        if ($this->strFirstChar == YAHOO_INDEX_CHAR)
        {
            return true;
        }
        return false;
    }
    
    function IsSymbolUS()
    {
        if ($this->IsSymbolA())     return false;
        if ($this->IsSymbolH())     return false;
        return true;
    }
    
    function IsSymbolH()
    {
        if ($this->iDigitH >= 0)   return true;
        
        $strSymbol = $this->strSymbol;
        if ($this->IsIndex())
        {
            if ($strSymbol == '^HSI' || $strSymbol == '^HSCE')
            {
                $this->iDigitH = 0;
                return true;
            }
        }
        else if ($this->strFirstChar == '0')
        {
            if (is_numeric($strSymbol))
            {
                if (strlen($strSymbol) == 5)
                {
                    $this->iDigitH = intval($strSymbol);
                    return true;
                }
            }
        }
        return false;
    }
    
    function GetDigitA()
    {
        return $this->strDigitA;
    }
    
    function IsSymbolA()
    {
        if ($this->strDigitA)   return $this->strDigitA;
        
        $strSymbol = $this->strSymbol;
        $strDigit = substr($strSymbol, 2);
        if (IsChineseStockDigit($strDigit))
        {
            $strPrefix = strtoupper(substr($strSymbol, 0, 2));
            if ($strPrefix == SH_PREFIX || $strPrefix == SZ_PREFIX)
            {
                $this->strPrefixA = $strPrefix;
                $this->iDigitA = intval($strDigit);
                $this->strDigitA = $strDigit;
                return $strDigit;
            }
        }
        return false;
    }
    
    function IsShenZhenA()
    {
		return ($this->strPrefixA == SZ_PREFIX) ? true : false;
	}
	
    function IsShangHaiA()
    {
		return ($this->strPrefixA == SH_PREFIX) ? true : false;
	}
    
    function IsFundA()
    {
        if ($this->strDigitA == false)
        {
            if ($this->IsSymbolA() == false)    return false;
        }
        
        if ($this->strPrefixA == SZ_PREFIX && _isDigitShenzhenFund($this->iDigitA))   return $this->strDigitA;
        if ($this->strPrefixA == SH_PREFIX && _isDigitShanghaiFund($this->iDigitA))   return $this->strDigitA;
        return false;
    }
    
    function IsIndexA()
    {
        if ($this->strDigitA == false)
        {
            if ($this->IsSymbolA() == false)    return false;
        }
        
        if ($this->strPrefixA == SZ_PREFIX && _isDigitShenzhenIndex($this->iDigitA))   return $this->strDigitA;
        if ($this->strPrefixA == SH_PREFIX && _isDigitShanghaiIndex($this->iDigitA))   return $this->strDigitA;
        return false;
    }
    
    function IsStockB()
    {
        if ($this->strDigitA == false)
        {
            if ($this->IsSymbolA() == false)    return false;
        }
        
        if ($this->strPrefixA == SZ_PREFIX && _isDigitShenzhenB($this->iDigitA))   return $this->strDigitA;
        if ($this->strPrefixA == SH_PREFIX && _isDigitShanghaiB($this->iDigitA))   return $this->strDigitA;
        return false;
    }
    
    function IsEtf()
    {
    	if ($this->IsSymbolA())
    	{
    		if ($this->IsIndexA())	return false;
    		if ($this->IsStockB())	return false;
    		
    		if ($this->IsFundA())		return true;
    	}
    	else
    	{
    		if ($this->IsIndex())		return false;
    	}
    	return true;
    }
    
    function IsEastMoneyForex()
    {
        switch ($this->strSymbol)
        {
        case 'USCNY':
        case 'HKCNY':
            return true;
        }
        return false;
    }
    
    function IsNewSinaForex()
    {
    	return StrHasPrefix($this->strSymbol, SINA_FOREX_PREFIX); 
    }
    
    function IsOldSinaForex()
    {
        switch ($this->strSymbol)
        {
        case 'DINIW':
            return true;
        }
        return false;
    }
    
    function IsSinaForex()
    {
    	if ($this->IsNewSinaForex())	return true;
    	if ($this->IsOldSinaForex())	return true;
    	return false;
    }
    
    function IsForex()
    {
    	if ($this->IsEastMoneyForex())	return true;
    	if ($this->IsSinaForex())			return true;
    	return false;
    }
    
    // f_240019
    function IsSinaFund()
    {
        if ($strDigit = StrHasPrefix($this->strSymbol, SINA_FUND_PREFIX))
        {
            return IsChineseStockDigit($strDigit);
        }
        return false;
    }
    
    // AUO, AG1712
    function IsSinaFutureCn()
    {
        if ($this->IsSymbolA())                   return false;

        $this->_getFirstChar();
        if (is_numeric($this->strFirstChar))    return false;
        
        if (is_numeric(substr($this->strSymbol, -1, 1)))  return true;
        return false;
    }

    function IsSinaFutureUs()
    {
    	return StrHasPrefix($this->strSymbol, SINA_FUTURE_PREFIX); 
    }
    
    function IsSinaFuture()
    {
        if ($this->IsSinaFutureCn())	return true;
        if ($this->IsSinaFutureUs())	return true;
        return false;
    }
    
    function GetSinaFundSymbol()
    {
        if ($this->IsFundA())   return SINA_FUND_PREFIX.$this->strDigitA;
        DebugString('GetSinaFundSymbol() exception '.$this->strSymbol);
        return false;
    }
    
    function GetSinaIndexH()
    {
    	if ($this->strSinaIndexH == false)
    	{
    		switch ($this->strSymbol)
    		{
    		case '^HSI':
    			$this->strSinaIndexH = 'HSI';
    			break;
    			
    		case '^HSCE':
    			$this->strSinaIndexH = 'HSCEI';
    			break;
    		}
    	}
    	return $this->strSinaIndexH;
    }
    
    function GetSinaIndexUS()
    {
    	if ($this->strSinaIndexUS == false)
    	{
    		switch ($this->strSymbol)
    		{
    		case '^DJI':
    			$this->strSinaIndexUS = 'dji';
    			break;
    			
    		case '^GSPC':
    			$this->strSinaIndexUS = 'inx';
    			break;
    			
    		case '^NDX':
    			$this->strSinaIndexUS = 'ndx';
    			break;
    		}
    	}
    	return $this->strSinaIndexUS;
    }
    
    function GetSinaSymbol()
    {
        $strSymbol = str_replace('.', '', $this->strSymbol);
        $strLower = strtolower($strSymbol);
        if ($this->IsIndex())
        {
			if ($this->GetSinaIndexH())		    return SINA_HK_PREFIX.$this->strSinaIndexH;
			else if ($this->GetSinaIndexUS())	return SINA_US_PREFIX.$this->strSinaIndexUS;
            else                                   return false;
        }
        else if ($this->IsSymbolH())
        {   // Hongkong market
            return SINA_HK_PREFIX.$strSymbol;    
        }
        else if ($this->IsSymbolA())
        {
            return $strLower;
        }
        return SINA_US_PREFIX.$strLower;
    }

/*上证综指代码: 000001.ss, 深证成指代码: 399001.SZ, 沪深300代码: 000300.ss 下面就是世界股票交易所的网址和缩写, 要查找哪个股票交易所的数据, 就按照上面的格式以此类推. 
上海交易所 .SS
深圳交易所 .SZ
加拿大     .TO,Toronto
新西兰     .NZ
新加坡     .SI
香港       .HK
台湾       .TW
印度       .BO,Bombay
伦敦       .L
澳洲       .AX
巴西       .SA,Sao Paulo
瑞典       .ST,Stockholm
*/
    function GetYahooSymbol()
    {
        $strSymbol = str_replace('.', '-', $this->strSymbol);
        if ($this->IsIndex())
        {
            return '%5E'.$this->strOthers;   // index ^HSI
        }
        else if ($this->IsSymbolH())
        {
            return $this->strOthers.'.hk';   // Hongkong market
        }
        else if ($this->IsSymbolA())
        {
            if ($this->strPrefixA == SH_PREFIX)
            {
                return $this->strDigitA.'.ss';   // Shanghai market
            }
            else if ($this->strPrefixA == SZ_PREFIX)
            {
                return $this->strDigitA.'.sz';   // Shenzhen market
            }
        }
        return $strSymbol;
    }
    
    function GetPrecision()
    {
    	if ($this->IsSinaFund() || $this->IsFundA())   	return 3;
    	else if ($this->IsForex())   					return 4;
    	return 2;
    }
    
    function IsTradable()
    {
    	if ($this->IsIndex())			return false;
    	if ($this->IsIndexA())		return false;
    	if ($this->IsForex())			return false;
    	if ($this->IsSinaFuture())	return false;
    	return true;
    }
    
    function IsMarketTrading($ymd)
    {
    	if ($ymd->IsTradingDay())
    	{
    		$iHour = $ymd->GetHour(); 
    		if ($this->IsSymbolA())
    		{
    			if ($iHour < STOCK_HOUR_BEGIN || $iHour > 15)     return false;
    		}
    		else if ($this->IsSymbolH())
    		{
    			if ($iHour < STOCK_HOUR_BEGIN || $iHour > STOCK_HOUR_END)     return false;
    		}
    		else
    		{   // US extended hours trading from 4am to 8pm
    			if ($iHour < 4 || $iHour > 20)     return false;
    		}
    	}
    	else 
    	{
    		return false;   // do not trade on holiday and weekend
    	}
    	return true;
    }
    
    function SetTimeZone()
    {
        if ($this->IsSymbolA() || $this->IsSymbolH() || $this->IsEastMoneyForex() || $this->IsSinaFund())
        {
            $strTimeZone = STOCK_TIME_ZONE_CN;
        }
        else
        {
            $strTimeZone = STOCK_TIME_ZONE_US;
        }
        date_default_timezone_set($strTimeZone);
    }

    function GetSymbol()
    {
        return $this->strSymbol;
    }
    
    function StockSymbol($strSymbol)
    {
        $this->strSymbol = $strSymbol;
    }
}

?>
