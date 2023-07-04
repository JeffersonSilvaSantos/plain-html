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
        $this->elements = [];
        $this->input = new Input();
        $this->title = new Title();
        $this->ids = [];
    }

    /**
     * @param ?string $id
     * @return bool
     */
    private function check_id(?string $id): bool
    {
        $id = is_null($id) ? "" : $id;
        if (!in_array($id, $this->ids)) {
            $this->ids[] = $id;
            return  true;
        }
        return false;
    }

    public function title(string $id, string $class, string $title): void
    {
        $element = $this->title->title($id,$class,$title);
        if ($this->check_id($this->title->element_id())) $this->elements[] = $element;
    }

    public function input_txt(string $id, string $class, bool $required): void
    {
        $element = $this->input->txt($id, $class, $required);
        if ($this->check_id($this->input->element_id())) $this->elements[] = $element;
    }

    public function input_pass(string $id, string $class): void
    {
        $element = $this->input->password($id, $class);
        if ($this->check_id($this->input->element_id())) $this->elements[] = $element;
    }

    public function get_elements(): array
    {
        return $this->elements;
    }

    public function getIds(): array
    {
        return $this->ids;
    }

    public function render(): void
    {
        echo implode("<br>", $this->elements);
        $this->elements = [];
    }
}