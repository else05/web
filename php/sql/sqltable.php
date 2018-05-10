<?php

// ****************************** SqlTable class *******************************************************
class SqlTable
{
	var $strName;
	
    // constructor 
    function SqlTable($strTableName) 
    {
    	$this->strName = $strTableName;
    }
    
    function Create($str)
    {
    	return SqlCreateTable($str, $this->strName);
    }
    
    function Delete($strId)
    {
        return SqlDeleteTableDataById($this->strName, $strId);
    }
}

?>
