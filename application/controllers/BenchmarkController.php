<?php
    class BenchmarkController extends CI_Controller {
        public function benchmarkFun(){
            $data['dog'] = $this->benchmark->mark('dog');

            // Some code happens here

            $data['cat'] = $this->benchmark->mark('cat');

            // More code happens here

            $data['bird'] = $this->benchmark->mark('bird');


            $this->load->view('benchmarks/benchmarks', $data);
        }
    }
