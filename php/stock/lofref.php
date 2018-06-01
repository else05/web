<?php

function LofGetChinaInternetSymbolArray()
{
    return array('sh513050', 'sz164906');
}

function LofGetGoldSymbolArray()
{
    return array('sz160719', 'sz161116', 'sz164701'); 
}

function LofGetOilSymbolArray()
{
    return array('sh501018', 'sz160216', 'sz160723', 'sz161129'); 
}

function LofGetOilEtfSymbolArray()
{
    return array('sz160416', 'sz162411', 'sz162719', 'sz163208'); 
}

function LofGetBricSymbolArray()
{
    return array('sz161714', 'sz165510');
}

function LofGetCommoditySymbolArray()
{
    return array('sz161815', 'sz165513'); 
}

function LofGetQqqSymbolArray()
{
    return array('sh513100', 'sz159941'); 
}

function LofGetSpySymbolArray()
{
    return array('sh513500', 'sz161125'); 
}

function LofGetSymbolArray()
{
    $ar = array('sh513030', 'sz160140', 'sz161126', 'sz161127', 'sz161128', 'sz162415'); 
    $ar = array_merge($ar, LofGetChinaInternetSymbolArray());
    $ar = array_merge($ar, LofGetGoldSymbolArray());
    $ar = array_merge($ar, LofGetOilSymbolArray());
    $ar = array_merge($ar, LofGetOilEtfSymbolArray());
    $ar = array_merge($ar, LofGetBricSymbolArray());
    $ar = array_merge($ar, LofGetCommoditySymbolArray());
    $ar = array_merge($ar, LofGetQqqSymbolArray());
    $ar = array_merge($ar, LofGetSpySymbolArray());
    sort($ar);
    return $ar;
}

function in_arrayChinaInternetLof($strSymbol)
{
    return in_array(strtolower($strSymbol), LofGetChinaInternetSymbolArray());
}

function in_arrayGoldLof($strSymbol)
{
    return in_array(strtolower($strSymbol), LofGetGoldSymbolArray());
}

function in_arrayOilLof($strSymbol)
{
    return in_array(strtolower($strSymbol), LofGetOilSymbolArray());
}

function in_arrayOilEtfLof($strSymbol)
{
    return in_array(strtolower($strSymbol), LofGetOilEtfSymbolArray());
}

function in_arrayQqqLof($strSymbol)
{
    return in_array(strtolower($strSymbol), LofGetQqqSymbolArray());
}

function in_arraySpyLof($strSymbol)
{
    return in_array(strtolower($strSymbol), LofGetSpySymbolArray());
}

function in_arrayBricLof($strSymbol)
{
    return in_array(strtolower($strSymbol), LofGetBricSymbolArray());
}

function in_arrayLof($strSymbol)
{
    return in_array(strtolower($strSymbol), LofGetSymbolArray());
}

function LofGetEtfSymbol($strSymbol)
{
    if ($strSymbol == 'SZ162411')         return 'XOP';
    else if ($strSymbol == 'SZ162719')   return 'IEO';
    else if ($strSymbol == 'SZ162415')   return 'XLY';
    else if (in_arrayOilLof($strSymbol)) return 'USO';
    else if ($strSymbol == 'SZ160140')   return 'SCHH';
    else if ($strSymbol == 'SZ160416')   return 'IXC';
    else if ($strSymbol == 'SZ161126')   return 'XLV';
//    else if ($strSymbol == 'F001092')   return 'IBB';
    else if ($strSymbol == 'SZ161127')   return 'XBI';
    else if ($strSymbol == 'SZ161128')   return 'XLK';
    else if ($strSymbol == 'SZ161815')   return 'DBC';
    else if ($strSymbol == 'SZ163208')   return 'XLE';
    else if (in_arrayChinaInternetLof($strSymbol))   return 'KWEB';
    else if (in_arrayBricLof($strSymbol))   return 'BKF';
    else if ($strSymbol == 'SZ165513')   return 'GSG';
    else if (in_arraySpyLof($strSymbol))   return 'SPY';
    else if (in_arrayQqqLof($strSymbol))   return 'QQQ';
//    else if ($strSymbol == 'SH513030')   return 'EWG';
    else if ($strSymbol == 'SH513030')   return 'DAX';
    else if (in_arrayGoldLof($strSymbol))   return 'GLD';
    else 
        return false;
}

// https://markets.ft.com/data/indices/tearsheet/charts?s=SPGOGUP:REU
function LofGetIndexSymbol($strSymbol)
{
    if (in_arraySpyLof($strSymbol))    return '^GSPC';
    else if (in_arrayQqqLof($strSymbol))    return '^NDX';
/*    else if ($strSymbol == 'SZ162411')            return '^SPSIOP';
    else if (in_arrayBricLof($strSymbol))   return '^SPBRICNTR';
    else if ($strSymbol == 'SZ162415')      return '^IXY';
    else if ($strSymbol == 'SZ162719')      return '^DJSOEP';
*/
//    else if ($strSymbol == 'SZ160416')      return '^SPGOGUP';
    else 
        return false;
}

