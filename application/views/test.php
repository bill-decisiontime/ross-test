<?php

//This is the View for getting data from the database "test". It was written 
//using a YT tutorial found here:- https://youtu.be/IOZqRgOgSu4.

    echo "Records in the table <br/>";

    foreach ($records as $rec) {
        echo $rec->id."     ".$rec->name."   ".$rec->messages."<br/>";
    }