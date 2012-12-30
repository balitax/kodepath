<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Tablediv {

    function Tablediv() {
        $this->tbl_bg_color='';
        $this->tbl_border_color='';
        $this->tbl_border='';
        $this->tbl_width='20%';
        $this->tbl_width_col='';
        $this->head_cell_style='';
        $this->body_row_cell_style='';
        $this->tbl_row_style='';
    }

    function start($align='center') {
        $this->final_tbl .= '<div class="base-layer" align="'.$align.'">';
    }

    function start_head($header_row_id='', $style='', $align='center') {
        $this->final_tbl .= '<div class="mytablerowclass" id="'.$header_row_id.'"  align="'.$align.'">';
    }

    function cell_head($header_text='Header Content', $style='', $align='center') {
        $this->final_tbl .= '<div class="mymaintablerowclass" style="'.$style.'" align="'.$align.'"><h5 class="mytableheaderclass">';
        $this->final_tbl .= $header_text . "</h5></div>";
    }

    function stop_head(){
        $this->final_tbl .= "</div>";
    }

    function start_row($body_row_id='', $style='', $align='center') {
        $this->final_tbl .= '<div class="mytablerowclass" id="'.$body_row_id.'" style="'.$style.'" align="'.$align.'">';
    }

    function cell_row($header_text='Cell Content', $style='', $align='') {
        $this->final_tbl .= '<div class="mymaintablerowclass" style="'.$style.'" align="'.$align.'"><p class="mytablecelltextclass">';
        $this->final_tbl .= $header_text.'</p></div>';
    }

    function stop_row(){
        $this->final_tbl .= "</div>";
    }

    function close(){

        $this->final_tbl .= "</div>";
    }

    function get(){
        return $this->final_tbl;
    }

    function css() {
        $this->tbl_width_col =  sprintf("%d",$this->tbl_width / $this->column) . "%";
        $this->final_tbl .= '<style>
        div.base-layer {
        border: solid #f8f8f8 1px;
        '.$this->tbl_style.'; padding: 0; text-align: center; width: auto;
        }
        div.mytablerowclass {
        width: '.$this->tbl_width.';
        }
        div.mymaintablerowclass {
        float: left; margin: 0; padding: 0; width: '.$this->tbl_width_col.'; '.$this->tbl_row_style.'
        }
        h5.mytableheaderclass {
        '.$this->head_cell_style.'
        }
        p.mytablecelltextclass {
        '.$this->body_row_cell_style.'
        }
        </style>';
    }
} 