<?php
/**
 * @file Filter.php
 * @author simpart
 */
namespace lng;
require(__DIR__ . '/define.php');

/**
 * @class lng\Filter
 * @brief log filter
 */
class Filter {
    
    /**
     * set minimum log contents
     * 
     * @param $app (string) application name
     */
    function __construct () {
        try {
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function addTag ($tg) {
        try {
            $type = gettype($tg);
            if (0 === strcmp('string', $type)) {
                $this->tag[$tg];
            } else if( (0 === strcmp('array' , $type)) &&
                       (array_values($tg) === $tg) ) {
                foreach ($tg as $tg_elm) {
                    $this->tag[$tg_elm];
                }
            } else {
                throw new Exception(__FILE__ . ' -> ' . __LINE__  . ' : invalid parameter');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function setTrace ($fnm, $cnm) {
        try {
            if ( (0 !== strcmp('string' , gettype($fnm))) ||
                 (0 !== strcmp('integer', gettype($cnm))) ) {
                throw new Exception(__FILE__ . ' -> ' . __LINE__  . ' : invalid parameter');
            }
            $this->file = $fnm;
            $this->code = $cnm;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * get log contents
     * 
     * @return (array) log contents
     */
    public function getContents () {
        try {
            return array(
                       'time'  => $time ,
                       'tag'   => $tag  ,
                       'level' => $level,
                       'file'  => $file ,
                       'code'  => $code ,
                       'text'  => $text
                   );
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    
}
/* end of file */
