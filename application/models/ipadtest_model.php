<?php

class IpadTest_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This method is used to output message for testing
     *
     * @param string $message            
     * @param string $tag            
     * @param string $debug            
     */
    private static function describe($message, $tag = "p", $debug = true)
    {
        if ($debug) {
            echo "<{$tag}>{$message}</{$tag}>";
        }
    }

    /**
     * This is an utility method to display the correct text string
     *
     * @param int $no            
     * @return string
     */
    private static function extra($no)
    {
        if ($no == 1)
            return "1st";
        if ($no == 2)
            return "2nd";
        if ($no == 3)
            return "3rd";
        return "{$no}th";
    }

    /**
     * This method is used to test the highest storey that the ipad still survive
     *
     * @param int $noIpads            
     * @param int $noStories            
     * @param int $result            
     *
     * @return minimum drops needed to test ipad survive
     */
    public function test($noIpads, $noStories, $result, $describe = true)
    {
        // determine max number of drops that need for test
        $maxNumberOfTest = ceil($noStories / $noIpads);
        
        // n is number of drops need. Alway need at least 1 drop
        $n = 1;
        
        for ($i = 1; $i <= $maxNumberOfTest; $i ++) {
            // determine current storey number
            $storeyNo = $i * $noIpads;
            
            self::describe("<hr/><u>" . self::extra($n) . " drop</u>. Perform test at " . self::extra($storeyNo) . " storey.", "p", $describe);
            
            // If first item is broken
            if ($storeyNo > $result) {
                self::describe("<hr/><span style='color:red'>First item is broken at " . self::extra($storeyNo) . " storey.</span>", "p", $describe);
                // number of item remaining after the first item is broken
                $tries = $noIpads - 1;
                
                while ($tries > 0) {
                    self::describe("{$tries} item left<br/>", "i", $describe);
                    
                    // next drop
                    $n ++;
                    
                    $storeyNo --; // go down 1 storey
                    self::describe("<u>" . self::extra($n) . " drop</u>. Go down to " . self::extra($storeyNo) . " storey and drop 1 item", "p", $describe);
                    
                    if ($storeyNo == $result) { // until storey number is the max number that item still survive
                        self::describe("<span style='color:blue'>Good at " . self::extra($storeyNo) . " storey.</span>", "p", $describe);
                        break; // Stop any loop
                    }
                    self::describe("Ipad is broken again", "p", $describe);
                    
                    $tries --; // decrease number of tries
                }
                
                // If
                if ($tries == 0) {
                    self::describe("<span style='color:red'>No item left</span>", "i", $describe);
                    break;
                }
                break;
            } else {
                self::describe("Still survive", "i", $describe);
                // per
                $n ++;
            }
        }
        return $n;
    }
}