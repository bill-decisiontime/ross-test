<!--
This is the Controller for showing the calendars. It was written
using a CodeIgnitor tutorial found here:- https://codeigniter.com/userguide2/libraries/calendar.html.
-->

<?php
    class CalendarController extends CI_Controller{
        public function calendar(){
            //------------------------------------------------------------------------//
            // Format for the calendars                                               //
            //------------------------------------------------------------------------//
            // $prefs = array (
            //     'start_day'    => 'saturday',
            //     'month_type'   => 'long',
            //     'day_type'     => 'short',
            //     'show_next_prev'  => TRUE,
            //     'next_prev_url'   => 'http://example.com/index.php/calendar/show/'
            //     );
            $prefs['template'] = '

           {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

           {heading_row_start}<tr>{/heading_row_start}

           {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
           {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
           {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

           {heading_row_end}</tr>{/heading_row_end}

           {week_row_start}<tr>{/week_row_start}
           {week_day_cell}<td>{week_day}</td>{/week_day_cell}
           {week_row_end}</tr>{/week_row_end}

           {cal_row_start}<tr>{/cal_row_start}
           {cal_cell_start}<td>{/cal_cell_start}

           {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
           {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

           {cal_cell_no_content}{day}{/cal_cell_no_content}
           {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

           {cal_cell_blank}&nbsp;{/cal_cell_blank}

           {cal_cell_end}</td>{/cal_cell_end}
           {cal_row_end}</tr>{/cal_row_end}

           {table_close}</table>{/table_close}';

            $this->load->library('calendar', $prefs);

            //------------------------------------------------------------------------//
            // Links for the 3rd Calendar                                             //
            //------------------------------------------------------------------------//

            $links  =  array(
                3  => 'http://www.google.com',
                7  => 'http://www.Youtube.com',
               13 => 'http://www.Yahoo.com',
               26 => 'http://www.bing.com'
                );

            $data ['links'] = $links;
            $this->load->view('Calendar/calendarview', $data);
        }
}
