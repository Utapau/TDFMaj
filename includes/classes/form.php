<?php
    abstract class Field
    {
        private $type;

        public function Field($type)
        {
            $this->type = $type;
        }

        public function getType()
        {
            return $this->type;
        }

        public abstract function toHtml();
    }

    class Input extends Field
    {
        private $type;
        private $label;
        private $name;
        private $placeholder;

        function Input($type, $label, $name = '', $placeholder = '')
        {
            parent::Field('input');

            $this->type = $type;
            $this->label = $label;
            $this->name = $name;
            $this->placeholder = $placeholder;
        }

        public function toHtml()
        {
            $str = '<div class="controls">';

            if($this->type == 'checkbox' || $this->type == 'radio')
            {
                $str .= '<label class="' . $this->type . '">';

                $str .= '<input type="' . $this->type . '" name="' . $this->name . ' />';

                $str .= $this->label;

                $str .= '</label>';
            }
            else
            {
                $str .= '<label class="' . $this->type . '">' . $this->label . '</label>';

                $str .= '<input type="' . $this->type . '" name="' . $this->name . '" placeholder="' . $this->placeholder . '" />';
            }

            $str .= '</div>' . "\n";
            
            return tidy($str);
        }
    }

    class Button extends Field
    {
        private $type;
        private $label;
        private $class;

        public function Button($type, $label, $class)
        {
            parent::Field('button');

            $this->type = $type;
            $this->label = $label;
            $this->class = $class;
        }

        public function toHtml()
        {
            $str = '<button type="' . $this->type . '" class="' . $this->class . '">' . $this->label . '</button>';

            return tidy($str);
        }
    }

    class Fieldset
    {
        private $legend;
        private $fields;

        public function Fieldset($legend)
        {
            $this->legend = $legend;
            $this->fields = array();
        }

        public function addField($field)
        {
            if(get_parent_class($field) == 'Field')
            {
                $this->fields[] = $field;
            }
            else
            {
                // Print error
            }
        }

        public function toHtml()
        {
            $str = '<fieldset>';

            foreach($this->fields as $field)
            {
                $str .= $field->toHtml();
            }

            $str .= '</fieldset>';

            return tidy($str);
        }
    }

    class Form
    {
        private $method;
        private $action;
        private $fieldsets;

        function Form($method = 'post', $action = '')
        {
            $this->fieldsets = array();

            $this->method = $method;
            $this->action = $action;
        }

        public function addFieldSet($fieldset)
        {
            if(get_class($fieldset) == 'Fieldset')
            {
                $this->fieldsets[] = $fieldset;
            }
            else
            {
                // Print error
            }
        }

        public function toHtml()
        {
            $str = '<div id="login-form">';

            $str .= '<form method="' . $this->method . '" action="' . $this->action . '" >';

            foreach($this->fieldsets as $fieldset)
            {
                $str .= $fieldset->toHtml();
            }

            $str .= '</form>';

            $str .= '</div>';

            return tidy($str);
        }

        public function display()
        {
            echo $this->toHtml();
        }
    }

?>