function LofGetFutureEtfSymbol($strSymbol)
{
    if (in_arrayOilEtfLof($strSymbol))     return 'USO';
    return false;
}

function LofGetFutureSymbol($strSymbol)
{
    if ((LofGetFutureEtfSymbol($strSymbol) == 'USO') || (LofGetEtfSymbol($strSymbol) == 'USO'))     return 'CL';
    else if (LofGetEtfSymbol($strSymbol) == 'GLD')                                                     return 'GC';
    return false;
}

function LofGetAllSymbolArray($strSymbol)
{
    $ar = array();
    
    $ar[] = $strSymbol; 
    if ($strEtfSymbol = LofGetEtfSymbol($strSymbol))
    {
        $ar[] = $strEtfSymbol; 
    }
    if ($strIndexSymbol = LofGetIndexSymbol($strSymbol))
    {
         $ar[] = $strIndexSymbol; 
    }
    if ($strFutureSymbol = LofGetFutureSymbol($strSymbol))
    {
        $ar[] = FutureGetSinaSymbol($strFutureSymbol); 
    }
    if ($strFutureEtfSymbol = LofGetFutureEtfSymbol($strSymbol))
    {
        $ar[] = $strFutureEtfSymbol; 
    }
    return $ar;
}

function LofHkGetHSharesSymbolArray()
{
    return array('sh510900', 'sz160717');
}

function LofHkGetHangSengSymbolArray()
{
    return array('sh513660', 'sz159920', 'sz160924');
}

function LofHkGetSymbolArray()
{
    $ar = array('sh501021', 'sh501025', 'sz160125'); 
    $ar = array_merge($ar, LofHkGetHSharesSymbolArray());
    $ar = array_merge($ar, LofHkGetHangSengSymbolArray());
    sort($ar);
    return $ar;
}

function in_arrayHSharesLofHk($strSymbol)
{
    return in_array(strtolower($strSymbol), LofHkGetHSharesSymbolArray());
}

function in_arrayHangSengLofHk($strSymbol)
{
    return in_array(strtolower($strSymbol), LofHkGetHangSengSymbolArray());
}

function in_arrayLofHk($strSymbol)
{
    return in_array(strtolower($strSymbol), LofHkGetSymbolArray());
}

function LofHkGetEtfSymbol($strSymbol)
{
    if (in_arrayHangSengLofHk($strSymbol) || $strSymbol == 'SZ160125')         return '02800';
    else if (in_arrayHSharesLofHk($strSymbol))   return '02828';
//    else if ($strSymbol == 'SH501018')   return '03135';
//    else if ($strSymbol == 'SH501025')   return '03143';
    else if ($strSymbol == 'SH501025')   return 'SH000869';
    else 
        return false;
}

function LofHkGetIndexSymbol($strSymbol)
{
    if ($strSymbol == 'SH501021')                                        return '^SPHCMSHP';
    else if (in_arrayHangSengLofHk($strSymbol) || $strSymbol == 'SZ160125')    return '^HSI';
    else if (in_arrayHSharesLofHk($strSymbol))    return '^HSCE';
    else 
        return false;
}

function LofHkGetAllSymbolArray($strSymbol)
{
    $ar = array();
    
    $ar[] = $strSymbol; 
    if ($strEtfSymbol = LofHkGetEtfSymbol($strSymbol))
    {
        $ar[] = $strEtfSymbol; 
    }
    if ($strIndexSymbol = LofHkGetIndexSymbol($strSymbol))
    {
         $ar[] = $strIndexSymbol; 
    }
    return $ar;
}

class _LofReference extends FundReference
{
    var $fCNY = false;
    var $fEtfFactor;
    
    // constructor 
    function _LofReference($strSymbol, $strForex)
    {
        parent::FundReference($strSymbol);
        $this->SetForex($strForex);
    }

    function _select_est_ref()
    {
        if ($this->index_ref)
        {
            $this->est_ref = $this->index_ref;
        }
        else
        {
            $this->est_ref = $this->etf_ref;
        }
    }
    
    function _estLof($fEst, $fCNY)
    {
        $fVal = $fEst * $fCNY / $this->fFactor;
        return $this->AdjustPosition($fVal); 
    }
    
    function EstNetValue()
    {
        $this->_select_est_ref();
        $this->AdjustFactor();
        
        $strDate = $this->est_ref->strDate;
        if ($fCNY = $this->sql_forex_history->GetClose($strDate))
        {
            $this->fCNY = $fCNY;
            if ($fEstNetValue = SqlGetFundNetValueByDate($this->est_ref->GetStockId(), $strDate))
            {
            	$fEst = $fEstNetValue;
            }
            else
            {
            	$fEst = $this->est_ref->fPrice;
            }
            $this->fPrice = $this->_estLof($fEst, $fCNY);
            $this->strOfficialDate = $strDate;
            $this->UpdateEstNetValue();
        }
        else
        {   // Load last value from database
            if ($history = SqlGetFundHistoryNow($this->GetStockId()))
            {
                $this->fPrice = floatval($history['estimated']);
                $this->strOfficialDate = $history['date'];
            }
        }
        
        $this->EstRealtimeNetValue();
    }

