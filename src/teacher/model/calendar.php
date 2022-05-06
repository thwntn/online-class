<?php
    //Kiểm tra năm nhuần
    function isCommon ($year) {
        $isCommon = -1;
        if(($year % 400 == 0 || $year % 4 == 0) && ($year % 100 != 0)) {
            $isCommon = true;
        } else {
            $isCommon = false;
        }
        return $isCommon;
    }

    //In ngày
    function echoData ($end) {
        for ($i=1; $i<=$end; $i++) {
            echo '<h5 class = "dayInCalendar" data-index = '.$i.'>'.$i.'</h5>';
        }
    }

    //Xử lí ngày
    function echoDate ($month, $year) {
        switch ($month) {
            case 2: {
                $day = -1;
                if(isCommon($year)) {
                    $day = 29;
                } else {
                    $day = 28;
                }
                echoData($day);
                break;
            }
            case 1: case 3: case 5: case 7: case 8: case 10: case 12: {
                echoData(31);
                break;
            }
            case 4: case 6: case 9: case 11: {
                echoData(30);
                break;
            }
        }
    }
    echoDate($month, $year);
?>