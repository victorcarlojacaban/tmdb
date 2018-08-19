 <ul class="pagination">
 <?php
    if ($id > 1) {
        //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
        echo '<li><a href="'.($id-1).'" aria-label="Previous"><span aria-hidden="true">&laquo; prev</span></a></li>';
    }

    $numbers = range($id, $count);
    // $output = '';

    //  $counter2 = 1;
    // if ($id == $count) {
    //     foreach ($numbers as $number){
    //         echo '<li><a href="'.$number.'">'.($number - 1).'</a></li> '; 
    //         //  if($counter2 == 6){
    //         //     echo '<li><a href=""><span aria-hidden="true">....</span></a></li>';                             
    //         // }elseif($counter2 < 6 || $counter2 > (count($numbers) -3)){
    //         //     $class = '';
    //         //     if ($id == $number) {
    //         //         $class = 'active';
    //         //     }

    //         //     echo '<li class="'. $class  .'"><a href="'.$number.'">'.$number.'</a></li>'; 
    //         // }
    //     }

    //      $counter2++;
    // }

    $counter = 1;
    foreach ($numbers as $number) {
        if ($counter < 6 || $counter > (count($numbers) -3)){
            $class = '';
            if ($id == $number) {
                $class = 'active';
            }

            echo '<li class="'. $class  .'"><a href="'.$number.'">'.$number.'</a></li>'; 
        }
        $counter++;
    }

    if ($id != $count){
        //Go to previous page to show next 10 items.
        echo '<li><a href="'.($id+1).'" aria-label="Previous"><span aria-hidden="true">next &raquo;</span></a></li>';
    }
?>
</ul>