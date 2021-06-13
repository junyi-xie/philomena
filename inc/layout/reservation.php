
    <h1>welcome, lets make an appointment. USERID: <?php echo $Users->getUser(); ?></h1>

    <form action="booking.php" method="post">

    <select name="treatment">
    <?php $Treatments = $Appointments->selectAllAvailableTreatments();
        foreach($Treatments as $k => $v) {
            echo '<option value="'. $v->id .'">'. $v->name.'</option>';
        }
    ?>
    </select>
    
    <input type="text" name="date" placeholder="select date" id="datepicker">
    <input type="time" name="time" placeholder="time" id="">
    <textarea name="note" id="" cols="30" rows="10" placeholder="put something here"></textarea>

    <input type="submit" value="book">

    </form>
