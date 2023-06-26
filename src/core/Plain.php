<?php

namespace Outline\Plain\Html\Core;

use Outline\Plain\Html\Elements\Input;
use Outline\Plain\Html\Elements\Title;

class Plain
{
    private Input $input;
    private Title $title;
    private array $ids;
    private array $elements;

    public function __construct()
    {
        $this->ids = [];
        $this->elements = [];
        $this->input = new Input();
        $this->title = new Title();
    }

    private function check_id(string $id): bool
    {
        return !in_array($id, $this->ids);
    }

    public function title(string $id, string $title): void
    {
        if($this->check_id($id)){
            $this->ids[] = $id;
            $this->elements[] = $this->title->title($id, $title);
        }
    }

    public function input_txt(string $id): void
    {
        if($this->check_id($id)){
            $this->ids[] = $id;
            $this->elements[] = $this->input->txt($id);
        }
    }

    public function get_elements(): array
    {
        return $this->elements;
    }
}