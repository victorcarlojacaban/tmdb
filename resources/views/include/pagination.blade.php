 <ul class="pagination">
 <?php

    $urlAdwordUrl = '?&keyword='. $parameters['keyword'].'&matchtype='.$parameters['matchtype'].'&creative='.$parameters['creative'].'&gclid='.$parameters['gclid'];

    if ($id > 1) {
        //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
        echo '<li><a href="'.($id-1) . $urlAdwordUrl .'" aria-label="Previous"><span aria-hidden="true">&laquo; prev</span></a></li>';
    }

    $nums = range(1, $count);

    foreach ($nums as $number) {
        $class = '';
        if ($id == $number) {
            $class = 'active';
        }

        if (in_array($number, range(($id - 6), $id)) && $number !== $id || in_array($number, range(($id + 6), $id))) {
            echo '<li class="'. $class  .'"><a href="'.$number. $urlAdwordUrl .'">'.$number.'</a></li>'; 
        }

        if ($count == $number && $id != $count && (($id + 7) <= $count)) {
             echo '<li><a href="'.$number . $urlAdwordUrl .'">....</a></li>'; 
             echo '<li><a href="'.$number .  $urlAdwordUrl .'">'.$number.'</a></li>'; 
        }
    }


    if ($id != $count){
        //Go to previous page to show next 10 items.
        echo '<li><a href="'.($id+1) . $urlAdwordUrl .'" aria-label="Previous"><span aria-hidden="true">next &raquo;</span></a></li>';
    }
?>
</ul>