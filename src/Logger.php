<?php
/**
 * @file Logger.php
 * @author simpart
 */
namespace lng;

/**
 * @class lng\Logger
 * @brief common Logger
 */
class Logger {
    private $conts    = array();
    private $filter   = null;
    
    /**
     * 
     */
    function __construct () {
        try {
            
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function log ($log, $lv) {
        try {
            if (0 === strcmp('string', gettype($log))) {
                $this->conts[] = new Log($log, $lv);
            } else if ( (0 === strcmp('object', gettype($log))) &&
                        (0 === strcmp('Log'   , get_class($log))) ) {
                $this->conts[] = $log;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function getList ($fil) {
        try {
            if (null !== $fil) {
                $this->setFilter($fil);
            }
            $ret_val = null;
            if(null === $this->filter) {
                if (0 === count($this->conts)) {
                    return $ret_val;
                }
                foreach ($this->conts as $conts_elm) {
                    $ret_val[] = $conts_elm->get();
                }
            } else {
                $ret_val = $this->filter->getList();
            }
            return $ret_val;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function setFilter ($fil) {
        try {
            if (null === $fil) {
                /* reset filter */
                $this->fil = null;
                return;
            }
            
            if ( (0 === strcmp('object', gettype($fil))) ||
                 (0 === strcmp('Filter', get_class($fil))) ) {
                throw new Exception('invalid parameter');
            }
            $fil->setLogger($this->conts);
            $this->fil = $fil;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
/* end of file */
