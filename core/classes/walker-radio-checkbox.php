<?php

class SetRobot_Taxonomy_Single_Term_Walker extends Walker
{
    public $tree_type = 'category';
    public $db_fields = array( 'parent' => 'parent', 'id' => 'term_id' ); //IDEA: decouple this

    public function __construct($hierarchical, $input_element)
    {
        $this->hierarchical  = $hierarchical;
        $this->input_element = $input_element;
    }

    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        if ('radio' == $this->input_element) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent<ul class='children'>\n";
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        if ('radio' == $this->input_element) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }
    }

    public function start_el(&$output, $term, $depth = 0, $args = array(), $id = 0)
    {
        $taxonomy      = empty($args['taxonomy']) ? 'category'     : $args['taxonomy'];
        $name          = $taxonomy == 'category' ? 'post_category' : 'tax_input['.$taxonomy.']';
        // input name
        $name          = $this->hierarchical ? $name .'[]'         : $name;
        // input value
        $value         = $this->hierarchical ? $term->term_id      : $term->slug;
        $selected_cats = empty($args['selected_cats']) ? array()   : $args['selected_cats'];
        $in_selected   = in_array($term->term_id, $selected_cats);
        $args          = array(
            'id'       => $taxonomy .'-'. $term->term_id,
            'name'     => $name,
            'value'    => $value,
            'checked'  => checked($in_selected, true, false),
            'selected' => selected($in_selected, true, false),
            'disabled' => disabled(empty($args['disabled']), false, false),
            'label'    => esc_html(apply_filters('the_category', $term->name))
        );
        $output       .= 'radio' == $this->input_element ? $this->start_el_radio($args) : $this->start_el_select($args);
    }

    public function start_el_radio($args)
    {
        return "\n".sprintf(
            '<li id="%s"><label class="selectit"><input value="%s" type="radio" name="%s" id="in-%s" %s %s/>%s</label>',
            $args['id'],
            $args['value'],
            $args['name'],
            $args['id'],
            $args['checked'],
            $args['disabled'],
            $args['label']
        );
    }

    public function start_el_select($args)
    {
        return "\n".sprintf(
            '<option %s %s id="%s" value="%s" class="class-single-term">%s',
            $args['selected'],
            $args['disabled'],
            $args['id'],
            $args['value'],
            $args['label']
        );
    }

    public function end_el(&$output, $term, $depth = 0, $args = array())
    {
        if ('radio' == $this->input_element) {
            $output .= "</li>\n";
        } else {
            $output .= "</option>\n";
        }
    }
}
