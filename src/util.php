<?php
/**
 * @file util.php
 * @author simpart
 */
namespace lgn;

function show ($log) {
    try {
        if ( (null === $log) ||
             (0 !== strcmp('object', gettype($log))) ||
             (0 !== strcmp('Logger', get_class($log))) ) {
            throw new Exception('invalid parameter');
        }
        /* show log contents */
        
    } catch (Exception $e) {
        throw $e;
    }
}

function sendMysql ($app_nm, $log) {
    try {
        if ( (null === $log) ||
             (0 !== strcmp('object', gettype($log))) ||
             (0 !== strcmp('Logger', get_class($log))) ) {
            throw new Exception('invalid parameter');
        }
        /* set log to database */
        
    } catch (Exception $e) {
        throw $e;
    }
}
/* end of file */
