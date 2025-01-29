<?php

namespace App\Helper;
class ColourBox
{
    public $box_1 = ['colour' => '', 'touches' => ['box_2','box_4']];
    public $box_2 = ['colour' => '', 'touches' => ['box_1','box_3','box_5']];
    public $box_3 = ['colour' => '', 'touches' => ['box_2','box_6']];
    public $box_4 = ['colour' => '', 'touches' => ['box_1','box_5','box_7']];
    public $box_5 = ['colour' => '', 'touches' => ['box_2','box_4','box_6','box_8']];
    public $box_6 = ['colour' => '', 'touches' => ['box_3','box_5','box_9']];
    public $box_7 = ['colour' => '', 'touches' => ['box_4','box_8']];
    public $box_8 = ['colour' => '', 'touches' => ['box_5','box_7','box_9']];
    public $box_9 = ['colour' => '', 'touches' => ['box_6','box_8']];

    public function __construct()
    {
        $this->random_colour();
    }

    public function random_colour()
    {
        if (!session('colour_box')) {
            $this->box_1['colour'] = $this->random_colour_blue_or_red();
            $this->box_2['colour'] = $this->random_colour_blue_or_red();
            $this->box_3['colour'] = $this->random_colour_blue_or_red();
            $this->box_4['colour'] = $this->random_colour_blue_or_red();
            $this->box_5['colour'] = $this->random_colour_blue_or_red();
            $this->box_6['colour'] = $this->random_colour_blue_or_red();
            $this->box_7['colour'] = $this->random_colour_blue_or_red();
            $this->box_8['colour'] = $this->random_colour_blue_or_red();
            $this->box_9['colour'] = $this->random_colour_blue_or_red();
        }
        else
        {
            $box_data = session('colour_box')->get_colour_box();
            $this->box_1 = $box_data['box_1'];
            $this->box_2 = $box_data['box_2'];
            $this->box_3 = $box_data['box_3'];
            $this->box_4 = $box_data['box_4'];
            $this->box_5 = $box_data['box_5'];
            $this->box_6 = $box_data['box_6'];
            $this->box_7 = $box_data['box_7'];
            $this->box_8 = $box_data['box_8'];
            $this->box_9 = $box_data['box_9'];
        }
    }

    public function random_colour_blue_or_red()
    {
        return rand(0, 1) == 0 ? 'blue' : 'red';
    }

    public function click_box($box_number)
    {
        $current_colour = $this->{$box_number}['colour'];

        $change_colour = $current_colour == 'red' ? 'blue' : 'red';

        $this->{$box_number}['colour'] = $change_colour;
        foreach ($this->{$box_number}['touches'] as $touch) {
            $this->{$touch}['colour'] = $this->{$touch}['colour'] = $current_colour;
        }

        return $this;
    }

    public function get_colour_box()
    {
        return ['box_1' => $this->box_1, 'box_2' => $this->box_2, 'box_3' => $this->box_3, 'box_4' => $this->box_4, 'box_5' => $this->box_5, 'box_6' => $this->box_6, 'box_7' => $this->box_7, 'box_8' => $this->box_8, 'box_9' => $this->box_9];
    }
}