<?php

class AutoComplete
{

    private static $action;
    private static $type;
    private static $search_form;

    public function __construct(array $type, $id_form) {
        self::$action = 'my_autocomplete';
        self::$type   = $type;
        self::$search_form = $id_form;

        add_action('init', array( __CLASS__, 'init'));
    }

    public static function init()
    {
        //Register style - you can create your own jQuery UI theme and store it in the plug-in folder
        // wp_register_style('my-jquery-ui','https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.theme.min.css');
        add_action('get_search_form', array( __CLASS__, 'get_search_form' ));
        add_action('wp_ajax_'. self::$action, array( __CLASS__, 'autocomplete_suggestions' ));
        add_action('wp_ajax_nopriv_'. self::$action, array( __CLASS__, 'autocomplete_suggestions' ));
    }

    public static function get_search_form($form)
    {
        preg_match('/id="(.*)"/', $form, $match);

        if ($match[1] == self::$search_form) {
            wp_enqueue_script('jquery-ui-autocomplete');
            wp_enqueue_style('my-jquery-ui');

            add_action('wp_print_footer_scripts', array( __CLASS__, 'print_footer_scripts' ), 11);
        }

        return $form;
    }

    public static function print_footer_scripts()
    {
        ?>
    <script type="text/javascript">
        // TODO: Quando não tiver Resultado.
        jQuery(document).ready(function ($){
            var inputSearch = $('#<?php echo self::$search_form; ?>').find("input[name='s']");
                ajaxurl = '<?php echo admin_url('admin-ajax.php');?>',
                ajaxaction = '<?php echo self::$action ?>';

                var autos = inputSearch.autocomplete({
                    delay: 400,
                    minLength: 2,
                    source: function(req, response){
                        $.ajax({
                            'url': ajaxurl+'?callback=?&action='+ajaxaction,
                            'data': req,
                            'method': "GET",
                            'dataType': "json",
                            'success': function(data) {
                                return response(data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        window.location.href = ui.item.link;
                        // console.log(ui.item);
                    },
                })

                autos.data("ui-autocomplete")._renderItem = function (ul, item) {
                    var listItem = $("<li></li>")
                        .data("item.autocomplete", item)
                        .append('<h1>' + item.label + '</h1><p>' + item.excerpt + '</p> <span class="search-item__arrow">&rarr;</span>')
                        .appendTo(ul);

                    return listItem;
                };

                autos.data("ui-autocomplete")._renderMenu = function( ul, items ) {
                  var that = this;
                  $.each( items, function( index, item ) {
                    that._renderItemData( ul, item );
                  });
                //   var more_result =
                //     $("<li>Veja mais resultados</li>")
                //     .appendTo($( ul ).find( "li:odd" ));
              };
        });
    </script>

    <?php

    }

    public static function autocomplete_suggestions()
    {
        $posts = get_posts(array(
            's'         => trim(esc_attr(strip_tags($_REQUEST['term']))),
            'post_type' => self::$type,
        ));

        $suggestions = array();

        global $post;

        foreach ($posts as $post):

            setup_postdata($post);

            $suggestion = array();
            $suggestion['label']   = esc_html($post->post_title);
            $suggestion['link']    = get_permalink();
            $suggestion['excerpt'] = esc_html(wp_trim_words($post->post_content, 15));

            $suggestions[]= $suggestion;
        endforeach;

        $response = $_GET["callback"] . "(" . json_encode($suggestions) . ")";
        echo $response;
        die();
    }
}

$searchCustom = new AutoComplete(['post'], 'searchform');
