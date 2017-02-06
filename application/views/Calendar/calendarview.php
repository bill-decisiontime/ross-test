<!-- 
This is the View for showing the calendars. It was written
using a CodeIgnitor tutorial found here:- https://codeigniter.com/userguide2/libraries/calendar.html.
-->

<!-- This calendar will be normal -->
<p>
    <?php
        echo $this->calendar->generate();
    ?>
</p>

<!-- This calendar will have clickable links on different days -->
<p>
    <?php
        echo $this->calendar->generate($links);
    ?>
</p>

<!-- This calendar will showing June 2006 -->
<p>
    <?php
        echo $this->calendar->generate(2006, 6);
    ?>
</p>

<!-- This calendar will allow users to switch between days -->
<p>
    <?php
        echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
    ?>
</p>
