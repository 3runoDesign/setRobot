<?php

function prefix_insert_after_paragraph($insertion, $paragraphId, $content)
{
    $closingParagraph = '</p>';
    $paragraphs = explode($closingParagraph, $content);
    $positionAdd = ($paragraphId != null) ? ($paragraphId - 1) : (round(count($paragraphs) / 2) - 1);

    foreach ($paragraphs as $key => $paragraph) {
        $isParagraphEmpty = strlen(trim($paragraphs[$key]));

        if ($isParagraphEmpty > 0) {
            if (trim($paragraph)) {
                $paragraphs[$key] .= $closingParagraph;
            }
            if ($positionAdd == $key) {
                $paragraphs[$key] .= $insertion;
            }
        }
        $paragraphs[$key] .= '<div style="clear: both;"></div>';
    }

    return implode('', $paragraphs);
}