    function _loadEtfFactor()
    {
        if ($this->index_ref)
        {
            $this->fEtfFactor = $this->index_ref->_loadFactor();
        }
        else
        {
            $this->fEtfFactor = 1.0;
        }
    }

    function _estLofByEtf($fEst, $fCNY)
    {
        return $this->_estLof($fEst * $this->fEtfFactor, $fCNY);
    }
    
    function EstRealtimeNetValue()
    {
        $this->_loadEtfFactor();
        $fCNY = $this->GetForexNow();
        if ($this->fCNY == false)
        {
            $this->fCNY = $fCNY;
        }
        
        if ($this->etf_ref == false)    return;
        $this->fFairNetValue = $this->_estLofByEtf($this->etf_ref->fPrice, $fCNY);
        
        if ($this->future_ref)
        {
            if ($this->future_etf_ref == false)
            {
                $this->future_etf_ref = $this->etf_ref;
            }
            $this->future_ref->LoadEtfFactor($this->future_etf_ref);
            
            $fRealtime = $this->etf_ref->fPrice;
            $fRealtime *= $this->future_ref->fPrice / $this->future_ref->EstByEtf($this->future_etf_ref->fPrice);
            $this->fRealtimeNetValue = $this->_estLofByEtf($fRealtime, $fCNY);
        }
    }

    function AdjustFactor()
    {
        if ($this->UpdateOfficialNetValue())
        {
            $strDate = $this->strDate;
            if ($fCNY = $this->sql_forex_history->GetClose($strDate))
            {
                $est_ref = $this->est_ref;
                if ($est_ref == false)              return false;
                if ($est_ref->bHasData == false)    return false;
                
                $ymd = new YMDString($strDate);
                $ymd_est = new YMDString($est_ref->strDate);
            
                $fEst = SqlGetFundNetValueByDate($this->est_ref->GetStockId(), $strDate);
                if ($fEst == false)
                {
                	DebugString($strDate.' '.$this->est_ref->GetStockSymbol().' ETF net value not found, use close price.');
                	if ($strDate == $est_ref->strDate)	                   				$fEst = $est_ref->fPrice;
                	else if ($ymd->GetNextTradingDayTick() == $ymd_est->GetTick())		$fEst = $est_ref->fPrevPrice;
                	else	return false;
                }
        
                $this->fFactor = $fEst * $fCNY / $this->fPrevPrice;
                $this->InsertFundCalibration($est_ref, strval($fEst));
                return $this->fFactor;
            }
        }
        return false;
    }

    function EstEtf($fLof)
    {
        return $fLof * $this->fFactor / $this->fCNY / $this->fEtfFactor;
    }
    
    function EstEtfQuantity($iLofQuantity)
    {
        return intval($iLofQuantity * $this->fEtfFactor / $this->fFactor);
    }

    function EstLofQuantity($iEtfQuantity)
    {
        return intval($iEtfQuantity * $this->fFactor / $this->fEtfFactor);
    }
}

class LofReference extends _LofReference
{
    // constructor 
    function LofReference($strSymbol)
    {
        parent::_LofReference($strSymbol, 'USCNY');
        
        if ($strIndexSymbol = LofGetIndexSymbol($strSymbol))
        { 
            $this->index_ref = new MyStockReference($strIndexSymbol);
        }
        if ($strEtfSymbol = LofGetEtfSymbol($strSymbol))
        {
            $this->etf_ref = new MyStockReference($strEtfSymbol);
        }
        if ($strFutureEtfSymbol = LofGetFutureEtfSymbol($strSymbol))
        {
            $this->future_etf_ref = new MyStockReference($strFutureEtfSymbol);
        }
        if ($strFutureSymbol = LofGetFutureSymbol($strSymbol))
        {
            $this->future_ref = new FutureReference($strFutureSymbol);
        }
        
        $this->EstNetValue();
    }
}

class LofHkReference extends _LofReference
{
    // constructor 
    function LofHkReference($strSymbol)
    {
        parent::_LofReference($strSymbol, 'HKCNY');
        
        if ($strIndexSymbol = LofHkGetIndexSymbol($strSymbol))
        {
            $this->index_ref = new MyStockReference($strIndexSymbol);
        }
        
        if ($strEtfSymbol = LofHkGetEtfSymbol($strSymbol))
        {
            $this->etf_ref = new MyStockReference($strEtfSymbol);
        }
        
        $this->EstNetValue();
    }
}

?>
